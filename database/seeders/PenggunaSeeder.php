<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PenggunaSeeder extends Seeder
{
    /**
     * Jalankan seeder pengguna.
     */
    public function run(): void
    {
        DB::table('penggunas')->insert([
            [
                'username' => 'admin',
                'password' => Hash::make('admin123'),
                'status_aktif' => 'aktif',
                'role_id' => 1, // Admin
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'guru01',
                'password' => Hash::make('guru123'),
                'status_aktif' => 'aktif',
                'role_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'murid01',
                'password' => Hash::make('murid123'),
                'status_aktif' => 'aktif',
                'role_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}