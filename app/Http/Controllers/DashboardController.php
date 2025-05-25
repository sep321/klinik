<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Register;

class DashboardController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;

        switch ($role) {
            case 'pendaftaran':
                return redirect()->route('pendaftaran.home');
            case 'perawat':
                return redirect()->route('perawat.home');
            case 'dokter':
                return redirect()->route('dokter.home');
            case 'apoteker':
                return redirect()->route('apotek.home');
            default:
                abort(403, 'Role tidak dikenal');
        }
    }

    public function informasi()
    {
        $regis = Register::where('status', '!=', 0)->get(); // Ambil semua pasien
        return view('pasien.informasi', compact('regis'));
    }
}
