<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class siswaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $siswa = Siswa::when($search, function ($query, $search) {
            return $query->where('nama', 'like', "%{$search}%")
                         ->orWhere('nisn', 'like', "%{$search}%")
                         ->orWhere('kelas', 'like', "%{$search}%")
                         ->orWhere('jurusan', 'like', "%{$search}%");
        })->latest()->paginate(10);

        return view('siswa.index', compact('siswa', 'search'));
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nisn'          => 'required|string|max:20|unique:siswa,nisn',
            'nama'          => 'required|string|max:255',
            'kelas'         => 'required|string|max:50',
            'jurusan'       => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat'        => 'nullable|string',
        ]);

        Siswa::create([
            'nisn'          => $request->nisn,
            'nama'          => $request->nama,
            'kelas'         => $request->kelas,
            'jurusan'       => $request->jurusan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat'        => $request->alamat,
        ]);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'nisn'          => 'required|string|max:20|unique:siswa,nisn,' . $id . ',id_siswa',
            'nama'          => 'required|string|max:255',
            'kelas'         => 'required|string|max:50',
            'jurusan'       => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat'        => 'nullable|string',
        ]);

        $siswa->update([
            'nisn'          => $request->nisn,
            'nama'          => $request->nama,
            'kelas'         => $request->kelas,
            'jurusan'       => $request->jurusan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat'        => $request->alamat,
        ]);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus.');
    }
}