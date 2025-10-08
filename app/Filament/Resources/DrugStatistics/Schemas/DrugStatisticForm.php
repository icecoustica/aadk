<?php

namespace App\Filament\Resources\DrugStatistics\Schemas;

use Filament\Forms\Components\Grid;
use Filament\Forms; // penting!
use Filament\Forms\Form;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section;
use App\Models\DrugStatistic;

class DrugStatisticForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('state')
                   ->label('Negeri')
                    ->options([
                    'Johor' => 'Johor',
                    'Kedah' => 'Kedah',
                    'Kelantan' => 'Kelantan',
                    'Melaka' => 'Melaka',
                    'Negeri Sembilan' => 'Negeri Sembilan',
                    'Pahang' => 'Pahang',
                    'Perak' => 'Perak',
                    'Perlis' => 'Perlis',
                    'Pulau Pinang' => 'Pulau Pinang',
                    'Sabah' => 'Sabah',
                    'Sarawak' => 'Sarawak',
                    'Selangor' => 'Selangor',
                    'Terengganu' => 'Terengganu',
                    'Kuala Lumpur' => 'Kuala Lumpur',
                    'Labuan' => 'Labuan',
                    'Putrajaya' => 'Putrajaya',
                ])
                 ->searchable()
                 ->unique()
                ->required(),
                
                 TextInput::make('year_2018')
                ->label('2018')
                ->default(0)
                ->numeric(),
                
                TextInput::make('year_2019')
                ->label('2019')
                ->default(0)
                ->numeric(), 

                TextInput::make('year_2020')
                ->label('2020')
                ->default(0)
                ->numeric(), 

                TextInput::make('year_2021')
                ->label('2021')
                ->default(0)
                ->numeric(), 

                TextInput::make('year_2022')
                ->label('2022')
                ->default(0)
                ->numeric(),
                
                TextInput::make('year_2023')
                ->label('2023')
               ->default(0)
                ->numeric(), 

                TextInput::make('year_2024')
                ->label('2024')
              ->default(0)
                ->numeric(), 

                TextInput::make('year_2025')
                ->label('2025')
                ->default(0)
                ->numeric(), 
                 
            ]);
    }
}
