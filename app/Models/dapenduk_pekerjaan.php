<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dapenduk_pekerjaan extends Model
{
    use HasFactory;
    protected $fillable = [
        'tahun',
        'bulan',
        'pegawai_swasta',
        'pegawai_negeri_sipil',
        'perdagangan',
        'buruh_tani',
        'buruh_pabrik',
        'tukang_batu',
        'jasa',
        'perangkat_desa',
        'tenaga_medis',
        'tukang_kayu',
        'tukang_jahir_bordir',
        'tni_polri',
        'lain_lain_termasuk_belum_bekerja',
        'petani',
        'jumlah'
    ];

    public function scopeFilterByMonthAndYear($query, $month, $year) {
        return $query->whereMonth('tanggal', $month)->whereYear('tanggal', $year);
    }
}
