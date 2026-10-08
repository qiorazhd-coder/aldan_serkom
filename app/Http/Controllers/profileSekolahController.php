<?php

namespace App\Http\Controllers;

use App\Models\ProfileSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileSekolahController extends Controller
{
    public function index()
    {
        $profileSekolah = ProfileSekolah::first();
        return view('profileSekolah.index', compact('profileSekolah'));
    }

    public function create()
    {
        return redirect()->route('profileSekolah.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_sekolah'   => 'required|string|max:255',
            'kepala_sekolah' => 'nullable|string|max:255',
            'npsn'           => 'nullable|string|max:50',
            'alamat'         => 'nullable|string',
            'kontak'         => 'nullable|string|max:255',
            'visi_misi'      => 'nullable|string',
            'tahun_berdiri'  => 'nullable|string|max:10',
            'deskripsi'      => 'nullable|string',
            'logo'           => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
        ]);

        $data = $request->except('logo');

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('profile', 'public');
        }

        ProfileSekolah::create($data);

        return redirect()->route('profileSekolah.index')->with('success', 'Profil sekolah berhasil disimpan.');
    }

    public function edit($id)
    {
        $profileSekolah = ProfileSekolah::findOrFail($id);
        return view('profileSekolah.edit', compact('profileSekolah'));
    }

    public function update(Request $request, $id)
    {
        $profileSekolah = ProfileSekolah::findOrFail($id);

        $request->validate([
            'nama_sekolah'   => 'required|string|max:255',
            'kepala_sekolah' => 'nullable|string|max:255',
            'npsn'           => 'nullable|string|max:50',
            'alamat'         => 'nullable|string',
            'kontak'         => 'nullable|string|max:255',
            'visi_misi'      => 'nullable|string',
            'tahun_berdiri'  => 'nullable|string|max:10',
            'deskripsi'      => 'nullable|string',
            'logo'           => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
        ]);

        $data = $request->except('logo');

        if ($request->hasFile('logo')) {
            if ($profileSekolah->logo) {
                $oldPath = str_replace('public/', '', $profileSekolah->logo);
                if (Storage::disk('public')->exists($oldPath)) {
                    Storage::disk('public')->delete($oldPath);
                }
            }
            $data['logo'] = $request->file('logo')->store('profile', 'public');
        }

        $profileSekolah->update($data);

        return redirect()->route('profileSekolah.index')->with('success', 'Profil sekolah berhasil diperbarui.');
    }
}