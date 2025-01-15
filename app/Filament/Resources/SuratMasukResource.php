<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\SuratMasuk;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Barryvdh\DomPDF\Facade as PDF;
use Filament\Actions\ExportAction;
use Filament\Tables\Actions\Action;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SuratMasukResource\Pages;
use App\Filament\Resources\SuratMasukResource\RelationManagers;

class SuratMasukResource extends Resource
{
    protected static ?string $model = SuratMasuk::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Laporan';

    protected static ?string $navigationLabel = 'Laporan Surat Masuk';

    protected static ?string $breadcrumb = "Laporan Surat";

    protected static ?int $navigationSort = 1;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Datepicker::make('tanggal_masuk')
                    ->label('Tanggal Awal')
                    ->required()
            ]);
    }
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
                        Forms\Components\DatePicker::make('tanggal_masuk')
                            ->label('Tanggal Masuk')
                    ])
                    ->query(fn(Builder $query, array $data) => 
                        $query->whereDate('tanggal_masuk', $data['tanggal_masuk'])
                    ),
                    
            ])
            
            ->actions([
                Action::make('Print')
                ->label('Print')
                ->color('success')
                ->icon('heroicon-o-printer')
                ->url(fn ($record) => route('print.laporan-surat', [
                    'tanggal_masuk' => $record->tanggal_masuk,  // Kirimkan parameter tanggal_masuk sesuai dengan yang dipilih
                ])) // URL ke route cetak
                ->openUrlInNewTab(),
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
