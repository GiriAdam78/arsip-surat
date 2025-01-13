<?php

namespace App\Filament\Resources\TambahSuratResource\Pages;

use App\Filament\Resources\TambahSuratResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTambahSurat extends CreateRecord
{
    protected static ?string $title = 'Tambah Data';
   
    protected static string $resource = TambahSuratResource::class;
    
    protected static bool $canCreateAnother = false;

    
}
