<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Akun testing / admin (opsional)
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@sekolah.id',
            'role' => 'admin',
            'password' => bcrypt('admin123'),
        ]);

        // Panggil seeder akun orang tua
        $this->call([
            OrangTuaSeeder::class,
        ]);
    }
}
