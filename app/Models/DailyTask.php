<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DailyTask extends Model
{
    protected $fillable = [
        'report_id', 'scope_id', 'tanggal', 'deskripsi_pekerjaan'
    ];

    /**
     * Relasi: Pekerjaan Harian ini masuk ke dalam satu Laporan
     */
    public function report(): BelongsTo
    {
        return $this->belongsTo(Report::class);
    }

    /**
     * Relasi: Pekerjaan Harian ini merujuk pada satu Scope (Aktivitas)
     */
    public function scope(): BelongsTo
    {
        return $this->belongsTo(Scope::class);
    }

    /**
     * Relasi: Satu Pekerjaan Harian bisa memiliki banyak Foto/Dokumentasi
     */
    public function taskImages(): HasMany
    {
        return $this->hasMany(TaskImage::class);
    }
}
