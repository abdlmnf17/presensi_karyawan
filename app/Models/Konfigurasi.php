<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konfigurasi extends Model
{
    protected $fillable = [
        'status_presensi', 'jam_buka', 'jam_tutup',
    ];
}
