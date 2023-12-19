<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    protected $fillable = [
        'id', 'tanggal_mulai', 'tanggal_selesai', 'alasan_cuti', 'status', 'user_id'
    ];

    public function user()
{
    return $this->belongsTo(User::class);
}

}
