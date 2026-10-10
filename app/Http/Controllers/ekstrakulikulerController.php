<?php

namespace App\Http\Controllers;

use App\Models\ekstrakulikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ekstrakulikulerController extends Controller
{
    public function publicIndex()
    {
        $ekstrakulikulers = ekstrakulikuler::latest()->get();
        return view('landing.ekstrakulikuler', compact('ekstrakulikulers'));
    }

    public function publicDetail($id)
    {
        $ekstrakulikuler = ekstrakulikuler::where('id_ekstrakulikuler', $id)->firstOrFail();
        return view('landing.ekstrakulikuler-detail', compact('ekstrakulikuler'));
    }

    public function index()
    {
        $ekstrakulikulers = ekstrakulikuler::latest()->paginate(10);
        return view('ekstrakulikuler.index', compact('ekstrakulikulers'));
    }

    public function create()
    {
        return view('ekstrakulikuler.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ekskul'    => 'required|string|max:255',
            'pembina'        => 'nullable|string|max:255',
            'jadwal_latihan' => 'nullable|string|max:255',
            'gambar'         => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'deskripsi'      => 'nullable|string',
        ]);

        $data = $request->only(['nama_ekskul', 'pembina', 'jadwal_latihan', 'deskripsi']);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('ekstrakulikuler', 'public');
        }

        ekstrakulikuler::create($data);

        return redirect()->route('ekstrakulikuler.index')->with('success', 'Ekstrakurikuler berhasil ditambahkan.');
    }

    public function showDetail($id)
    {
        $ekstrakulikuler = ekstrakulikuler::where('id_ekstrakulikuler', $id)->firstOrFail();
        return view('ekstrakulikuler.detail', compact('ekstrakulikuler'));
    }

    public function edit($id)
    {
        $ekstrakulikuler = ekstrakulikuler::where('id_ekstrakulikuler', $id)->firstOrFail();
        return view('ekstrakulikuler.edit', compact('ekstrakulikuler'));
    }

    public function update(Request $request, $id)
    {
        $ekstrakulikuler = ekstrakulikuler::where('id_ekstrakulikuler', $id)->firstOrFail();

        $request->validate([
            'nama_ekskul'    => 'required|string|max:255',
            'pembina'        => 'nullable|string|max:255',
            'jadwal_latihan' => 'nullable|string|max:255',
            'gambar'         => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'deskripsi'      => 'nullable|string',
        ]);

        $data = $request->only(['nama_ekskul', 'pembina', 'jadwal_latihan', 'deskripsi']);

        if ($request->hasFile('gambar')) {
            if ($ekstrakulikuler->gambar) {
                $oldPath = str_replace('public/', '', $ekstrakulikuler->gambar);
                if (Storage::disk('public')->exists($oldPath)) {
                    Storage::disk('public')->delete($oldPath);
                }
            }
            $data['gambar'] = $request->file('gambar')->store('ekstrakulikuler', 'public');
        }

        $ekstrakulikuler->update($data);

        return redirect()->route('ekstrakulikuler.index')->with('success', 'Ekstrakurikuler berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $ekstrakulikuler = ekstrakulikuler::where('id_ekstrakulikuler', $id)->firstOrFail();

        if ($ekstrakulikuler->gambar) {
            $oldPath = str_replace('public/', '', $ekstrakulikuler->gambar);
            if (Storage::disk('public')->exists($oldPath)) {
                Storage::disk('public')->delete($oldPath);
            }
        }

        $ekstrakulikuler->delete();

        return redirect()->route('ekstrakulikuler.index')->with('success', 'Ekstrakurikuler berhasil dihapus.');
    }
}