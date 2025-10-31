<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas';
    protected $fillable = [
        'id_guru',
        'nama_kelas',
        'tingkat',
        'tahun_mulai',
        'tahun_selesai',
    ];

    // relasi dengan tabel Guru
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru', 'id_guru');
    }

    // relasi dengan tabel murid
    public function murid()
    {
        return $this->hasMany(Murid::class, 'id_kelas', 'id_kelas');
    }
}