<?php

namespace App\Filament\Clusters\Settings\Resources\Resumes\Pages;

use App\Filament\Clusters\Settings\Resources\Resumes\ResumeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListResumes extends ListRecords
{
    protected static string $resource = ResumeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
