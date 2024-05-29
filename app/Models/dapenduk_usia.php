<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dapenduk_usia extends Model
{
    use HasFactory;
    protected $fillable = [
        'usia_0_4',
        'usia_5_9',
        'usia_10_14',
        'usia_15_19',
        'usia_20_24',
        'usia_25_29',
        'usia_30_34',
        'usia_35_39',
        'usia_40_44',
        'usia_45_49',
        'usia_50_54',
        'usia_55_58',
        'usia_>59',
        'jenis_kelamin',
        'bulan',
        'tahun',
        'jumlah_orang_perempuan',
        'jumlah_orang_laki'
    ];
}
