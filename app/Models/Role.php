<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // nama tabel sesuai dengan migrasi database
    protected $table = 'roles';
    protected $primaryKey = 'id_role';
    protected $fillable = [
        'nama_role',
        'deskripsi_role',
    ];

    // relasi dengan tabel Pengguna
    public function penggunas()
    {
        return $this->hasMany(Pengguna::class, 'role_id', 'id_role');
    }
}