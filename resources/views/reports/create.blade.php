<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buat Laporan Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg max-w-lg mx-auto">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('reports.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="bulan" class="block text-gray-700 text-sm font-bold mb-2">Bulan</label>
                            <select name="bulan" id="bulan" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                @for($i = 1; $i <= 12; $i++)
                                    <option value="{{ $i }}" {{ date('n') == $i ? 'selected' : '' }}>
                                        {{ date('F', mktime(0, 0, 0, $i, 10)) }}
                                    </option>
                                @endfor
                            </select>
                        </div>

                        <div class="mb-6">
                            <label for="tahun" class="block text-gray-700 text-sm font-bold mb-2">Tahun</label>
                            <input type="number" name="tahun" id="tahun" value="{{ date('Y') }}" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>

                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Simpan
                            </button>
                            <a href="{{ route('reports.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
