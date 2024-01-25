<?php

namespace App\Filament\Resources\JenisKainResource\Pages;

use App\Filament\Resources\JenisKainResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJenisKain extends EditRecord
{
    protected static string $resource = JenisKainResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
