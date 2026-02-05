<?php

namespace App\Filament\Clusters\Settings\Resources\Resumes;

use App\Filament\Clusters\Settings\Resources\Resumes\Pages;
use App\Filament\Clusters\Settings\SettingsCluster;
use App\Models\Resume;
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

class ResumeResource extends Resource
{
    protected static ?string $model = Resume::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::AcademicCap;

    protected static ?string $cluster = SettingsCluster::class;

    protected static ?string $navigationLabel = 'Riwayat';

    protected static ?string $pluralLabel = 'Riwayat';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\Select::make('category')
                    ->options([
                        'summary' => 'Ringkasan',
                        'education' => 'Pendidikan',
                        'experience' => 'Pengalaman Kerja',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('title')
                    ->required(),
                Forms\Components\TextInput::make('period'),
                Forms\Components\TextInput::make('subtitle'),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\Repeater::make('details')
                    ->schema([
                        Forms\Components\TextInput::make('item')->required(),
                    ])
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('order')
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('category')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'summary' => 'warning',
                        'education' => 'success',
                        'experience' => 'info',
                    }),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('period'),
                Tables\Columns\TextColumn::make('order')
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->options([
                        'summary' => 'Ringkasan',
                        'education' => 'Pendidikan',
                        'experience' => 'Pengalaman Kerja',
                    ]),
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('order', 'asc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListResumes::route('/'),
            'create' => Pages\CreateResume::route('/create'),
            'edit' => Pages\EditResume::route('/{record}/edit'),
        ];
    }
}
