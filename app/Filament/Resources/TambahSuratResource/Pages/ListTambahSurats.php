<?php

namespace App\Filament\Resources\TambahSuratResource\Pages;

use App\Filament\Resources\TambahSuratResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTambahSurats extends ListRecords
{
    protected static string $resource = TambahSuratResource::class;

    protected static ?string $title = 'List Surat Masuk';

    protected static ?string $breadcrumb = 'List Data';
    
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Data')
        ];
    }

 
}
