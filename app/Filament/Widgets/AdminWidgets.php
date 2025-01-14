<?php

namespace App\Filament\Widgets;

use App\Models\Instansi;
use App\Models\SifatSurat;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class AdminWidgets extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Card::make('Total Surat Masuk', SuratMasuk::count()),
            Card::make('Total Surat Keluar', SuratKeluar::count()),
            Card::make('Total Instansi', Instansi::count()),
            Card::make('Total Sifat Surat', SifatSurat::count())
        ];
    }
}
