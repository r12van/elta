<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Akun: {{ $user->name }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <h3 class="font-bold text-lg mb-4 border-b pb-2">Data Akun Primer</h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap</label>
                                <input type="text" name="name" value="{{ $user->name }}" class="shadow border rounded w-full py-2 px-3" required>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Email (Untuk Login)</label>
                                <input type="email" name="email" value="{{ $user->email }}" class="shadow border rounded w-full py-2 px-3" required>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Password Baru</label>
                                <input type="password" name="password" placeholder="Kosongkan jika tidak diubah" class="shadow border rounded w-full py-2 px-3">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">NIK</label>
                                <input type="text" name="nik" value="{{ $user->nik }}" class="shadow border rounded w-full py-2 px-3">
                            </div>

                            <div class="mb-4 md:col-span-2">
                                <label class="block text-gray-700 text-sm font-bold mb-2 text-purple-600">Hak Akses (Role)</label>
                                <select name="role" class="shadow border rounded w-full py-2 px-3 bg-purple-50" required>
                                    <option value="pegawai" {{ $user->role === 'pegawai' ? 'selected' : '' }}>Pegawai Biasa</option>
                                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Administrator</option>
                                </select>
                            </div>
                        </div>

                        <div class="flex items-center gap-4 mt-6 border-t pt-4">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded">
                                Update Pengguna
                            </button>
                            <a href="{{ route('users.index') }}" class="text-gray-600 hover:text-gray-900 font-bold">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
