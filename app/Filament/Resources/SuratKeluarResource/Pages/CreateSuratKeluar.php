<?php

namespace App\Filament\Resources\SuratKeluarResource\Pages;

use App\Filament\Resources\SuratKeluarResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;


class CreateSuratKeluar extends CreateRecord
{
    protected static ?string $title = 'Tambah Data';

    protected static string $resource = SuratKeluarResource::class;

    protected static bool $canCreateAnother = false;

    protected static ?string $breadcrumb = 'Tambah Data Surat Keluar';

}
