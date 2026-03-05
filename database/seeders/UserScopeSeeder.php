<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Scope;

class UserScopeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cari user pertama (Rizvan)
        $user = User::first();

        // Ambil semua ID dari master scope
        $semuaScopeId = Scope::pluck('id')->toArray();

        // Tugaskan/hubungkan semua scope tersebut ke akun Rizvan
        $user->scopes()->sync($semuaScopeId);
    }
}
