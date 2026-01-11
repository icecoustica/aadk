<?php

namespace App\Filament\Resources\JumlahKeseluruhans\Pages;

use App\Filament\Resources\JumlahKeseluruhans\JumlahKeseluruhanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListJumlahKeseluruhans extends ListRecords
{
    protected static string $resource = JumlahKeseluruhanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
