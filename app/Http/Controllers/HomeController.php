<?php

namespace App\Http\Controllers;

use App\Models\Katalog;
use App\Models\Misi;
use App\Models\Anggota;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the home page
     */
    public function index()
    {
        // Ambil data katalog aktif (maksimal 10)
        $katalogs = Katalog::where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        // Hitung total katalog aktif
        $totalKatalog = Katalog::where('is_active', true)->count();

        // Ambil data misi yang aktif dan diurutkan
        $misi = Misi::active()->ordered()->get();

        // Hitung jumlah anggota yang sudah di-approve
        $totalAnggota = Anggota::approved()->count();

        // Ambil data anggota yang sudah di-approve (maksimal 10 untuk carousel)
        $anggotaList = Anggota::approved()
            ->orderBy('approved_at', 'desc')
            ->take(10)
            ->get();

        // Return view dengan data
        return view('pages.home', compact('katalogs', 'totalKatalog', 'misi', 'totalAnggota', 'anggotaList'));
    }
}