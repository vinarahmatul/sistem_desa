<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class layanan extends Model
{
    use HasFactory;
    protected $fillable = [
        'jenis_pelayanan',
        'syarat_pelayanan',
        'langkah_pelayanan',
        'petugas_pelayanan'
    ];
}
