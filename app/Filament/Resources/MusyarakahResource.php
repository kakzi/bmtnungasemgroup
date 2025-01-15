<?php

namespace App\Filament\Resources;

use Carbon\Carbon;
use Filament\Forms;
use App\Models\Rahn;
use App\Models\User;
use Filament\Tables;
use App\Models\Office;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use App\Models\Agreement;
use App\Models\Permohonan;
use Filament\Tables\Table;
use App\Models\Approvement;
use Filament\Support\RawJs;
use App\Models\PeriodeAngsuran;
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
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\MusyarakahResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\MusyarakahResource\RelationManagers;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class MusyarakahResource extends Resource
{
    protected static ?string $model = Agreement::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Agreements';
    protected static ?string $navigationLabel = 'Akad Musyarakah';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Data Anggota Musyarakah')
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

                    Select::make('approvement_id')
                        ->label('Nama Anggota')
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 8,
                            '2xl' => 8,
                        ])
                        ->live()
                        ->afterStateUpdated(function (Set $set, $state) {
                            $AWAL = 'MUSYARAKAH';
                            $bulanRomawi = array("", "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");
                            
                            $approvement = Approvement::with('permohonan')->where('id', $state)->first();
                            $permohonan = Permohonan::with('pembiayaan')->where('id', $approvement->permohonan_id)->first();
                            $set('akad', $permohonan->pembiayaan->slug);
                            $set('jangka_waktu', $permohonan->lama_angsuran);
                            $set('permohonan_id', $permohonan->id);
                            // dd($permohonan->pembiayaan->name);

                            // Get the nominal_acc based on the selected permohonan_id
                            $nominal_acc = Approvement::where('office_id', auth()->user()->office_id)
                                ->where('kep_asesor', 'approved')
                                ->where('id', $state)
                                ->first();
                    
                            // Get the office code
                            $kodeKantor = Office::where('id', auth()->user()->office_id)->first();
                            $kode = $kodeKantor->kode_kantor;
                    
                            // Get the last agreement number
                            $noUrutAkhir = Agreement::where('akad', 'musrakah')
                                ->where('office_id', auth()->user()->office_id)
                                ->max('nomor_agreement');
                    
                            $no = 1;
                            if ($noUrutAkhir) {
                                $set('nomor_agreement', sprintf("%03s", abs($noUrutAkhir + 1)) . '/' . $AWAL . '/BMTNU-' . $kode . '/' . $bulanRomawi[date('n')] . '/' . date('Y'));
                                if ($nominal_acc) {
                                    $set('nominal_qard', $nominal_acc->nominal_asesor);
                                }
                            } else {
                                $set('nomor_agreement', sprintf("%03s", $no) . '/' . $AWAL . '/BMTNU-' . $kode . '/' . $bulanRomawi[date('n')] . '/' . date('Y'));
                                if ($nominal_acc) {
                                    $set('nominal_qard', $nominal_acc->nominal_asesor);
                                }
                            }
                        })
                        ->options(
                            Approvement::with('permohonan.pembiayaan') // Eager load the pembiayaan relationship
                                ->where('office_id', auth()->user()->office_id)
                                ->where('kep_asesor', 'approved')
                                ->where('agreement', 'not yet printed')
                                ->whereHas('permohonan', function ($query) {
                                        $query->where('status_permohonan', 'approved')
                                            ->whereHas('pembiayaan', function ($query) {
                                                $query->where('slug', 'musyarakah'); // Filter by pembiayaan name
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
            Section::make('Form Pembiayaan')
                ->columns([
                    'sm' => 2,
                    'xl' => 12,
                    '2xl' => 12,
                ])
                ->schema([
                    TextInput::make('nominal_qard')
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 4,
                            '2xl' => 4,
                        ])
                        ->readonly()
                        ->required()
                        ->label('Nominal Pembiayaan')
                        ->mask(RawJs::make('$money($input)'))
                        ->stripCharacters(',')
                        ->numeric(),
                    TextInput::make('jangka_waktu')
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 3,
                            '2xl' => 3,
                        ])
                        ->required()
                        ->label('Jangka Waktu')
                        ->numeric()
                        ->readonly()
                        ->live()
                        ->afterStateUpdated(function (Get $get, Set $set, $state) {
                            // Get the selected AngsuranMurabahah record
                            $angsuran = PeriodeAngsuran::where('id', $get('p_angsuran') ?? 6)->first();
                            if ($angsuran) {
                                $set('ujroh', $angsuran->percentage); // Set up_ujroh based on the selected angsuran
            
                                // $upUjroh = $angsuran->ujroh; // Get ujroh value
                                // $bulan = (int)$angsuran->bulan;
                                // dd($bulan);
                                
                                // Get the selected month value
                                // $currentDate = Carbon::now();
                                // Get date +1 month
                                // $datePlusOneMonth = $currentDate->copy()->addMonth();
                                // Get date +$bulan months
                                // $datePlusBulan = $currentDate->copy()->addMonths($bulan);

                                // You can set these dates to fields if needed
                                // $set('tempo_awal', $datePlusOneMonth->toDateString()); // Set start date to +1 month
                                // $set('tempo_akhir', $datePlusBulan->toDateString()); 
                                // Calculate Rahn
                                $totalUjrohBulan = ((int)$get('nominal_qard')  * $get('ujroh') / 100);
                                $ujrohBulanRounded = round($totalUjrohBulan / 1000) * 1000;

                                $totalPokokBulan = ((int)$get('nominal_qard')  / (int)$get('jangka_waktu'));
                                $angsuranPokokBulanRounded = round($totalPokokBulan / 1000) * 1000;

                                $angsuranPerBulan = ((int)$ujrohBulanRounded + (int)$angsuranPokokBulanRounded);
                                $totalUjroh = (int)$ujrohBulanRounded * (int)$get('jangka_waktu');
                                $totalPokok = (int)$angsuranPokokBulanRounded * (int)$get('jangka_waktu');
                                $totalPembiayaan = (int)$totalUjroh + (int)$totalPokok;
                                // Set the calculated total_mrbh
                                $set('qard_pokok', $angsuranPokokBulanRounded);
                                $set('qard_ujroh', $ujrohBulanRounded);
                                $set('angsuran_qard', $angsuranPerBulan);
                                $set('total_pokok', $totalPokok);
                                $set('total_ujroh', $totalUjroh);
                                $set('total_angsuran', $totalPembiayaan);
                            } else {
                                $set('qard_pokok', null);
                                $set('qard_ujroh', null);
                                $set('angsuran_qard', null);
                                $set('total_pokok', null);
                                $set('total_ujroh', null);
                                $set('total_angsuran', null);
                            }
                        }),
                    Select::make('p_angsuran')
                        ->label('Periode Angsuran')
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 3,
                            '2xl' => 3,
                        ])
                        ->options(
                            PeriodeAngsuran::all()->pluck('periode', 'id')
                        )
                        ->searchable()
                        ->native(false)
                        ->live()
                        ->afterStateUpdated(function (Get $get, Set $set, $state) {
                            // Get the selected AngsuranMurabahah record
                            $angsuran = PeriodeAngsuran::where('id', $state)->first();
                            if ($angsuran) {
                                $set('ujroh', $angsuran->percentage); // Set up_ujroh based on the selected angsuran
            
                                // $upUjroh = $angsuran->ujroh; // Get ujroh value
                                // $bulan = (int)$angsuran->bulan;
                                // dd($bulan);
                                
                                // Get the selected month value
                                $currentDate = Carbon::now();
                                // Get date +1 month
                                $datePlusOneMonth = $currentDate->copy()->addMonth();
                                // Get date +$bulan months
                                $datePlusBulan = $currentDate->copy()->addMonths((int)$get('jangka_waktu'));

                                // You can set these dates to fields if needed
                                $set('tempo_awal', $datePlusOneMonth->toDateString()); // Set start date to +1 month
                                $set('tempo_akhir', $datePlusBulan->toDateString()); 
                                // Calculate Rahn
                                $totalUjrohBulan = ((int)$get('nominal_qard')  * $get('ujroh') / 100);
                                $ujrohBulanRounded = round($totalUjrohBulan / 1000) * 1000;

                                $totalPokokBulan = ((int)$get('nominal_qard')  / (int)$get('jangka_waktu'));
                                $angsuranPokokBulanRounded = round($totalPokokBulan / 1000) * 1000;

                                $angsuranPerBulan = ((int)$ujrohBulanRounded + (int)$angsuranPokokBulanRounded);
                                $totalUjroh = (int)$ujrohBulanRounded * (int)$get('jangka_waktu');
                                $totalPokok = (int)$angsuranPokokBulanRounded * (int)$get('jangka_waktu');
                                $totalPembiayaan = (int)$totalUjroh + (int)$totalPokok;
                                // Set the calculated total_mrbh
                                $set('qard_pokok', $angsuranPokokBulanRounded);
                                $set('qard_ujroh', $ujrohBulanRounded);
                                $set('angsuran_qard', $angsuranPerBulan);
                                $set('total_pokok', $totalPokok);
                                $set('total_ujroh', $totalUjroh);
                                $set('total_angsuran', $totalPembiayaan);
                            } else {
                                $set('ujroh', null);
                                $set('qard_pokok', null);
                                $set('qard_ujroh', null);
                                $set('angsuran_qard', null);
                                $set('total_pokok', null);
                                $set('total_ujroh', null);
                                $set('total_angsuran', null);
                            }
                        }),
                    
                    TextInput::make('ujroh')
                        ->label('Ujroh')
                        ->required()
                        ->readonly()
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 2,
                            '2xl' => 2,
                        ]),
                    TextInput::make('qard_pokok')
                        ->label('Angsuran Pokok/bulan')
                        ->required()
                        ->readonly()
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 4,
                            '2xl' => 4,
                        ]),
                    TextInput::make('qard_ujroh')
                        ->label('Angsuran Ujroh/bulan')
                        ->required()
                        ->readonly()
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 4,
                            '2xl' => 4,
                        ]),
                    TextInput::make('angsuran_qard')
                        ->label('Angsuran /bulan')
                        ->required()
                        ->readonly()
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 4,
                            '2xl' => 4,
                        ]),
                    TextInput::make('total_pokok')
                        ->label('Total Angsuran Pokok')
                        ->required()
                        ->readonly()
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 4,
                            '2xl' => 4,
                        ]),
                    TextInput::make('total_ujroh')
                        ->label('Total Angsuran Ujroh')
                        ->required()
                        ->readonly()
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 4,
                            '2xl' => 4,
                        ]),
                    TextInput::make('total_angsuran')
                        ->label('Total Angsuran')
                        ->required()
                        ->readonly()
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 4,
                            '2xl' => 4,
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
                            ->directory('akad-musyarakah')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 6,
                                '2xl' => 6,
                            ]),
                        FileUpload::make('file_foto_akad')
                            ->label('Upload Dokumentasi')
                            ->directory('dokumentasi-musyarakah')
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
                TextColumn::make('nominal_qard')->badge()->color('primary')->label('Pembiayaan')->money('IDR', locale: 'id'),
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
                    ->form([
                        FileUpload::make('file_agreement')
                            ->label('Upload Berkas Akad')
                            ->directory('akad-musyarakah')
                            ->required()
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 6,
                                '2xl' => 6,
                            ]),
                        FileUpload::make('file_foto_akad')
                            ->label('Upload Dokumentasi')
                            ->directory('dokumentasi-musyarakah')
                            ->required()
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 6,
                                '2xl' => 6,
                            ]),
                    ])
                    ->action(function (Agreement $record) {
                        $id = auth()->user()->id;
                        $check = User::with('roles')->where('id', $id)->first();
                        if($check->roles[0]->name == 'Staff') {
                            $record->update(['check_s' => true]);
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
                            $record->update(['check_rm' => true]);
                            Notification::make()
                                ->title('Akad sudah di check!')
                                ->success()
                                ->send();
                        } else if($check->roles[0]->name == 'Asisten Direktur Utama') {
                            $record->update(['check_as' => true]);
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
                        }
                    
                        // Redirect to WhatsApp link (or open it in a new tab)
                        // return redirect()->away($whatsappUrl); 
                    })
                    ->label('Validate')
                    ->requiresConfirmation() // Add confirmation dialog if needed
                    ->color('primary')
                    ->button() // Makes the action a button
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
                    return $query->where('akad', 'murakah');
                } else if($check->roles[0]->name == 'Branch Manager') {
                    return $query->where('office_id', auth()->user()->office_id)->where('akad', 'musrakah');
                } else if($check->roles[0]->name == 'Regional Manager') {
                    return $query->where('office_id', auth()->user()->office_id)->where('akad', 'musrakah');
                } else if($check->roles[0]->name == 'Manager') {
                    return $query->where('akad', 'murakah');
                } else if($check->roles[0]->name == 'Asisten Direktur Utama') {
                    return $query->where('akad', 'murakah');
                } else if($check->roles[0]->name == 'Direktur Utama') {
                    return $query->where('akad', 'murakah');
                } else if($check->roles[0]->name == 'Teller') {
                    return $query->where('office_id', auth()->user()->office_id)->where('make_by', auth()->user()->name)->where('akad', 'musrakah');
                } else if($check->roles[0]->name == 'Marketing') {
                    return $query->where('office_id', auth()->user()->office_id)->where('make_by', auth()->user()->name)->where('akad', 'musrakah');
                } else {
                    return $query->where('akad', 'murakah');
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
            'index' => Pages\ListMusyarakahs::route('/'),
            'create' => Pages\CreateMusyarakah::route('/create'),
            'edit' => Pages\EditMusyarakah::route('/{record}/edit'),
        ];
    }
}
