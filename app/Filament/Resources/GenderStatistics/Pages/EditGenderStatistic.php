<?php

namespace App\Filament\Resources\GenderStatistics\Pages;

use App\Filament\Resources\GenderStatistics\GenderStatisticResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditGenderStatistic extends EditRecord
{
    protected static string $resource = GenderStatisticResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
