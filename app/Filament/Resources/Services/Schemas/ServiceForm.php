<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\TextInput::make('title')
                    ->required(),
                \Filament\Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                \Filament\Forms\Components\TextInput::make('icon'),
                \Filament\Forms\Components\TextInput::make('order')
                    ->numeric()
                    ->default(0),
            ]);
    }
}
