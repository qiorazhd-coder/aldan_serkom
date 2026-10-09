<?php

namespace App\Http\Controllers;

use App\Models\ProfileSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class ProfileSekolahController extends Controller
{
    public function index()
    {
        $profileSekolah = ProfileSekolah::first();
        return view('profileSekolah.index', compact('profileSekolah'));
    }

    public function edit()
    {
        $profileSekolah = ProfileSekolah::first() ?? new ProfileSekolah();

        return view('profileSekolah.edit', compact('profileSekolah')); 
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_sekolah'   => 'required|string|max:255',
            'kepala_sekolah' => 'nullable|string|max:255',
            'npsn'           => 'nullable|string|max:50',
            'alamat'         => 'nullable|string',
            'kontak'         => 'nullable|string|max:50',
            'tahun_berdiri'  => 'nullable|string|max:10',
            'visi_misi'      => 'nullable|string',
            'deskripsi'      => 'nullable|string',
            'logo'           => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only([
            'nama_sekolah', 'kepala_sekolah', 'npsn', 'alamat', 
            'kontak', 'tahun_berdiri', 'visi_misi', 'deskripsi'
        ]);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('profile', 'public');
        }

        $exists = DB::table('profile_sekolah')->exists();

        if ($exists) {
            DB::table('profile_sekolah')->update(array_merge($data, [
                'updated_at' => now()
            ]));
        } else {
            DB::table('profile_sekolah')->insert(array_merge($data, [
                'created_at' => now(),
                'updated_at' => now()
            ]));
        }

        return redirect()->route('profileSekolah.index')->with('success', 'Profil sekolah berhasil diperbarui.');
    }
}