<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Form Data Pejabat</h2>
    </x-slot>

    <div class="py-12"><div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm sm:rounded-lg p-6">
            <form action="{{ isset($approver) ? route('approvers.update', $approver->id) : route('approvers.store') }}" method="POST">
                @csrf
                @if(isset($approver)) @method('PUT') @endif

                <div class="mb-4">
                    <label class="block font-bold mb-2">Nama Pejabat (beserta gelar)</label>
                    <input type="text" name="nama" value="{{ $approver->nama ?? '' }}" class="border rounded w-full py-2 px-3" required>
                </div>
                <div class="mb-4">
                    <label class="block font-bold mb-2">NIP</label>
                    <input type="text" name="nip" value="{{ $approver->nip ?? '' }}" class="border rounded w-full py-2 px-3" required>
                </div>
                <div class="mb-4">
                    <label class="block font-bold mb-2">Jabatan Penandatangan (cth: Pejabat Pelaksana Teknis Kegiatan)</label>
                    <input type="text" name="jabatan" value="{{ $approver->jabatan ?? '' }}" class="border rounded w-full py-2 px-3" required>
                </div>
                <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-6 rounded">Simpan</button>
            </form>
        </div>
    </div></div>
</x-app-layout>
