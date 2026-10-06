<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class guruController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $guru = Guru::when($search, function ($query, $search) {
            return $query->where('nama_guru', 'like', "%{$search}%")
                         ->orWhere('nip', 'like', "%{$search}%")
                         ->orWhere('mapel', 'like', "%{$search}%");
        })->latest()->paginate(10);

        return view('guru.index', compact('guru', 'search'));
    }

    public function create()
    {
        return view('guru.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip'       => 'nullable|string|max:30|unique:guru,nip',
            'nama_guru' => 'required|string|max:255',
            'mapel'     => 'required|string|max:255',
            'foto'      => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->only(['nip', 'nama_guru', 'mapel']);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('guru', 'public');
        }

        Guru::create($data);

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        return view('guru.edit', compact('guru'));
    }

    public function update(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);

        $request->validate([
            'nip'       => 'nullable|string|max:30|unique:guru,nip,' . $id . ',id_guru',
            'nama_guru' => 'required|string|max:255',
            'mapel'     => 'required|string|max:255',
            'foto'      => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->only(['nip', 'nama_guru', 'mapel']);

        if ($request->hasFile('foto')) {
            if ($guru->foto) {
                $oldPath = str_replace('public/', '', $guru->foto);
                if (Storage::disk('public')->exists($oldPath)) {
                    Storage::disk('public')->delete($oldPath);
                }
            }
            $data['foto'] = $request->file('foto')->store('guru', 'public');
        }

        $guru->update($data);

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);

        if ($guru->foto) {
            $oldPath = str_replace('public/', '', $guru->foto);
            if (Storage::disk('public')->exists($oldPath)) {
                Storage::disk('public')->delete($oldPath);
            }
        }

        $guru->delete();

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil dihapus.');
    }
}