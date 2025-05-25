@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-white">Input Pemeriksaan Dokter</h2>

    </div>

    @include('periksa._form-dokter', [
        'action' => route('periksa.dokter.save', $pasien->id),
        'method' => 'PUT',
        'buttonText' => 'Simpan Pemeriksaan',
        'pasien' => $pasien,
    ])
@endsection
