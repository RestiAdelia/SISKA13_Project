<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GuruDanStaff;

class GuruDanStaffSeeder extends Seeder
{
    public function run(): void
    {
        GuruDanStaff::create([
            'foto' => null,
            'no_urut' => 1,
            'nama' => 'Budi Santoso',
            'nip' => '198012122005011001',
            'tempat_lahir' => 'Bandung',
            'tanggal_lahir' => '1980-12-12',
            'jenis_kelamin' => 'L',
            'no_karpeg' => '1234567890',
            'nuptk' => '9876543210123456',
            'npwp' => '12.345.678.9-012.000',
            'pangkat_golongan' => 'IV/a',
            'sk_nomor' => 'SK-001/2020',
            'sk_tanggal' => '2020-01-10',
            'sk_tmt' => '2020-02-01',
            'angka_kredit' => 200,
            'masa_kerja_tahun' => 20,
            'masa_kerja_bulan' => 3,
            'jabatan' => 'Guru Matematika',
            'pendidikan_terakhir' => 'S1 Pendidikan Matematika',
            'tmt_kgb_terakhir' => '2023-01-01',
            'sertifikasi' => 'Sudah',
            'ket' => 'Aktif',
            'tmt_bertugas' => '2010-07-01',
            'alamat' => 'Jl. Merdeka No. 10, Bandung'
        ]);

        GuruDanStaff::create([
            'foto' => null,
            'no_urut' => 2,
            'nama' => 'Siti Aminah',
            'nip' => '198505052010022002',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '1985-05-05',
            'jenis_kelamin' => 'P',
            'no_karpeg' => '0987654321',
            'nuptk' => '1234567890123456',
            'npwp' => '98.765.432.1-234.000',
            'pangkat_golongan' => 'III/b',
            'sk_nomor' => 'SK-002/2021',
            'sk_tanggal' => '2021-03-15',
            'sk_tmt' => '2021-04-01',
            'angka_kredit' => 150,
            'masa_kerja_tahun' => 12,
            'masa_kerja_bulan' => 6,
            'jabatan' => 'Staff TU',
            'pendidikan_terakhir' => 'S1 Administrasi Pendidikan',
            'tmt_kgb_terakhir' => '2022-06-01',
            'sertifikasi' => 'Belum',
            'ket' => 'Aktif',
            'tmt_bertugas' => '2015-08-01',
            'alamat' => 'Jl. Sudirman No. 25, Jakarta'
        ]);
    }
}
