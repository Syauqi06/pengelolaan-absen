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
        Schema::create('nilai_details', function (Blueprint $table) {
            $table->id('id_detail');

            // Relasi dengan tabel nilais
            $table->foreignId('id_nilai')
                ->constrained('nilais', 'id_nilai')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            
            // Relasi dengan tabel jenis_nilai
            $table->foreignId('id_jenis')
                ->constrained('jenis_nilais', 'id_jenis')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->decimal('nilai', 5, 2);
            $table->timestamp('tanggal_input')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_details');
    }
};
