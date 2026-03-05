<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Paket Pekerjaan</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('job_packages.update', $jobPackage->id) }}" method="POST">
                        @csrf @method('PUT')
                        <div class="mb-6">
                            <label class="block text-gray-700 font-bold mb-2 text-lg">Nama Paket Pekerjaan</label>
                            <input type="text" name="nama_paket" value="{{ $jobPackage->nama_paket }}" class="shadow border rounded w-full py-3 px-4 text-lg" required>
                        </div>
                        <div class="mb-6 mt-4">
                            <label class="block text-gray-700 font-bold mb-2">Pejabat Penandatangan (PPTK)</label>
                            <select name="approver_id" class="shadow border rounded w-full py-3 px-4" required>
                                <option value="">-- Pilih Pejabat --</option>
                                @foreach($approvers as $approver)
                                    <option value="{{ $approver->id }}" {{ (isset($jobPackage) && $jobPackage->approver_id == $approver->id) ? 'selected' : '' }}>
                                        {{ $approver->nama }} ({{ $approver->jabatan }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="border-t pt-6 mt-6">
                            <div class="flex justify-between items-center mb-4">
                                <div>
                                    <h3 class="font-bold text-gray-800 text-lg">Daftar Aktivitas / Ruang Lingkup</h3>
                                    <p class="text-sm text-gray-500">Tambahkan atau sesuaikan rincian tugas untuk paket pekerjaan ini.</p>
                                </div>
                                <button type="button" onclick="addScopeRow()" class="bg-emerald-500 hover:bg-emerald-600 transition-colors text-white font-semibold py-2 px-4 rounded-md shadow-sm text-sm flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                    Tambah Baris
                                </button>
                            </div>

                            <div id="scopes-container" class="space-y-4 bg-gray-50 p-4 rounded-lg border border-gray-200">
                                @foreach($jobPackage->scopes as $index => $scope)
                                    <div class="bg-white border border-gray-200 rounded-xl p-4 shadow-sm scope-row flex flex-col md:flex-row gap-4 items-start hover:shadow-md transition-shadow">

                                        <input type="hidden" name="scopes[{{ $index }}][id]" value="{{ $scope->id }}">

                                        <div class="w-full md:w-1/4">
                                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-2">Kode Aktivitas</label>
                                            <input type="text" name="scopes[{{ $index }}][kode_aktivitas]" value="{{ $scope->kode_aktivitas }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 py-2.5 px-3" required>
                                        </div>

                                        <div class="w-full md:flex-1">
                                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-2">Uraian Ruang Lingkup</label>
                                            <textarea name="scopes[{{ $index }}][uraian]" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 py-2.5 px-3" rows="2" required>{{ $scope->uraian }}</textarea>
                                        </div>

                                        <div class="w-full md:w-auto md:pt-6 flex justify-end">
                                            <button type="button" onclick="this.closest('.scope-row').remove()" class="bg-red-50 hover:bg-red-500 text-red-500 hover:text-white border border-red-200 hover:border-red-500 transition-all p-2.5 rounded-lg flex items-center justify-center" title="Hapus Aktivitas">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            </button>
                                        </div>

                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="mt-8 flex items-center gap-4 border-t pt-4">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 transition-colors text-white font-bold py-2.5 px-6 rounded-md shadow-sm">Update Data</button>
                            <a href="{{ route('job_packages.index') }}" class="text-gray-500 hover:text-gray-800 font-semibold transition-colors py-2">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        let scopeIndex = {{ $jobPackage->scopes->count() }};
        function addScopeRow() {
            let html = `
                <div class="bg-white border border-gray-200 rounded-xl p-4 shadow-sm scope-row flex flex-col md:flex-row gap-4 items-start hover:shadow-md transition-shadow">

                    <div class="w-full md:w-1/4">
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-2">Kode Aktivitas</label>
                        <input type="text" name="scopes[${scopeIndex}][kode_aktivitas]" placeholder="Contoh: Aktifitas 01" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 py-2.5 px-3" required>
                    </div>

                    <div class="w-full md:flex-1">
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-2">Uraian Ruang Lingkup</label>
                        <textarea name="scopes[${scopeIndex}][uraian]" placeholder="Deskripsikan pekerjaan..." class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 py-2.5 px-3" rows="2" required></textarea>
                    </div>

                    <div class="w-full md:w-auto md:pt-6 flex justify-end">
                        <button type="button" onclick="this.closest('.scope-row').remove()" class="bg-red-50 hover:bg-red-500 text-red-500 hover:text-white border border-red-200 hover:border-red-500 transition-all p-2.5 rounded-lg flex items-center justify-center" title="Hapus Aktivitas">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                    </div>

                </div>
            `;
            document.getElementById('scopes-container').insertAdjacentHTML('beforeend', html);
            scopeIndex++;
        }
    </script>
</x-app-layout>
