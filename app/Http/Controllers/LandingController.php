<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Guru;
use App\Models\Ekstrakulikuler;

class LandingController extends Controller
{
    public function index()
    {
        $globalProfile = DB::table('profile_sekolah')->first(); 
        $berita = DB::table('berita')->latest()->take(3)->get();
        $guru = Guru::latest()->take(4)->get();
        
        $galeri = DB::table('galeri')->latest()->take(6)->get();

        $ekstrakulikulers = Ekstrakulikuler::latest()->take(6)->get();

        $siswas = DB::table('siswas')->latest()->get();

        $totalSiswa = DB::table('siswas')->count();
        $totalGuru = Guru::count();
        $totalEkstrakurikuler = Ekstrakulikuler::count();

        return view('landing', compact(
            'globalProfile', 
            'berita', 
            'guru', 
            'galeri', 
            'ekstrakulikulers', 
            'siswas', 
            'totalSiswa', 
            'totalGuru', 
            'totalEkstrakurikuler'
        ));
    }

   
    public function profilPublic()
{
    $globalProfile = DB::table('profile_sekolah')->first();

    return view('landing.profil', compact('globalProfile')); 
}
}