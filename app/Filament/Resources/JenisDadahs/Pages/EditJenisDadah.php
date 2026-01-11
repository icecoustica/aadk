<?php

namespace App\Filament\Resources\JenisDadahs\Pages;

use App\Filament\Resources\JenisDadahs\JenisDadahResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditJenisDadah extends EditRecord
{
    protected static string $resource = JenisDadahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
