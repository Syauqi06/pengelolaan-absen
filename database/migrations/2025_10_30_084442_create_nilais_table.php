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
        Schema::create('nilais', function (Blueprint $table) {
            $table->id('id_nilai');
            
            // Relasi dengan tabel murid
            $table->foreignId('id_murid')
                ->constrained('murids', 'id_murid')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            // Relasi dengan tabel mata pelajaran
            $table->foreignId('id_mapel')
                ->constrained('mata_pelajarans', 'id_mapel')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            // Relasi dengan tabel guru (pengajar)
            $table->foreignId('id_guru')
                ->constrained('gurus', 'id_guru')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            
            $table->enum('semester', ['Ganjil', 'Genap']);
            $table->year('tahun_ajaran');
            $table->enum('keterangan', ['Tuntas', 'Belum Tuntas'])->nullable();
            $table->decimal('rata_rata', 5, 2)->nullable()->default(0);
            $table->timestamp('tanggal_input')->useCurrent();
            $table->text('catatan_guru')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilais');
    }
};
