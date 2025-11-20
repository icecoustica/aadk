<?php

namespace App\Filament\Resources\AgeStatistics\Pages;

use App\Filament\Resources\AgeStatistics\AgeStatisticResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAgeStatistic extends EditRecord
{
    protected static string $resource = AgeStatisticResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
