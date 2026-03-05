<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Form Pengajuan Cuti</h2>
    </x-slot>

    <div class="py-12"><div class="max-w-2xl mx-auto sm:px-6 lg:px-8">

        <div class="mb-6 bg-blue-50 border border-blue-200 rounded-lg p-4 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="p-2 bg-blue-100 text-blue-600 rounded-full">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                    <p class="text-sm font-bold text-blue-900">Informasi Sisa Cuti Tahun {{ $tahunSekarang }}</p>
                    <p class="text-xs text-blue-700">Pastikan sisa cuti kamu mencukupi sebelum mengajukan.</p>
                </div>
            </div>
            <div class="text-center">
                <span class="block text-2xl font-extrabold text-blue-700">{{ $sisaCuti }}</span>
                <span class="block text-[10px] font-bold uppercase text-blue-500">HARI</span>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">

                @if (session('error'))
                    <div class="mb-4 text-sm text-red-600 bg-red-50 p-3 rounded">{{ session('error') }}</div>
                @endif

                <form action="{{ route('leaves.store') }}" method="POST">
                    @csrf

                    <div class="mb-5">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Pilih Tanggal Cuti</label>
                        <input type="date" name="tanggal_cuti" class="shadow-sm border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 rounded-md w-full py-2.5 px-3" required>
                    </div>

                    <div class="mb-5">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Keterangan / Alasan</label>
                        <input type="text" name="keterangan" placeholder="Contoh: Sakit, Acara Keluarga, dll." class="shadow-sm border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 rounded-md w-full py-2.5 px-3" required>
                    </div>

                    <div class="flex items-center gap-4 mt-8 border-t pt-5">
                        @if($sisaCuti > 0)
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 px-6 rounded-lg transition-colors">
                                Ajukan Sekarang
                            </button>
                        @else
                            <button type="button" disabled class="bg-gray-300 text-gray-500 font-bold py-2.5 px-6 rounded-lg cursor-not-allowed">
                                Jatah Cuti Habis
                            </button>
                        @endif
                        <a href="{{ route('leaves.index') }}" class="text-gray-500 hover:text-gray-800 font-bold transition-colors">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div></div>
</x-app-layout>
