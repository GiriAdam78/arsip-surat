<?php

namespace App\Filament\Resources\TambahSuratResource\Pages;

use App\Filament\Resources\TambahSuratResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTambahSurat extends EditRecord
{
    protected static string $resource = TambahSuratResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
