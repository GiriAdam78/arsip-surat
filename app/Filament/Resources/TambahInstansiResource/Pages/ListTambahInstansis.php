<?php

namespace App\Filament\Resources\TambahInstansiResource\Pages;

use App\Filament\Resources\TambahInstansiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTambahInstansis extends ListRecords
{
    protected static string $resource = TambahInstansiResource::class;

    protected static ?string $title  = 'List Instansi';

    protected static ?string $breadcrumb = 'List Instansi';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->icon('heroicon-o-plus')
                ->label('Tambah Data')
        ];
    }
}
