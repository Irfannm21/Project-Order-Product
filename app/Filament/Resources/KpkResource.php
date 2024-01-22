<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KpkResource\Pages;
use App\Filament\Resources\KpkResource\RelationManagers;
use App\Models\Kpk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KpkResource extends Resource
{
    protected static ?string $model = Kpk::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('tanggal')
                ->label("Tanggal")
                ->required()
                ->maxDate(now()),
                Forms\Components\TextInput::make('po')
                ->label("Nomor PO")
                ->required(),
                Forms\Components\Select::make('customer_id')
                ->relationship('customer', 'nama')
                ->searchable()
                ->preload()
                ->required(),
                Forms\Components\TextInput::make('jenis')
                ->label("Jenis")
                ->required(),
                Forms\Components\TextInput::make('harga')
                ->label("Harga")
                ->numeric()
                ->prefix('Rp')
                ->required(),
                Forms\Components\Select::make('harga_perukuran')
                ->label("Harga Perukuran")
                ->options([
                    "M" => "M",
                    "KG" => "KG",
                ]),
                Forms\Components\TextInput::make('ppn')
                ->label("Pajak PPN")
                ->required(),
                Forms\Components\TextInput::make('proses')
                ->label("Proses"),
                Forms\Components\TextInput::make('quantity')
                ->label("Quantity"),
                Forms\Components\Select::make('ukuran_satuan')
                ->label("Harga Perukuran")
                ->options([
                    "MTR" => "MTR",
                    "BALL" => "BALL",
                ]),
                Forms\Components\TextInput::make('warna')
                ->label("Warna")
                ->required(),
                Forms\Components\TextInput::make('remarks')
                ->label("Remarks"),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
