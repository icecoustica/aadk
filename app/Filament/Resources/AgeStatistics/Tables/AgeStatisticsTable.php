<?php

namespace App\Filament\Resources\AgeStatistics\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AgeStatisticsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('age_group')
                    ->searchable(),
                TextColumn::make('y2018')
                    ->label('2018')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('y2019')
                    ->label('2019')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('y2020')
                ->label('2020')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('y2021')
                ->label('2021')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('y2022')
                ->label('2022')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('y2023')
                ->label('2023')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('y2024')
                ->label('2024')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('y2025')
                ->label('2025')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
