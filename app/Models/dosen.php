<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dosen extends Model
{
    use HasFactory;

    protected $fillable = ['kode_dosen', 'nama_dosen', 'nip', 'email', 'no_telepon'];

    
    public function mahasiswas()
    {
        return $this->hasMany(mahasiswa::class, 'dosen_id');
    }
}
