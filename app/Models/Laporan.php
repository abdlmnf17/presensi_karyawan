<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $fillable = [
        // Kolom-kolom yang dapat diisi
    ];

    public function presensi()
    {
        return $this->hasMany(Presensi::class, 'karyawan_id');
    }

    public function lembur()
    {
        return $this->hasMany(Lembur::class, 'karyawan_id');
    }

    public function cuti()
    {
        return $this->hasMany(Cuti::class, 'karyawan_id');
    }
}
