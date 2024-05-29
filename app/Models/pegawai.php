<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_pegawai',
        'foto_pegawai',
        'nik',
        'niap',
        'divisi',
        'jabatan',
        'alamat'
    ];
}
