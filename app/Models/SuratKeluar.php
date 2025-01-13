<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    protected $table ='surat_keluar';

    protected $fillable = [
        'nomor_agenda',
        'tanggal_keluar',
        'tujuan_surat',
        'nomor_surat',
        'tanggal_surat',
        'perihal'
    ];
}
