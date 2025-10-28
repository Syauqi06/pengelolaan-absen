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
        Schema::create('backup_logs', function (Blueprint $table) {
            $table->id('id_backup');

            // Relasi dengan tabel pengguna
            $table->foreignId('id_pengguna')
                ->constrained('penggunas', 'id_pengguna')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            
            $table->string('nama_file', 255);
            $table->string('lokasi_file', 255); // Path atau lokasi penyimpanan file backup
            $table->timestamp('waktu_backup')->useCurrent();
            $table->bigInteger('ukuran_file')->nullable(); // Ukuran file dalam bytes
            $table->string('ip_address', 45)->nullable(); // untuk menyimpan alamat IP pengguna
            $table->enum('status_backup', ['berhasil', 'gagal'])->default('berhasil'); // Status backup
            $table->text('pesan_log')->nullable(); // Pesan log tambahan atau error jika ada
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('backup_logs');
    }
};
