<?php

namespace App\Filament\Resources\Images\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;

class ImageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                 TextInput::make('title')->label('Title')->nullable(),
                FileUpload::make('image_path')
                    ->label('Upload Image')
    ->image()
    ->disk('public') // <--- INI PALING PENTING
    ->directory('uploads/images')
    ->visibility('public')
    ->required(),
            ]);
    }
}
