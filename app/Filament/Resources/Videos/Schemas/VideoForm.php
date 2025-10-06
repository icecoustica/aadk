<?php

namespace App\Filament\Resources\Videos\Schemas;
use Filament\Forms\Components\TextInput;

use Filament\Schemas\Schema;

class VideoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                 TextInput::make('title')
                ->label('Title')
                ->required(),
            TextInput::make('youtube_url')
                ->label('YouTube URL')
                ->required()
                ->url(),   // Validate UR
            ]);
    }
}
