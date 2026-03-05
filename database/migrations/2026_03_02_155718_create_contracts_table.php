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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('job_package_id')->constrained('job_packages')->cascadeOnDelete(); // Relasi ke Paket Pekerjaan/Scope

            $table->string('nama_kontrak'); // Cth: "Tahap 1 Tahun 2026"
            $table->string('jabatan'); // Cth: "Tenaga Ahli Web Programmer"

            // Masa Berlaku Kontrak
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');

            // Data Dokumen
            $table->string('spk_nomor')->nullable();
            $table->date('spk_tanggal')->nullable();
            $table->string('spmk_nomor')->nullable();
            $table->date('spmk_tanggal')->nullable();

            // Jatah Cuti per Kontrak
            $table->integer('kuota_cuti')->default(6); // Default 6 hari per 6 bulan

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
