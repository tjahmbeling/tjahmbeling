<?php

namespace App\Filament\Clusters\Settings\Resources\Resumes\Pages;

use App\Filament\Clusters\Settings\Resources\Resumes\ResumeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditResume extends EditRecord
{
    protected static string $resource = ResumeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
