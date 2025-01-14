<?php

namespace App\Filament\Resources\TambahSifatSuratResource\Pages;

use App\Filament\Resources\TambahSifatSuratResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTambahSifatSurat extends CreateRecord
{
    // Mengganti Judul Halaman
    protected static ?string $title = 'Tambah Sifat Surat';
    // Mengambil Resource Depan
    protected static string $resource = TambahSifatSuratResource::class;
    // Menganti Judul Breadcrumb
    protected static ?string $breadcrumb = 'Tambah Sifat Surat';
    // Menonaktifkan Tombol Create Another
    protected static bool $canCreateAnother = false;
}
