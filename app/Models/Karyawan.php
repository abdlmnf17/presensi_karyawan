<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $fillable = [
        'nama', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'klasifikasi', 'jabatan', 'telepon', 'gaji_pokok', 'no_badge'
    ];
}
