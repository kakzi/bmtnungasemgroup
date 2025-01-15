<?php

namespace App\Filament\Resources;

use Carbon\Carbon;
use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Office;
use Filament\Forms\Set;
use Filament\Forms\Form;
use App\Models\Permohonan;
use Filament\Tables\Table;
use Filament\Support\RawJs;
use App\Models\JenisPembiayaan;
use App\Models\PeriodeAngsuran;
use App\Models\RegisterAnggota;
use Filament\Resources\Resource;
use Awcodes\TableRepeater\Header;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\CheckboxList;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Awcodes\TableRepeater\Components\TableRepeater;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PermohonanResource\Pages;
use App\Filament\Resources\PermohonanResource\RelationManagers;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use App\Filament\Resources\PermohonanResource\Pages\EditPermohonan;
use App\Filament\Resources\PermohonanResource\Pages\ListPermohonans;
use App\Filament\Resources\PermohonanResource\Pages\CreatePermohonan;
use Joaopaulolndev\FilamentPdfViewer\Forms\Components\PdfViewerField;

class PermohonanResource extends Resource
{
    protected static ?string $model = Permohonan::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-arrow-down';
    protected static ?string $navigationGroup = 'Si Akad';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Data Permohonan')
                ->columns([
                    'sm' => 2,
                    'xl' => 12,
                    '2xl' => 12,
                ])
                ->schema([
                    Hidden::make('office_id')
                        ->label('Kode Kantor')
                        ->default(function (): string{
                            $office = Office::whereIn('id', (array) auth()->user()->office_id)->first();
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
                    Select::make('register_anggota_id')
                        ->label('Nama Anggota')
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 4,
                            '2xl' => 4,
                        ])
                        ->live()
                        ->afterStateUpdated(function (Set $set, $state) {
                            $data = Permohonan::where('register_anggota_id', $state)->orderBy('created_at', 'desc')->first(); 
                            $no = 1;
                            if($data) {
                                $set('permohonan_ke', sprintf("%03s", abs($data->permohonan_ke + 1)) );
                            }
                            else {
                                $set('permohonan_ke', sprintf("%03s", $no));
                            }
                            
                        })
                        ->options(RegisterAnggota::whereIn('office_id', (array) auth()->user()->office_id)->where('status', 'waiting')->pluck('name', 'id'))
                        ->searchable(),
                    TextInput::make('jumlah_permohonan')
                        ->label('Nominal Permohonan')
                        ->required()
                        ->mask(RawJs::make('$money($input)'))
                        ->stripCharacters(',')
                        ->numeric()
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 4,
                            '2xl' => 4,
                        ]),
                    TextInput::make('permohonan_ke')
                        ->label('Permohonan ke?')
                        ->required()
                        ->readonly()
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 4,
                            '2xl' => 4,
                        ]),
                    TextInput::make('keperluan')
                        ->label('Keperluan')
                        ->required()
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 4,
                            '2xl' => 4,
                        ]),
                    TextInput::make('lama_angsuran')
                        ->label('Lama Angsuran')
                        ->required()
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 4,
                            '2xl' => 4,
                        ]),
                    Select::make('jenis_pembiayaan_id')
                        ->label('Jenis Pembiayaan')
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 4,
                            '2xl' => 4,
                        ])
                        ->options(JenisPembiayaan::all()->pluck('name', 'id'))
                        ->searchable(),
                    Select::make('periode_angsuran_id')
                        ->label('Periode Angsuran')
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 4,
                            '2xl' => 4,
                        ])
                        ->options(PeriodeAngsuran::all()->pluck('periode', 'id'))
                        ->searchable(),
                    Select::make('status_rumah')
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 4,
                            '2xl' => 4,
                        ])
                        ->options([
                            'milik-sendiri' => 'Milik Sendiri',
                            'kontrak' => 'Kontrak'
                        ])
                        ->native(false),
                    TextInput::make('alamat_usaha')
                        ->label('Alamat Usaha')
                        ->required()
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 4,
                            '2xl' => 4,
                        ]),
                ]),
                Section::make('Data Ahli Waris')
                    ->columns([
                        'sm' => 2,
                        'xl' => 12,
                        '2xl' => 12,
                        
                    ])
                    ->schema([
                        TextInput::make('nama_ahli_waris')
                            ->label('Nama')
                            ->required()
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ]),
                        TextInput::make('nik_ahli_waris')
                            ->label('NIK')
                            ->required()
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ]),
                        DatePicker::make('tanggal_ahli_waris')
                            ->label('Tanggal lahir')
                            ->required()
                            ->live()
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ])
                            ->afterStateUpdated(function (Set $set, $state) {
                                $set('umur_ahli_waris', Carbon::parse($state)->age);
                            }),
                        TextInput::make('umur_ahli_waris')
                            ->readOnly()
                            ->required()
                            ->label('Umur')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ]),
                        Select::make('status_ahli_waris')
                            ->label('Status')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ])
                            ->options([
                                'istri' => 'Istri',
                                'suami' => 'Suami',
                                'ayah' => 'Ayah',
                                'anak' => 'Anak',
                                'saudara' => 'Saudara',
                            ])
                            ->native(false),
                        Select::make('pekerjaan_ahli_waris')
                            ->label('Pekerjaan')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ])
                            ->options([
                                'wiraswasta' => 'Wiraswasta',
                                'petani' => 'Petani',
                                'pedagang' => 'Pedagang',
                                'guru' => 'Guru',
                            ])
                            ->native(false),
                        TextInput::make('alamat_ahli_waris')
                            ->label('Alamat')
                            ->required()
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 12,
                                '2xl' => 12,
                            ]),
                        ]),
                Section::make('Informasi Lainya')
                    ->columns([
                        'sm' => 2,
                        'xl' => 12,
                        '2xl' => 12,
                        
                    ])
                    ->schema([
                        TextInput::make('istri')
                            ->label('Istri')
                            ->required()
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 3,
                                '2xl' => 3,
                            ]),
                        TextInput::make('anak')
                            ->label('Anak')
                            ->required()
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 3,
                                '2xl' => 3,
                            ]),
                        TextInput::make('orang_tua')
                            ->label('Orang Tua')
                            ->required()
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 3,
                                '2xl' => 3,
                            ]),
                        TextInput::make('other')
                            ->label('Other/Lainya')
                            ->required()
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 3,
                                '2xl' => 3,
                            ]),
                        
                        ]),
                Section::make('Data Agunan')
                    ->schema([
                        Repeater::make('members')
                            ->hiddenlabel()
                            ->relationship('agunan')
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
                                    'xl' => 12,
                                    '2xl' => 12,
                                ]),
                                Select::make('type_agunan')
                                    ->label('Jenis Agunan')
                                    ->columnSpan([
                                        'sm' => 2,
                                        'xl' => 3,
                                        '2xl' => 3,
                                    ])
                                    ->options([
                                        'bpkb' => 'BPKB',
                                        'shm' => 'Sertifikat Hak Milik',
                                        'ppat' => 'Sertifikat PPAT',
                                        'porsi' => 'Nomor Porsi Haji',
                                        'buku_nikah' => 'Buku Nikah',
                                        'saham' => 'Saham',
                                        'simjakasya' => 'Simjakasya', 
                                        'emas' => 'Emas', 
                                    ])
                                    ->native(false),
                                TextInput::make('atas_nama')
                                    ->label('Atas Nama')
                                    ->required()
                                    ->columnSpan([
                                        'sm' => 2,
                                        'xl' => 3,
                                        '2xl' => 3,
                                    ]),
                                TextInput::make('nomor_agunan')
                                    ->label('Nomor Agunan')
                                    ->required()
                                    ->columnSpan([
                                        'sm' => 2,
                                        'xl' => 3,
                                        '2xl' => 3,
                                    ]),
                                TextInput::make('luas')
                                    ->label('Luas')
                                    ->required()
                                    ->columnSpan([
                                        'sm' => 2,
                                        'xl' => 3,
                                        '2xl' => 3,
                                    ]),
                                Select::make('status_agunan')
                                    ->label('Status Agunan')
                                    ->columnSpan([
                                        'sm' => 2,
                                        'xl' =>3,
                                        '2xl' =>3,
                                    ])
                                    ->options([
                                        'hak_milik' => 'Milik Sendiri',
                                        'other' => 'Orang Lain' 
                                    ])
                                    ->native(false),
                                Select::make('bank')
                                    ->label('Bank')
                                    ->columnSpan([
                                        'sm' => 2,
                                        'xl' =>3,
                                        '2xl' =>3,
                                    ])
                                    ->options([
                                        'panin' => 'Bank Panin Syariah',
                                        'cimb' => 'Bank CIMB',
                                        'bsi' => 'Bank BSI', 
                                        'other' => 'Other' 
                                    ])
                                    ->native(false),
                                
                                TextInput::make('merk')
                                    ->label('Merk')
                                    ->required()
                                    ->columnSpan([
                                        'sm' => 2,
                                        'xl' => 2,
                                        '2xl' => 2,
                                    ]),
                                TextInput::make('tahun')
                                    ->label('Tahun')
                                    ->required()
                                    ->columnSpan([
                                        'sm' => 2,
                                        'xl' => 2,
                                        '2xl' => 2,
                                    ]),
                                
                                TextInput::make('nopol')
                                    ->label('Nomor Polisi')
                                    ->required()
                                    ->columnSpan([
                                        'sm' => 2,
                                        'xl' => 2,
                                        '2xl' => 2,
                                    ]),
                                TextInput::make('nomor_rangka')
                                    ->label('Nomor Rangka Mesin')
                                    ->required()
                                    ->columnSpan([
                                        'sm' => 2,
                                        'xl' => 3,
                                        '2xl' => 3,
                                    ]),
                                TextInput::make('warna')
                                    ->label('Warna')
                                    ->required()
                                    ->columnSpan([
                                        'sm' => 2,
                                        'xl' => 3,
                                        '2xl' => 3,
                                    ]),
                                TextInput::make('produced_by')
                                    ->label('Di Keluarkan Oleh')
                                    ->required()
                                    ->columnSpan([
                                        'sm' => 2,
                                        'xl' => 3,
                                        '2xl' => 3,
                                    ]),
                                TextInput::make('nilai_taksir')
                                    ->label('Nominal Taksiran Agunan')
                                    ->required()
                                    ->columnSpan([
                                        'sm' => 2,
                                        'xl' => 3,
                                        '2xl' => 3,
                                    ]),
                                TextInput::make('alamat_agunan')
                                    ->label('Alamat')
                                    ->required()
                                    ->columnSpan([
                                        'sm' => 2,
                                        'xl' => 12,
                                        '2xl' => 12,
                                    ]),
                            ])
                            ->addActionLabel('Tambah Agunan')
                    ]),
                Section::make('File dan Dokumen Pendukung')
                    ->columns([
                        'sm' => 2,
                        'xl' => 12,
                        '2xl' => 12,
                        
                    ])
                    ->schema([
                        CheckboxList::make('berkas')
                            ->label('Lampiran Berkas')
                            ->required()
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 6,
                                '2xl' => 6,
                            ])
                            ->options([
                                'lembar_permohonan' => 'Lembar Permohonan',
                                'fc_ktp' => 'Fotocopy KTP Pemohon',
                                'fc_ktp_saksi' => 'Fotocopy KTP Suami/Istri Pemohon',
                                'fc_kk' => 'Fotocopy KK Pemohon',
                                'fc_bpkb' => 'Fotocopy BPKB Pemohon',
                                'fc_stnk' => 'Fotocopy STNK Pemohon',
                                'fc_cek_fisik' => 'Fotocopy Cek Fisik Kendaraan dari SAMSAT',
                                'fc_shm' => 'Fotocopy Sertifikat',
                                'fc_pbb' => 'Fotocopy SPPT/PBB Terakhir',
                                'fc_ktp_shm' => 'Fotocopy KTP Pemilik Agunan(SHM)',
                                'fc_ktp_pemilik_shm' => 'Fotocopy KTP Suami/Istri Pemilik Agunan(SHM)',
                                'fc_kk_pemilik_shm' => 'Fotocopy KK Pemilik Agunan(SHM)',
                                'surat_keterangan' => 'Surat Keterangan Kematian Dari Pemilik Agunan(SHM)',
                                'akta_cerai' => 'Fotocopy Akta Cerai',
                                'blokir_simpanan' => 'Blokir Simpanan',
                                'potong_gaji' => 'Surat Kuasa Potong Gaji',
                                'proses_balik_nama' => 'Proses Balik Nama',
                                'other' => 'Lainya',
                            ])
                            ->columns(2),
                        FileUpload::make('file_permohonan')
                            ->label('Upload Berkas Permohonan')
                            ->directory('permohonan')
                            ->required()
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 6,
                                '2xl' => 6,
                            ]),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('anggota.name')->label('Nama')->searchable(),
                TextColumn::make('anggota.nik')
                    ->label('NIK')
                    ->badge()
                    ->color('success')
                    ->copyable()
                    ->copyMessage('NIK berhasil di copy!')
                    ->copyMessageDuration(1500)
                    ->searchable(),
                TextColumn::make('pembiayaan.name')
                    ->label('Jenis Pembiayaan')
                    ->badge()
                    ->color('warning')
                    ->searchable(),
                TextColumn::make('jumlah_permohonan')->label('Nominal')->money('IDR', locale: 'id'),
                // TextColumn::make('office.name')->label('Kantor')->searchable(),
                TextColumn::make('make_by')
                    ->label('Author')
                    ->badge()
                    ->color('info')
                    ->icon('heroicon-m-user')
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('file_permohonan')
                    ->label('Berkas')
                    ->badge()
                    ->icon('heroicon-m-envelope')
                    ->color('primary')
                    ->simpleLightbox("https://jagoflutter.com/wp-content/uploads/2023/08/FIC-Fullstack-Laravel-Template-Auth-Fortify-Login-Register-Email-Verification.pdf", defaultDisplayUrl: true)
                    ->formatStateUsing(fn ($state) => 'Dokumen'),
                TextColumn::make('status_permohonan')
                    ->label('Status')
                    ->badge()
                    ->icon('heroicon-m-bell')
                    ->color(fn (string $state): string => match ($state) {
                        'under_review' => 'gray',
                        'waiting_for_approval' => 'success',
                        'approved' => 'primary',
                        'rejected' => 'danger',
                    }),
                    
            ])
            ->modifyQueryUsing(function (Builder $query) { 
                $id = auth()->user()->id;
                $check = User::with('roles')->where('id', $id)->first();
                if($check->roles[0]->name == 'Staff') {
                } else if($check->roles[0]->name == 'Branch Manager') {
                    return $query->whereIn('office_id', (array) auth()->user()->office_id);
                } else if($check->roles[0]->name == 'Regional Manager') {
                    return $query->whereIn('office_id', (array) auth()->user()->office_id);
                } else if($check->roles[0]->name == 'Manager') {
                    return $query;
                } else if($check->roles[0]->name == 'Asisten Direktur Utama') {
                    return $query;
                } else if($check->roles[0]->name == 'Direktur Utama') {
                    return $query;
                } else if($check->roles[0]->name == 'Teller') {
                    return $query->whereIn('office_id', (array) auth()->user()->office_id)->where('make_by', auth()->user()->name);
                } else if($check->roles[0]->name == 'Marketing') {
                    return $query->whereIn('office_id', (array) auth()->user()->office_id)->where('make_by', auth()->user()->name);
                } else {
                    return $query;
                }
            })
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListPermohonans::route('/'),
            'create' => Pages\CreatePermohonan::route('/create'),
            'edit' => Pages\EditPermohonan::route('/{record}/edit'),
        ];
    }
}
