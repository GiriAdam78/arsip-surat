<?php

namespace App\Filament\Resources\TambahInstansiResource\Pages;

use App\Filament\Resources\TambahInstansiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTambahInstansi extends EditRecord
{
    protected static string $resource = TambahInstansiResource::class;

    protected static ?string $title = 'Ubah Instansi';
    
    protected static ?string $breadcrumb = 'Ubah Instansi';

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
