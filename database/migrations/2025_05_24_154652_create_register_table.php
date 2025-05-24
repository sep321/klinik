<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisterTable extends Migration
{
    public function up()
    {
        Schema::create('register', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->default(true); // status registrasi
            $table->date('tglregis'); // tanggal registrasi
            $table->foreignId('pasien_id')->constrained('pasiens')->onDelete('cascade');
            $table->string('nama_pasien'); // bisa juga diambil dari relasi pasien
            $table->decimal('berat_badan', 5, 2)->nullable();
            $table->decimal('tinggi_badan', 5, 2)->nullable();
            $table->string('tekanan_darah')->nullable();
            $table->text('keluhan')->nullable();
            $table->text('diagnosa')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('register');
    }
};