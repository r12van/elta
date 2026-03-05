<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Report extends Model
{
    protected $fillable = [
        'user_id', 'contract_id', 'bulan', 'tahun', 'tanggal_cetak'
    ];

    /**
     * Relasi: Laporan ini milik satu User
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi: Satu Laporan memiliki banyak Pekerjaan Harian
     */
    public function dailyTasks(): HasMany
    {
        return $this->hasMany(DailyTask::class);
    }

    /**
     * Relasi: Laporan ini milik satu Kontrak
     */
    public function contract() {
        return $this->belongsTo(Contract::class);
    }
}
