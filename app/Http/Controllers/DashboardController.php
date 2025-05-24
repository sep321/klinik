<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;

        switch ($role) {
            case 'pendaftaran':
                return redirect()->route('pendaftaran.home');
            case 'apoteker':
                return redirect()->route('obat.index');
            case 'perawat':
                return redirect()->route('periksa.home');
            case 'dokter':
                return redirect()->route('periksa.home');
            default:
                abort(403, 'Role tidak dikenal');
        }
    }
}
