@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Form Pemeriksaan Dokter</h2>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <form action="{{ route('pemeriksaan.dokter.store') }}" method="POST">
        @csrf

        <div>
            <label>Pasien:</label>
            <select name="pasien_id" required>
                <option value="">-- Pilih Pasien --</option>
                @foreach ($pasiens as $pasien)
                    <option value="{{ $pasien->id }}">{{ $pasien->nama }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Keluhan:</label>
            <input type="text" name="keluhan" required>
        </div>

        <div>
            <label>Diagnosa:</label>
            <input type="text" name="diagnosa" required>
        </div>

        <button type="submit">Simpan Pemeriksaan</button>
    </form>
</div>
@endsection
