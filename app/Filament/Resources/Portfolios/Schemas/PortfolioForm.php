<?php

namespace App\Filament\Resources\Portfolios\Schemas;

use Filament\Schemas\Schema;

class PortfolioForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\TextInput::make('title')
                    ->required(),
                \Filament\Forms\Components\Select::make('category')
                    ->options([
                        'filter-app' => 'Fotografi',
                        'filter-card' => 'Ilustrasi',
                        'filter-web' => 'Web Sederhana',
                    ])
                    ->required(),
                \Filament\Forms\Components\FileUpload::make('image')
                    ->image()
                    ->directory('portfolio'),
                \Filament\Forms\Components\TextInput::make('link'),
                \Filament\Forms\Components\TextInput::make('order')
                    ->numeric()
                    ->default(0),
            ]);
    }
}
