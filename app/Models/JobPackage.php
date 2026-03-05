<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobPackage extends Model
{
    protected $fillable = ['nama_paket', 'approver_id'];

    public function scopes() {
        return $this->hasMany(Scope::class);
    }

    public function users() {
        return $this->hasMany(User::class);
    }

    public function approver() {
        return $this->belongsTo(Approver::class);
    }
}
