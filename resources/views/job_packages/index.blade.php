<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Master Paket Pekerjaan</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-4 flex justify-between items-center">
                <h3 class="text-lg font-bold text-gray-800">Daftar Paket Pekerjaan</h3>
                <a href="{{ route('job_packages.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow">
                    + Tambah Paket
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border-b py-2 px-4">Nama Paket Pekerjaan</th>
                                <th class="border-b py-2 px-4 text-center">Jumlah Aktivitas (Scope)</th>
                                <th class="border-b py-2 px-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($packages as $package)
                                <tr>
                                    <td class="border-b py-2 px-4 font-semibold">{{ $package->nama_paket }}</td>
                                    <td class="border-b py-2 px-4 text-center">
                                        <span class="bg-blue-100 text-blue-800 font-medium px-2.5 py-0.5 rounded">{{ $package->scopes_count }}</span>
                                    </td>
                                    <td class="border-b py-2 px-4 text-center">
                                        <div class="flex justify-center gap-2">
                                            <a href="{{ route('job_packages.edit', $package->id) }}" class="text-yellow-600 font-bold hover:underline">Detail/Edit</a>
                                            <form action="{{ route('job_packages.destroy', $package->id) }}" method="POST" onsubmit="return confirm('Yakin hapus paket ini?');">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="text-red-600 font-bold hover:underline">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
