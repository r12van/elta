<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Scope;

class ScopeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $scopes = [
            ['kode_aktivitas' => 'Aktifitas 02', 'uraian' => 'Melakukan pengecekan dan monitoring perangkat keras (hardware) dan perangkat lunak (software)...'],
            ['kode_aktivitas' => 'Aktifitas 04', 'uraian' => 'Melakukan persiapan, pengujian, instalasi, update perangkat lunak (software)...'],
            ['kode_aktivitas' => 'Aktifitas 06', 'uraian' => 'Menginventarisir dan memberikan masukan kebutuhan hardware dan software...'],
            ['kode_aktivitas' => 'Aktifitas 07', 'uraian' => 'Melakukan backup data untuk menghindari kehilangan data secara permanen'],
            ['kode_aktivitas' => 'Aktifitas 08', 'uraian' => 'Melakukan persiapan, pengujian, instalasi, konfigurasi jaringan...'],
            ['kode_aktivitas' => 'Aktifitas 09', 'uraian' => 'Mempersiapkan kebutuhan teknologi informasi untuk menunjang kegiatan-kegiatan rapat...'],
            ['kode_aktivitas' => 'Aktifitas 10', 'uraian' => 'Mengatasi berbagai masalah dari pengguna yang menyangkut sistem...'],
            ['kode_aktivitas' => 'Aktifitas 12', 'uraian' => 'Melaksanakan koordinasi yang berhubungan dengan permasalahan Teknologi Informasi...'],
            ['kode_aktivitas' => 'Aktifitas 13', 'uraian' => 'Melakukan pengujian atau debugging dan perbaikan bug / kesalahan pada aplikasi'],
            ['kode_aktivitas' => 'Aktifitas 16', 'uraian' => 'Menindaklanjuti saran dan masukan Tim Teknis...'],
        ];

        foreach ($scopes as $scope) {
            Scope::create($scope);
        }
    }
}
