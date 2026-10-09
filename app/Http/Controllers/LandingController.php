<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Guru;
use App\Models\Ekstrakulikuler; // Jangan lupa import model Ekstrakulikuler

class LandingController extends Controller
{
    public function index()
    {
        $profile = DB::table('profile_sekolah')->first(); 
        $berita = DB::table('berita')->latest()->take(3)->get();
        $guru = Guru::latest()->take(4)->get();
        $galeri = DB::table('galeries')->latest()->take(6)->get();
        
        // Ambil data ekstrakurikuler (misal batasi 4 atau 6 item untuk ditampilkan di beranda)
        $ekstrakulikulers = Ekstrakulikuler::latest()->take(6)->get();

        $totalSiswa = DB::table('siswa')->count();
        $totalGuru = Guru::count();

        return view('landing', compact('profile', 'berita', 'guru', 'galeri', 'ekstrakulikulers', 'totalSiswa', 'totalGuru'));
    }
}