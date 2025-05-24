@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-white">Tambah Pasien Baru</h2>

    </div>

    @include('pasien._form', [
        'action' => route('pendaftaran.store'),
        'method' => 'POST',
        'buttonText' => 'Simpan',
    ])
@endsection
