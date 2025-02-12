<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Office;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Support\RawJs;
use App\Models\ReportMarketing;
use Filament\Resources\Resource;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Checkbox;
use Filament\Tables\Columns\IconColumn;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\CheckboxList;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ReportMarketingResource\Pages;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use App\Filament\Resources\ReportMarketingResource\RelationManagers;

class ReportMarketingResource extends Resource
{
    protected static ?string $model = ReportMarketing::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    protected static ?string $navigationGroup = 'Reports';

    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'Marketing';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Data Laporan Marketing')
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
                        
                        
                        TextInput::make('modal')
                            ->label('Modal Awal Hari')
                            ->required()
                            ->numeric()
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ]),
                        TextInput::make('anggota')
                            ->label('Berapa Anggota')
                            ->required()
                            ->numeric()
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ]),
                        TextInput::make('funding')
                            ->label('Funding')
                            ->required()
                            ->numeric()
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ]),
                        TextInput::make('landing')
                            ->label('Landing')
                            ->required()
                            ->numeric()
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 3,
                                '2xl' => 3,
                            ]),
                        TextInput::make('pendapatan')
                            ->label('Pendapatan')
                            ->required()
                            ->numeric()
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 3,
                                '2xl' => 3,
                            ]),
                        TextInput::make('nominal_npf')
                            ->label('Jumlah NPF')
                            ->required()
                            ->numeric()
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 3,
                                '2xl' => 3,
                            ]),
                        TextInput::make('jumlah_npf')
                            ->label('Berapa Anggota NPF')
                            ->required()
                            ->numeric()
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 3,
                                '2xl' => 3,
                            ]),
                        TextInput::make('simpanan')
                            ->label('Simpanan')
                            ->required()
                            ->numeric()
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 3,
                                '2xl' => 3,
                            ]),
                        TextInput::make('slip_simpanan')
                            ->label('Berapa Slip')
                            ->required()
                            ->numeric()
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 3,
                                '2xl' => 3,
                            ]),
                        TextInput::make('penarikan')
                            ->label('Penarikan')
                            ->required()
                            ->numeric()
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 3,
                                '2xl' => 3,
                            ]),
                        TextInput::make('slip_penarikan')
                            ->label('Slip Penarikan')
                            ->required()
                            ->numeric()
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 3,
                                '2xl' => 3,
                            ]),
                        TextInput::make('angsuran')
                            ->label('Angsuran')
                            ->required()
                            ->numeric()
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 3,
                                '2xl' => 3,
                            ]),
                        TextInput::make('pokok')
                            ->label('Angsuran Pokok')
                            ->required()
                            ->numeric()
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 3,
                                '2xl' => 3,
                            ]),
                        TextInput::make('ujroh')
                            ->label('Angsuran Ujroh')
                            ->required()
                            ->numeric()
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 3,
                                '2xl' => 3,
                            ]),
                        TextInput::make('slip_angsuran')
                            ->label('Slip Angsuran')
                            ->required()
                            ->numeric()
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 3,
                                '2xl' => 3,
                            ]),
                        FileUpload::make('file_slip_penarikan')
                            ->label('Upload Bukti Slip Penarikan')
                            ->directory('report-marketing')
                            ->required()
                            ->image()
                            ->optimize('webp')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 6,
                                '2xl' => 6,
                            ]),
                        FileUpload::make('file_kas_opname')
                            ->label('Upload Bukti Kas Opname')
                            ->directory('report-marketing')
                            ->required()
                            ->image()
                            ->optimize('webp')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 6,
                                '2xl' => 6,
                            ]),
                        FileUpload::make('file_transaksi')
                            ->label('Upload Bukti Mutasi Transaksi')
                            ->directory('report-marketing')
                            ->required()
                            ->image()
                            ->optimize('webp')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 6,
                                '2xl' => 6,
                            ]),
                        FileUpload::make('file_form_modal')
                            ->label('Upload Bukti Form Modal')
                            ->directory('report-marketing')
                            ->required()
                            ->image()
                            ->optimize('webp')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 6,
                                '2xl' => 6,
                            ]),
                        
                        ]),
                Section::make('Data Penagihan')
                    ->columns([
                        'sm' => 2,
                        'xl' => 12,
                        '2xl' => 12,
                    ])
                    ->schema([
                        Toggle::make('penagihan')->default(false)
                            ->label('Penagihan')
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
                            ->directory('report-marketing')
                            ->required()
                            ->image()
                            ->optimize('webp')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
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
                                    'xl' => 3,
                                    '2xl' => 3,
                                ]),
                            TextInput::make('anggota_b_pembiayaan')
                                ->label('Anggota Baru (Pembiayaan)')
                                ->required()
                                ->mask(RawJs::make('$money($input)'))
                                ->stripCharacters(',')
                                ->numeric()
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 3,
                                    '2xl' => 3,
                                ]),
                            TextInput::make('aplikasiwa')
                                ->label('Aplikasi dan WA')
                                ->required()
                                ->mask(RawJs::make('$money($input)'))
                                ->stripCharacters(',')
                                ->numeric()
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 3,
                                    '2xl' => 3,
                                ]),
                            TextInput::make('jumlah_slip')
                                ->label('Jumlah Slip')
                                ->required()
                                ->mask(RawJs::make('$money($input)'))
                                ->stripCharacters(',')
                                ->numeric()
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 3,
                                    '2xl' => 3,
                                ]),

                            FileUpload::make('file_foto_penawaran')
                                ->label('Upload Bukti Foto Penawaran')
                                ->directory('report-marketing')
                                ->required()
                                ->image()
                                ->optimize('webp')
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

                            FileUpload::make('file_medsos')
                                ->label('Upload Bukti Promo Medsos')
                                ->directory('report-marketing')
                                ->required()
                                ->image()
                                ->optimize('webp')
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 6,
                                    '2xl' => 6,
                                ]),
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
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 4,
                                    '2xl' => 4,
                                ]),
                            
                            FileUpload::make('foto_tarikan')
                                ->label('Upload Bukti Foto Tarikan Terjauh')
                                ->directory('report-marketing')
                                ->required()
                                ->image()
                                ->optimize('webp')
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
                Tables\Columns\TextColumn::make('funding')->money('IDR', locale: 'id'),
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
                    ->action(function (ReportMarketing $record) {
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
            'index' => Pages\ListReportMarketings::route('/'),
            'create' => Pages\CreateReportMarketing::route('/create'),
            'edit' => Pages\EditReportMarketing::route('/{record}/edit'),
        ];
    }
}
