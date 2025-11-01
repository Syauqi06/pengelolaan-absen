<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisNilai extends Model
{
    use HasFactory;

    protected $table = 'jenis_nilais';
    protected $primaryKey = 'id_jenis';
    protected $fillable = [
        'nama_jenis',
        'bobot_nilai',
    ];

    // relasi dengan tabel Nilai_detail
    public function nilaiDetail()
    {
        return $this->hasMany(NilaiDetail::class, 'id_jenis', 'id_jenis');
    }
}
