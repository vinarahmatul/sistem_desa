<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profil_desa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_desa',
        'gambar_desa', 
        'sejarah',
        'visi',
        'misi', 
        'peta_desa',
        'struktur_desa',
        'deskripsi_peta'
    ];    
}
