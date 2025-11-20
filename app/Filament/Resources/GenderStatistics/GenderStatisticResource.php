<?php

namespace App\Filament\Resources\GenderStatistics;

use App\Filament\Resources\GenderStatistics\Pages\CreateGenderStatistic;
use App\Filament\Resources\GenderStatistics\Pages\EditGenderStatistic;
use App\Filament\Resources\GenderStatistics\Pages\ListGenderStatistics;
use App\Filament\Resources\GenderStatistics\Schemas\GenderStatisticForm;
use App\Filament\Resources\GenderStatistics\Tables\GenderStatisticsTable;
use App\Models\GenderStatistic;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum; // ✅ penting — import UnitEnum

class GenderStatisticResource extends Resource
{
    protected static ?string $model = GenderStatistic::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUser;
     protected static ?string $navigationLabel = 'Statistik Jantina';
    protected static ?string $slug = 'gender-statistics';
     protected static UnitEnum|string|null $navigationGroup = '📊 Kadar Penyalahgunaan Dadah';

    public static function form(Schema $schema): Schema
    {
        return GenderStatisticForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GenderStatisticsTable::configure($table);
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
            'index' => ListGenderStatistics::route('/'),
            'create' => CreateGenderStatistic::route('/create'),
            'edit' => EditGenderStatistic::route('/{record}/edit'),
        ];
    }
}
