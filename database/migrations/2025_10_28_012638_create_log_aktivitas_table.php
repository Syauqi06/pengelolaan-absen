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
        Schema::create('log_aktivitas', function (Blueprint $table) {
            $table->id('id_log');
            // Relasi dengan tabel pengguna
            $table->foreignId('id_pengguna')
                  ->constrained('penggunas', 'id_pengguna')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');
            
            // Jenis aktivitas yang dilakukan
            $table->enum('jenis_aktivitas', [
                'login',
                'logout',
                'tambah_data',
                'update_data',
                'hapus_data',
                'backup_data',
                'restore_data'
            ])->default('login');

            $table->text('data_lama')->nullable();
            $table->text('data_baru')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->string('user_agent')->nullable();
            $table->timestamp('waktu_aktivitas')->useCurrent();
            $table->timestamps();

            // Indexes untuk optimasi pencarian
            $table->index('id_pengguna');
            $table->index('jenis_aktivitas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_aktivitas');
    }
};
