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
});

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

// Role: Apoteker → Tambah Obat
Route::middleware(['auth', 'role:apoteker'])->group(function () {
    Route::resource('obat', ObatController::class);
});

// Role: Perawat → Input BB dan Tekanan Darah
Route::middleware(['auth', 'role:perawat'])->group(function () {
    Route::get('/periksa', [PemeriksaanController::class, 'index'])->name('periksa.home');
    Route::get('/periksa/create', [PemeriksaanController::class, 'create'])->name('periksa.create');
    Route::post('/periksa', [PemeriksaanController::class, 'store'])->name('periksa.store');
    Route::get('/periksa/{id}/edit', [PemeriksaanController::class, 'edit'])->name('periksa.edit');
    Route::put('/periksa/{id}', [PemeriksaanController::class, 'update'])->name('periksa.update');
    Route::delete('/periksa/{id}', [PemeriksaanController::class, 'destroy'])->name('periksa.destroy'); 
    Route::post('/periksa/{id}', [PemeriksaanController::class, 'registrasi'])->name('periksa.registrasi');
});

// Role: Dokter → Isi keluhan & diagnosa
Route::middleware(['auth', 'role:dokter'])->group(function () {
    Route::get('pemeriksaan/dokter', [PemeriksaanController::class, 'dokterForm'])->name('pemeriksaan.dokter');
    Route::post('pemeriksaan/dokter', [PemeriksaanController::class, 'dokterStore'])->name('pemeriksaan.dokter.store');
});

require __DIR__ . '/auth.php';
