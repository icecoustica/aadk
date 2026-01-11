<?php

namespace App\Filament\Resources\JenisDadahs\Pages;

use App\Filament\Resources\JenisDadahs\JenisDadahResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListJenisDadahs extends ListRecords
{
    protected static string $resource = JenisDadahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
