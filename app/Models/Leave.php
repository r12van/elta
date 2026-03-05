<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    // 1. Izinkan 3 kolom ini untuk diisi otomatis (Mass Assignment)
    protected $fillable = [
        'user_id',
        'tanggal_cuti',
        'keterangan'
    ];

    // 2. Relasi balik ke tabel User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
