@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-white">Input Pemeriksaan Perawat</h2>

    </div>

    @include('periksa._form', [
        'action' => route('periksa.perawat.save', $pasien->id),
        'method' => 'PUT',
        'buttonText' => 'Simpan Pemeriksaan',
        'pasien' => $pasien,
    ])
@endsection
