<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Jalankan seeder
     */
    public function run(): void
    {
            User::create([
                'name' => 'Super Admin',
                'email' => 'superadmin@example.com',
                'password' => Hash::make('password'),
                'role' => 'super_admin',
            ]);

            User::create([
                'name' => 'Guru Admin',
                'email' => 'guru@example.com',
                'password' => Hash::make('password'),
                'role' => 'guru',
            ]);

            User::create([
                'name' => 'Siswa Satu',
                'email' => 'siswa1@example.com',
                'password' => Hash::make('password'),
                'role' => 'siswa',
            ]);

            }
        }