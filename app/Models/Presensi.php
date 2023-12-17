<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;


    protected $fillable = [
        'karyawan_id',
        'tanggal',
        'lokasi',
        'jam_masuk',
        'jam_pulang',
        'status',
        // Tambahkan kolom-kolom lain yang ingin Anda isikan secara massal di sini
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }

    // public static function validate($data)
    // {
    //     return Validator::make($data, [
    //         'karyawan_id' => 'required',
    //         'tanggal' => 'required|date',
    //         'lokasi' => 'required',
    //         'status' => 'required',
    //         'jam_masuk' => 'required|date_format:H:i:s',
    //     ]);
    // }




}
