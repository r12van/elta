<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>eLTA - elektronik Laporan Tenaga Ahli | Disgulkarmat DKI</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased font-sans bg-gray-50 text-gray-900">

    <nav class="bg-white/80 backdrop-blur-md fixed w-full z-50 border-b border-gray-100 transition-all">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex-shrink-0 flex items-center gap-2">
                    <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center text-white font-bold text-xl shadow-lg shadow-blue-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <span class="font-bold text-xl tracking-tight text-gray-800 hidden sm:block">eLTA <span class="text-blue-600">elektronik Laporan Tenaga Ahli</span></span>
                </div>

                <div class="flex items-center gap-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm font-semibold text-gray-700 hover:text-blue-600 transition-colors">Ke Dashboard &rarr;</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-semibold text-gray-700 hover:text-blue-600 transition-colors">Log in</a>
                            @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <div class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden">
        <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
            <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-20 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-gray-900 tracking-tight mb-6">
                Sistem Pelaporan Kinerja <br class="hidden lg:block" />
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-emerald-500">Tenaga Ahli</span>
            </h1>
            <p class="mt-4 max-w-2xl text-lg md:text-xl text-gray-500 mx-auto mb-10">
                Catat aktivitas harian, pantau produktivitas, dan cetak dokumen laporan bulanan secara otomatis dengan format Microsoft Word sesuai standar instansi.
            </p>

            <div class="flex justify-center gap-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-full shadow-lg shadow-blue-500/30 transition-transform hover:-translate-y-1 flex items-center gap-2">
                        Buka Ruang Kerja Saya
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-full shadow-lg shadow-blue-500/30 transition-transform hover:-translate-y-1 flex items-center gap-2">
                        Mulai Sesi Login
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
                    </a>
                @endauth
            </div>
        </div>
    </div>

    <div class="bg-white py-20 border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900">Kenapa Menggunakan eLTA?</h2>
                <p class="mt-4 text-gray-500">Didesain khusus untuk menyederhanakan administrasi laporan teknis.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="p-6 bg-gray-50 rounded-2xl border border-gray-100 hover:shadow-lg transition-shadow">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600 mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Input Harian Cepat</h3>
                    <p class="text-gray-500 leading-relaxed">Pencatatan kegiatan harian berbasis scope pekerjaan. Tersedia fitur upload bukti dokumentasi kegiatan langsung dari sistem.</p>
                </div>

                <div class="p-6 bg-gray-50 rounded-2xl border border-gray-100 hover:shadow-lg transition-shadow">
                    <div class="w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center text-emerald-600 mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Generate Word Otomatis</h3>
                    <p class="text-gray-500 leading-relaxed">Tidak perlu lagi copy-paste ke MS Word. Sistem akan otomatis merekap kegiatan dalam format .docx siap cetak dan tandatangan.</p>
                </div>

                <div class="p-6 bg-gray-50 rounded-2xl border border-gray-100 hover:shadow-lg transition-shadow">
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center text-purple-600 mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Hak Akses Terpusat</h3>
                    <p class="text-gray-500 leading-relaxed">Dilengkapi dengan Role-Based Access. Admin mengelola master data dan pegawai fokus pada laporan kinerja masing-masing.</p>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-white border-t border-gray-200 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-sm text-gray-400">
            <p>&copy; {{ date('Y') }} Dinas Penanggulangan Kebakaran dan Penyelamatan Provinsi DKI Jakarta.</p>
            <p class="mt-1">Developed for Internal eLTA Team.</p>
        </div>
    </footer>

</body>
</html>

