<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kegiatan;

class KegiatanSeeder extends Seeder
{
    public function run(): void
    {
        Kegiatan::create([
            'nama_kegiatan' => 'Upacara Hari Senin',
            'tanggal_kegiatan' => '2025-10-28',
            'gambar_kegiatan' => 'default.jpg',
            'deskripsi' => 'Upacara bendera rutin setiap hari Senin di lapangan sekolah.',
        ]);
    }
}
