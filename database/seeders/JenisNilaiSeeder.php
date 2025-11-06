<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisNilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jenis_nilais')->insert([
            [
                'nama_jenis' => 'Tugas',
                'bobot_nilai' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_jenis' => 'Ujian Tengah Semester',
                'bobot_nilai' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_jenis' => 'Ujian Akhir Semester',
                'bobot_nilai' => 40,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
