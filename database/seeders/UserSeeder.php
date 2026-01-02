<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Operator Sekolah',
                'email' => 'sdnsiska13@gmail.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ],
            [
                'name' => 'Operator Sekolah 2',
                'email' => 'sdnsiska13@gmail.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']], 
                $user
            );
        }
    }
}
