<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
     use HasFactory;

    protected $table = 'register';

    protected $fillable = [
        'status',
        'tglregis',
        'pasien_id',
        'nama_pasien',
        'berat_badan',
        'tinggi_badan',
        'tekanan_darah',
        'keluhan',
        'diagnosa',
    ];

    // Relasi ke pasien
    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }
}
