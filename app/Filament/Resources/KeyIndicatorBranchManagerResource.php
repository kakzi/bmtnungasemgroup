<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use App\Models\KeyIndicatorBranchManager;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\KeyIndicatorBranchManagerResource\Pages;
use App\Filament\Resources\KeyIndicatorBranchManagerResource\RelationManagers;

class KeyIndicatorBranchManagerResource extends Resource
{
    protected static ?string $model = KeyIndicatorBranchManager::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Key Performance Indicator';

    protected static ?string $navigationLabel = 'Branch Manager';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
return $form
            ->schema([
                Select::make('user_id')
                    ->label('Nama Santri')
                    ->options(User::where('office_id', auth()->user()->office_id)
                        
                        ->pluck('name', 'id'))
                    ->searchable()
                    ->columnSpanFull(),
                
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
                    ->description('Pencapaian Target angsuran/NPF  Cabang sesuai dengan PK-RAPB 2018 (Wilayah Masing-masing)')
                    ->schema([
                        Select::make('kpi_three')
                                ->label('Key Performance Indicator')
                                ->columnSpanFull()
                                ->options([
                                    '1' => 'Ketika Perolehan Target Angsuran/NPF  cabang < 50%',
                                    '2' => 'Ketika Perolehan Target  Angsuran/NPF  cabang > 50%-70%',
                                    '3' => 'Ketika Perolehan Target  Angsuran/NPF  cabang > 70%-80%',
                                    '4' => 'Ketika perolehan Target  Angsuran/NPF  cabang > 80%-100%',
                                    '5' => 'Ketika Perolahan Target  Angsuran/NPF  cabang > 100 %-110 %',
                                ]),
                        TextInput::make('target_npf')
                                ->label('Target NPF')
                                ->integer()
                                ->required()
                                ->live(),
                        TextInput::make('tercapai_npf')
                                ->label('Tercapai')
                                ->integer()
                                ->required()
                                ->live(),
                        
                    ])
                    ->columns(2),
                Section::make('KPI 4')
                    ->description('Pencapaian Target Pendapatan  Cabang sesuai dengan PK-RAPB 2018 (Wilayah Masing - masing)')
                    ->schema([
                        Select::make('kpi_four')
                                ->label('Key Performance Indicator')
                                ->columnSpanFull()
                                ->options([
                                    '1' => 'Ketika Perolehan Target Pendapatan cabang < 50%',
                                    '2' => 'Ketika Perolehan Target  Pendapatan cabang > 50%-70%',
                                    '3' => 'Ketika Perolehan Target  Pendapatan cabang > 70%-80%',
                                    '4' => 'Ketika perolehan Target  Pendapatan cabang > 80%-100%',
                                    '5' => 'Ketika Perolahan Target  Pendapatan cabang > 100 %-110 %',
                                ]),
                        TextInput::make('target_omset')
                                ->label('Target Omset')
                                ->integer()
                                ->required()
                                ->live(),
                        TextInput::make('tercapai_omset')
                                ->label('Tercapai')
                                ->integer()
                                ->required()
                                ->live(),
                        
                    ])
                    ->columns(2),
                Section::make('KPI 5')
                    ->description('Pencapaian Target Wakaf Cabang sesuai dengan PK-RAPB 2018 (Wilayah Masing - Masing)')
                    ->schema([
                        Select::make('kpi_five')
                                ->label('Key Performance Indicator')
                                ->columnSpanFull()
                                ->options([
                                    '1' => 'Ketika Perolehan Target Wakaf cabang < 50%',
                                    '2' => 'Ketika Perolehan Target  Wakaf cabang > 50%-70%',
                                    '3' => 'Ketika Perolehan Target  Wakaf cabang > 70%-80%',
                                    '4' => 'Ketika perolehan Target  Wakaf cabang > 80%-100%',
                                    '5' => 'Ketika Perolahan Target  Wakaf cabang > 100 %-110 %',
                                ]),
                        TextInput::make('target_wakaf')
                                ->label('Target Wakaf')
                                ->integer()
                                ->required()
                                ->live(),
                        TextInput::make('tercapai_wakaf')
                                ->label('Tercapai')
                                ->integer()
                                ->required()
                                ->live(),
                        
                    ])
                    ->columns(2),
                Section::make('KPI 6')
                    ->description('Pencapaian Target Pendapatan Jasa Cabang sesuai dengan PK-RAPB 2018 (Wilayah Masing - Masing)')
                    ->schema([
                        Select::make('kpi_six')
                                ->label('Key Performance Indicator')
                                ->columnSpanFull()
                                ->options([
                                    '1' => 'Ketika Perolehan Target Pendapatan Jasa cabang < 50%',
                                    '2' => 'Ketika Perolehan Target  Pendapatan Jasa cabang > 50%-70%',
                                    '3' => 'Ketika Perolehan Target  Pendapatan Jasa cabang > 70%-80%',
                                    '4' => 'Ketika perolehan Target  Pendapatan Jasa cabang > 80%-100%',
                                    '5' => 'Ketika Perolahan Target  Pendapatan Jasa cabang > 100 %-110 %',
                                ]),
                        TextInput::make('target_jasa')
                                ->label('Target Jasa')
                                ->integer()
                                ->required()
                                ->live(),
                        TextInput::make('tercapai_jasa')
                                ->label('Tercapai')
                                ->integer()
                                ->required()
                                ->live(),
                        
                    ])
                    ->columns(2),
                Section::make('KPI 7')
                    ->description('Kedisiplinan semua santri pusat dan cabang')
                    ->schema([
                        Select::make('kpi_seven')
                                ->label('Key Performance Indicator')
                                ->columnSpanFull()
                                ->options([
                                    '1' => 'Jika Selalu absen bersama datang dan pulang cabang belum tepat waktu, tidak selalu pakai atribut,dari id card,seragam,kopyah,sepatu, dan penunjang penampilan , pengambilan cuti sesuai dengan rekues dan jadwal dan tidak ada yang bersaamaan dalam 1 cabang dan jumlah telat dan pulang awal dari staf cabang maksimal 2x dalam 1 bulan',
                                    '2' => 'Jika Selalu absen bersama datang dan pulang cabang belum tepat waktu, selalu pakai atribut,dari id card,seragam,kopyah,sepatu, dan penunjang penampilan , pengambilan cuti sesuai dengan rekues dan jadwal dan tidak ada yang bersaamaan dalam 1 cabang dan jumlah telat dan pulang awal dari staf cabang maksimal 2x dalam 1 bulan',
                                    '3' => 'Jika Selalu absen bersama datang dan pulang cabang belum tepat waktu, selalu pakai atribut,dari id card,seragam,kopyah,sepatu, dan penunjang penampilan , pengambilan cuti sesuai dengan rekues dan jadwal dan tidak ada yang bersaamaan dalam 1 cabang dan jumlah telat dan pulang awal dari staf cabang maksimal 1x dalam 1 bulan',
                                    '4' => 'Jika Selalu absen bersama datang dan pulang  cabang tepat waktu, selalu pakai atribut,dari id card,seragam,kopyah,sepatu, dan penunjang penampilan , pengambilan cuti sesuai dengan rekues dan jadwal dan tidak ada yang bersaamaan dalam 1 cabang dan jumlah telat dan pulang awal dari staf cabang maksimal 1x dalam 1 bulan',
                                    '5' => 'Jika Selalu absen bersama datang dan pulang cabang tepat waktu, selalu pakai atribut,dari id card,seragam,kopyah,sepatu, dan penunjang penampilan , pengambilan cuti sesuai dengan rekues dan jadwal dan tidak ada yang bersaamaan dalam 1 cabang dan Tidak Pernah ada yang telat dan pulang awal dari staf cabang',
                                ]),
                            RichEditor::make('notes_seven')
                                ->label('Catatan')
                                ->columnSpanFull()
                        
                    ])
                    ->columns(2),
                Section::make('KPI 8')
                    ->description('Temuan Tentang kecurangan dan Penyelesaian')
                    ->schema([
                        Select::make('kpi_eight')
                                ->label('Key Performance Indicator')
                                ->columnSpanFull()
                                ->options([
                                    '1' => 'Ketika temuan Tentang kecurangan dan Penyelesaian < 50%',
                                    '2' => 'Ketika temuan Tentang kecurangan dan Penyelesaian  > 50%-70%',
                                    '3' => 'Ketika temuan Tentang kecurangan dan Penyelesaian > 70%-80%',
                                    '4' => 'Ketika temuan Tentang kecurangan dan Penyelesaian > 80%-100%',
                                    '5' => 'Ketika temuan Tentang kecurangan dan Penyelesaian  > 100 %-110 %',
                                ]),
                            RichEditor::make('notes_eight')
                                ->label('Catatan')
                                ->columnSpanFull()
                        
                    ])
                    ->columns(2),
                Section::make('KPI 9')
                    ->description('Pelayanan semua karyawan sesuai dengan standart yang di tetapkan')
                    ->schema([
                        Select::make('kpi_nine')
                                ->label('Key Performance Indicator')
                                ->columnSpanFull()
                                ->options([
                                    '1' => 'Setiap bulan ada komplai dari anggota tentang pelayanan, dari hasil sampel penyebaran angket kepuasan kurang dari 50 % anggota yang puas',
                                    '2' => 'Setiap bulan masih ada komplain dari anggota tentang pelayanan, dari hasil sampel penyebaran angket kepuasan 50% anggota yang puas',
                                    '3' => 'Tidak lebih dari 3x dalam 1 tahun ada komplain dari anggota, hasil dari sampel penyebaran angket kepuasan 50-75 % anggota yang puas',
                                    '4' => 'Tidak ada komplain dalam satu tahun, hasil dari penyebaran angket kepuasan 50-75 % anggota yang puas',
                                    '5' => 'Tidak ada komplain dalam satu tahun, hasil dari penyebaran angket kepuasan 100% anggota puas',
                                ]),
                            RichEditor::make('notes_nine')
                                ->label('Catatan')
                                ->columnSpanFull()
                        
                    ])
                    ->columns(2),

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
            'index' => Pages\ListKeyIndicatorBranchManagers::route('/'),
            'create' => Pages\CreateKeyIndicatorBranchManager::route('/create'),
            'edit' => Pages\EditKeyIndicatorBranchManager::route('/{record}/edit'),
        ];
    }
}
