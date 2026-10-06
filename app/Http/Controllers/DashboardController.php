<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Berita;
use App\Models\ProfileSekolah;
use Illuminate\Support\Facades\DB; // Tambahkan Facade DB
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSiswa = Siswa::count();
        $totalGuru = Guru::count();
        $totalBerita = Berita::count();
        $totalGaleri = DB::table('galeries')->count(); 
        $profileSekolah = ProfileSekolah::first() ?? new ProfileSekolah();
        $beritaTerbaru = Berita::latest()->take(5)->get();

        return view('beranda.dashboard', compact(
            'totalSiswa',
            'totalGuru',
            'totalBerita',
            'totalGaleri',
            'profileSekolah',
            'beritaTerbaru'
        ));
    }
}