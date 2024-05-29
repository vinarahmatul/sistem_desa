<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminEdit extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'email',
        'nik',
        'alamat',
        'password',
    ];
}
