<?php

namespace App\Filament\Resources\TambahSifatSuratResource\Pages;

use App\Filament\Resources\TambahSifatSuratResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTambahSifatSurats extends ListRecords
{
    protected static string $resource = TambahSifatSuratResource::class;

    protected static ?string $title = 'List Sifat Surat';

    protected static ?string $breadcrumb = 'List Sifat Surat';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->icon('heroicon-o-plus')
                ->label('Tambah Data')
        ];
    }
}
