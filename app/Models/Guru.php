<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'gurus';
    protected $primaryKey = 'id_guru';
    protected $fillable = [
        'id_pengguna',
        'nama',
        'nip',
        'foto',
        'alamat',
        'telepon',
        'email',
        'tanggal_lahir',
        'jenis_kelamin',
    ];

    // relasi dengan tabel Pengguna
    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna', 'id_pengguna');
    }

    // relasi dengan tabel Kelas
    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'id_guru', 'id_guru');
    }

    // relasi dengan tabel MataPelajaran
    public function mataPelajaran()
    {
        return $this->hasMany(Mata_pelajaran::class, 'id_guru', 'id_guru');
    }

    // relasi dengan tabel Nilai    
    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'id_guru', 'id_guru');
    }
}