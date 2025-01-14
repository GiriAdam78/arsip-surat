<?php

namespace App\Filament\Resources\TambahSifatSuratResource\Pages;

use App\Filament\Resources\TambahSifatSuratResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTambahSifatSurat extends EditRecord
{
    protected static string $resource = TambahSifatSuratResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
