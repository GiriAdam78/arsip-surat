<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SifatSurat extends Model
{
    protected $table = 'sifat_surat';

    protected $fillable = [
        'nama_sifat'
    ];
}
