<?php

namespace App\Filament\Resources\Ratings\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class RatingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('article_id')
                    ->required()
                    ->numeric(),
                TextInput::make('rating')
                    ->required()
                    ->numeric(),
                TextInput::make('ip_address'),
            ]);
    }
}
