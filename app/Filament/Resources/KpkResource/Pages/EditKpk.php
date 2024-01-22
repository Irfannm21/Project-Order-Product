<?php

namespace App\Filament\Resources\KpkResource\Pages;

use App\Filament\Resources\KpkResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKpk extends EditRecord
{
    protected static string $resource = KpkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
