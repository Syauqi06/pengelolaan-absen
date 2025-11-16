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
        Schema::create('penggunas', function (Blueprint $table) {
            $table->id('id_pengguna');
            $table->string('username', 100)->unique(); // Menjamin username unik agar tidak ada duplikasi
            $table->string('password', 255);
            $table->enum('status_aktif', ['aktif', 'non-aktif'])->default('non-aktif'); // Status pengguna aktif atau non-aktif
            $table->timestamp('terakhir_login')->nullable();
            $table->timestamps();
            $table->rememberToken();

            // Relasi dengan tabel roles
            $table->foreignId('role_id')
                  ->constrained('roles', 'id_role')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penggunas');
    }
};
