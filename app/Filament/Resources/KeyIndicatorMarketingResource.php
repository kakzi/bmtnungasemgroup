<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Models\KeyIndicatorMarketing;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\KeyIndicatorMarketingResource\Pages;
use App\Filament\Resources\KeyIndicatorMarketingResource\RelationManagers;

class KeyIndicatorMarketingResource extends Resource
{
    protected static ?string $model = KeyIndicatorMarketing::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    
    protected static ?string $navigationGroup = 'Key Performance Indicator';

    protected static ?string $navigationLabel = 'Marketing';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Select::make('user_id')
                ->label('Nama Marketing')
                ->options(User::where('office_id', auth()->user()->office_id)
                    // ->where('career_id', 7)
                    ->pluck('name', 'id'))
                ->searchable()
                ->columnSpanFull(),

            // TextInput::make('indicator_one')
            //     ->label('Bobot % KPI 1')
            //     ->numeric()
            //     ->default(20)
            //     ->readOnly(),

            Section::make('KPI 1')
                ->description('Pencapaian Target Funding  Cabang sesuai dengan PK-RAPB (Wilayah Masing-masing)')
                ->schema([
                    Select::make('kpi_one')
                            ->label('Key Performance Indicator')
                            ->columnSpanFull()
                            ->options([
                                '1' => 'Ketika Perolehan Target funding < 50%',
                                '2' => 'Ketika Perolehan Target funding cabang > 50%-70%',
                                '3' => 'Ketika Perolehan Target funding cabang > 70%-80%',
                                '4' => 'Ketika perolehan Target Funding cabang > 80%-100%',
                                '5' => 'Ketika Perolahan target funding cabang > 100 %',
                            ]),
                    TextInput::make('target_funding')
                            ->label('Target Funding')
                            ->integer()
                            ->required()
                            ->live(),
                    TextInput::make('tercapai_funding')
                            ->label('Tercapai')
                            ->integer()
                            ->required()
                            ->live(),
                    
                ])
                ->columns(2),
            Section::make('KPI 2')
                ->description('Pencapaian Target landing, angsuran, NPF sesuai dengan PK-RAPB 2018(Wilayah Masing-masing)')
                ->schema([
                    Select::make('kpi_two')
                            ->label('Key Performance Indicator')
                            ->columnSpanFull()
                            ->options([
                                '1' => 'Ketika Perolehan Target landing, angsuran, NPF  < 50%',
                                '2' => 'Ketika Perolehan Target landing, angsuran, NPF cabang > 50%-70%',
                                '3' => 'Ketika Perolehan Target landing, angsuran, NPF cabang > 70%-80%',
                                '4' => 'Ketika perolehan Target landing, angsuran, NPF cabang > 80%-100%',
                                '5' => 'Ketika Perolahan target landing, angsuran, NPF cabang > 100 %',
                            ]),
                    TextInput::make('target_landing')
                            ->label('Target Landing')
                            ->integer()
                            ->required()
                            ->live(),
                    TextInput::make('tercapai_landing')
                            ->label('Tercapai')
                            ->integer()
                            ->required()
                            ->live(),
                    
                ])
                ->columns(2),
            Section::make('KPI 3')
                ->description('Penacapaian Target Aktifasi aplikasi dan notifikasi')
                ->schema([
                    Select::make('kpi_three')
                            ->label('Key Performance Indicator')
                            ->columnSpanFull()
                            ->options([
                                '1' => 'Pencapaian Target Aktifasi (Aplikasi,Notifikasi, dll) Cabang Kurang dari 50%',
                                '2' => 'Pencapaian Target Aktifasi (Aplikasi, Notifikasi, dll) Cabang > 50%-70%',
                                '3' => 'Pencapaian Target Aktifasi Aplikasi, Notifikasi, dll) Cabang > 70%-80%',
                                '4' => 'Pencapaian Target Aktifasi  (Aplikasi, Notifikasi, dll) Cabang > 80%-100%',
                                '5' => 'Pencapaian Target Aktifasi plikasi, Notifikasi, dll)  Cabang  > 100 %',
                            ]),
                    TextInput::make('target_notif')
                            ->label('Target Notifikasi')
                            ->integer()
                            ->required()
                            ->live(),
                    TextInput::make('tercapai_notif')
                            ->label('Tercapai')
                            ->integer()
                            ->required()
                            ->live(),
                    TextInput::make('target_aplikasi')
                            ->label('Target Aplikasi')
                            ->integer()
                            ->required()
                            ->live(),
                    TextInput::make('tercapai_aplikasi')
                            ->label('Tercapai')
                            ->integer()
                            ->required()
                            ->live(),
                    
                ])
                ->columns(2),
            Section::make('KPI 4')
                ->description('Kedisiplinan Santri')
                ->schema([
                    Select::make('kpi_four')
                        ->label('Key Performance Indicator')
                        ->options([
                            '1' => 'ijin lebih dari 3 kali (sakit atau kepentingan yang lain) dalam 1 bulan dan atau pulang awal lebih dari 3 kali atau telat lebih dari 3 kali dalam 1 bulan',
                            '2' => 'ijin 3 kali (sakit atau kepentingan yang lain) dalam 1 bulan dan atau pulang awal 3 kali atau telat 3 kali dalam 1 bulan',
                            '3' => 'ijin 2 kali (sakit atau kepentingan yang lain) dalam 1 bulan pulang awal 2 kali atau telat 2 kali dalam 1 bulan',
                            '4' => 'ijin 1 kali (sakit atau kepentingan yang lain) dalam 1 bulan dan atau pulang awal 1 kali atau telat 1 kali dalam 1 bulan',
                            '5' => 'jika tidak pernah ijin tidak masuk (sakit atau kepentingan yang lain) dalam 1 bulan dan atau tidak pernah pulang awal dan tidak pernah telat  dalam 1 bulan',
                        ])->columnSpanFull(),
                    RichEditor::make('notes_four')
                            ->label('Catatan')
                            ->columnSpanFull()
                    
                ])
                ->columns(2),
            Section::make('KPI 5')
                ->description('Standart Pelayanan Marketing')
                ->schema([
                    Select::make('kpi_five')
                        ->label('Key Performance Indicator')
                        ->options([
                           '1' => 'ada komplain lebih dari 3 kali dalam satu bulan, hasil dari penyebaran pelayanan, dari hasil sampel penyebaran angket kepuasan kurang dari 50 % anggota yang puas',
                            '2' => 'ada komplain 3 kali dalam satu bulan, hasil dari penyebaran pelayanan, dari hasil sampel penyebaran angket kepuasan 50% anggota yang puas',
                            '3' => 'ada komplain 2 kali dalam satu bulan, hasil dari penyebaran hasil dari sampel penyebaran angket kepuasan 50-75 % anggota yang puas',
                            '4' => 'ada komplain 1 kali dalam satu bulan, hasil dari penyebaran angket kepuasan 50-75 % anggota yang puas',
                            '5' => 'tidak ada komplain dalam satu bulan, hasil dari penyebaran angket kepuasan 100% anggota puas',
                        ])->columnSpanFull(),
                    RichEditor::make('notes_five')
                            ->label('Catatan')
                            ->columnSpanFull()
                    
                ])
                ->columns(2),
            Section::make('KPI 6')
                ->description('Pemahaman Produk - Produk Simpanan dan Pinjaman')
                ->schema([
                    Select::make('kpi_six')
                        ->label('Key Performance Indicator')
                        ->options([
                            '1' => 'Ketika pemahaman semua produk kurang (simpanan atau pinjaman)dan tidak pernah klosing semua',
                            '2' => 'Ketika pemahaman produk sebanyak kurang dari 5  produk (simpanan dan pinjaman) dan pernah klosing semua',
                            '3' => 'Ketika pemahaman produk sebanyak 5-8  produk (simpanan dan pinjaman) dan pernah klosing semua',
                            '4' => 'Ketika pemahaman produk sebanyak 8-10  produk (simpanan dan pinjaman) dan pernah klosing semua',
                            '5' => 'Ketika pemahaman produk lebih dari 10 produk (simpanan dan pinjaman) dan pernah klosing semua',
                        ])->columnSpanFull(),
                    RichEditor::make('notes_six')
                            ->label('Catatan')
                            ->columnSpanFull()
                    
                ])->columns(2),
            Section::make('Catatan Santri')
                ->description('Catatan khusus santri (jika ada)')
                ->schema([
                    RichEditor::make('description')
                            ->label('Catatan')
                            ->columnSpanFull()
                    
                ])
                ->columns(2),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name'),
                TextColumn::make('total'),
                TextColumn::make('rata-rata')
                    ->formatStateUsing(fn ($state) => number_format($state, 2)),
                TextColumn::make('nilai_akhir')
                    ->label('Nilai Akhir')
                    ->badge()
                    ->colors([
                        'success' => 'Marketing A',
                        'primary' => 'Marketing B',
                        'warning' => 'Marketing C',
                        'danger' => 'Marketing D',
                        'secondary' => 'Marketing E',
                    ]),
                TextColumn::make('description')->label('Catatan')->html(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKeyIndicatorMarketings::route('/'),
            'create' => Pages\CreateKeyIndicatorMarketing::route('/create'),
            'edit' => Pages\EditKeyIndicatorMarketing::route('/{record}/edit'),
        ];
    }
}
