<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Berita;
use App\Models\ProfileSekolah;
use App\Models\Ekstrakulikuler;
use Illuminate\Support\Facades\DB; 


class DashboardController extends Controller
{
   public function index()
    {
        $totalSiswa = Siswa::count();
        $totalGuru = Guru::count();
        $totalBerita = Berita::count();
        $totalGaleri = DB::table('galeries')->count(); 
        
        $profileSekolah = ProfileSekolah::first() ?? new ProfileSekolah();
        $profile = $profileSekolah; 

        $beritaTerbaru = Berita::latest()->take(3)->get();
        $totalEkstrakurikuler = Ekstrakulikuler::count(); 

        return view('beranda.dashboard', compact(
            'totalSiswa',
            'totalGuru',
            'totalBerita',
            'totalGaleri',
            'profileSekolah',
            'profile',
            'beritaTerbaru',
            'totalEkstrakurikuler'
        ));
    }
}