<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Master Pejabat / Penandatangan</h2>
    </x-slot>

    <div class="py-12"><div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="mb-4 flex justify-end">
            <a href="{{ route('approvers.create') }}" class="bg-blue-600 text-white font-bold py-2 px-4 rounded">+ Tambah Pejabat</a>
        </div>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <table class="w-full text-left border-collapse">
                <tr class="bg-gray-100"><th class="border px-4 py-2">Nama</th><th class="border px-4 py-2">NIP</th><th class="border px-4 py-2">Jabatan</th><th class="border px-4 py-2">Aksi</th></tr>
                @foreach($approvers as $ap)
                <tr>
                    <td class="border px-4 py-2">{{ $ap->nama }}</td>
                    <td class="border px-4 py-2">{{ $ap->nip }}</td>
                    <td class="border px-4 py-2">{{ $ap->jabatan }}</td>
                    <td class="border px-4 py-2 flex gap-2">
                        <a href="{{ route('approvers.edit', $ap->id) }}" class="text-yellow-600 font-bold">Edit</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div></div>
</x-app-layout>
