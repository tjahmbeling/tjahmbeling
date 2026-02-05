<?php

namespace App\Filament\Clusters\Settings\Resources\Websites\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Tabs\Tab;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class WebsiteForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Tabs')
                    ->tabs([
                        Tab::make('Info Meta')
                            ->schema([
                                TextInput::make('meta_title')->label('Nama Website')->placeholder('Masukkan Nama Website'),
                                Textarea::make('meta_description')->label('Deskripsi Website')->rows(3)
                                    ->placeholder('Masukkan Deskripsi Website'),
                                FileUpload::make('meta_favicon')
                                    ->label('Logo Website')
                                    ->disk('public')
                                    ->directory('web')
                                    ->getUploadedFileNameForStorageUsing(
                                        fn(TemporaryUploadedFile $file): string => 'favicon_' . date('His_dmY') . '.' . pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION)
                                    )
                                    ->openable()
                                    ->downloadable()
                                    // ->image()
                                    ->imageEditor()
                                    ->imageEditorAspectRatios([
                                        '16:9',
                                        '4:3',
                                        '1:1',
                                    ])
                            ]),
                        Tab::make('Info Website')
                            ->schema([
                                Grid::make(1)
                                    ->schema([
                                        TextInput::make('address')->label('Alamat')
                                            ->placeholder('Masukkan Alamat'),
                                        // TextInput::make('tahun_berdiri')->label('Tahun Berdiri')
                                        //     ->type('number')->placeholder('Masukkan Tahun Berdiri Masjid'),
                                    ]),
                                // TextInput::make('link_maps')->label('Link Maps')
                                //     ->placeholder('Masukkan Link Maps Masjid')
                                //     ->afterStateHydrated(function ($component, $state) {
                                //         // Kalau mau pratinjau nanti
                                //     })
                                //     ->dehydrateStateUsing(function ($state) {
                                //         // Ambil src dari iframe kalau perlu
                                //         preg_match('/src="([^"]+)"/', $state, $matches);
                                //         return $matches[1] ?? $state;
                                //     })
                                //     ->columnSpanFull(),
                                Grid::make(2)
                                    ->schema([
                                        TextInput::make('email')->label('Email')->placeholder('Masukkan Email'),
                                        TextInput::make('phone')->label('Kontak')->type('number')->placeholder('Masukkan Nomor Whatsapp'),
                                    ]),
                            ]),
                        Tab::make('Info Sosmed')
                            ->schema([
                                Repeater::make('sosmed')
                                    ->label('Sosial Media')
                                    ->collapsible() // ✅ aktifkan collapse
                                    ->collapsed()   // ✅ default dalam keadaan tertutup
                                    ->itemLabel(
                                        fn(array $state): ?string =>
                                        $state['name'] ?? 'Sosial Media'
                                    ) // ✅ judul tiap item saat collapse
                                    ->schema([
                                        Grid::make(2)
                                            ->schema([
                                                TextInput::make('name')
                                                    ->label('Nama Sosial Media')
                                                    ->placeholder('Facebook, Instagram, dll')
                                                    ->required(),

                                                Toggle::make('is_active')
                                                    ->label('Aktifkan')
                                                    ->default(false),
                                            ]),

                                        TextInput::make('icon')
                                            ->label('Icon Sosial Media')
                                            ->placeholder('bi bi-facebook'),

                                        TextInput::make('link')
                                            ->label('Link Sosial Media')
                                            ->url()
                                            ->placeholder('https://facebook.com/...'),
                                    ]),
                            ])
                    ])
            ]);
    }
}
