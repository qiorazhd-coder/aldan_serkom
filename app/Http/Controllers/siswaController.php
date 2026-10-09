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
            return $query->where('nama_siswa', 'like', "%{$search}%")
                         ->orWhere('nisn', 'like', "%{$search}%");
        })->latest('id_siswa')->paginate(10);

        return view('siswa.index', compact('siswa', 'search'));
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nisn'          => 'required|string|max:10|unique:siswa,nisn',
            'nama_siswa'    => 'required|string|max:40',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'tahun_masuk'   => 'required|digits:4',
        ]);

        Siswa::create([
            'nisn'          => $request->nisn,
            'nama_siswa'    => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tahun_masuk'   => $request->tahun_masuk,
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
            'nisn'          => 'required|string|max:10|unique:siswa,nisn,' . $id . ',id_siswa',
            'nama_siswa'    => 'required|string|max:40',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'tahun_masuk'   => 'required|digits:4',
        ]);

        $siswa->update([
            'nisn'          => $request->nisn,
            'nama_siswa'    => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tahun_masuk'   => $request->tahun_masuk,
        ]);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function showDetail($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.detail', compact('siswa'));
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus.');
    }
}