<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Approver extends Model
{
    protected $fillable = ['nama', 'nip', 'jabatan'];

    /**
     * Relasi: Satu Approver bisa menandatangani banyak Laporan
     */
    public function reports(): HasMany
    {
        return $this->hasMany(Report::class);
    }
}
