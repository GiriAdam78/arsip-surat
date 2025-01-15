<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SuratKeluarResource\Pages;
use App\Filament\Resources\SuratKeluarResource\RelationManagers;
use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use App\Models\Instansi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SuratKeluarResource extends Resource
{
    protected static ?string $model = SuratKeluar::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    protected static ?string $navigationGroup = 'Data Surat';

    protected static ?string $navigationLabel = 'Surat Keluar';

    protected static ?string $table = 'No Data Available';

    protected static ?string $breadcrumb = "Surat Keluar";

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('nomor_agenda')
                    ->label('Nomor Agenda')
                    ->options(SuratMasuk::all()->pluck('nomor_agenda', 'nomor_agenda'))
                    ->searchable()
                    ->required(),
                Forms\Components\DatePicker::make('tanggal_keluar')
                    ->label('Tanggal Keluar')
                    ->required(),
                Forms\Components\Select::make('tujuan_surat')
                    ->label('Tujuan Surat')
                    ->options(Instansi::all()->pluck('nama_instansi','nama_instansi'))
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('nomor_surat')
                    ->label('Nomor Surat')
                    ->options(SuratMasuk::all()->pluck('nomor_surat','nomor_surat'))
                    ->searchable()
                    ->required(),
                Forms\Components\DatePicker::make('tanggal_surat')
                    ->label('Tanggal Surat')
                    ->required(),
                Forms\Components\TextInput::make('perihal')
                    ->label('Perihal')
                    ->required(),
            ]); 

    }

    public static function table(Table $table): Table
    {
        return $table
            ->emptyStateHeading('No Data Available')
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('No'),
                Tables\Columns\TextColumn::make('nomor_agenda')
                    ->label('Nomor Agenda')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_keluar')
                    ->label('Tanggal Keluar')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('tujuan_surat')
                    ->label('Tujuan Surat')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('nomor_surat')
                    ->label('Nomor Surat')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_surat')
                    ->label('Tanggal Surat')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('perihal')
                    ->label('Perihal')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->Label('Lihat'),
                Tables\Actions\EditAction::make()
                    ->Label('Ubah'),
                Tables\Actions\DeleteAction::make()
                    ->Label('Hapus'),
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
            'index' => Pages\ListSuratKeluars::route('/'),
            'create' => Pages\CreateSuratKeluar::route('/create'),
            'edit' => Pages\EditSuratKeluar::route('/{record}/edit'),
        ];
    }
}
