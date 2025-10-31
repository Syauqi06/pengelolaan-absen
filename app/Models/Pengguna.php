<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;

    protected $table = 'penggunas';
    protected $primaryKey = 'id_pengguna';
    protected $fillable = [
        'username',
        'password_hash',
        'status_aktif',
        'terakhir_login',
        'role_id',
    ];
    protected $hidden = ['password_hash']; // Sembunyikan password_hash saat serialisasi

    // relasi dengan tabel Role
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id_role');
    }
}
