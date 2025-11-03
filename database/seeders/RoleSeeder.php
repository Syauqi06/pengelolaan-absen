<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Jalankan seeder roles.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'nama_role' => 'Admin',
                'deskripsi_role' => 'Memiliki akses penuh ke seluruh sistem',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_role' => 'Guru',
                'deskripsi_role' => 'Dapat mengelola data nilai dan melihat raport siswa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_role' => 'Murid',
                'deskripsi_role' => 'Dapat melihat raport dan informasi akademik pribadinya',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}