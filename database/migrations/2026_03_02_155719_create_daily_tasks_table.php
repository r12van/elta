<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('daily_tasks', function (Blueprint $table) {
            $table->id();
            // PASTIKAN BARIS INI ADA DAN FILE DISAVE:
            $table->foreignId('report_id')->constrained('reports')->cascadeOnDelete();

            $table->foreignId('scope_id')->nullable()->constrained('scopes')->nullOnDelete();
            $table->date('tanggal');
            $table->text('deskripsi_pekerjaan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_tasks');
    }
};
