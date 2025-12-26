<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class OrangTuaSeeder extends Seeder
{
    public function run(): void
    {
        $dataOrtu = [
            [
                'name'     => 'Orang Tua Kelas 1',
                'email'    => 'ortu_kelas1@sekolah.id',
                'password' => 'ortuKelas1!',
                'kelas_id' => 1,
            ],
            [
                'name'     => 'Orang Tua Kelas 2',
                'email'    => 'ortu_kelas2@sekolah.id',
                'password' => 'ortuKelas2!',
                'kelas_id' => 2,
            ],
            [
                'name'     => 'Orang Tua Kelas 3',
                'email'    => 'ortu_kelas3@sekolah.id',
                'password' => 'ortuKelas3!',
                'kelas_id' => 3,
            ],
            [
                'name'     => 'Orang Tua Kelas 4',
                'email'    => 'ortu_kelas4@sekolah.id',
                'password' => 'ortuKelas4!',
                'kelas_id' => 4,
            ],
            [
                'name'     => 'Orang Tua Kelas 5',
                'email'    => 'ortu_kelas5@sekolah.id',
                'password' => 'ortuKelas5!',
                'kelas_id' => 5,
            ],
            [
                'name'     => 'Orang Tua Kelas 6',
                'email'    => 'ortu_kelas6@sekolah.id',
                'password' => 'ortuKelas6!',
                'kelas_id' => 6,
            ],
        ];

        foreach ($dataOrtu as $ortu) {

            User::updateOrCreate(
                ['email' => $ortu['email']],
                [
                    'name'     => $ortu['name'],
                    'password' => Hash::make($ortu['password']),
                    'role'     => 'orangtua',
                    'kelas_id' => $ortu['kelas_id'],
                ]
            );

            // optional: info di terminal
            $this->command->info(
                "{$ortu['email']} | Password: {$ortu['password']}"
            );
        }

        $this->command->info('Seeder akun orang tua kelas 1–6 BERHASIL.');
    }
}
