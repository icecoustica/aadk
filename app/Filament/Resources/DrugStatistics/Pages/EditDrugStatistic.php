<?php

namespace App\Filament\Resources\DrugStatistics\Pages;

use App\Filament\Resources\DrugStatistics\DrugStatisticResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDrugStatistic extends EditRecord
{
    protected static string $resource = DrugStatisticResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
