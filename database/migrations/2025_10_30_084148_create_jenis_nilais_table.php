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
        Schema::create('jenis_nilais', function (Blueprint $table) {
            $table->id('id_jenis');
            $table->string('nama_jenis', 100); // Misal: UTS, UAS, Tugas

            //bobot nilai untuk jenis nilai, misal: UTS 30%, UAS 40%, Tugas 30%
            $table->unsignedTinyInteger('bobot_nilai')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_nilais');
    }
};
