<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\SifatSurat;
use Filament\Tables\Table;
use App\Models\TambahSifatSurat;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TambahSifatSuratResource\Pages;
use App\Filament\Resources\TambahSifatSuratResource\RelationManagers;

class TambahSifatSuratResource extends Resource
{
    protected static ?string $model =   SifatSurat::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    protected static ?string $navigationGroup = 'Refrensi';

    protected static ?string $navigationLabel ='Sifat Surat';

    protected static ?string $breadcrumb = 'Sifat Surat';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_sifat')
                    ->label('Nama Sifat')
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->emptyStateHeading('No Data Available')
            ->emptyStateDescription('Tidak Ada Data Yang Tersedia Saat Ini')
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('No')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_sifat')
                    ->label('Nama Sifat')
                    ->searchable()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('Ubah'),
                Tables\Actions\DeleteAction::make()
                    ->label('Hapus'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Hapus Data Terpilih ?'),
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
            'index' => Pages\ListTambahSifatSurats::route('/'),
            'create' => Pages\CreateTambahSifatSurat::route('/create'),
            'edit' => Pages\EditTambahSifatSurat::route('/{record}/edit'),
        ];
    }
}
