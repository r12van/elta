# 🚀 E-Kinerja IT - Sistem Pelaporan Kinerja Tenaga Ahli

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-00000F?style=for-the-badge&logo=mysql&logoColor=white)
![PHPWord](https://img.shields.io/badge/PHPWord-4F5B93?style=for-the-badge&logo=php&logoColor=white)

**E-Kinerja IT** adalah aplikasi *Human Resource Information System* (HRIS) skala mini yang dirancang khusus untuk Tenaga Ahli (PJLP) di Dinas Penanggulangan Kebakaran dan Penyelamatan (Disgulkarmat) Provinsi DKI Jakarta. 

Aplikasi ini mengotomatiskan proses pencatatan kegiatan harian, manajemen kontrak kerja, kalkulasi cuti, hingga **Generate Laporan Bulanan Microsoft Word (.docx)** secara dinamis sesuai standar instansi. Say goodbye to *copy-paste* laporan manual! 👋

---

## ✨ Fitur Unggulan

- 📄 **Auto-Generate Laporan Word**: Menyusun rekap kegiatan harian lengkap dengan tabel target, realisasi, dan lampiran foto ke dalam format `.docx` siap cetak.
- 🔐 **Role-Based Access Control (RBAC)**: Pemisahan hak akses antara **Admin** (Kelola Master Data & Kontrak) dan **Pegawai** (Input Kegiatan & Cetak Laporan).
- 📅 **Manajemen Kontrak (History)**: Mendukung sistem multi-kontrak (Contoh: Tahap 1 & Tahap 2) dengan tanggal berlaku yang otomatis mengatur status kepegawaian.
- 🏖️ **Smart Leave Calculator (Cuti)**: Sistem pengajuan cuti otomatis yang terintegrasi dengan jatah kontrak tahunan. Cuti yang diajukan otomatis masuk ke Laporan Harian!
- 📊 **Dashboard Interaktif**: Visualisasi data produktivitas menggunakan Chart.js dan ringkasan sisa cuti secara *real-time*.
- 📱 **Responsive & Aesthetic UI**: Dibangun dengan Tailwind CSS untuk tampilan yang bersih, modern, dan nyaman diakses lewat HP maupun PC.

---

## 📸 *Screenshots*
*(Tambahkan screenshot aplikasimu di sini nanti)*
- **Landing Page**
- **Dashboard Pegawai**
- **Form Laporan Harian**
- **Hasil Cetak MS. Word**

---

## 🛠️ Prasyarat (Prerequisites)

Sebelum melakukan instalasi, pastikan sistem Anda sudah ter-install:
- PHP ^8.1
- Composer
- Node.js & NPM
- MySQL / MariaDB

---

## ⚙️ Panduan Instalasi (Installation)

Ikuti langkah-langkah berikut untuk menjalankan aplikasi di komputer lokal:

**1. Clone Repository**

    git clone [https://github.com/username-kamu/e-kinerja-it.git](https://github.com/username-kamu/e-kinerja-it.git)
    cd e-kinerja-it

**2. Install Dependensi Backend & Frontend**

    composer install
    npm install

**3. Setup Environment**

Duplikat file konfigurasi dan sesuaikan kredensial database Anda:

    cp .env.example .env

*(Buka file .env dan atur DB_DATABASE, DB_USERNAME, dan DB_PASSWORD)*

**4. Generate Application Key**

    php artisan key:generate

**5. Migrasi Database & Seeding (PENTING)**

Perintah ini akan membangun struktur database dan mengisinya dengan data dummy lengkap (termasuk akun Admin & Pegawai).

    php artisan migrate:fresh --seed

**6. Tautkan Storage (Untuk Upload Foto)**

    php artisan storage:link

**7. Compile Asset Tailwind & Jalankan Server**

    npm run build
    php artisan serve

Aplikasi sekarang dapat diakses melalui `http://localhost:8000`. 🎉

---

## 🔑 Default Login Credentials

Gunakan akun berikut untuk mencoba aplikasi (hasil dari Database Seeder):

**1. Akun Administrator (HRD/Pejabat)**
- Email: `admin@pemadam.jakarta.go.id`
- Password: `password`

**2. Akun Pegawai (Tenaga Ahli)**
- Email: `rizvan@pemadam.jakarta.go.id`
- Password: `password`

---

## 👨‍💻 Dikembangkan Oleh
**Rizvan Primadita, S.T.** *Tenaga Ahli Web Programmer - Disgulkarmat Provinsi DKI Jakarta*

---
*Dibuat dengan ☕ dan ❤️ menggunakan Laravel.*
