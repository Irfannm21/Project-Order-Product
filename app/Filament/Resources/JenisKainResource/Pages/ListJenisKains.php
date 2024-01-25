<?php

namespace App\Filament\Resources\JenisKainResource\Pages;

use App\Filament\Resources\JenisKainResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJenisKains extends ListRecords
{
    protected static string $resource = JenisKainResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
