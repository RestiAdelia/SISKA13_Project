<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;

class LandingPageController extends Controller
{
    public function index()
    {
        // ambil data pertama dari tabel visi_misi
        $visimisi = VisiMisi::first();
        return view('landing_page', compact('visimisi'));
    }
}
