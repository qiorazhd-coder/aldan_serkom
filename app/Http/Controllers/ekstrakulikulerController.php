<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakulikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ekstrakulikulerController extends Controller
{
    // ================= ADMIN CRUD =================
    public function index()
    {
        $ekstrakulikulers = Ekstrakulikuler::all();
        return view('ekstrakulikuler.index', compact('ekstrakulikulers'));
    }

    public function create()
    {
        return view('ekstrakulikuler.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ekskul'    => 'required|string|max:40',
            'pembina'        => 'required|string|max:40',
            'jadwal_latihan' => 'required|string|max:40',
            'deskripsi'      => 'nullable|string',
            'gambar'         => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->only(['nama_ekskul', 'pembina', 'jadwal_latihan', 'deskripsi']);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('ekskul', 'public');
        }

        Ekstrakulikuler::create($data);

        return redirect()->route('ekstrakulikuler.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show($id)
    {
        $ekstrakulikuler = Ekstrakulikuler::findOrFail($id);
        return view('ekstrakulikuler.show', compact('ekstrakulikuler'));
    }

    public function edit($id)
    {
        $ekstrakulikuler = Ekstrakulikuler::findOrFail($id);
        return view('ekstrakulikuler.edit', compact('ekstrakulikuler'));
    }

    public function update(Request $request, $id)
    {
        $ekstrakulikuler = Ekstrakulikuler::findOrFail($id);

        $request->validate([
            'nama_ekskul'    => 'required|string|max:40',
            'pembina'        => 'required|string|max:40',
            'jadwal_latihan' => 'required|string|max:40',
            'deskripsi'      => 'nullable|string',
            'gambar'         => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->only(['nama_ekskul', 'pembina', 'jadwal_latihan', 'deskripsi']);

        if ($request->hasFile('gambar')) {
            if ($ekstrakulikuler->gambar) {
                $oldPath = str_replace('public/', '', $ekstrakulikuler->gambar);
                if (Storage::disk('public')->exists($oldPath)) {
                    Storage::disk('public')->delete($oldPath);
                }
            }
            $data['gambar'] = $request->file('gambar')->store('ekskul', 'public');
        }

        $ekstrakulikuler->update($data);

        return redirect()->route('ekstrakulikuler.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function showDetail($id)
    {
        $ekstrakulikuler = Ekstrakulikuler::findOrFail($id);
        return view('ekstrakulikuler.detail', compact('ekstrakulikuler'));
    }

    public function destroy($id)
    {
        $ekstrakulikuler = Ekstrakulikuler::findOrFail($id);

        if ($ekstrakulikuler->gambar) {
            $oldPath = str_replace('public/', '', $ekstrakulikuler->gambar);
            if (Storage::disk('public')->exists($oldPath)) {
                Storage::disk('public')->delete($oldPath);
            }
        }

        $ekstrakulikuler->delete();

        return redirect()->route('ekstrakulikuler.index')->with('success', 'Data berhasil dihapus.');
    }

    // ================= PUBLIK / LANDING PAGE =================
    public function publicIndex()
    {
        $ekstrakulikulers = Ekstrakulikuler::latest()->get();
        return view('landing.ekstrakulikuler', compact('ekstrakulikulers'));
    }

    public function publicDetail($id)
    {
        $ekstrakulikuler = Ekstrakulikuler::findOrFail($id);
        return view('landing.ekstrakulikuler-detail', compact('ekstrakulikuler'));
    }
}