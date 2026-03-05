<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Approver;
use App\Models\JobPackage;
use App\Models\Contract;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Akun Admin
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@pemadam.jakarta.go.id',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // 2. Buat Akun Pegawai (Ivan / Rizvan)
        $pegawai = User::create([
            'name' => 'Rizvan Primadita, S.T.',
            'email' => 'rizvan@pemadam.jakarta.go.id',
            'password' => Hash::make('password123'),
            'nik' => '3273142505870004',
            'role' => 'pegawai',
        ]);

        // 3. Buat Pejabat Penandatangan
        $approver = Approver::create([
            'nama' => 'Ibnu El Hurry, S.T.',
            'nip' => '198508222010011023',
            'jabatan' => 'Pejabat Pelaksana Teknis Kegiatan',
        ]);

        // 4. Buat Master Paket Pekerjaan
        $package = JobPackage::create([
            'nama_paket' => 'Pengelola Jaringan dan Infrastuktur Sistem Informasi (Programmer)',
            'approver_id' => $approver->id,
        ]);

        // 5. Buat Master Aktivitas (Scope)
        $package->scopes()->createMany([
            ['kode_aktivitas' => 'Aktifitas 01', 'uraian' => 'Melakukan analisa dan identifikasi sistem'],
            ['kode_aktivitas' => 'Aktifitas 02', 'uraian' => 'Melakukan pengecekan dan monitoring perangkat keras (hardware) dan perangkat lunak (software) yang berhubungan dengan sistem informasi di kantor Dinas Penanggulangan Kebakaran dan Penyelamatan sehingga dapat berjalan dengan baik'],
            ['kode_aktivitas' => 'Aktifitas 03', 'uraian' => 'Melakukan pengecekan dan monitoring jaringan sistem informasi di kantor Dinas Penanggulangan Kebakaran dan Penyelamatan sehingga dapat berjalan dengan baik'],
            ['kode_aktivitas' => 'Aktifitas 04', 'uraian' => 'Melakukan persiapan, pengujian, instalasi, update perangkat lunak (software) maupun perangkat keras (hardware) yang berhubungan dengan sistem informasi'],
            ['kode_aktivitas' => 'Aktifitas 05', 'uraian' => 'Membuat perancangan, modifikasi, atau implementasi basis data'],
            ['kode_aktivitas' => 'Aktifitas 06', 'uraian' => 'Menginventarisir dan memberikan masukan kebutuhan hardware dan software teknologi informasi'],
            ['kode_aktivitas' => 'Aktifitas 07', 'uraian' => 'Melakukan backup data untuk menghindari kehilangan data secara permanen'],
            ['kode_aktivitas' => 'Aktifitas 08', 'uraian' => 'Melakukan persiapan, pengujian, instalasi, konfigurasi jaringan (network) dan keamanan jaringan (security) yang berhubungan dengan sistem informasi'],
            ['kode_aktivitas' => 'Aktifitas 09', 'uraian' => 'Mempersiapkan kebutuhan teknologi informasi untuk menunjang kegiatan-kegiatan rapat, diskusi, dan acara penting lainnya'],
            ['kode_aktivitas' => 'Aktifitas 10', 'uraian' => 'Mengatasi berbagai masalah dari pengguna yang menyangkut sistem dan teknologi informasi serta memberikan solusi terbaik'],
            ['kode_aktivitas' => 'Aktifitas 11', 'uraian' => 'Melakukan Implementasi kode'],
            ['kode_aktivitas' => 'Aktifitas 12', 'uraian' => 'Melaksanakan koordinasi yang berhubungan dengan permasalahan Teknologi Informasi ke pihak/SKPD terkait'],
            ['kode_aktivitas' => 'Aktifitas 13', 'uraian' => 'Melakukan pengujian atau debugging dan perbaikan bug / kesalahan pada aplikasi'],
            ['kode_aktivitas' => 'Aktifitas 14', 'uraian' => 'Menyusun panduan penggunaan aplikasi (buku manual dan video tutorial), melaksanakan pelatihan dan asistensi seluruh modul dan program aplikasi yang dibuat kepada tim teknis dan pengguna'],
            ['kode_aktivitas' => 'Aktifitas 15', 'uraian' => 'Melakukan Koordinasi atau Kolaborasi dengan Tim Teknis Dinas Penanggulangan Kebakaran dan Penyelamatan DKI Jakarta atau Tenaga Ahli lainnya dalam proses pembangunan / pengembangan / pengelolaan Sistem Informasi'],
            ['kode_aktivitas' => 'Aktifitas 16', 'uraian' => 'Menindaklanjuti saran dan masukan Tim Teknis Dinas Penanggulangan Kebakaran dan Penyelamatan DKI Jakarta, baik secara tertulis dan tidak tertulis (online/offline)'],
            ['kode_aktivitas' => 'Aktifitas 17', 'uraian' => 'Melakukan dokumentasi pekerjaan yang dilakukan dan'],
            ['kode_aktivitas' => 'Aktifitas 18', 'uraian' => 'Menyusun dan menyerahkan laporan dan hasil pekerjaan'],
        ]);

        // 6. Buat Kontrak Aktif (Tahap 1) untuk si Pegawai
        Contract::create([
            'user_id' => $pegawai->id,
            'job_package_id' => $package->id,
            'nama_kontrak' => 'Pengelola Jaringan dan Infrastuktur Sistem Informasi (Programmer) Tahap 1',
            'jabatan' => 'Tenaga Ahli Web Programmer',
            'tanggal_mulai' => '2026-01-02',
            'tanggal_selesai' => '2026-06-30',
            'spk_nomor' => '11/I/BKI/PPK/SPK/PN.01.02',
            'spk_tanggal' => '2026-01-02',
            'spmk_nomor' => '17/I/BKI/PPK/SPMK/PN.01.02',
            'spmk_tanggal' => '2026-01-02',
            'kuota_cuti' => 6,
        ]);

        $this->command->info('Database berhasil di-seed dengan data lengkap! 🚀');
    }
}
