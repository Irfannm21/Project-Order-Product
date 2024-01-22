<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Filament\Resources\CustomerResource\RelationManagers;
use App\Models\Customer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('bu')
                ->label("Badan Usaha")
                ->options([
                    "PT" => "PT",
                    "CV" => "CV",
                    "Koperasi" => "Koperasi",
                    "BUMN" => "BUMN",
                    "Perum" => "Perum",
                    "BUMS" => "BUMS",
                    "PO" => "PO",
                    "Firma" => "Firma",
                ]),
                Forms\Components\TextInput::make('nama')
                ->label("Nama Buyer")
                ->required(),
                Forms\Components\TextInput::make('npwp')
                ->label("Nomor NPWP"),
                Forms\Components\TextInput::make('up')
                ->label("Untuk Perhatian"),
                Forms\Components\TextInput::make('kontak')
                ->required()
                ->label("Nomor Kontak"),
                Forms\Components\TextInput::make('email')
                ->label("Email")
                ->email(),
                Forms\Components\Textarea::make('alamat_kantor')
                ->label("Alamat Kantor")
                ->required()
                ->maxLength(65535)
                ->columnSpan('full'),
                Forms\Components\Textarea::make('alamat_kirim')
                ->label("Alamat Kirim")
                ->maxLength(65535)
                ->required()
                ->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('bu')
                ->label("Badan Usaha")
                ->searchable(),
                Tables\Columns\TextColumn::make('nama')
                ->label("Nama")
                ->searchable(),
                Tables\Columns\TextColumn::make('npwp')
                ->label("No NPWP"),
                Tables\Columns\TextColumn::make('up')
                ->label("UP"),
                Tables\Columns\TextColumn::make('kontak')
                ->label("Kontak"),
                Tables\Columns\TextColumn::make('email'),
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
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}
