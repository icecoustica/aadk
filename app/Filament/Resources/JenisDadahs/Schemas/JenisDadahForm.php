<?php

namespace App\Filament\Resources\JenisDadahs\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

class JenisDadahForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                
                
                   Select::make('jenis_dadah')
                    ->label('Jenis Dadah')
                    ->options([
                        'Amphetamine-type stimulants (ATS)' => 'Amphetamine-type stimulants (ATS)',
                        'Opiat'      => 'Opiat',
                        'Ganja'       => 'Ganja',
                        'Lain-lain'      => 'Lain-lain',
                        'Pil Psikotropik'       => 'Pil Psikotropik',
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
            ]);
    }
}
