<?php

namespace App\Filament\Resources\JumlahKeseluruhans\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;

class JumlahKeseluruhanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                  TextInput::make('y2018')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('y2019')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('y2020')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('y2021')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('y2022')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('y2023')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('y2024')
                    ->required()
                    ->numeric()
                    ->default(0),
           
            ]);
    }
}
