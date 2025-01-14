<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Instansi;
use Filament\Forms\Form;
use App\Models\SifatSurat;
use App\Models\SuratMasuk;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Tables\Actions\Action;
use Filament\Resources\Forms\Components;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DateTimePicker;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TambahSuratResource\Pages;
use App\Filament\Resources\TambahSuratResource\RelationManagers;
use Malzariey\FilamentDaterangepickerFilter\Fields\DateRangePicker;

class TambahSuratResource extends Resource
{
    // Mengambil Model SuratMasuk
    protected static ?string $model = SuratMasuk::class;

    // Menambahkan Icon di Navigasi
    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    // Mengelompokkan Menu Berdasarkan Navigasi Induk
    protected static ?string $navigationGroup = 'Data Surat';

    // Mengganti Label Navigasi
    protected static ?string $navigationLabel = 'Surat Masuk';

    // Mengganti Label Dari Breadcrumb Sesuai dengan Nama di Menu
    protected static ?string $breadcrumb = "Surat Masuk";

    protected static ?string $table = 'No Data Available';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nomor_agenda')
                    ->label('Nomor Agenda')
                    ->disabled() // Field tidak bisa diubah
                    ->default(fn () => 'SM-' . str_pad(SuratMasuk::count() + 1, 4, '0', STR_PAD_LEFT)),
                DateRangePicker::make('tanggal_masuk')
                    ->label('Tanggal Masuk')
                    ->required()
                    ->singleCalendar(),
                Forms\Components\Select::make('instansi_id')
                    ->label('Asal Surat')
                    ->options(Instansi::all()->pluck('nama_instansi', 'id')) // Ambil data dari tabel sifat_surat
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('nomor_surat')
                    ->label('Nomor Surat')
                    ->required()
                    ->autocomplete(false),
                DateRangePicker::make('tanggal_surat')
                    ->label('Tanggal Surat')
                    ->required()
                    ->singleCalendar(),
                Forms\Components\TextInput::make('perihal')
                    ->label('Perihal')
                    ->required()
                    ->autocomplete(false),
                Forms\Components\Textarea::make('keterangan')
                    ->label('Keterangan')
                    ->required()
                    ->autocomplete(false),
                Forms\Components\Select::make('sifat_surat_id')
                    ->label('Sifat Surat')
                    ->options(SifatSurat::all()->pluck('nama_sifat', 'id')) // Ambil data dari tabel sifat_surat
                    ->searchable()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->emptyStateHeading('No Data Available')
            ->emptyStateDescription('Tidak Ada Data Yang Tersedia Saat Ini')
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('No'),
                Tables\Columns\TextColumn::make('nomor_agenda')
                    ->label('Nomor Agenda')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_masuk')
                    ->label('Tanggal Masuk')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('asal_surat')
                    ->label('Asal Surat')
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
                Tables\Columns\TextColumn::make('sifat_surat')
                    ->label('Sifat Surat')
                    ->color('success')
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
                Action::make('Print Disposisi')
                    ->label('Cetak Disposisi')
                    ->color('success')
                    ->icon('heroicon-o-printer')
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Hapus Data Terpilih ?')

                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    public static function getTitle(): string
    {
        return 'Data Surat Masuk'; // Custom judul untuk resource
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTambahSurats::route('/'),
            'create' => Pages\CreateTambahSurat::route('/create'),
            'edit' => Pages\EditTambahSurat::route('/{record}/edit'),
        ];
    }
}
