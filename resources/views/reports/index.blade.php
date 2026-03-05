<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Laporan Bulanan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <div class="mb-4 flex justify-between items-center">
                <h3 class="text-lg font-bold text-gray-800">Laporan Anda</h3>
                <a href="{{ route('reports.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow">
                    + Buat Laporan Baru
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr>
                                <th class="border-b py-2 px-4">Bulan</th>
                                <th class="border-b py-2 px-4">Tahun</th>
                                <th class="border-b py-2 px-4">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($reports as $report)
                                <tr>
                                    <td class="border-b py-2 px-4">{{ date('F', mktime(0, 0, 0, $report->bulan, 10)) }}</td>
                                    <td class="border-b py-2 px-4">{{ $report->tahun }}</td>
                                    <td class="border-b py-2 px-4">
                                        <a href="{{ route('reports.show', $report->id) }}" class="text-blue-600 hover:underline">Buka & Isi Kegiatan</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center py-4 text-gray-500">Belum ada laporan yang dibuat.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
