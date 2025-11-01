<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $table = 'nilais';
    protected $primaryKey = 'id_nilai';
    protected $fillable = [
        'id_murid',
        'id_mapel',
        'id_guru',
        'semester',
        'tahun_ajaran',
        'keterangan',
        'rata_rata',
        'tanggal_input',
        'catatan_guru',
    ];

    // relasi dengan tabel Murid
    public function murid()
    {
        return $this->belongsTo(Murid::class, 'id_murid', 'id_murid');
    }

    // relasi dengan tabel MataPelajaran
    public function mataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class, 'id_mapel', 'id_mapel');
    }

    // relasi dengan tabel Guru
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru', 'id_guru');
    }

    // relasi dengan tabel NilaiDetail
    public function nilaiDetail()
    {
        return $this->hasMany(NilaiDetail::class, 'id_nilai', 'id_nilai');
    }
}
