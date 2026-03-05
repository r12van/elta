<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Scope extends Model
{
    protected $fillable = ['job_package_id', 'kode_aktivitas', 'uraian'];

    /**
     * Relasi: Satu Scope (Aktivitas) bisa digunakan di banyak Pekerjaan Harian
     */
    public function dailyTasks(): HasMany
    {
        return $this->hasMany(DailyTask::class);
    }

    public function jobPackage() {
        return $this->belongsTo(JobPackage::class);
    }
}
