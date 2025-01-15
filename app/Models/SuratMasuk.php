<?php

namespace App\Models;

use App\Models\Instansi;
use App\Models\SifatSurat;
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
    public function SifatSurat(){
        return $this->belongsTo(SifatSurat::class, 'nama_sifat');
    }
    public function Instansi(){
        return $this->belongsTo(Instansi::class, 'nama_instansi');
    }

    // Membuat Nomor Agenda Secara Otomatis
    protected static function booted()
    {
        static::creating(function ($surat) {
            // Generate Nomor Agenda
            $latestSurat = self::latest('id')->first();
            $lastNumber = $latestSurat ? intval(substr($latestSurat->nomor_agenda, -4)) : 0;
            $surat->nomor_agenda = 'SM-' . str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        });
    }

    // Menghilangkan Tag HTML di Dalam Database 
    public function setContentAttribute($value)
    {
        $this->attributes['keterangan'] = strip_tags($value);
    } 
}
