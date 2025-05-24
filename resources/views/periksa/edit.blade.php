@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-white">Edit Pasien</h2>

    </div>

    @include('pasien._form', [
        'action' => route('pendaftaran.update', $pasien->id),
        'method' => 'PUT',
        'buttonText' => 'Update',
        'pasien' => $pasien,
    ])
@endsection
