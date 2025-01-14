<?php

namespace App\Filament\Resources\TambahInstansiResource\Pages;

use App\Filament\Resources\TambahInstansiResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTambahInstansi extends CreateRecord
{
    // Mengambil Resource Dari Halaman Depan
    protected static string $resource = TambahInstansiResource::class;

    // Menghapus Button Create Another
    protected static bool $canCreateAnother = false;

    // Mengubah Judul Halaman
    protected static ?string $title = 'Tambah Data Instansi';

    // Mengubah Breadcrumb Default Filament di sesuaikan dengan Nama Halaman 
    protected static ?string $breadcrumb = 'Tambah Data Instansi';

}
