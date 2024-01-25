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
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;


class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Marketing';
    public static function form(Form $form): Form
    {

        return $form
        ->schema([
            Section::make('Data Perusahaan')
            ->schema([
            Grid::make(3)
            ->schema([
                Forms\Components\Select::make('bu')
                ->label("BU")
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
                ->label("Name")
                ->required(),
                Forms\Components\TextInput::make('npwp')
                ->label("Number NPWP"),
                Forms\Components\TextInput::make('kpk1')
                ->required()
                ->label("Name KPK 1"),
                Forms\Components\TextInput::make('kpk2')
                ->label("Name KPK 2"),
                Forms\Components\TextInput::make('email')
                ->label("OFfice Email")
                ->email(),
                Forms\Components\TextInput::make('telepon_kantor')
                ->label("Office Phone"),
                Forms\Components\Textarea::make('alamat_kantor')
                ->label("Office Address")
                ->required(),
                Forms\Components\TextInput::make('kota')
                ->required()
                ->label("City"),
            ]),
        ]),
                Section::make('PIC Contact ')
                ->schema([
                Grid::make(3)
                ->schema([
                    Forms\Components\TextInput::make('pic1')
                    ->required()
                    ->label("Name PIC 1"),
                    Forms\Components\TextInput::make('pic_phone1')
                    ->required()
                    ->label("PIC Phone 1"),
                    Forms\Components\TextInput::make('pic_email1')
                    ->label("PIC Email 1"),
                    Forms\Components\TextInput::make('pic2')
                    ->label("Name PIC 2"),
                    Forms\Components\TextInput::make('pic_phone2')
                    ->label("PIC Phone 2"),
                    Forms\Components\TextInput::make('pic_email2')
                    ->label("PIC Email 2"),
                    Forms\Components\TextInput::make('pic3')
                    ->label("Name PIC 3"),
                    Forms\Components\TextInput::make('pic_phone3')
                    ->label("PIC Phone 3"),
                    Forms\Components\TextInput::make('pic_email3')
                    ->label("PIC Email 3"),
                ]),
            ]),
            Section::make('Sent Addres')
                ->schema([
                Grid::make(1)
                ->schema([
                    Forms\Components\Textarea::make('alamat_kirim1')
                    ->label("Send Address 1")
                    ->maxLength(65535)
                    ->required()
                    ->columnSpan('full'),
                    Forms\Components\Textarea::make('alamat_kirim2')
                    ->label("Send Address 2")
                    ->maxLength(65535)
                    ->columnSpan('full'),
                    Forms\Components\Textarea::make('alamat_kirim3')
                    ->label("Send Address 3")
                    ->maxLength(65535)
                    ->columnSpan('full'),
                ]),
            ]),
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
                Tables\Columns\TextColumn::make('email')
                ->label("No NPWP"),
                Tables\Columns\TextColumn::make('pic1')
                ->label("PIC"),
                Tables\Columns\TextColumn::make('pic_phone1')
                ->label("Kontak PIC"),
                Tables\Columns\TextColumn::make('pic_email1')
                ->label("Email PIC"),
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
