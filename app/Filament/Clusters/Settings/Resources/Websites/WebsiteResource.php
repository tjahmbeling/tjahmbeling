<?php

namespace App\Filament\Clusters\Settings\Resources\Websites;

use App\Filament\Clusters\Settings\Resources\Websites\Pages\CreateWebsite;
use App\Filament\Clusters\Settings\Resources\Websites\Pages\EditWebsite;
use App\Filament\Clusters\Settings\Resources\Websites\Pages\ListWebsites;
use App\Filament\Clusters\Settings\Resources\Websites\Schemas\WebsiteForm;
use App\Filament\Clusters\Settings\Resources\Websites\Tables\WebsitesTable;
use App\Filament\Clusters\Settings\SettingsCluster;
use App\Models\Website;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class WebsiteResource extends Resource
{
    protected static ?string $model = Website::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::GlobeAlt;

    protected static ?string $cluster = SettingsCluster::class;

    public static function form(Schema $schema): Schema
    {
        return WebsiteForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return WebsitesTable::configure($table);
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
            'index' => ListWebsites::route('/'),
            'create' => CreateWebsite::route('/create'),
            'edit' => EditWebsite::route('/{record}/edit'),
        ];
    }
}
