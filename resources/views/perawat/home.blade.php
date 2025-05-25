@extends('layouts.app')

@section('content')
    <div class="flex justify-center mt-5">
        <div class="w-full max-w-6xl p-6 bg-gray-900 text-white rounded-lg  shadow-lg">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-bold text-indigo-800">Daftar Registrasi</h2>
                {{-- <a href="{{ route('pendaftaran.home') }}"
                    class="inline-block bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded-md transition">
                    ← Kembali
                </a> --}}
            </div>

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-700/20 text-green-400 border border-green-600 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto flex justify-center">
                <table class="min-w-full bg-gray-800 border border-gray-700 rounded shadow">
                    <thead class="bg-gray-700 text-indigo-300">
                        <tr>
                            <th class="py-3 px-4 border border-gray-700" colspan="7">Table Daftar Registrasi</th>
                        </tr>
                    </thead>
                    <thead class="bg-gray-700 text-indigo-300">
                        <tr>
                            <th class="py-3 px-4 border border-gray-700">No</th>
                            <th class="py-3 px-4 border border-gray-700">Nama Pasien</th>
                            <th class="py-3 px-4 border border-gray-700">Tanggal Registrasi</th>
                            <th class="py-3 px-4 border border-gray-700">Berat Badan</th>
                            <th class="py-3 px-4 border border-gray-700">Tinggi Badan</th>
                            <th class="py-3 px-4 border border-gray-700">Tekanan Darah</th>
                            <th class="py-3 px-4 border border-gray-700">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($regis as $index => $reg)
                            <tr class="text-center hover:bg-gray-700 transition">
                                <td class="py-2 px-4 border border-gray-700">{{ $index + 1 }}</td>
                                <td class="py-2 px-4 border border-gray-700">{{ $reg->nama_pasien }}</td>
                                <td class="py-2 px-4 border border-gray-700">{{ $reg->tglregis }}</td>
                                <td class="py-2 px-4 border border-gray-700">{{ $reg->berat_badan }}</td>
                                <td class="py-2 px-4 border border-gray-700">{{ $reg->tinggi_badan }}</td>
                                <td class="py-2 px-4 border border-gray-700">{{ $reg->tekanan_darah }}</td>
                                <td class="py-2 px-4 border border-gray-700 space-x-2">
                                    <x-primary-button class="ms-3" type="submit">
                                        <a href="{{ route('periksa.perawat', $reg->id) }}">
                                            Periksa
                                        </a>
                                    </x-primary-button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-4 text-center text-gray-400">Belum ada data Pasien.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
