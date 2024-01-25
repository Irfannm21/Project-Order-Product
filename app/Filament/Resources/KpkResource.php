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

    protected static ?string $navigationGroup = 'Marketing';
    public static function getNavigationLabel(): string
        {
            return 'Data KPK';
        }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('no_kpk')
                ->label("Nomor KPK")
                ->required(),
                Forms\Components\DatePicker::make('tanggal')
                ->label("Tanggal")
                ->required()
                ->maxDate(now()),
                Forms\Components\Select::make('customer_id')
                ->relationship('customer', 'nama')
                ->searchable()
                ->preload()
                ->required(),
                Forms\Components\TextInput::make('attn')
                ->label("Attn"),
                Forms\Components\TextInput::make('po')
                ->label("Nomor PO")
                ->required(),
                Forms\Components\TextInput::make('perihal')
                ->label("Perihal"),
                Forms\Components\TextInput::make('proses_makloon')
                ->label("Proses Makloon"),
                Forms\Components\TextInput::make('keterangan')
                ->label("Keterangan"),
                Forms\Components\TextInput::make('top')
                ->label("Term Of Payment"),
                Forms\Components\TextInput::make('delivery')
                ->label("Delivery"),
                Forms\Components\TextInput::make('packing')
                ->label("Packing"),
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
