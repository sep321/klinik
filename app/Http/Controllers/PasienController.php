<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Register;

class PasienController extends Controller
{
    public function index()
    {
        $pasiens = Pasien::all(); // Ambil semua pasien
        return view('pendaftaran.home', compact('pasiens'));
    }


    // Tampilkan form tambah pasien
    public function create()
    {
        return view('pasien.create');
    }

    // Simpan data pasien baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'no_hp' => 'required|string|max:20',
        ]);

        Pasien::create($request->all());

        return redirect()->route('pendaftaran.home')->with('success', 'Pasien berhasil ditambahkan.');
    }

    // Tampilkan form edit pasien
    public function edit($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('pasien.edit', compact('pasien'));
    }

    // Update data pasien
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'no_hp' => 'required|string|max:20',
        ]);

        $pasien = Pasien::findOrFail($id);
        $pasien->update($request->all());

        return redirect()->route('pendaftaran.home')->with('success', 'Pasien berhasil diupdate.');
    }

    // Hapus pasien
    public function destroy($id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();

        return redirect()->route('pendaftaran.home')->with('success', 'Pasien berhasil dihapus.');
    }

    public function registrasi($id)
    {
        $pasien = Pasien::findOrFail($id);

        // Simpan data register, ambil nama dari pasien
        Register::create([
            'tglregis' => now(),
            'pasien_id' => $pasien->id,
            'nama_pasien' => $pasien->nama,
        ]);

        return redirect()->back()->with('success', 'Pasien berhasil diregistrasi.');
    }

    public function daftar()
    {
        $regis = Register::where('status', '!=', 0)->get(); // Ambil semua pasien
        return view('pendaftaran.daftar', compact('regis'));
    }

    public function batalRegistrasi($id)
    {
        $register = Register::findOrFail($id);

        $register->update([
            'status' => 0,
        ]);

        return redirect()->back()->with('success', 'Registrasi pasien berhasil dibatalkan.');
    }
}
