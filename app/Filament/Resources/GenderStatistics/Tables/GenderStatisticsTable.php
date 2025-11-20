<?php

namespace App\Filament\Resources\GenderStatistics\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class GenderStatisticsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('gender')
                    ->searchable(),
                TextColumn::make('2018')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('2019')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('2020')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('2021')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('2022')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('2023')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('2024')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('2025')
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
