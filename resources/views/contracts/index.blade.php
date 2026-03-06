<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Manajemen Kontrak Pegawai</h2>
    </x-slot>

    <div class="py-12"><div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="mb-4 flex justify-end">
            <a href="{{ route('contracts.create') }}" class="bg-blue-600 text-white font-bold py-2 px-4 rounded">+ Buat Kontrak Baru</a>
        </div>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <tr class="bg-gray-100"><th class="border px-4 py-2">Pegawai</th><th class="border px-4 py-2">Nama Kontrak</th><th class="border px-4 py-2">Masa Berlaku</th><th class="border px-4 py-2">Aksi</th></tr>
                @foreach($contracts as $c)
                <tr>
                    <td class="border px-4 py-2 font-bold">{{ $c->user->name }}</td>
                    <td class="border px-4 py-2">
                        {{ $c->nama_kontrak }}<br>
                        <span class="text-xs text-gray-500">{{ $c->jobPackage->nama_paket }}</span>
                    </td>
                    <td class="border px-4 py-2 text-sm">{{ \Carbon\Carbon::parse($c->tanggal_mulai)->format('d M Y') }} s/d {{ \Carbon\Carbon::parse($c->tanggal_selesai)->format('d M Y') }}</td>
                    <td class="border px-4 py-2">
                        <div class="flex items-center gap-3">
                            <a href="{{ route('contracts.edit', $c->id) }}" class="text-blue-600 hover:text-blue-800 font-bold text-sm bg-blue-50 py-1 px-3 rounded">Edit</a>

                            <form action="{{ route('contracts.destroy', $c->id) }}" method="POST" onsubmit="return confirm('Yakin hapus kontrak ini?');">
                                @csrf @method('DELETE')
                                <button class="text-red-600 hover:text-red-800 font-bold text-sm bg-red-50 py-1 px-3 rounded">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div></div>
</x-app-layout>
