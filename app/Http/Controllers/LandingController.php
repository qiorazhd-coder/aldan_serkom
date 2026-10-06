<?php

namespace App\Http\Controllers;

use App\Models\ProfileSekolah;
use App\Models\Berita;
use App\Models\Guru;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $profile = ProfileSekolah::first();
        $berita = Berita::latest()->take(3)->get();
        $guru = Guru::take(4)->get();
        
        $galeri = DB::table('galeries')->latest()->take(6)->get();

        $totalSiswa = DB::table('siswa')->count();
        $totalGuru = Guru::count();

        return view('landing', compact('profile', 'berita', 'guru', 'galeri', 'totalSiswa', 'totalGuru'));
    }
}