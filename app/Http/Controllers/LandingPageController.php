<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;
use App\Models\Kegiatan; // tambahkan model kegiatan

class LandingPageController extends Controller
{
    public function index()
    {
        // Ambil data visi & misi
        $visimisi = VisiMisi::first();

        // Ambil semua kegiatan, urutkan dari yang terbaru
        $kegiatan = Kegiatan::latest()->get();

        // Kirim keduanya ke view landing page
        return view('landing_page', compact('visimisi', 'kegiatan'));
    }
}
