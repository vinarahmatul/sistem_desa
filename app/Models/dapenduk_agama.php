<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dapenduk_agama extends Model
{
    use HasFactory;
    protected $fillable = [
        'jumlah_islam',
        'jumlah_kristen',
        'jumlah_katolik',
        'jumlah_hindu',
        'jumlah_budha',
        'jumlah_konghucu',
        'bulan',
        'tahun'
    ];
}
