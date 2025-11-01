<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiDetail extends Model
{
    use HasFactory;
    protected $table = 'nilai_details';
    protected $primaryKey = 'id_detail';
    protected $fillable = [
        'id_nilai',
        'id_jenis',
        'nilai',
        'tanggal_input'
    ];

    // relasi dengan tabel Nilai
    public function nilai()
    {  
        return $this->belongsTo(Nilai::class, 'id_nilai', 'id_nilai');
    }

    // relasi dengan tabel JenisNilai
    public function jenisNilai()
    {
        return $this->belongsTo(JenisNilai::class, 'id_jenis', 'id_jenis');
    }
}
