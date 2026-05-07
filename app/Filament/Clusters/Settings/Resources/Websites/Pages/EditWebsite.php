<?php

namespace App\Filament\Clusters\Settings\Resources\Websites\Pages;

use App\Filament\Clusters\Settings\Resources\Websites\WebsiteResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditWebsite extends EditRecord
{
    protected static string $resource = WebsiteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // DeleteAction::make(),
        ];
    }
}
