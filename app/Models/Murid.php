<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    use HasFactory;
    protected $table = 'murids';
    protected $primaryKey = 'id_murid';
    protected $fillable = [
        'id_pengguna',
        'id_kelas',
        'nama',
        'nis',
        'foto',
        'alamat',
        'telepon',
        'tanggal_lahir',
        'jenis_kelamin',
    ];

    // relasi dengan tabel Pengguna
    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna');
    }

    // relasi dengan tabel Kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    // relasi dengan tabel Nilai
    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'id_murid', 'id_murid');
    }
}