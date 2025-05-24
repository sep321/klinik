<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\User;
use App\Models\Pemeriksaan;
use App\Models\Register;

class PemeriksaanController extends Controller
{
    public function index()
    {
        $regis = Register::where('status', '!=', 0)->get(); // Ambil semua pasien
        return view('periksa.home', compact('regis'));
    }

    // Tampilkan form edit pasien
    public function edit($id)
    {
        $pasien = Register::findOrFail($id);
        return view('periksa.edit', compact('pasien'));
    }

    // // Update data pasien
    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'nama' => 'required|string|max:255',
    //         'tanggal_lahir' => 'required|date',
    //         'jenis_kelamin' => 'required|in:L,P',
    //         'no_hp' => 'required|string|max:20',
    //     ]);

    //     $pasien = Pasien::findOrFail($id);
    //     $pasien->update($request->all());

    //     return redirect()->route('periksa.home')->with('success', 'Pasien berhasil diupdate.');
    // }

    // Hapus pasien
    public function destroy($id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();

        return redirect()->route('periksa.home')->with('success', 'Pasien berhasil dihapus.');
    }

    public function registrasi(Request $request, $pasien_id)
    {
        $pasien = Pasien::findOrFail($pasien_id);

        // Simpan data register, ambil nama dari pasien
        Register::create([
            'tglregis' => now(),
            'pasien_id' => $pasien->id,
            'nama_pasien' => $pasien->nama,
        ]);

        return redirect()->back()->with('success', 'Pasien berhasil diregistrasi.');
    }

    public function dokterForm()
    {
        $pasiens = Pasien::all(); // Ambil semua pasien
        return view('pemeriksaan.dokter', compact('pasiens'));
    }


    public function dokterStore(Request $request)
    {
        $request->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'keluhan' => 'required|string',
            'diagnosa' => 'required|string',
        ]);

        Pemeriksaan::create([
            'pasien_id' => $request->pasien_id,
            'keluhan' => $request->keluhan,
            'diagnosa' => $request->diagnosa,
        ]);

        return redirect()->route('pemeriksaan.dokter')->with('success', 'Pemeriksaan berhasil disimpan.');
    }
}
