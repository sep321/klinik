@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-white">Edit Master Obat</h2>

    </div>

    @include('apotek._form', [
        'action' => route('apotek.update', $obats->id),
        'method' => 'PUT',
        'buttonText' => 'Update',
        'obat' => $obats,
    ])
@endsection
