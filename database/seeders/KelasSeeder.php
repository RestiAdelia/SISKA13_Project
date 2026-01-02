<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kelas;

class KelasSeeder extends Seeder
{
    public function run(): void
    {
        Kelas::create([
            'nama_kelas' => 'X IPA 1',
            'tahun_ajar' => '2024/2025',
            'guru_id' => 1, 
            'mata_pelajaran' => [
                'Matematika',
                'Bahasa Indonesia',
                'Fisika'
            ]
        ]);

        Kelas::create([
            'nama_kelas' => 'XI IPS 2',
            'tahun_ajar' => '2024/2025',
            'guru_id' => 2,
            'mata_pelajaran' => [
                'Ekonomi',
                'Sosiologi',
                'Geografi'
            ]
        ]);
         Kelas::create([
            'nama_kelas' => 'XI IPS 2',
            'tahun_ajar' => '2024/2025',
            'guru_id' => 2,
            'mata_pelajaran' => [
                'Ekonomi',
                'Sosiologi',
                'Geografi'
            ]
        ]);
         Kelas::create([
            'nama_kelas' => 'XI IPS 2',
            'tahun_ajar' => '2024/2025',
            'guru_id' => 2,
            'mata_pelajaran' => [
                'Ekonomi',
                'Sosiologi',
                'Geografi'
            ]
        ]);
         Kelas::create([
            'nama_kelas' => 'XI IPS 2',
            'tahun_ajar' => '2024/2025',
            'guru_id' => 2,
            'mata_pelajaran' => [
                'Ekonomi',
                'Sosiologi',
                'Geografi'
            ]
        ]);
         Kelas::create([
            'nama_kelas' => 'XI IPS 2',
            'tahun_ajar' => '2024/2025',
            'guru_id' => 2,
            'mata_pelajaran' => [
                'Ekonomi',
                'Sosiologi',
                'Geografi'
            ]
        ]);

       
    }
}
