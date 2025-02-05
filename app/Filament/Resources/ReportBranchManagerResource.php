<?php

namespace App\Filament\Resources;

use Carbon\Carbon;
use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Office;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Support\RawJs;
use App\Models\ReportTeller;
use App\Models\ReportMarketing;
use Filament\Resources\Resource;
use App\Models\ReportBranchManager;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Checkbox;
use Filament\Tables\Columns\IconColumn;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ReportBranchManagerResource\Pages;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use App\Filament\Resources\ReportBranchManagerResource\RelationManagers;

class ReportBranchManagerResource extends Resource
{
    protected static ?string $model = ReportBranchManager::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-pie';
    protected static ?string $navigationGroup = 'Reports';
    protected static ?string $navigationLabel = 'Branch Manager';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Data Laporan Branch Manager')
                    ->columns([
                        'sm' => 2,
                        'xl' => 12,
                        '2xl' => 12,
                    ])
                    ->schema([
                        Hidden::make('office_id')
                            ->label('Kode Kantor')
                            ->default(function (): string{
                                $office = Office::where('id', auth()->user()->office_id)->first();
                                    return $office->id;
                                }
                            )->columnSpan([
                                'sm' => 2,
                                'xl' => 6,
                                '2xl' => 6,
                            ]),
                        Hidden::make('make_by')
                            ->label('Data ini di Buat oleh ')
                            ->default(auth()->user()->name)
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 6,
                                '2xl' => 6,
                            ]),
                        Hidden::make('user_id')
                            ->label('Data ini di Buat oleh ')
                            ->default(auth()->user()->id)
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 6,
                                '2xl' => 6,
                            ]),
                        
                        
                        TextInput::make('kas')
                            ->label('Kas')
                            ->required()
                            ->numeric()
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ]),
                        TextInput::make('penempatan_kantor')
                            ->label('Penempatan Kantor Lain')
                            ->required()
                            ->numeric()
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ]),
                        TextInput::make('simpanan')
                            ->label('Simpanan')
                            ->required()
                            ->numeric()
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ]),
                        TextInput::make('deposito')
                            ->label('Deposito')
                            ->required()
                            ->numeric()
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 3,
                                '2xl' => 3,
                            ]),
                        TextInput::make('simpanan_khusus')
                            ->label('Simpanan Khusus')
                            ->required()
                            ->numeric()
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 3,
                                '2xl' => 3,
                            ]),
                        TextInput::make('pembiayaan')
                            ->label('Pembiayaan')
                            ->required()
                            ->numeric()
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 3,
                                '2xl' => 3,
                            ]),
                        TextInput::make('rahn')
                            ->label('Rahn')
                            ->required()
                            ->numeric()
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 3,
                                '2xl' => 3,
                            ]),
                        TextInput::make('ijarah')
                            ->label('Ijarah')
                            ->required()
                            ->numeric()
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 3,
                                '2xl' => 3,
                            ]),
                        TextInput::make('murabahah')
                            ->label('Murabahah')
                            ->required()
                            ->numeric()
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 3,
                                '2xl' => 3,
                            ]),
                        TextInput::make('kafalah')
                            ->label('Kafalah')
                            ->required()
                            ->numeric()
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 3,
                                '2xl' => 3,
                            ]),
                        TextInput::make('qardh')
                            ->label('Qardh')
                            ->required()
                            ->numeric()
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 3,
                                '2xl' => 3,
                            ]),
                        TextInput::make('aset')
                            ->label('Aset')
                            ->required()
                            ->numeric()
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ]),
                        TextInput::make('omset')
                            ->label('Omset')
                            ->required()
                            ->numeric()
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ]),
                        TextInput::make('shu')
                            ->label('SHU')
                            ->required()
                            ->numeric()
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ]),
                        ]),
                    Section::make('Checklist')
                        ->columns([
                            'sm' => 2,
                            'xl' => 12,
                            '2xl' => 12,
                        ])
                        ->schema([
                            Toggle::make('update_bantuan')
                                ->label('Update Bantuan')
                                ->required()
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 3,
                                    '2xl' => 3,
                                ]),
                            Toggle::make('pendampingan')
                                ->label('Pendampingan')
                                ->required()
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 3,
                                    '2xl' => 3,
                                ]),
                            Toggle::make('briefing')
                                ->label('Briefing')
                                ->required()
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 3,
                                    '2xl' => 3,
                                ]),
                            Toggle::make('attribute')
                                ->label('Attribute/Seragam Santri')
                                ->required()
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 3,
                                    '2xl' => 3,
                                ]),

                            Select::make('checklist_teller')
                                ->label('Laporan Teller')
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 6,
                                    '2xl' => 6,
                                ])
                                ->required()
                                ->multiple()
                                ->live()
                                ->options(
                                    
                                    ReportTeller::with('users')
                                        ->where('office_id', auth()->user()->office_id)
                                        ->whereDate('created_at', today())
                                        ->get()
                                        ->pluck('users.name', 'id')
                                )
                                ->searchable(),
                            Select::make('checklist_marketing')
                                ->label('Laporan Marketing')
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 6,
                                    '2xl' => 6,
                                ])
                                ->required()
                                ->multiple()
                                ->live()
                                ->options(
                                    
                                    ReportMarketing::with('users')
                                        ->where('office_id', auth()->user()->office_id)
                                        ->whereDate('created_at', today())
                                        ->get()
                                        ->pluck('users.name', 'id')
                                )
                                ->searchable(),
                        ]),

                    Section::make('Data Penagihan')
                        ->columns([
                            'sm' => 2,
                            'xl' => 12,
                            '2xl' => 12,
                        ])
                        ->schema([
                            Toggle::make('penagihan')->default(false)
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 12,
                                    '2xl' => 12,
                                ]),
                            TextInput::make('lancar')
                                ->label('Lancar')
                                ->required()
                                ->numeric()
                                ->mask(RawJs::make('$money($input)'))
                                ->stripCharacters(',')
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 4,
                                    '2xl' => 4,
                                ]),
                            TextInput::make('dpk')
                                ->label('DPK')
                                ->required()
                                ->numeric()
                                ->mask(RawJs::make('$money($input)'))
                                ->stripCharacters(',')
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 4,
                                    '2xl' => 4,
                                ]),
                            TextInput::make('kuranglancar')
                                ->label('Kurang Lancar')
                                ->required()
                                ->numeric()
                                ->mask(RawJs::make('$money($input)'))
                                ->stripCharacters(',')
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 4,
                                    '2xl' => 4,
                                ]),
                            TextInput::make('diragukan')
                                ->label('Di Ragukan')
                                ->required()
                                ->numeric()
                                ->mask(RawJs::make('$money($input)'))
                                ->stripCharacters(',')
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 4,
                                    '2xl' => 4,
                                ]),
                            TextInput::make('macet')
                                ->label('Macet')
                                ->required()
                                ->numeric()
                                ->mask(RawJs::make('$money($input)'))
                                ->stripCharacters(',')
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 4,
                                    '2xl' => 4,
                                ]),
                            FileUpload::make('file_foto_penagihan')
                                ->label('Upload Bukti Foto Penagihan')
                                ->required()
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 4,
                                    '2xl' => 4,
                                ]),
                        ]),     
                    Section::make('File Dokumentasi yang harus dikirim')
                        ->columns([
                            'sm' => 2,
                            'xl' => 12,
                            '2xl' => 12,
                        ])
                        ->schema([
                            FileUpload::make('file_pendampingan')
                                ->label('Upload Bukti Foto Pendampingan')
                                ->directory('report-bm')
                                ->required()
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 4,
                                    '2xl' => 4,
                                ]),
                            FileUpload::make('file_akad')
                                ->label('Upload Foto Akad')
                                ->directory('report-bm')
                                ->required()
                                ->multiple()
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 4,
                                    '2xl' => 4,
                                ]),
                            FileUpload::make('file_ttd_akad')
                                ->label('Upload TTD Berkas Akad')
                                ->directory('report-bm')
                                ->required()
                                ->multiple()
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 4,
                                    '2xl' => 4,
                                ]),
                            FileUpload::make('file_cek_fisik_brankas')
                                ->label('Upload Cek Fisik Brankas')
                                ->directory('report-bm')
                                ->required()
                                ->multiple()
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 4,
                                    '2xl' => 4,
                                ]),
                            
                            FileUpload::make('file_dokumentasi_briefing')
                                ->label('Upload Foto Briefing/Evaluasi')
                                ->directory('report-bm')
                                ->required()
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 4,
                                    '2xl' => 4,
                                ]),
                            FileUpload::make('file_notulensi')
                                ->label('Upload Foto Notulen')
                                ->directory('report-bm')
                                ->required()
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 4,
                                    '2xl' => 4,
                                ]),
                            
                            FileUpload::make('file_tabarru_nota')
                                ->label('Upload Foto Nota Penggunanaan Tabarru')
                                ->directory('report-bm')
                                ->required()
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 4,
                                    '2xl' => 4,
                                ]),
                            FileUpload::make('file_kebersihan')
                                ->label('Upload Foto Kebersihan')
                                ->directory('report-bm')
                                ->required()
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 4,
                                    '2xl' => 4,
                                ]),
                            FileUpload::make('file_update_medsos')
                                ->label('Upload Foto Update Medsos')
                                ->directory('report-bm')
                                ->required()
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 4,
                                    '2xl' => 4,
                                ]),
                            RichEditor::make('catatan_khusus')
                                ->label('Catatan')
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 12,
                                    '2xl' => 12,
                                ])
                            
                        ]),     

                        Section::make('Data Transport Jarak')
                        ->columns([
                            'sm' => 2,
                            'xl' => 12,
                            '2xl' => 12,
                        ])->schema([
                            TextInput::make('km_harian')
                                ->label('KM Harian')
                                ->required()
                                ->numeric()
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 4,
                                    '2xl' => 4,
                                ]),
                            TextInput::make('wilayah')
                                ->label('Wilayah')
                                ->required()
                                ->numeric()
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 4,
                                    '2xl' => 4,
                                ]),
                            
                            FileUpload::make('foto_tarikan')
                                ->label('Upload Bukti Foto Pendampingan Terjauh')
                                ->directory('report-marketing')
                                ->required()
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 4,
                                    '2xl' => 4,
                                ]),
                            
                    ]),
                    Section::make('Pernyataan Kejujuran santri')
                        ->columns([
                            'sm' => 2,
                            'xl' => 12,
                            '2xl' => 12,
                        ])->schema([
                            Checkbox::make('kejujuran')->label('Saya mengirimkan data ini dengan sadar dan sejujur - jujurnya')->default(false)
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 12,
                                    '2xl' => 12,
                                ]),
                            
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('make_by')->label('Laporan')->searchable(),
                Tables\Columns\TextColumn::make('kas')->money('IDR', locale: 'id'),
                
                IconColumn::make('check_rm')
                    ->label('RM')
                    ->boolean()
                    ->tooltip('Approved by RM')
                    ->trueIcon('heroicon-o-check-badge')
                    ->falseIcon('heroicon-o-x-mark'),
                IconColumn::make('check_s')
                    ->label('SF')
                    ->boolean()
                    ->tooltip('Checked by Staff')
                    ->trueIcon('heroicon-o-check-badge')
                    ->falseIcon('heroicon-o-x-mark'),
                IconColumn::make('check_m')
                    ->label('MR')
                    ->boolean()
                    ->tooltip('Approved by Manager')
                    ->trueIcon('heroicon-o-check-badge')
                    ->falseIcon('heroicon-o-x-mark'),
                IconColumn::make('check_as')
                    ->label('AD')
                    ->boolean()
                    ->tooltip('Approved by Asdir')
                    ->trueIcon('heroicon-o-check-badge')
                    ->falseIcon('heroicon-o-x-mark'),
                IconColumn::make('check_dir')
                    ->label('DR')
                    ->boolean()
                    ->tooltip('Approved by Direktur')
                    ->trueIcon('heroicon-o-check-badge')
                    ->falseIcon('heroicon-o-x-mark'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->color('info')
                        ->button() // Makes the action a button
                    ->extraAttributes([
                        'class' => 'bg-blue-500 hover:bg-blue-600 text-white font-bold  rounded-full',
                    ]),
                Tables\Actions\ViewAction::make()
                    ->color('warning')
                        ->button() // Makes the action a button
                    ->extraAttributes([
                        'class' => 'bg-blue-500 hover:bg-blue-600 text-white font-bold  rounded-full',
                    ]),
                Tables\Actions\DeleteAction::make()
                    ->color('danger')
                        ->button() // Makes the action a button
                    ->extraAttributes([
                        'class' => 'bg-blue-500 hover:bg-blue-600 text-white font-bold  rounded-full',
                    ]),
                Tables\Actions\Action::make('customAction')
                    ->label('Validate')
                    ->icon('heroicon-o-check-badge')
                    ->action(function (ReportBranchManager $record) {
                        $id = auth()->user()->id;
                        $check = User::with('roles')->where('id', $id)->first();
                        if($check->roles[0]->name == 'Staff') {
                            $record->update(['check_s' => true]);
                            Notification::make()
                                ->title('Laporan sudah di check!')
                                ->success()
                                ->send();
                        } else if($check->roles[0]->name == 'Branch Manager') {
                            $record->update(['check_bm' => true]);
                            Notification::make()
                                ->title('Laporan sudah di check!')
                                ->success()
                                ->send();
                        } else if($check->roles[0]->name == 'Regional Manager') {
                            $record->update(['check_rm' => true]);
                            Notification::make()
                                ->title('Laporan sudah di check!')
                                ->success()
                                ->send();
                        } else if($check->roles[0]->name == 'Manager') {
                            $record->update(['check_rm' => true]);
                            Notification::make()
                                ->title('Laporan sudah di check!')
                                ->success()
                                ->send();
                        } else if($check->roles[0]->name == 'Asisten Direktur Utama') {
                            $record->update(['check_as' => true]);
                            Notification::make()
                                ->title('Laporan sudah di check!')
                                ->success()
                                ->send();
                        } else if($check->roles[0]->name == 'Direktur Utama') {
                            $record->update(['check_dir' => true]);
                            Notification::make()
                                ->title('Laporan sudah di check!')
                                ->success()
                                ->send();
                        }
                    
                        // Redirect to WhatsApp link (or open it in a new tab)
                        // return redirect()->away($whatsappUrl); 
                    })
                    ->requiresConfirmation() // Add confirmation dialog if needed
                    ->color('primary')
                    ->button() // Makes the action a button
                    ->extraAttributes([
                        'class' => 'bg-blue-500 hover:bg-blue-600 text-white font-bold rounded-full',
                    ])
            ])

            ->modifyQueryUsing(function (Builder $query) { 
                $id = auth()->user()->id;
                $check = User::with('roles')->where('id', $id)->first();
                if($check->roles[0]->name == 'Staff') {
                    return $query;
                } else if($check->roles[0]->name == 'Branch Manager') {
                    return $query->where('office_id', auth()->user()->office_id);
                } else if($check->roles[0]->name == 'Regional Manager') {
                    return $query->where('office_id', auth()->user()->office_id);
                } else if($check->roles[0]->name == 'Manager') {
                    return $query;
                } else if($check->roles[0]->name == 'Asisten Direktur Utama') {
                    return $query;
                } else if($check->roles[0]->name == 'Direktur Utama') {
                    return $query;
                } else if($check->roles[0]->name == 'Teller') {
                    return $query->where('office_id', auth()->user()->office_id)->where('make_by', auth()->user()->name);
                } else if($check->roles[0]->name == 'Marketing') {
                    return $query->where('office_id', auth()->user()->office_id)->where('make_by', auth()->user()->name);
                } else {
                    return $query;
                }
            })
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
            'index' => Pages\ListReportBranchManagers::route('/'),
            'create' => Pages\CreateReportBranchManager::route('/create'),
            'edit' => Pages\EditReportBranchManager::route('/{record}/edit'),
        ];
    }
}
