<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dapenduk_kesehatan extends Model
{
    use HasFactory;
    protected $fillable = [
        'jenis_kesehatan',
        'bulan',
        'tahun',
        'jumlah'
    ];
}
