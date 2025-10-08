<?php

namespace App\Filament\Resources\DrugStatistics;

use App\Filament\Resources\DrugStatistics\Pages\CreateDrugStatistic;
use App\Filament\Resources\DrugStatistics\Pages\EditDrugStatistic;
use App\Filament\Resources\DrugStatistics\Pages\ListDrugStatistics;
use App\Filament\Resources\DrugStatistics\Schemas\DrugStatisticForm;
use App\Filament\Resources\DrugStatistics\Tables\DrugStatisticsTable;
use App\Models\DrugStatistic;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum; // ✅ penting — import UnitEnum

class DrugStatisticResource extends Resource
{
    protected static ?string $model = DrugStatistic::class;
    
    protected static string|BackedEnum|null $navigationIcon = Heroicon::GlobeAsiaAustralia;
     protected static ?string $navigationLabel = 'Statistik Negeri';
    protected static ?string $slug = 'drug-statistics';
     protected static UnitEnum|string|null $navigationGroup = '📊 Kadar Penyalahgunaan Dadah';

 




    public static function form(Schema $schema): Schema
    {
        return DrugStatisticForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DrugStatisticsTable::configure($table);
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
            'index' => ListDrugStatistics::route('/'),
            'create' => CreateDrugStatistic::route('/create'),
            'edit' => EditDrugStatistic::route('/{record}/edit'),
        ];
    }
}
