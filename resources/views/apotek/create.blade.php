@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-white">Tambah Master Obat Baru</h2>

    </div>

    @include('apotek._form', [
        'action' => route('apotek.store'),
        'method' => 'POST',
        'buttonText' => 'Simpan',
    ])
@endsection
