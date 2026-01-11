<?php

namespace App\Filament\Resources\JumlahKeseluruhans;

use App\Filament\Resources\JumlahKeseluruhans\Pages\CreateJumlahKeseluruhan;
use App\Filament\Resources\JumlahKeseluruhans\Pages\EditJumlahKeseluruhan;
use App\Filament\Resources\JumlahKeseluruhans\Pages\ListJumlahKeseluruhans;
use App\Filament\Resources\JumlahKeseluruhans\Schemas\JumlahKeseluruhanForm;
use App\Filament\Resources\JumlahKeseluruhans\Tables\JumlahKeseluruhansTable;
use App\Models\JumlahKeseluruhan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum; // ✅ penting — import UnitEnum

class JumlahKeseluruhanResource extends Resource
{
    protected static ?string $model = JumlahKeseluruhan::class;
    protected static ?string $recordTitleAttribute = 'Jumlah Keseluruhan';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedChartBar;
    protected static ?string $navigationLabel = 'Jumlah Keseluruhan';
    protected static UnitEnum|string|null $navigationGroup = '📊 Kadar Penyalahgunaan Dadah';
    protected static ?int $navigationSort = 1;




    public static function form(Schema $schema): Schema
    {
        return JumlahKeseluruhanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return JumlahKeseluruhansTable::configure($table);
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
            'index' => ListJumlahKeseluruhans::route('/'),
            'create' => CreateJumlahKeseluruhan::route('/create'),
            'edit' => EditJumlahKeseluruhan::route('/{record}/edit'),
        ];
    }
}
