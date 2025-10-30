<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->id('id_kelas');
            $table->string('nama_kelas', 50);
            $table->$table->enum('tingkat', ['X', 'XI', 'XII']); // Tingkat kelas untuk SMA atau sederajat
            $table->year('tahun_mulai'); // Tahun ajaran mulai
            $table->year('tahun_selesai'); // Tahun ajaran selesai

            // Relasi dengan tabel guru
            $table->foreignId('id_guru')
                ->constrained('gurus', 'id_guru')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};
