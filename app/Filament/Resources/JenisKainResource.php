<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JenisKainResource\Pages;
use App\Filament\Resources\JenisKainResource\RelationManagers;
use App\Models\JenisKain;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JenisKainResource extends Resource
{
    protected static ?string $model = JenisKain::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('tipe')
                ->label("Tipe")
                ->options([
                    "CT" => "CT",
                    "CVC" => "CVC",
                    "TR" => "TR",
                    "PE" => "PE",
                    "PE/CT" => "PE/CT",
                    "TC" => "TC",

                ]),
                Forms\Components\TextInput::make('jenis')
                ->label("Jenis Kain")
                ->required(),
                Forms\Components\TextInput::make('total_end')
                ->label("Total End"),
                Forms\Components\TextInput::make('no_sisir')
                ->label("No Sisir"),
                Forms\Components\TextInput::make('komposisi')
                ->label("Komposisi"),
                Forms\Components\TextInput::make('no_benang')
                ->label("No Benang")
                ->required(),
                Forms\Components\TextInput::make('anyaman')
                ->label("Anyaman")
                ->required(),
                Forms\Components\TextInput::make('kontruksi_grei')
                ->label("Kontruksi Grei"),
                Forms\Components\TextInput::make('berat_square_grei')
                ->label("Berat Square"),
                Forms\Components\TextInput::make('konstruksi_finished')
                ->label("Kontruksi Finished"),
                Forms\Components\TextInput::make('berat_linier_finished')
                ->label("Berat Linier Finihed"),
                Forms\Components\TextInput::make('berat_square_finished')
                ->label("Berat Square Finished"),
                Forms\Components\TextInput::make('update')
                ->label("Update"),
                Forms\Components\TextInput::make('keterangan')
                ->label("Keterangan"),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tipe')
                ->label("Tipe"),
                Tables\Columns\TextColumn::make('item')
                ->label("Jenis Kain")
                ->searchable(),
                Tables\Columns\TextColumn::make('total_end')
                ->label("Total End"),
                Tables\Columns\TextColumn::make('no_sisir')
                ->label("No Sisir")
                ->searchable(),
                Tables\Columns\TextColumn::make('komposisi')
                ->label("Komposisi"),
                Tables\Columns\TextColumn::make('benang')
                ->label("No Benang")
                ->searchable(),
                Tables\Columns\TextColumn::make('anyaman')
                ->label("Anyaman")
                ->searchable(),
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
            'index' => Pages\ListJenisKains::route('/'),
            'create' => Pages\CreateJenisKain::route('/create'),
            'edit' => Pages\EditJenisKain::route('/{record}/edit'),
        ];
    }
}
