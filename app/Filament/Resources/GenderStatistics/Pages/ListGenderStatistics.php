<?php

namespace App\Filament\Resources\GenderStatistics\Pages;

use App\Filament\Resources\GenderStatistics\GenderStatisticResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListGenderStatistics extends ListRecords
{
    protected static string $resource = GenderStatisticResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
