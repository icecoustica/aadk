<?php

namespace App\Filament\Resources\GenderStatistics\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;

class GenderStatisticForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('gender')
                    ->label('Jantina')
                    ->options([
                        'Lelaki' => 'Lelaki',
                        'Perempuan'  => 'Perempuan',
                    ])
                    ->searchable()
                 ->unique()
                    ->required(),


                TextInput::make('2018')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('2019')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('2020')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('2021')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('2022')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('2023')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('2024')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('2025')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
