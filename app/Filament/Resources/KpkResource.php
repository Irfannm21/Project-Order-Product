<?php

namespace App\Filament\Resources;

use App\Models\Kpk;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\KpkResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\KpkResource\RelationManagers;

class KpkResource extends Resource
{
    protected static ?string $model = Kpk::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Marketing';
    public static function getNavigationLabel(): string
        {
            return 'Data KPK';
        }


    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Section::make('Data KPK')
                ->schema([
                Grid::make(3)
                ->schema([
                    Forms\Components\DatePicker::make('tanggal')
                    ->label("Tanggal")
                    ->required()
                    ->maxDate(now()),
                    Forms\Components\TextInput::make('no_kpk')
                    ->label("Nomor KPK")
                    ->required(),
                    Forms\Components\TextInput::make('po')
                    ->label("Nomor PO")
                    ->required(),
                ]),
                Grid::make(2)
                ->schema([
                Forms\Components\Select::make('customer_id')
                ->relationship('customer', 'nama')
                ->searchable()
                ->preload()
                ->required(),
                Forms\Components\TextInput::make('attn')
                ->label("Attn"),
                Forms\Components\TextInput::make('proses_makloon')
                ->label("Proses Makloon"),
                Forms\Components\TextInput::make('perihal')
                ->label("Perihal"),
                Forms\Components\TextInput::make('keterangan')
                ->label("Keterangan"),
                Forms\Components\TextInput::make('top')
                ->label("Term Of Payment"),
                ]),
                Grid::make(3)
                ->schema([
                Forms\Components\TextInput::make('delivery')
                ->label("Delivery"),
                Forms\Components\TextInput::make('packing')
                ->label("Packing"),
                Forms\Components\TextInput::make('remarks')
                ->label("Remarks"),
                ]),
            ]),

            Section::make('Tambah Jenis Kain')
            ->schema([
            Repeater::make("Tambah Jenis Kain")
            ->schema([
                Grid::make(4)
                ->schema([
                Forms\Components\TextInput::make('warna')
                ->label("Warna")
                ->required(),
                Forms\Components\TextInput::make('ppn')
                ->label("PPN")
                ->required(),
                Forms\Components\TextInput::make('satuan')
                ->label("Satuan")
                ->required(),
                Forms\Components\TextInput::make('quantity')
                ->label("Jumlah")
                ->required(),
                ]),
            ]),
            ]),
        ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('no_kpk')
                ->label("Nomor KPK")
                ->searchable(),
                Tables\Columns\TextColumn::make('tanggal')
                ->label("Tanggal"),
                Tables\Columns\TextColumn::make('customer.nama')
                ->label("Nama")
                ->searchable(),
                Tables\Columns\TextColumn::make('po')
                ->label("Nomor PO"),
                Tables\Columns\TextColumn::make('delivery')
                ->label("Delivery"),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListKpks::route('/'),
            'create' => Pages\CreateKpk::route('/create'),
            'edit' => Pages\EditKpk::route('/{record}/edit'),
        ];
    }
}
