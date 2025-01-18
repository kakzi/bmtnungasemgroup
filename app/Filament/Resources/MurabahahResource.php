<?php

namespace App\Filament\Resources;

use Carbon\Carbon;
use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Office;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use App\Models\Agreement;
use App\Models\Murabahah;
use App\Models\Permohonan;
use Filament\Tables\Table;
use App\Models\Approvement;
use Filament\Support\RawJs;
use Filament\Resources\Resource;
use App\Models\AngsuranMurabahah;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Support\Enums\ActionSize;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use NunoMaduro\Collision\Adapters\Phpunit\State;
use App\Filament\Resources\MurabahahResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\MurabahahResource\RelationManagers;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class MurabahahResource extends Resource
{
    protected static ?string $model = Agreement::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Agreements';

    protected static ?string $navigationLabel = 'Akad Murabahah';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Data Anggota Murabahah')
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

                        Select::make('permohonan_id')
                            ->label('Nama Anggota')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 8,
                                '2xl' => 8,
                            ])
                            ->live()
                            ->afterStateUpdated(function (Set $set, $state) {
                                $AWAL = 'MRBH';
                                $bulanRomawi = array("", "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");
                            
                                $approvement = Approvement::with('permohonan')->where('id', $state)->first();
                                $permohonan = Permohonan::with('pembiayaan')->where('id', $approvement->permohonan_id)->first();
                                $set('akad', $permohonan->pembiayaan->slug);
                                
                                $set('permohonan_id', $permohonan->id);
                                $set('approvement_id', $state);
                                // dd($permohonan->pembiayaan->name);
                                // dd($permohonan->pembiayaan->name);
                                // Get the nominal_acc based on the selected permohonan_id
                                $nominal_acc = Approvement::where('office_id', auth()->user()->office_id)
                                    ->where('kep_asesor', 'approved')
                                    ->where('permohonan_id', $state)
                                    ->first();
                        
                                // Get the office code
                                $kodeKantor = Office::where('id', auth()->user()->office_id)->first();
                                $kode = $kodeKantor->kode_kantor;
                        
                                // Get the last agreement number
                                $noUrutAkhir = Agreement::where('akad', 'murabahah')
                                    ->where('office_id', auth()->user()->office_id)
                                    ->max('nomor_agreement');
                        
                                $no = 1;
                                if ($noUrutAkhir) {
                                    $set('nomor_agreement', sprintf("%03s", abs($noUrutAkhir + 1)) . '/' . $AWAL . '/BMTNU-' . $kode . '/' . $bulanRomawi[date('n')] . '/' . date('Y'));
                                } else {
                                    $set('nomor_agreement', sprintf("%03s", $no) . '/' . $AWAL . '/BMTNU-' . $kode . '/' . $bulanRomawi[date('n')] . '/' . date('Y'));
                                    if ($nominal_acc) {
                                        $set('harga_beli', $nominal_acc->nominal_asesor);
                                    }
                                }
                            })
                            ->options(
                                Approvement::with('permohonan.pembiayaan') // Eager load the pembiayaan relationship
                                    ->where('office_id', auth()->user()->office_id)
                                    ->where('kep_asesor', 'approved')
                                    ->whereHas('permohonan', function ($query) {
                                            $query->where('status_permohonan', 'approved')
                                                ->whereHas('pembiayaan', function ($query) {
                                                    $query->where('slug', 'murabahah'); // Filter by pembiayaan name
                                                });
                                    })
                                    ->get()
                                    ->pluck('permohonan.anggota.name', 'id')
                            )
                            ->searchable(),
                        TextInput::make('nomor_agreement')
                            ->label('Nomor Akad')
                            ->required()
                            ->readonly()
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ]),
                        Hidden::make('akad')
                            ->label('Akad')
                            ->required()
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ]),
                        Hidden::make('permohonan_id')
                            ->label('Permohonan ID')
                            ->required()
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ]),
                        Hidden::make('approvement_id')
                            ->label('Permohonan ID')
                            ->required()
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ]),
                        Hidden::make('kantor_akad')
                            ->label('Kantor Akad')
                            ->required()
                            ->default(auth()->user()->office->name)
                            
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ]),

                    ]),

                Section::make('Form Pembelian Barang')
                    ->columns([
                        'sm' => 2,
                        'xl' => 12,
                        '2xl' => 12,
                    ])
                    ->schema([
                        Select::make('jenis_barang')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ])
                            ->options([
                                'sepeda-motor' => 'Sepeda Motor',
                                'sepeda-listrik' => 'Sepeda Listrik',
                                'mobil' => 'Mobil',
                                'mobile' => 'HandPhone',
                                'tanah' => 'Tanah',
                                'rumah' => 'Rumah',
                            ])
                            ->native(false),
                        TextInput::make('merk')
                            ->label('Merk Barang')
                            ->required()
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ]),
                        TextInput::make('nomor')
                            ->label('Nomor Polisi')
                            ->required()
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ]),
                        TextInput::make('tahun')
                            ->label('Tahun Pembelian')
                            ->required()
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 3,
                                '2xl' => 3,
                            ]),
                        TextInput::make('rangka')
                            ->label('Nomor Rangka')
                            ->required()
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 3,
                                '2xl' => 3,
                            ]),
                        TextInput::make('mesin')
                            ->label('Nomor Mesin/Jumlah Barang')
                            ->required()
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 3,
                                '2xl' => 3,
                            ]),
                        TextInput::make('warna')
                            ->label('Warna Barang')
                            ->required()
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 3,
                                '2xl' => 3,
                            ]),
                    ]),
                Section::make('Form Pembiayaan')
                    ->columns([
                        'sm' => 2,
                        'xl' => 12,
                        '2xl' => 12,
                    ])
                    ->schema([
                        TextInput::make('harga_beli')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ])
                            ->readonly()
                            ->required()
                            ->label('Harga Beli')
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->numeric(),
                        Select::make('angsuran')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ])
                            ->options(
                                AngsuranMurabahah::all()->pluck('bulan', 'id')->map(function ($bulan) {
                                    return "{$bulan} Bulan"; // Append " Bulan" to each month
                                })
                            )
                            ->searchable()
                            ->native(false)
                            ->live()
                            ->afterStateUpdated(function (Get $get, Set $set, $state) {
                                // Get the selected AngsuranMurabahah record
                                $angsuran = AngsuranMurabahah::where('id', $state)->first();
                                
                                if ($angsuran) {
                                    $set('up_mrbh', $angsuran->ujroh); // Set up_mrbh based on the selected angsuran
                
                                    // Calculate total_mrbh
                                    // $hargaBeli = (float) str_replace(',', '', $set('harga_beli')); // Remove commas and convert to float
                                    $upUjroh = $angsuran->ujroh; // Get ujroh value
                                    $bulan = (int)$angsuran->bulan;
                                    // dd($bulan);
                                    
                                    // Get the selected month value
                                    $currentDate = Carbon::now();
                                    // Get date +1 month
                                    $datePlusOneMonth = $currentDate->copy()->addMonth();
                                    // Get date +$bulan months
                                    $datePlusBulan = $currentDate->copy()->addMonths($bulan);

                                    // You can set these dates to fields if needed
                                    $set('tempo_awal', $datePlusOneMonth->toDateString()); // Set start date to +1 month
                                    $set('tempo_akhir', $datePlusBulan->toDateString()); 
                                    
                                
                                    // Calculate total_mrbh
                                    $totalUjroh = ((int) str_replace(',', '', $get('harga_beli') ?? 0) * $upUjroh / 100) * $bulan;
                                    $hargaJual = ($totalUjroh + (int) str_replace(',', '', $get('harga_beli') ?? 0));
                                    $angsuranPokokBulan = ((int) str_replace(',', '', $get('harga_beli') ?? 0) / $bulan);
                                    $ujrohPerBulan = ($upUjroh / 100) * (int) str_replace(',', '', $get('harga_beli') ?? 0);

                                    // Round angsuran pokok to the nearest thousand
                                    $angsuranPokokBulanRounded = round($angsuranPokokBulan / 1000) * 1000;

                                    // Round ujroh per bulan to the nearest whole number
                                    $ujrohPerBulanRounded = round($ujrohPerBulan);

                                    $totalAngsuran = $angsuranPokokBulanRounded + $ujrohPerBulanRounded;

                                    // Set the calculated total_mrbh
                                    $set('harga_jual', $hargaJual);
                                    $set('total_mrbh', $hargaJual);
                                    $set('pokok_mrbh', $angsuranPokokBulanRounded);
                                    $set('ujroh_mrbh', $ujrohPerBulanRounded);
                                    $set('total_angsuran_mrbh', $totalAngsuran);
                                } else {
                                    $set('up_mrbh', null); 
                                    $set('total_mrbh', null);
                                    $set('pokok_mrbh', null);
                                    $set('ujroh_mrbh', null);
                                    $set('total_angsuran_mrbh', null);
                                }
                            }),
                        TextInput::make('up_mrbh')
                            ->label('Ujroh')
                            ->required()
                            ->readonly()
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ]),
                        Hidden::make('harga_jual')
                            ->label('Harga Jual')
                            ->required()
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 3,
                                '2xl' => 3,
                            ]),
                        TextInput::make('total_mrbh')
                            ->label('Total Murabahah')
                            ->required()
                            ->readonly()
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 3,
                                '2xl' => 3,
                            ]),
                        TextInput::make('pokok_mrbh')
                            ->label('Angsuran Pokok/bulan')
                            ->required()
                            ->readonly()
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 3,
                                '2xl' => 3,
                            ]),
                        TextInput::make('ujroh_mrbh')
                            ->label('Angsuran Ujroh/bulan')
                            ->required()
                            ->readonly()
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 3,
                                '2xl' => 3,
                            ]),
                        TextInput::make('total_angsuran_mrbh')
                            ->label('Total Angsuran/Bulan')
                            ->required()
                            ->readonly()
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 3,
                                '2xl' => 3,
                            ]),
                        Hidden::make('tempo_awal')
                            ->label('Tempo Awal')
                            ->required()
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 3,
                                '2xl' => 3,
                            ]),
                        Hidden::make('tempo_akhir')
                            ->label('Tempo Akhir')
                            ->required()
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 3,
                                '2xl' => 3,
                            ]),
                    ]),
                Section::make('Form Biaya Akad Pembiayaan')
                    ->columns([
                        'sm' => 2,
                        'xl' => 12,
                        '2xl' => 12,
                    ])
                    ->schema([
                        TextInput::make('sim_wajib')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ])
                            ->required()
                            ->label('Simpanan Wajib')
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->numeric()
                            ->live()
                            ->afterStateUpdated(function (Get $get, Set $set, $state) {
                                $set('total_biaya_akad', (int) str_replace(',', '', $get('sim_wajib') ?? 0) + (int) str_replace(',', '', $get('atk') ?? 0) + (int) str_replace(',', '', $get('materai') ?? 0) + (int) str_replace(',', '', $get('wakaf') ?? 0) + (int) str_replace(',', '', $get('tabarru') ?? 0));
                            }),
                        TextInput::make('atk')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ])
                            ->required()
                            ->label('ATK')
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->numeric()
                            ->live()
                            ->afterStateUpdated(function (Get $get, Set $set, $state) {
                                $set('total_biaya_akad', (int) str_replace(',', '', $get('sim_wajib') ?? 0) + (int) str_replace(',', '', $get('atk') ?? 0) + (int) str_replace(',', '', $get('materai') ?? 0) + (int) str_replace(',', '', $get('wakaf') ?? 0) + (int) str_replace(',', '', $get('tabarru') ?? 0));
                            }),
                        TextInput::make('materai')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ])
                            ->required()
                            ->label('Materai')
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->numeric()
                            ->live()
                            ->afterStateUpdated(function (Get $get, Set $set, $state) {
                                $set('total_biaya_akad', (int) str_replace(',', '', $get('sim_wajib') ?? 0) + (int) str_replace(',', '', $get('atk') ?? 0) + (int) str_replace(',', '', $get('materai') ?? 0) + (int) str_replace(',', '', $get('wakaf') ?? 0) + (int) str_replace(',', '', $get('tabarru') ?? 0));
                            }),
                        TextInput::make('wakaf')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ])
                            ->required()
                            ->label('Wakaf')
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->numeric()
                            ->live()
                            ->afterStateUpdated(function (Get $get, Set $set, $state) {
                                $set('total_biaya_akad', (int) str_replace(',', '', $get('sim_wajib') ?? 0) + (int) str_replace(',', '', $get('atk') ?? 0) + (int) str_replace(',', '', $get('materai') ?? 0) + (int) str_replace(',', '', $get('wakaf') ?? 0) + (int) str_replace(',', '', $get('tabarru') ?? 0));
                            }),
                        TextInput::make('tabarru')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ])
                            ->required()
                            ->label('Tabarru')
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->numeric()
                            ->live()
                            ->afterStateUpdated(function (Get $get, Set $set, $state) {
                                $set('total_biaya_akad', (int) str_replace(',', '', $get('sim_wajib') ?? 0) + (int) str_replace(',', '', $get('atk') ?? 0) + (int) str_replace(',', '', $get('materai') ?? 0) + (int) str_replace(',', '', $get('wakaf') ?? 0) + (int) str_replace(',', '', $get('tabarru') ?? 0));
                            }),
                        TextInput::make('total_biaya_akad')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ])
                            ->readonly()
                            ->required()
                            ->label('Total Biaya Akad')
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->live()
                            ->numeric(),
                            ]),
            Section::make('Dokumentasi Foto')
                ->columns([
                    'sm' => 2,
                    'xl' => 12,
                    '2xl' => 12,
                ])
                ->schema([
                        FileUpload::make('file_agreement')
                            ->label('Upload Berkas Akad')
                            ->directory('akad-murabahah')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 6,
                                '2xl' => 6,
                            ]),
                        FileUpload::make('file_foto_akad')
                            ->label('Upload Dokumentasi')
                            ->directory('dokumentasi-murabahah')
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
                TextColumn::make('permohonan.anggota.name')->searchable()->sortable(),
                TextColumn::make('total_mrbh')->badge()->color('primary')->label('Pembiayaan')->money('IDR', locale: 'id'),
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
                IconColumn::make('check_staff')
                    ->label('SF')
                    ->boolean()
                    ->tooltip('Checked by Staff')
                    ->trueIcon('heroicon-o-check-badge')
                    ->falseIcon('heroicon-o-x-mark'),
                IconColumn::make('check_manager')
                    ->label('MR')
                    ->boolean()
                    ->tooltip('Approved by Manager')
                    ->trueIcon('heroicon-o-check-badge')
                    ->falseIcon('heroicon-o-x-mark'),
                IconColumn::make('check_asdir')
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
                Tables\Actions\Action::make('validation')
                    ->label('Validate')
                    ->icon('heroicon-o-check-badge')
                    ->requiresConfirmation()
                    ->form([
                        FileUpload::make('file_agreement')
                            ->label('Upload Berkas Akad')
                            ->directory('akad-murabahah')
                            ->required()
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 6,
                                '2xl' => 6,
                            ]),
                        FileUpload::make('file_foto_akad')
                            ->label('Upload Dokumentasi')
                            ->directory('dokumentasi-murabahah')
                            ->required()
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 6,
                                '2xl' => 6,
                            ]),
                    ]) // Add confirmation dialog if needed
                    ->color('primary')
                    ->button() // Makes the action a button
                    ->action(function (Agreement $record, array $data) {
                        $id = auth()->user()->id;

                        $check = User::with('roles')->where('id', $id)->first();
                        if($check->roles[0]->name == 'Staff') {
                            $record->update(['check_staff' => true]);
                            Notification::make()
                                ->title('Akad sudah di check!')
                                ->success()
                                ->send();
                        } else if($check->roles[0]->name == 'Branch Manager') {
                            $record->update(['check_bm' => true]);
                            Notification::make()
                                ->title('Akad sudah di check!')
                                ->success()
                                ->send();
                        } else if($check->roles[0]->name == 'Regional Manager') {
                            $record->update(['check_rm' => true]);
                            Notification::make()
                                ->title('Akad sudah di check!')
                                ->success()
                                ->send();
                        } else if($check->roles[0]->name == 'Manager') {
                            $record->update(['check_manager' => true]);
                            Notification::make()
                                ->title('Akad sudah di check!')
                                ->success()
                                ->send();
                        } else if($check->roles[0]->name == 'Asisten Direktur Utama') {
                            $record->update(['check_asdir' => true]);
                            Notification::make()
                                ->title('Akad sudah di check!')
                                ->success()
                                ->send();
                        } else if($check->roles[0]->name == 'Direktur Utama') {
                            $record->update(['check_dir' => true]);
                            Notification::make()
                                ->title('Akad sudah di check!')
                                ->success()
                                ->send();
                        } else {
                            $record->update(['check_staff' => true, 'check_bm' => true, 'check_rm' => true, 'check_manager' => true, 'check_asdir' => true, 'check_dir' => true, 'file_agreement' => $data['file_agreement'], 'file_foto_akad' => $data['file_foto_akad']]);
                            Notification::make()
                                ->title('Akad sudah di check!')
                                ->success()
                                ->send();
                        }
                    
                        // Redirect to WhatsApp link (or open it in a new tab)
                        // return redirect()->away($whatsappUrl); 
                    })
                    ->extraAttributes([
                        'class' => 'bg-blue-500 hover:bg-blue-600 text-white font-bold rounded-full',
                    ]),
                
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\Action::make('customAction')
                        ->label('Agreement')
                        ->icon('heroicon-o-document')
                        ->action(function (Agreement $record) {
                            // Redirect to WhatsApp link (or open it in a new tab)
                            // return redirect()->away($whatsappUrl); 
                        })
                        ->requiresConfirmation() // Add confirmation dialog if needed
                        ->color('info'),
                    Tables\Actions\Action::make('customAction')
                        ->label('Card Agreement')
                        ->icon('heroicon-o-document-text')
                        ->action(function (Agreement $record) {
                            // Redirect to WhatsApp link (or open it in a new tab)
                            // return redirect()->away($whatsappUrl); 
                        })
                        ->requiresConfirmation() // Add confirmation dialog if needed
                        ->color('info'),
                    ])
                    ->label('Print')
                    ->icon('heroicon-m-printer')
                    ->size(ActionSize::Small)
                    ->color('info')
                    ->button(),
                Tables\Actions\ActionGroup::make([
                        Tables\Actions\EditAction::make(),
                        Tables\Actions\ViewAction::make(),
                        Tables\Actions\DeleteAction::make(),
                    ])
                    ->label('More')
                    ->icon('heroicon-m-ellipsis-vertical')
                    ->size(ActionSize::Small)
                    ->color('primary')
                    ->button(),
            ])

            ->modifyQueryUsing(function (Builder $query) { 
                $id = auth()->user()->id;
                $check = User::with('roles')->where('id', $id)->first();
                if($check->roles[0]->name == 'Staff') {
                    return $query->where('akad', 'murabahah');
                } else if($check->roles[0]->name == 'Branch Manager') {
                    return $query->where('office_id', auth()->user()->office_id)->where('akad', 'murabahah');
                } else if($check->roles[0]->name == 'Regional Manager') {
                    return $query->where('office_id', auth()->user()->office_id)->where('akad', 'murabahah');
                } else if($check->roles[0]->name == 'Manager') {
                    return $query->where('akad', 'murabahah');
                } else if($check->roles[0]->name == 'Asisten Direktur Utama') {
                    return $query->where('akad', 'murabahah');
                } else if($check->roles[0]->name == 'Direktur Utama') {
                    return $query->where('akad', 'murabahah');
                } else if($check->roles[0]->name == 'Teller') {
                    return $query->where('office_id', auth()->user()->office_id)->where('make_by', auth()->user()->name)->where('akad', 'murabahah');
                } else if($check->roles[0]->name == 'Marketing') {
                    return $query->where('office_id', auth()->user()->office_id)->where('make_by', auth()->user()->name)->where('akad', 'murabahah');
                } else {
                    return $query->where('akad', 'murabahah');
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
            'index' => Pages\ListMurabahahs::route('/'),
            'create' => Pages\CreateMurabahah::route('/create'),
            'edit' => Pages\EditMurabahah::route('/{record}/edit'),
        ];
    }
}
