<?php

namespace App\Filament\Resources\SuratMasukResource\Pages;

use App\Filament\Resources\SuratMasukResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratMasuks extends ListRecords
{
    protected static string $resource = SuratMasukResource::class;
    
    protected static ?string $title = 'Laporan Surat Masuk';

    protected static ?string $breadcrumb = 'Laporan Surat Masuk';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make('Print')
                ->label('Print Semua Data')
                ->color('success')
                ->icon('heroicon-o-printer')
                ->url(fn () => route('print.surat-masuk')) 
                ->openUrlInNewTab()
        ];
    }
}
