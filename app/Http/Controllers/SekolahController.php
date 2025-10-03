<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SekolahController extends Controller
{
    public function index()
    {
        // Bisa kirim data dari database, untuk contoh pakai statis dulu
        $data = [
            'nama' => 'SMA Negeri 13 Contoh',
            'alamat' => 'Jl. Pendidikan No. 45, Surabaya',
            'telepon' => '(031) 123456',
            'email' => 'info@sman13contoh.sch.id',
            'visi' => 'Menjadi sekolah unggul dalam prestasi dan berkarakter.',
            'misi' => [
                'Meningkatkan kualitas pembelajaran.',
                'Mengembangkan potensi siswa.',
                'Menanamkan nilai karakter dan budi pekerti.',
            ]
        ];

        return view('sekolah.profile', compact('data'));}
}
