<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Master Pegawai') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-4 flex justify-between items-center">
                <h3 class="text-lg font-bold text-gray-800">Daftar Tenaga Ahli / Pegawai</h3>
                <a href="{{ route('users.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow">
                    + Tambah Pegawai
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 overflow-x-auto">
                    <table class="w-full text-left border-collapse whitespace-nowrap">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border-b py-2 px-4">Nama</th>
                                <th class="border-b py-2 px-4">NIK</th>
                                <th class="border-b py-2 px-4">Jabatan</th>
                                <th class="border-b py-2 px-4">Paket Pekerjaan</th>
                                <th class="border-b py-2 px-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td class="border-b py-2 px-4 font-semibold">
                                        {{ $user->name }}<br>
                                        <span class="text-sm text-gray-500 font-normal">{{ $user->email }}</span>
                                    </td>
                                    <td class="border-b py-2 px-4">{{ $user->nik ?? '-' }}</td>
                                    <td class="border-b py-2 px-4">{{ $user->jabatan ?? '-' }}</td>

                                    <td class="border-b py-2 px-4">
                                        @if($user->jobPackage)
                                            <span class="font-medium text-blue-700">{{ $user->jobPackage->nama_paket }}</span><br>
                                            <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                                {{ $user->jobPackage->scopes->count() }} Aktivitas
                                            </span>
                                        @else
                                            <span class="text-gray-400 italic">Belum diset</span>
                                        @endif
                                    </td>

                                    <td class="border-b py-2 px-4 text-center">
                                        <div class="flex justify-center gap-2">
                                            <a href="{{ route('users.edit', $user->id) }}" class="text-yellow-600 hover:text-yellow-800 font-bold">Edit</a>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus akun ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800 font-bold">Hapus</button>
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
