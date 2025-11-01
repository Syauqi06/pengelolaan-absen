<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    use HasFactory;
    protected $table = 'mata_pelajarans';
    protected $primaryKey = 'id_mapel';
    protected $fillable = [
        'id_guru',
        'nama_mapel',
        'kkm',
    ];

    // relasi dengan tabel Guru
    public function guru()
    {   
        return $this->belongsTo(Guru::class, 'id_guru');
    }

    // relasi dengan tabel Nilai
    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'id_mapel');
    }
}
