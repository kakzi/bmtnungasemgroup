<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Office;
use Filament\Support\RawJs;
use App\Models\ReportTeller;
use Filament\Resources\Resource;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\IconColumn;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\CheckboxList;
use App\Filament\Resources\ReportTellerResource\Pages;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class ReportTellerResource extends Resource
{
    protected static ?string $model = ReportTeller::class;

    protected static ?string $navigationIcon = 'heroicon-o-fire';
    protected static ?string $navigationLabel = 'Teller';
    protected static ?string $navigationGroup = 'Reports';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Section::make('Data Laporan Keuangan')
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
                    TextInput::make('kas_khasanah')
                        ->label('Kas Khasanah')
                        ->required()
                        ->mask(RawJs::make('$money($input)'))
                        ->stripCharacters(',')
                        ->numeric()
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 3,
                            '2xl' => 3,
                        ]),
                    TextInput::make('uang_real')
                        ->label('Uang Real')
                        ->required()
                        ->mask(RawJs::make('$money($input)'))
                        ->stripCharacters(',')
                        ->numeric()
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 3,
                            '2xl' => 3,
                        ]),
                    TextInput::make('pagu_kas')
                        ->label('Pagu Kas Cabang')
                        ->required()
                        ->mask(RawJs::make('$money($input)'))
                        ->stripCharacters(',')
                        ->numeric()
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 3,
                            '2xl' => 3,
                        ]),
                    TextInput::make('modal_teller')
                        ->label('Modal Teller')
                        ->required()
                        ->mask(RawJs::make('$money($input)'))
                        ->stripCharacters(',')
                        ->numeric()
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 3,
                            '2xl' => 3,
                        ]),
                ]),

                Section::make('Pemasukan')
                        ->columns([
                            'sm' => 2,
                            'xl' => 12,
                            '2xl' => 12,
                        ])
                        ->schema([
                            TextInput::make('simpanan')
                                ->label('Simpanan')
                                ->required()
                                ->mask(RawJs::make('$money($input)'))
                                ->stripCharacters(',')
                                ->numeric()
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 4,
                                    '2xl' => 4,
                                ])
                                ->live(),

                            TextInput::make('deposit')
                                ->label('Deposit')
                                ->required()
                                ->mask(RawJs::make('$money($input)'))
                                ->stripCharacters(',')
                                ->numeric()
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 4,
                                    '2xl' => 4,
                                ])
                                ->live(),

                            TextInput::make('angsuran')
                                ->label('Angsuran')
                                ->required()
                                ->mask(RawJs::make('$money($input)'))
                                ->stripCharacters(',')
                                ->numeric()
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 4,
                                    '2xl' => 4,
                                ])
                                ->live(),

                            TextInput::make('atk')
                                ->label('ATK')
                                ->required()
                                ->mask(RawJs::make('$money($input)'))
                                ->stripCharacters(',')
                                ->numeric()
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 4,
                                    '2xl' => 4,
                                ])
                                ->live(),

                            TextInput::make('materai')
                                ->label('Materai')
                                ->required()
                                ->mask(RawJs::make('$money($input)'))
                                ->stripCharacters(',')
                                ->numeric()
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 4,
                                    '2xl' => 4,
                                ])
                                ->live(),

                            TextInput::make('kas_masuk')
                                ->label('Kas Masuk')
                                ->required()
                                ->mask(RawJs::make('$money($input)'))
                                ->stripCharacters(',')
                                ->numeric()
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 4,
                                    '2xl' => 4,
                                ])
                                ->live(),

                            
                            ]),


                Section::make('Pengeluaran')
                    ->columns([
                        'sm' => 2,
                        'xl' => 12,
                        '2xl' => 12,
                    ])
                    ->schema([
                        TextInput::make('penarikan')
                            ->label('Penarikan')
                            ->required()
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->numeric()
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 3,
                                '2xl' => 3,
                            ]),
                        TextInput::make('pencairan_pembiayaan')
                            ->label('Pencairan Pembiayaan')
                            ->required()
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->numeric()
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 3,
                                '2xl' => 3,
                            ]),
                        TextInput::make('kas_keluar')
                            ->label('Kas Keluar')
                            ->required()
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->numeric()
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 3,
                                '2xl' => 3,
                            ]),
                        TextInput::make('penc_deposito')
                            ->label('Pencairan Deposito')
                            ->required()
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->numeric()
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 3,
                                '2xl' => 3,
                            ]),
                        
                    ]),
                

                Section::make('Prospek dan Penawaran')
                    ->columns([
                        'sm' => 2,
                        'xl' => 12,
                        '2xl' => 12,
                    ])
                    ->schema([
                        Toggle::make('prospek')->default(false)
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 12,
                                '2xl' => 12,
                            ]),

                        CheckboxList::make('layanan')
                            ->label('Layanan BMT NU Ngasem')
                            ->required()
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ])
                            ->options([
                                'atm' => 'Layanan ATM 24 Jam',
                                'mobile' => 'Aplikasi Mobile Anggota',
                                'wa' => 'WhatsApp Notifikasi',
                        
                            ])
                            ->columns(1),
                        CheckboxList::make('p_pembiayaan')
                            ->label('Promo Produk Pembiayaan')
                            ->required()
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ])
                            ->options([
                                'murabahah' => 'Pembiayaan Murabahah',
                                'modal-usaha' => 'Pembiayaan Modal Usaha, Bisnis, dan Investasi',
                                'pertanian' => 'Pembiayaan Modal Pertanian',
                                'pembiayaan' => 'Pembiayaan Multiguna'
                        
                            ])
                            ->columns(1),
                        CheckboxList::make('p_simpanan')
                            ->label('Promo Produk Simpanan')
                            ->required()
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ])
                            ->options([
                                'sinasri' => 'Simpanan Syariah',
                                'sipintar' => 'Simpanan Siswa Pintar',
                                'siharfi' => 'Simpanan Hari Raya Idul Fitri',
                                'sihanum' => 'Simpanan Haji dan Umroh',
                                'siqubah' => 'Simpanan Qurban Barokah',
                                'siperowi' => 'Simpanan Wisata dan ziaroh',
                                'simjaka' => 'Simpanan Berjangka Syariah Berhadiah di Awal',
                        
                            ])
                            ->columns(1),
                    ]),

                    Section::make('Perolehan Prospek dan Penawaran')
                        ->columns([
                            'sm' => 2,  
                            'xl' => 12,
                            '2xl' => 12,
                        ])->schema([
                            TextInput::make('anggota_b_simpanan')
                                ->label('Anggota Baru (Simpanan)')
                                ->required()
                                ->mask(RawJs::make('$money($input)'))
                                ->stripCharacters(',')
                                ->numeric()
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 4,
                                    '2xl' => 4,
                                ]),
                            TextInput::make('anggota_b_pembiayaan')
                                ->label('Anggota Baru (Pembiayaan)')
                                ->required()
                                ->mask(RawJs::make('$money($input)'))
                                ->stripCharacters(',')
                                ->numeric()
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 4,
                                    '2xl' => 4,
                                ]),
                            TextInput::make('aplikasiwa')
                                ->label('Aplikasi dan WA')
                                ->required()
                                ->mask(RawJs::make('$money($input)'))
                                ->stripCharacters(',')
                                ->numeric()
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 4,
                                    '2xl' => 4,
                                ]),
                            TextInput::make('jumlah_slip')
                                ->label('Jumlah Slip')
                                ->required()
                                ->mask(RawJs::make('$money($input)'))
                                ->stripCharacters(',')
                                ->numeric()
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 4,
                                    '2xl' => 4,
                                ]),
                            TextInput::make('jumlah_a_pencairan')
                                ->label('Jumlah Anggota Pencairan')
                                ->required()
                                ->mask(RawJs::make('$money($input)'))
                                ->stripCharacters(',')
                                ->numeric()
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 4,
                                    '2xl' => 4,
                                ]),
                            TextInput::make('jumlah_visit')
                                ->label('Jumlah Anggota ke Kantor')
                                ->required()
                                ->mask(RawJs::make('$money($input)'))
                                ->stripCharacters(',')
                                ->numeric()
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 4,
                                    '2xl' => 4,
                                ]),
                    ]),

                Section::make('Promo Sosial Media')
                    ->columns([
                        'sm' => 2,
                        'xl' => 12,
                        '2xl' => 12,
                    ])->schema([
                        Toggle::make('update_media')->default(false)
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 6,
                            '2xl' => 6,
                        ]),

                    FileUpload::make('file_update_medsos')
                        ->label('Upload Bukti Promo Medsos')
                        ->directory('report-teller')
                        ->image()
                        ->optimize('webp')
                        ->required()
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 6,
                            '2xl' => 6,
                        ]),
                    ]),
                Section::make('Update Jaminan')
                    ->columns([
                        'sm' => 2,
                        'xl' => 12,
                        '2xl' => 12,
                    ])->schema([
                        Toggle::make('update_jaminan')->default(false)
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 6,
                            '2xl' => 6,
                        ]),

                        FileUpload::make('file_update_jaminan')
                        ->label('Upload Bukti Update Jaminan')
                        ->directory('report-teller')
                        ->required()
                        ->image()
                        ->optimize('webp')
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 6,
                            '2xl' => 6,
                        ]),
                    ]),
                Section::make('Upload Dokumen/File')
                    ->columns([
                        'sm' => 2,
                        'xl' => 12,
                        '2xl' => 12,
                    ])->schema([
                        
                        FileUpload::make('file_slip_penarikan')
                            ->label('Upload Slip Penarikan')
                            ->directory('report-teller')
                            ->required()
                            ->multiple()
                            ->image()
                            ->optimize('webp')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ]),
                        FileUpload::make('file_kas_keluar')
                            ->label('Upload Kas Keluar')
                            ->directory('report-teller')
                            ->image()
                            ->optimize('webp')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ]),
                        FileUpload::make('file_kas_opname')
                            ->label('Upload Kas Opname')
                            ->directory('report-teller')
                            ->required()
                            ->image()
                            ->optimize('webp')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ]),
                        FileUpload::make('file_portofolio')
                            ->label('Upload Portofolio')
                            ->directory('report-teller')
                            ->required()
                            ->image()
                            ->optimize('webp')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ]),
                        FileUpload::make('file_bp_st_agunan')
                            ->label('Upload Buku Pencairan & Serah Terima Agunan')
                            ->directory('report-teller')
                            ->required()
                            ->image()
                            ->optimize('webp')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ]),
                        FileUpload::make('file_s_brankas')
                            ->label('Upload Sirkulasi Brankas')
                            ->directory('report-teller')
                            ->required()
                            ->image()
                            ->optimize('webp')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ]),
                        FileUpload::make('file_simpok')
                            ->label('Upload Simpanan Pokok')
                            ->directory('report-teller')
                            ->required()
                            ->image()
                            ->optimize('webp')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ]),
                        FileUpload::make('file_d_anggota')
                            ->label('Upload Buku Daftar Anggota')
                            ->directory('report-teller')
                            ->required()
                            ->image()
                            ->optimize('webp')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ]),
                        FileUpload::make('file_mutasi')
                            ->label('Upload Mutasi Transaksi Harian')
                            ->directory('report-teller')
                            ->required()
                            ->image()
                            ->optimize('webp')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ]),
                        FileUpload::make('file_buku_serah_terima')
                            ->label('Upload Buku Serah Terima')
                            ->directory('report-teller')
                            ->image()
                            ->optimize('webp')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ]),
                        FileUpload::make('file_data_simjakasya')
                            ->label('Upload Data Simjakasya')
                            ->directory('report-teller')
                            ->image()
                            ->optimize('webp')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ]),
                    ]),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('make_by')->label('Laporan')->searchable(),
                Tables\Columns\TextColumn::make('kas_khasanah')->money('IDR', locale: 'id'),
                IconColumn::make('check_bm')
                    ->label('BM')
                    ->boolean()
                    ->tooltip('Approved by BM')
                    ->trueIcon('heroicon-o-check-badge')
                    ->falseIcon('heroicon-o-x-mark'),
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
                // Tables\Columns\TextColumn::make('total'),
                // Add more columns as needed
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
                    ->action(function (ReportTeller $record) {
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReportTellers::route('/'),
            'create' => Pages\CreateReportTeller::route('/create'),
            'edit' => Pages\EditReportTeller::route('/{record}/edit'),
        ];
    }
}