<div class="mt-10 max-w-md mx-auto bg-gray-900 text-white p-6 rounded-lg shadow-lg">
    <form action="{{ $action }}" method="POST" class="space-y-5  text-left">
        @csrf
        @if($method === 'PUT')
            @method('PUT')
        @endif

        <div style="text-align: left; margin-top: 8px;">
            <label for="nama" class="block mb-1 font-semibold text-indigo-300">Nama</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama', $pasien->nama ?? '') }}" required
                class="w-full px-4 py-2 rounded-md bg-gray-800 border border-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500" />
            @error('nama')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div style="text-align: left; margin-top: 8px;">
            <label for="tanggal_lahir" class="block mb-1 font-semibold text-indigo-300">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                value="{{ old('tanggal_lahir', isset($pasien) ? $pasien->tanggal_lahir->format('Y-m-d') : '') }}" required
                class="w-full px-4 py-2 rounded-md bg-gray-800 border border-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500" />
            @error('tanggal_lahir')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div style="text-align: left; margin-top: 8px;">
            <label for="jenis_kelamin" class="block mb-1 font-semibold text-indigo-300">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" required
                class="w-full px-4 py-2 rounded-md bg-gray-800 border border-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="L" {{ old('jenis_kelamin', $pasien->jenis_kelamin ?? '') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ old('jenis_kelamin', $pasien->jenis_kelamin ?? '') == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
            @error('jenis_kelamin')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div style="text-align: left; margin-top: 8px;">
            <label for="no_hp" class="block mb-1 font-semibold text-indigo-300">No HP</label>
            <input type="text" name="no_hp" id="no_hp" value="{{ old('no_hp', $pasien->no_hp ?? '') }}" required
                class="w-full px-4 py-2 rounded-md bg-gray-800 border border-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500" />
            @error('no_hp')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between pt-4">
            <a href="{{ route('pendaftaran.home') }}"
               class="inline-block bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded-md transition">
                ← Kembali
            </a>
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-md transition">
                {{ $buttonText }}
            </button>
        </div>
    </form>
</div>
