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
        Schema::create('murids', function (Blueprint $table) {
            $table->id('id_murid');
            $table->string('nama', 100);
            $table->string('nis', 20)->unique();
            $table->string('nisn', 20)->unique()->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable();
            $table->string('foto', 255)->nullable();
            $table->text('alamat')->nullable();
            $table->string('telepon', 15)->nullable();

            // Relasi dengan tabel pengguna
            $table->foreignId('id_pengguna')
                ->constrained('penggunas', 'id_pengguna')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            // Relasi dengan tabel kelas
            $table->foreignId('id_kelas')
                ->constrained('kelas', 'id_kelas')
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
        Schema::dropIfExists('murids');
    }
};
