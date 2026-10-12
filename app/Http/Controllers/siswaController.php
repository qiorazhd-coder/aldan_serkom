<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $siswa = DB::table('siswas')
            ->when($search, function ($query, $search) {
                return $query->where('nama_siswa', 'like', "%{$search}%")
                            ->orWhere('nisn', 'like', "%{$search}%")
                            ->orWhere('kelas', 'like', "%{$search}%"); 
            })
            ->latest()
            ->paginate(10);

        return view('siswa.index', compact('siswa', 'search'));
    }
    public function create()
    {

        $kelas = \DB::table('kelas')->get(); 

        return view('siswa.create', compact('kelas'));
    }

    public function edit($id)
    {
        $siswa = \DB::table('siswas')->where('id_siswa', $id)->first();
        $kelas = \DB::table('kelas')->get(); 
        return view('siswa.edit', compact('siswa', 'kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nisn'          => 'required|string|max:10|unique:siswas,nisn', 
            'nama_siswa'    => 'required|string|max:40',
            'kelas'         => 'required|string|max:30', 
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'tahun_masuk'   => 'required|digits:4',
        ]);

        Siswa::create([
            'nisn'          => $request->nisn,
            'nama_siswa'    => $request->nama_siswa,
            'kelas'         => $request->kelas,         
            'jenis_kelamin' => $request->jenis_kelamin,
            'tahun_masuk'   => $request->tahun_masuk,
        ]);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }

 
    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'nisn'          => 'required|string|max:10|unique:siswas,nisn,' . $id . ',id_siswa',
            'nama_siswa'    => 'required|string|max:40',
            'kelas'         => 'required|string|max:30', 
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'tahun_masuk'   => 'required|digits:4',
        ]);

        $siswa->update([
            'nisn'          => $request->nisn,
            'nama_siswa'    => $request->nama_siswa,
            'kelas'         => $request->kelas,         
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