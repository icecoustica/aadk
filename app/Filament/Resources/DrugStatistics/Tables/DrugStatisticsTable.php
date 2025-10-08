<?php

namespace App\Filament\Resources\DrugStatistics\Tables;

use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DrugStatisticsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('state')->label('Negeri')->sortable()->searchable(),

                TextColumn::make('year_2018')->label('2018')->numeric()->sortable(),
                TextColumn::make('year_2019')->label('2019')->numeric()->sortable(),
                TextColumn::make('year_2020')->label('2020')->numeric()->sortable(),
                TextColumn::make('year_2021')->label('2021')->numeric()->sortable(),
                TextColumn::make('year_2022')->label('2022')->numeric()->sortable(),
                TextColumn::make('year_2023')->label('2023')->numeric()->sortable(),
                TextColumn::make('year_2024')->label('2024')->numeric()->sortable(),
                TextColumn::make('year_2025')->label('2025')->numeric()->sortable(),
            ])
            ->defaultSort('state', 'asc')
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }
}
