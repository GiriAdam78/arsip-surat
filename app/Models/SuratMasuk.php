<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    // Melindungi Nama Tabel Yang Menggunakan Bahasa Indonesia
    protected $table='surat_masuk';

    // Melindungi Fillable Yang Dapat Di Isi
    protected $fillable = [
        'nomor_agenda',
        'tanggal_masuk',
        'asal_surat',
        'nomor_surat',
        'tanggal_surat',
        'perihal',
        'keterangan',
        'sifat_surat'
    ];

    // Masukkan Kode Relasi Di Sini (Belongs To, Many To Many, One To Many, Etc)
    
}
