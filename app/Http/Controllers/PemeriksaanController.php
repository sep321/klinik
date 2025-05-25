<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\User;
use App\Models\Pemeriksaan;
use App\Models\Register;
use App\Models\Obat;

class PemeriksaanController extends Controller
{
    public function index()
    {
        $regis = Register::where('status', '!=', 0)->get(); // Ambil semua pasien
        return view('perawat.home', compact('regis'));
    }
    public function index_dokter()
    {
        $regis = Register::where('status', '!=', 0)->get(); // Ambil semua pasien
        return view('dokter.home', compact('regis'));
    }

    public function perawat($id)
    {
        $pasien = Register::findOrFail($id);
        return view('periksa.perawat', compact('pasien'));
    }

    public function dokter($id)
    {
        $pasien = Register::findOrFail($id);
        return view('periksa.dokter', compact('pasien'));
    }

    public function apotek($id)
    {
        $pasien = Register::findOrFail($id);
        $obats = Obat::all();
        return view('periksa.apotek', compact('pasien', 'obats'));
    }

    // Update data pasien
    public function save(Request $request, $id)
    {
        $request->validate([
            'berat_badan'     => 'nullable|string|max:255',
            'tinggi_badan'    => 'nullable|string|max:255',
            'tekanan_darah'   => 'nullable|string|max:255',
        ]);

        $pasien = Register::findOrFail($id);
        $pasien->update($request->all());

        return redirect()->route('perawat.home')->with('success', 'Simpan periksa berhasil !.');
    }

    // Update data pasien
    public function save_dokter(Request $request, $id)
    {
        $request->validate([
            'keluhan'         => 'nullable|string|max:255',
            'diagnosa'        => 'nullable|string|max:255',
        ]);

        $pasien = Register::findOrFail($id);
        $pasien->update($request->all());

        return redirect()->route('dokter.home')->with('success', 'Simpan periksa berhasil !.');
    }

    public function save_apotek(Request $request, $id)
    {
        $request->validate([
            'obat_id'         => 'nullable|array',
        ]);

        $pasien = Register::findOrFail($id);
        $obat_ids = $request->input('obat_id', []);
        $obat_nama = Obat::whereIn('id', $obat_ids)->pluck('nama')->toArray();
        $gabungan_obat = implode(', ', $obat_nama);

        $pasien->update([
            'obat'            => $gabungan_obat,
        ]);

        return redirect()->route('apotek.home')->with('success', 'Simpan Obat berhasil !.');
    }
}
