<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dapenduk_pendidikan extends Model
{
    use HasFactory;
    protected $fillable = [
        'sd',
        'smp',
        'sma',
        'pt_akademi',
        'tidak_sekolah',
        'jumlah',
        'bulan',
        'tahun'
    ];
}
