<?php

namespace App\Filament\Resources\DrugStatistics\Pages;

use App\Filament\Resources\DrugStatistics\DrugStatisticResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDrugStatistics extends ListRecords
{
    protected static string $resource = DrugStatisticResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
