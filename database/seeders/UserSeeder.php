<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Pasien;
use App\Models\Obat;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            ['name' => 'Admin Pendaftaran', 'email' => 'pendaftaran@klinik.com', 'role' => 'pendaftaran'],
            ['name' => 'Dokter Umum', 'email' => 'dokter@klinik.com', 'role' => 'dokter'],
            ['name' => 'Perawat Klinik', 'email' => 'perawat@klinik.com', 'role' => 'perawat'],
            ['name' => 'Apoteker Klinik', 'email' => 'apoteker@klinik.com', 'role' => 'apoteker'],
        ];

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make('bisa'),
                'role' => $user['role'],
            ]);
        }

        // Seed pasien
        $pasiens = [
            ['nama' => 'Asep Rohimat', 'tanggal_lahir' => '2005-05-01', 'jenis_kelamin' => 'L', 'no_hp' => '083334567890'],
            ['nama' => 'Ahmad Ramadhan', 'tanggal_lahir' => '1990-05-01', 'jenis_kelamin' => 'L', 'no_hp' => '081234567890'],
            ['nama' => 'Siti Nurhaliza', 'tanggal_lahir' => '1985-08-21', 'jenis_kelamin' => 'P', 'no_hp' => '082112345678'],
            ['nama' => 'Budi Santoso', 'tanggal_lahir' => '1979-12-15', 'jenis_kelamin' => 'L', 'no_hp' => '081298765432'],
        ];

        foreach ($pasiens as $pasien) {
            Pasien::create($pasien);
        }

        // Seed obat
        $obats = [
            ['nama' => 'Paracetamol', 'kategori' => 'Obat Bebas', 'satuan' => 'tablet'],
            ['nama' => 'Amoxicillin', 'kategori' => 'Antibiotik', 'satuan' => 'kapsul'],
            ['nama' => 'Vitamin C', 'kategori' => 'Vitamin', 'satuan' => 'tablet'],
        ];

        foreach ($obats as $obat) {
            Obat::create($obat);
        }
    }
}
