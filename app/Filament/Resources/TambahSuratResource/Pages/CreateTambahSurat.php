<?php

namespace App\Filament\Resources\TambahSuratResource\Pages;

use App\Filament\Resources\TambahSuratResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTambahSurat extends CreateRecord
{
    // ! Mengubah Judul Halaman 
    protected static ?string $title = 'Tambah Data';
    
    //! Mengambil Resource dari Halaman Depan
    protected static string $resource = TambahSuratResource::class;
    
    //! Menghapus Button Create Another 
    protected static bool $canCreateAnother = false;

    //! Mengubah Breadcrumb Bawaan Fillament Sesuai dengan Nama Halaman
    protected static ?string $breadcrumb = 'Tambah Data Surat Masuk';
}
