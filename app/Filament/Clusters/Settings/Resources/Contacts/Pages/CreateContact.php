<?php

namespace App\Filament\Clusters\Settings\Resources\Contacts\Pages;

use App\Filament\Clusters\Settings\Resources\Contacts\ContactResource;
use Filament\Resources\Pages\CreateRecord;

class CreateContact extends CreateRecord
{
    protected static string $resource = ContactResource::class;
}
