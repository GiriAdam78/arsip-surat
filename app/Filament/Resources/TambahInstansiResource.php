<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Instansi;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\TambahInstansi;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TambahInstansiResource\Pages;
use App\Filament\Resources\TambahInstansiResource\RelationManagers;
use Filament\Tables\Actions\Action;

class TambahInstansiResource extends Resource
{
    protected static ?string $model = Instansi::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    protected static ?string $navigationGroup = 'Refrensi';

    protected static ?string $navigationLabel = 'Instansi';
    
    protected static ?string $breadcrumb = 'Instansi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_instansi')
                    ->label('Nama Instansi')
                    ->required()
                    ->autocomplete(false),
                Forms\Components\TextInput::make('alamat')
                    ->label('Alamat')
                    ->required()
                    ->autocomplete(false)
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
                Tables\Columns\TextColumn::make('nama_instansi')
                    ->label('Nama Instansi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('alamat')
                    ->label('Alamat Instansi')
                    ->searchable()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->label('Lihat'),
                Tables\Actions\EditAction::make()
                    ->label('Ubah')
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Hapus Data Yang Terpilih ??')
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
            'index' => Pages\ListTambahInstansis::route('/'),
            'create' => Pages\CreateTambahInstansi::route('/create'),
            'edit' => Pages\EditTambahInstansi::route('/{record}/edit'),
        ];
    }
}
