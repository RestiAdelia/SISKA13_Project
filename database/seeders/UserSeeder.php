<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Operator Sekolah',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
        ]);

        User::create([
            'name' => 'Operator Sekolah 2',
            'email' => 'sdnsiska13@gmail.com',
            'password' => Hash::make('admin123'),
        ]);
    }
}
