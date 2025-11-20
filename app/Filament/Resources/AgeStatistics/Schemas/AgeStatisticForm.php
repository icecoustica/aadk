<?php

namespace App\Filament\Resources\AgeStatistics\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;

class AgeStatisticForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

           

               Select::make('age_group')
                    ->label('Age Group')
                    ->options([
                        'Kanak-Kanak (bawah 12 tahun)' => 'Kanak-Kanak (bawah 12 tahun)',
                        'Remaja (13 hingga 18 tahun)'      => 'Remaja (13 hingga 18 tahun)',
                        'Belia (19 hingga 39 tahun)'       => 'Belia (19 hingga 39 tahun)',
                        'Dewasa (atas 40 tahun)'      => 'Dewasa (atas 40 tahun)',
                        'Tiada maklumat'       => 'Tiada maklumat',
                    ])
                    ->searchable()
                 ->unique()
                    ->required(),



                TextInput::make('y2018')
                ->label('2018')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('y2019')
                ->label('2019')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('y2020')
                ->label('2020')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('y2021')
                ->label('2021')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('y2022')
                ->label('2022')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('y2023')
                ->label('2023')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('y2024')
                ->label('2024')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('y2025')
                ->label('2025')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
