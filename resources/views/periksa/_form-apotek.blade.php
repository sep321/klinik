<div class="mt-10 max-w-md mx-auto bg-gray-900 text-white p-6 rounded-lg shadow-lg">
    <form action="{{ $action }}" method="POST" class="space-y-5  text-left">
        @csrf
        @if ($method === 'PUT')
            @method('PUT')
        @endif

        <div style="text-align: left; margin-top: 8px;">
            <label for="nama_pasien" class="block mb-1 font-semibold text-indigo-300">Nama Pasien</label>
            <input type="text" value="{{ old('nama', $pasien->nama_pasien ?? '') }}" disabled
                class="w-full px-4 py-2 rounded-md bg-gray-800 border border-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500" />
        </div>
        {{-- <div style="text-align: left; margin-top: 8px;">
            <label for="berat_badan" class="block mb-1 font-semibold text-indigo-300">Berat Badan</label>
            <input type="text" name="berat_badan" id="berat_badan"
                value="{{ old('berat_badan', $pasien->berat_badan ?? '') }}" disabled
                class="w-full px-4 py-2 rounded-md bg-gray-800 border border-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500" />
        </div>
        <div style="text-align: left; margin-top: 8px;">
            <label for="tinggi_badan" class="block mb-1 font-semibold text-indigo-300">Tinggi Badan</label>
            <input type="text" name="tinggi_badan" id="tinggi_badan"
                value="{{ old('tinggi_badan', $pasien->tinggi_badan ?? '') }}" disabled
                class="w-full px-4 py-2 rounded-md bg-gray-800 border border-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500" />
        </div>
        <div style="text-align: left; margin-top: 8px;">
            <label for="tekanan_darah" class="block mb-1 font-semibold text-indigo-300">Tekanan Darah</label>
            <input type="text" name="tekanan_darah" id="tekanan_darah"
                value="{{ old('tekanan_darah', $pasien->tekanan_darah ?? '') }}" disabled
                class="w-full px-4 py-2 rounded-md bg-gray-800 border border-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500" />
        </div> --}}
        <div style="text-align: left; margin-top: 8px;">
            <label for="keluhan" class="block mb-1 font-semibold text-indigo-300">Keluhan</label>
            <input type="text" name="keluhan" id="keluhan" value="{{ old('keluhan', $pasien->keluhan ?? '') }}"
                disabled
                class="w-full px-4 py-2 rounded-md bg-gray-800 border border-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500" />
        </div>
        <div style="text-align: left; margin-top: 8px;">
            <label for="diagnosa" class="block mb-1 font-semibold text-indigo-300">Diagnosa</label>
            <input type="text" name="diagnosa" id="diagnosa" value="{{ old('diagnosa', $pasien->diagnosa ?? '') }}"
                disabled
                class="w-full px-4 py-2 rounded-md bg-gray-800 border border-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500" />
        </div>
        @php
            $selectedObat = old('obat_id', isset($pasien->obat) ? explode(', ', $pasien->obat) : []);
        @endphp

        <div class="mt-4">
            <label class="block mb-1 font-semibold text-indigo-300">Pilih Obat</label>
            <div
                class="bg-gray-800 border border-gray-700 rounded-md p-3 text-white space-y-2 max-h-60 overflow-y-auto">
                @foreach ($obats as $obat)
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="obat_id[]" value="{{ $obat->id }}"
                            {{ in_array($obat->nama, $selectedObat) ? 'checked' : '' }}
                            class="text-indigo-500 focus:ring-indigo-400 rounded">
                        <span>{{ $obat->nama }} ({{ $obat->kategori }} - {{ $obat->satuan }})</span>
                    </label>
                @endforeach
            </div>
            @error('obat_id')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>




        <div class="flex items-center justify-between pt-4">
            <a href="{{ route('apotek.home') }}"
                class="inline-block bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded-md transition">
                ← Kembali
            </a>
            <x-primary-button class="ms-3" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                {{ $buttonText ?? 'Simpan' }}
            </x-primary-button>

        </div>
    </form>
</div>
