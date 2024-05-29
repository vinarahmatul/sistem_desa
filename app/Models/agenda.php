<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agenda extends Model
{
    use HasFactory;
    protected $fillable= [
        'judul_kegiatan',
        'deskripsi_kegiatan',
        'gambar_kegiatan',
        'tanggal_kegiatan'
    ];

    protected $casts = [
        'tanggal_kegiatan' => 'date',
    ];
}
