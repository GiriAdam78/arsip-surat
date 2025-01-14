<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SuratMasukResource\Pages;
use App\Filament\Resources\SuratMasukResource\RelationManagers;
use App\Models\SuratMasuk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\Action;
use Malzariey\FilamentDaterangepickerFilter\Filters\DateRangeFilter;
use Malzariey\FilamentDaterangepickerFilter\Fields\DateRangePicker;

class SuratMasukResource extends Resource
{
    protected static ?string $model = SuratMasuk::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Laporan';

    protected static ?string $navigationLabel = 'Laporan Surat Masuk';

    protected static ?string $breadcrumb = "Laporan Surat";

    protected static ?int $navigationSort = 1;



    public static function table(Table $table): Table
    {
        return $table
            ->emptyStateHeading('No Data Available')
            ->emptyStateDescription('Tidak Ada Data Yang Tersedia Saat Ini')
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('No'),
                Tables\Columns\TextColumn::make('nomor_agenda')->label('Nomor Agenda'),
                Tables\Columns\TextColumn::make('tanggal_masuk')->label('Tanggal Masuk'),
                Tables\Columns\TextColumn::make('asal_surat')->label('Asal Surat'),
                Tables\Columns\TextColumn::make('nomor_surat')->label('Nomor Surat'),
                Tables\Columns\TextColumn::make('tanggal_surat')->label('Tanggal Surat'),
                Tables\Columns\TextColumn::make('perihal')->label('Perihal'),
                Tables\Columns\TextColumn::make('keterangan')->label('Keterangan'),
                Tables\Columns\TextColumn::make('sifat_surat')->label('Sifat Surat'),

            ])
            ->filters([
                Filter::make('tanggal_masuk')
                    ->form([
                        Forms\Components\TextInput::make('tanggal_awal')
                            ->label('Tanggal Awal'),
                        Forms\Components\TextInput::make('tanggal_akhir')
                            ->label('Tanggal Akhir'),
                    ])
                    ->query(function (Builder $query, array $data): builder {
                        return $query
                            ->when($data['tanggal_awal'], fn ($query, $date) => $query->where('tanggal_masuk', '>=', $date))
                            ->when($data['tanggal_akhir'], fn ($query, $date) => $query->where('tanggal_masuk', '<=', $date));
                    })
               
                    
            ])
            
            ->actions([
               //
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSuratMasuks::route('/'),
            'create' => Pages\CreateSuratMasuk::route('/create'),
            'edit' => Pages\EditSuratMasuk::route('/{record}/edit'),
        ];
    }
}
