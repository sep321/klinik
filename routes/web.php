<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PemeriksaanController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return redirect()->route('login');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/informasi', [DashboardController::class, 'informasi'])->name('pasien.informasi');
});

// regis
Route::middleware(['auth', 'role:pendaftaran'])->group(function () {
    Route::get('/pendaftaran/home', [PasienController::class, 'index'])->name('pendaftaran.home');
    Route::get('/pendaftaran/daftar', [PasienController::class, 'daftar'])->name('pendaftaran.daftar');
    Route::get('/pendaftaran/create', [PasienController::class, 'create'])->name('pendaftaran.create');
    Route::post('/pendaftaran', [PasienController::class, 'store'])->name('pendaftaran.store');
    Route::get('/pendaftaran/{id}/edit', [PasienController::class, 'edit'])->name('pendaftaran.edit');
    Route::put('/pendaftaran/{id}', [PasienController::class, 'update'])->name('pendaftaran.update');
    Route::delete('/pendaftaran/{id}', [PasienController::class, 'destroy'])->name('pendaftaran.destroy'); 
    Route::post('/pendaftaran/{id}', [PasienController::class, 'registrasi'])->name('pendaftaran.registrasi');
    Route::post('/pendaftaran/{id}/batal', [PasienController::class, 'batalRegistrasi'])->name('pendaftaran.batal');
});

// perawat
Route::middleware(['auth', 'role:perawat'])->group(function () {
    Route::get('/periksa', [PemeriksaanController::class, 'index'])->name('perawat.home');
    Route::get('/periksa/{id}/perawat', [PemeriksaanController::class, 'perawat'])->name('periksa.perawat');
    Route::put('/periksa/{id}/save', [PemeriksaanController::class, 'save'])->name('periksa.perawat.save');
});

// dokter
Route::middleware(['auth', 'role:dokter'])->group(function () {
    Route::get('/periksa/dokter', [PemeriksaanController::class, 'index_dokter'])->name('dokter.home');
    Route::get('/periksa/dokter/{id}', [PemeriksaanController::class, 'dokter'])->name('periksa.dokter');
    Route::put('/periksa/dokter/{id}/save', [PemeriksaanController::class, 'save_dokter'])->name('periksa.dokter.save');
});

// apotek
Route::middleware(['auth', 'role:apoteker'])->group(function () {
    Route::get('/apotek/home', [ObatController::class, 'index'])->name('apotek.home');
    Route::get('/apotek/obat', [ObatController::class, 'obat'])->name('apotek.obat');
    Route::get('/apotek/create', [ObatController::class, 'create'])->name('apotek.create');
    Route::post('/apotek', [ObatController::class, 'store'])->name('apotek.store');
    Route::get('/apotek/{id}/edit', [ObatController::class, 'edit'])->name('apotek.edit');
    Route::put('/apotek/{id}', [ObatController::class, 'update'])->name('apotek.update');
    Route::delete('/apotek/{id}', [ObatController::class, 'destroy'])->name('apotek.destroy'); 
    Route::get('/periksa/apotek/{id}', [PemeriksaanController::class, 'apotek'])->name('periksa.apotek');
    Route::put('/periksa/apotek/{id}/save', [PemeriksaanController::class, 'save_apotek'])->name('periksa.apotek.save');
});

require __DIR__ . '/auth.php';
