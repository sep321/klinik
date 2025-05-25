@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-white">Input Resep Pasien</h2>

    </div>

    @include('periksa._form-apotek', [
        'action' => route('periksa.apotek.save', $pasien->id),
        'method' => 'PUT',
        'buttonText' => 'Simpan Obat',
        'pasien' => $pasien,
        'obats' => $obats,
    ])
@endsection
