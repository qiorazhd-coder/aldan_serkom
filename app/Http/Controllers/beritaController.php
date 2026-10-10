<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class beritaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $beritas = Berita::when($search, function ($query, $search) {
            return $query->where('judul', 'like', "%{$search}%")
                ->orWhere('isi', 'like', "%{$search}%");
        })->latest()->paginate(10);

        return view('berita.index', compact('beritas', 'search'));
    }

    public function create()
    {
        return view('berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'  => 'required|string|max:255',
            'isi'    => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->only(['judul', 'isi']);
        $data['id_user'] = Auth::id() ?? 1;

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        Berita::create($data);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        return view('berita.detail', compact('berita'));
    }

    public function showDetail($identifier = null)
{
    // Jika URL diakses tanpa slug / kosong
    if (empty($identifier)) {
        if (\Illuminate\Support\Facades\Auth::check()) {
            return redirect()->route('berita.index')->with('error', 'Data berita tidak ditemukan.');
        }
        return redirect()->to('/');
    }

    // Cek berdasarkan id_berita
    $berita = berita::where('id_berita', $identifier)->first();

    // Jika tidak ketemu, cari berdasarkan slug dari judul
    if (!$berita) {
        $berita = berita::all()->first(function ($item) use ($identifier) {
            return \Illuminate\Support\Str::slug($item->judul) === $identifier;
        });
    }

    // Jika data berita tidak ditemukan di database
    if (!$berita) {
        if (\Illuminate\Support\Facades\Auth::check()) {
            return redirect()->route('berita.index')->with('error', 'Data berita tidak ditemukan.');
        }
        return redirect()->to('/');
    }

    // Jika admin/operator yang login, gunakan layout admin (dengan sidebar)
    if (\Illuminate\Support\Facades\Auth::check()) {
        return view('berita.detail', compact('berita'));
    }

    // Jika pengunjung umum dari landing page
    return view('landing.berita-detail', compact('berita'));
}
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('berita.edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $request->validate([
            'judul'  => 'required|string|max:255',
            'isi'    => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->only(['judul', 'isi']);

        if ($request->hasFile('gambar')) {
            if ($berita->gambar) {
                $oldPath = str_replace('public/', '', $berita->gambar);
                if (Storage::disk('public')->exists($oldPath)) {
                    Storage::disk('public')->delete($oldPath);
                }
            }
            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        $berita->update($data);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        if ($berita->gambar) {
            $oldPath = str_replace('public/', '', $berita->gambar);
            if (Storage::disk('public')->exists($oldPath)) {
                Storage::disk('public')->delete($oldPath);
            }
        }

        $berita->delete();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus.');
    }
}
