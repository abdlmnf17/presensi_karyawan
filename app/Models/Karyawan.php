<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Karyawan extends Model
{
    protected $fillable = [
        'nama', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'klasifikasi', 'jabatan', 'telepon', 'gaji_pokok', 'no_badge', 'user_id', 'no_kk', 'no_id', 'status',
    ];

   // Relationship dengan Presensi
   public function presensi()
   {
       return $this->hasMany(Presensi::class);
   }

   // Relationship dengan User
   public function user()
   {
       return $this->belongsTo(User::class);
   }

   // Event model untuk menangani penghapusan
   protected static function boot()
   {
       parent::boot();

       static::deleted(function($karyawan) {
           $karyawan->presensi()->delete();
           $karyawan->user()->delete();
       });
   }

   public function lembur()
{
    return $this->hasMany(Lembur::class);
}

// Karyawan.php

public function cuti()
{
    return $this->hasMany(Cuti::class);
}




}

