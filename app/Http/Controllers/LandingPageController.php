<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;
use App\Models\Kegiatan; 
use App\Models\GuruDanStaff;

class LandingPageController extends Controller
{
    public function index()
    {
        // Ambil data visi & misi
        $visimisi = VisiMisi::first();
        $kepsek = GuruDanStaff::where('jabatan', 'Kepala Sekolah')->first();

        // Ambil semua kegiatan, urutkan dari yang terbaru
        $kegiatan = Kegiatan::latest()->get();

        // Ambil data guru & staff (tanpa kepala sekolah)
        $staff = GuruDanStaff::where('jabatan', '!=', 'Kepala Sekolah')
            ->orderByRaw("
        CASE
            WHEN jabatan LIKE '%Guru%' THEN 1
            WHEN jabatan LIKE '%Staf%' THEN 2
            ELSE 3
        END
    ")
            ->orderBy('no_urut')
            ->orderBy('id')
            ->get();

        return view('landing_page', compact('visimisi', 'kegiatan', 'staff', 'kepsek'));
    }
}
