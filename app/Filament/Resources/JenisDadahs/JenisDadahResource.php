<?php

namespace App\Filament\Resources\JenisDadahs;

use App\Filament\Resources\JenisDadahs\Pages\CreateJenisDadah;
use App\Filament\Resources\JenisDadahs\Pages\EditJenisDadah;
use App\Filament\Resources\JenisDadahs\Pages\ListJenisDadahs;
use App\Filament\Resources\JenisDadahs\Schemas\JenisDadahForm;
use App\Filament\Resources\JenisDadahs\Tables\JenisDadahsTable;
use App\Models\JenisDadah;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum; // ✅ penting — import UnitEnum

class JenisDadahResource extends Resource
{
    protected static ?string $model = JenisDadah::class;
    protected static ?string $recordTitleAttribute = 'Jenis Dadah';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBeaker;
    protected static ?string $navigationLabel = 'Jenis Dadah';
    protected static UnitEnum|string|null $navigationGroup = '📊 Kadar Penyalahgunaan Dadah';
    protected static ?int $navigationSort = 5;
    protected static ?string $pluralModelLabel = 'Jenis Dadah';
    protected static ?string $modelLabel = 'Jenis Dadah';



    public static function form(Schema $schema): Schema
    {
        return JenisDadahForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return JenisDadahsTable::configure($table);
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
            'index' => ListJenisDadahs::route('/'),
            'create' => CreateJenisDadah::route('/create'),
            'edit' => EditJenisDadah::route('/{record}/edit'),
        ];
    }
}
