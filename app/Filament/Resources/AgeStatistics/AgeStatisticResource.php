<?php

namespace App\Filament\Resources\AgeStatistics;

use App\Filament\Resources\AgeStatistics\Pages\CreateAgeStatistic;
use App\Filament\Resources\AgeStatistics\Pages\EditAgeStatistic;
use App\Filament\Resources\AgeStatistics\Pages\ListAgeStatistics;
use App\Filament\Resources\AgeStatistics\Schemas\AgeStatisticForm;
use App\Filament\Resources\AgeStatistics\Tables\AgeStatisticsTable;
use App\Models\AgeStatistic;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum; // ✅ penting — import UnitEnum

class AgeStatisticResource extends Resource
{
    protected static ?string $model = AgeStatistic::class;

      protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserGroup;
     protected static ?string $navigationLabel = 'Statistik Umur';
    protected static ?string $slug = 'age-statistics';
     protected static UnitEnum|string|null $navigationGroup = '📊 Kadar Penyalahgunaan Dadah';




    public static function form(Schema $schema): Schema
    {
        return AgeStatisticForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AgeStatisticsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAgeStatistics::route('/'),
            'create' => CreateAgeStatistic::route('/create'),
            'edit' => EditAgeStatistic::route('/{record}/edit'),
        ];
    }
}
