<?php

namespace App\Filament\Clusters\Settings\Resources\Abouts;

use App\Filament\Clusters\Settings\Resources\Abouts\Pages;
use App\Filament\Clusters\Settings\SettingsCluster;
use App\Models\About;
use BackedEnum;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class AboutResource extends Resource
{
    protected static ?string $model = About::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::User;

    protected static ?string $cluster = SettingsCluster::class;

    protected static ?string $navigationLabel = 'Tentang';

    protected static ?string $pluralLabel = 'Tentang';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('title')
                    ->required(),
                Forms\Components\TextInput::make('subtitle'),

                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\Repeater::make('details')
                    ->schema([
                        Forms\Components\TextInput::make('label')->required(),
                        Forms\Components\TextInput::make('value')->required(),
                        Forms\Components\TextInput::make('link')->nullable(),
                    ])
                    ->columns(3)
                    ->columnSpanFull(),
                Forms\Components\Repeater::make('skills')
                    ->schema([
                        Forms\Components\TextInput::make('name')->required(),
                        Forms\Components\TextInput::make('percentage')->numeric()->required(),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
                Forms\Components\Repeater::make('hobbies')
                    ->schema([
                        Forms\Components\TextInput::make('name')->required(),
                        Forms\Components\TextInput::make('icon'),
                        Forms\Components\ColorPicker::make('color'),
                    ])
                    ->columns(3)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('subtitle'),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAbouts::route('/'),
            'create' => Pages\CreateAbout::route('/create'),
            'edit' => Pages\EditAbout::route('/{record}/edit'),
        ];
    }
}
