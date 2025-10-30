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
        Schema::create('gurus', function (Blueprint $table) {
            $table->id('id_guru');

            // Relasi dengan tabel pengguna
            $table->foreignId('id_pengguna')
                ->constrained('penggunas', 'id_pengguna')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->string('nama', 100);
            $table->string('nip', 20)->unique();
            $table->string('foto', 255)->nullable();
            $table->string('alamat', 255)->nullable();
            $table->string('telepon', 15)->nullable();
            $table->string('email', 100)->nullable()->unique();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gurus');
    }
};
