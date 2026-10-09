<?php

namespace App\Http\Controllers;

use App\Models\galery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class galeriController extends Controller
{
    public function index()
    {
        $galeries = galery::latest()->paginate(10);
        return view('galeri.index', compact('galeries'));
    }

    public function create()
    {
        return view('galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'     => 'nullable|string|max:255',
            'foto'      => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'deskripsi' => 'nullable|string',
        ]);

        $data = $request->only(['judul', 'deskripsi']);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('galeri', 'public');
        }

        galery::create($data);

        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil ditambahkan.');
    }

    public function show($id)
    {
        $galeri = galery::where('id_galeri', $id)->firstOrFail();
        return view('galeri.detail', compact('galeri'));
    }

    public function showDetail($id)
    {
        return $this->show($id);
    }

    public function edit($id)
    {
        $galeri = galery::where('id_galeri', $id)->firstOrFail();
        return view('galeri.edit', compact('galeri'));
    }

    public function update(Request $request, $id)
    {
        $galeri = galery::where('id_galeri', $id)->firstOrFail();

        $request->validate([
            'judul'     => 'nullable|string|max:255',
            'foto'      => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'deskripsi' => 'nullable|string',
        ]);

        $data = $request->only(['judul', 'deskripsi']);

        if ($request->hasFile('foto')) {
            if ($galeri->foto) {
                $oldPath = str_replace('public/', '', $galeri->foto);
                if (Storage::disk('public')->exists($oldPath)) {
                    Storage::disk('public')->delete($oldPath);
                }
            }
            $data['foto'] = $request->file('foto')->store('galeri', 'public');
        }

        $galeri->update($data);

        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $galeri = galery::where('id_galeri', $id)->firstOrFail();

        if ($galeri->foto) {
            $oldPath = str_replace('public/', '', $galeri->foto);
            if (Storage::disk('public')->exists($oldPath)) {
                Storage::disk('public')->delete($oldPath);
            }
        }

        $galeri->delete();

        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil dihapus.');
    }
}