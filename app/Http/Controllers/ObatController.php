<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Register;
use App\Models\Obat;

class ObatController extends Controller
{
    public function index()
    {
        $regis = Register::where('status', '!=', 0)->get(); // Ambil semua pasien
        return view('apotek.home', compact('regis'));
    }

    public function obat()
    {
        $obats = Obat::all(); // Ambil semua pasien
        return view('apotek.obat', compact('obats'));
    }

    // Tampilkan form tambah obat
    public function create()
    {
        return view('apotek.create');
    }

    // Simpan data pasien baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'satuan' => 'required|string|max:255',
        ]);

        Obat::create($request->all());

        return redirect()->route('apotek.obat')->with('success', 'Master Obat berhasil ditambahkan.');
    }

    // Tampilkan form edit obat
    public function edit($id)
    {
        $obats = Obat::findOrFail($id);
        return view('apotek.edit', compact('obats'));
    }

    // Update data obat
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'satuan' => 'required|string|max:255',
        ]);

        $obat = Obat::findOrFail($id);
        $obat->update($request->all());

        return redirect()->route('apotek.obat')->with('success', 'Obat berhasil diupdate.');
    }

    // Hapus pasien
    public function destroy($id)
    {
        $obat = Obat::findOrFail($id);
        $obat->delete();

        return redirect()->route('apotek.obat')->with('success', 'Obat berhasil dihapus.');
    }
}
