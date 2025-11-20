<?php

namespace App\Filament\Resources\AgeStatistics\Pages;

use App\Filament\Resources\AgeStatistics\AgeStatisticResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAgeStatistics extends ListRecords
{
    protected static string $resource = AgeStatisticResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
