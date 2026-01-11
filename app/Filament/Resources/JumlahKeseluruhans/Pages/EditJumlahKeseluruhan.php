<?php

namespace App\Filament\Resources\JumlahKeseluruhans\Pages;

use App\Filament\Resources\JumlahKeseluruhans\JumlahKeseluruhanResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditJumlahKeseluruhan extends EditRecord
{
    protected static string $resource = JumlahKeseluruhanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}
}
