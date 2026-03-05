<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaskImage extends Model
{
    protected $fillable = [
        'daily_task_id', 'image_path', 'caption'
    ];

    /**
     * Relasi: Foto/Dokumentasi ini milik satu Pekerjaan Harian
     */
    public function dailyTask(): BelongsTo
    {
        return $this->belongsTo(DailyTask::class);
    }
}
