@extends('layouts.app')

@section('content')
    <div class="flex justify-center mt-5">
        <div class="w-full max-w-6xl p-6 bg-gray-900 text-white rounded-lg  shadow-lg">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-bold text-indigo-800">Daftar Master Obat</h2>
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
                            <th class="py-3 px-4 border border-gray-700" colspan="4">Table Daftar Master Obat</th>
                            <th class="py-3 px-4 border border-gray-700">
                                <x-primary-button class="ms-5" type="submit">
                                    <a href="{{ route('apotek.create') }}">
                                        Tambah Master
                                    </a>
                                </x-primary-button>

                            </th>
                        </tr>
                    </thead>
                    <thead class="bg-gray-700 text-indigo-300">
                        <tr>
                            <th class="py-3 px-4 border border-gray-700">No</th>
                            <th class="py-3 px-4 border border-gray-700">Nama Obat</th>
                            <th class="py-3 px-4 border border-gray-700">Kategori</th>
                            <th class="py-3 px-4 border border-gray-700">Satuan</th>
                            <th class="py-3 px-4 border border-gray-700">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($obats as $index => $ob)
                            <tr class="text-center hover:bg-gray-700 transition">
                                <td class="py-2 px-4 border border-gray-700">{{ $index + 1 }}</td>
                                <td class="py-2 px-4 border border-gray-700">{{ $ob->nama }}</td>
                                <td class="py-2 px-4 border border-gray-700">{{ $ob->kategori }}</td>
                                <td class="py-2 px-4 border border-gray-700">{{ $ob->satuan }}</td>
                                <td class="py-2 px-4 border border-gray-300 dark:border-gray-600 space-x-2">

                                    {{-- Tombol Edit --}}
                                    <a href="{{ route('apotek.edit', $ob->id) }}"
                                        class="inline-flex items-center gap-2 bg-yellow-500 hover:bg-yellow-600 active:bg-yellow-700 text-black font-medium px-4 py-1.5 rounded-md shadow transition duration-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.232 5.232l3.536 3.536M9 11l6-6 3 3-6 6H9v-3z" />
                                        </svg>
                                        Edit
                                    </a>

                                    {{-- Tombol Hapus --}}
                                    <form action="{{ route('apotek.destroy', $ob->id) }}" method="POST"
                                        class="inline" onsubmit="return confirm('Yakin ingin menghapus pasien ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center gap-2 bg-red-600 hover:bg-red-700 active:bg-red-800 text-white font-medium px-4 py-1.5 rounded-md shadow transition duration-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                            Hapus
                                        </button>
                                    </form>

                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-4 text-center text-gray-400">Belum ada data Obat.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
