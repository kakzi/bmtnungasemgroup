<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Audit;
use App\Models\Office;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\ToggleButtons;
use App\Filament\Resources\AuditResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AuditResource\RelationManagers;

class AuditResource extends Resource
{
    protected static ?string $model = Audit::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-arrow-down';
    protected static ?string $navigationGroup = 'SPI';
    protected static ?string $navigationLabel = 'Checklist Audit SPI';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Form Checklist Audit SPI')
                ->columns([
                    'sm' => 2,
                    'xl' => 12,
                    '2xl' => 12,
                ])
                ->schema([
                    Select::make('office_id')
                        ->label('Kantor Cabang')
                        ->live()
                        ->afterStateUpdated(function (Set $set, $state) {
                            $data = Audit::where('office_id', $state)->orderBy('created_at', 'desc')->first(); 
                            $no = 1;
                            if($data) {
                                $set('no', sprintf("%03s", abs($data->no + 1)) );
                            }
                            else {
                                $set('no', sprintf("%03s", $no));
                            }

                            $AWAL = 'AUDIT-SPI';
                            $bulanRomawi = array("", "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");
                            // Get the last agreement number
                            $noUrutAkhir = Audit::where('office_id', $state)
                                ->max('no');

                            $kodeKantor = Office::where('id', $state)->first();
                            $kode = $kodeKantor->kode_kantor;
                    
                            $no = 1;
                            if ($noUrutAkhir) {
                                $set('number', sprintf("%03s", abs($noUrutAkhir + 1)) . '/' . $AWAL . '/BMTNU-' . $kode . '/' . $bulanRomawi[date('n')] . '/' . date('Y'));
                                
                            } else {
                                $set('number', sprintf("%03s", $no) . '/' . $AWAL . '/BMTNU-' . $kode . '/' . $bulanRomawi[date('n')] . '/' . date('Y'));
                            }
                            
                        })
                        ->options(Office::all()->pluck('name', 'id'))
                        ->searchable()
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 4,
                            '2xl' => 4,
                        ]),
                    Hidden::make('no')
                        ->label('No')
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 4,
                            '2xl' => 4,
                        ]),
                    Hidden::make('make_by')
                        ->label('Data ini di Buat oleh ')
                        ->default(auth()->user()->name)
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 4,
                            '2xl' => 4,
                        ]),
                    
                    TextInput::make('number')
                        ->label('Nomor Audit')
                        ->required()
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 4,
                            '2xl' => 4,
                        ]),
                    DatePicker::make('date_audit')
                        ->label('Tanggal')
                        ->required()
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 4,
                            '2xl' => 4,
                        ]),
                    
                ]),

                Section::make('Cek Fisik Uang')
                ->schema([
                    Repeater::make('checlistuang')
                        ->hiddenlabel()
                        ->relationship('checkFisikUang')
                        ->columns([
                            'sm' => 2,
                            'xl' => 12,
                            '2xl' => 12,
                            
                        ])
                        ->schema([
                            Select::make('question_c_f_u_s_id')
                                ->label('Point Check Fisik Uang')
                                ->relationship(name: 'question_cfu', titleAttribute: 'question')
                                ->createOptionForm([
                                    Forms\Components\TextInput::make('question')
                                        ->required(),
                                ])
                                ->required()
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 7,
                                    '2xl' => 7,
                                ])
                                ->native(false),
                            ToggleButtons::make('answer')
                                ->label('Apakah sudah sesuai?')
                                ->boolean()
                                ->inline()
                                ->live()
                                ->required()
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 3,
                                    '2xl' => 3,
                                ])
                                ->afterStateUpdated(function (Set $set, $state){
                                    $set('point', $state ? 5 : 0);
                                }),
                            
                            TextInput::make('point')
                                ->label('Point')
                                ->default(0)
                                ->numeric()
                                ->readOnly()
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 2,
                                    '2xl' => 2,
                                ]),
                            

                            Textarea::make('notes')
                                ->label('Catatan')
                                ->autosize()
                                ->required()
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 12,
                                    '2xl' => 12,
                                ]),
                            
                        ])
                        ->addActionLabel('Tambah Checklist Cek Fisik Uang')
                ]),
                Section::make('Cek Fisik Jaminan')
                ->schema([
                    Repeater::make('checlistjaminan')
                        ->hiddenlabel()
                        ->relationship('checkFisikJaminan')
                        ->columns([
                            'sm' => 2,
                            'xl' => 12,
                            '2xl' => 12,
                            
                        ])
                        ->schema([
                            Select::make('question_c_f_j_s_id')
                                ->label('Point Check Fisik Jaminan')
                                ->relationship(name: 'question_cfj', titleAttribute: 'question')
                                ->createOptionForm([
                                    Forms\Components\TextInput::make('question')
                                        ->required(),
                                ])
                                ->required()
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 7,
                                    '2xl' => 7,
                                ])
                                ->native(false),
                                ToggleButtons::make('answer')
                                ->label('Apakah sudah sesuai?')
                                ->boolean()
                                ->inline()
                                ->live()
                                ->required()
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 3,
                                    '2xl' => 3,
                                ])
                                ->afterStateUpdated(function (Set $set, $state){
                                    $set('point', $state ? 4.3 : 0);
                                }),
                            
                            TextInput::make('point')
                                ->label('Point')
                                ->default(0)
                                ->numeric()
                                ->readOnly()
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 2,
                                    '2xl' => 2,
                                ]),
                            

                            Textarea::make('notes')
                                ->label('Catatan')
                                ->autosize()
                                ->required()
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 12,
                                    '2xl' => 12,
                                ]),
                            
                        ])
                        ->addActionLabel('Tambah Checklist Cek Fisik Jaminan')
                ]),
                Section::make('Selfi Brankas')
                ->schema([
                    Repeater::make('selfibrankas')
                        ->hiddenlabel()
                        ->relationship('selfiBrankas')
                        ->columns([
                            'sm' => 2,
                            'xl' => 12,
                            '2xl' => 12,
                            
                        ])
                        ->schema([
                            Select::make('question_selfi_brankas_id')
                                ->label('Point Selfi Brankas')
                                ->relationship(name: 'question_selfi_brankas', titleAttribute: 'question')
                                ->createOptionForm([
                                    Forms\Components\TextInput::make('question')
                                        ->required(),
                                ])
                                ->required()
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 7,
                                    '2xl' => 7,
                                ])
                                ->native(false),
                                ToggleButtons::make('answer')
                                ->label('Apakah sudah sesuai?')
                                ->boolean()
                                ->inline()
                                ->live()
                                ->required()
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 3,
                                    '2xl' => 3,
                                ])
                                ->afterStateUpdated(function (Set $set, $state){
                                    $set('point', $state ? 3.1 : 0);
                                }),
                            
                            TextInput::make('point')
                                ->label('Point')
                                ->default(0)
                                ->numeric()
                                ->readOnly()
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 2,
                                    '2xl' => 2,
                                ]),
                            

                            Textarea::make('notes')
                                ->label('Catatan')
                                ->autosize()
                                ->required()
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 12,
                                    '2xl' => 12,
                                ]),
                            
                        ])
                        ->addActionLabel('Tambah Checklist Selfi Brankas')
                ]),
                Section::make('Pemeriksaan Brankas')
                ->schema([
                    Repeater::make('checkbrankas')
                        ->hiddenlabel()
                        ->relationship('checkBrankas')
                        ->columns([
                            'sm' => 2,
                            'xl' => 12,
                            '2xl' => 12,
                            
                        ])
                        ->schema([
                            Select::make('question_check_brankas_id')
                                ->label('Point Check Brankas')
                                ->relationship(name: 'question_check_brankas', titleAttribute: 'question')
                                ->createOptionForm([
                                    Forms\Components\TextInput::make('question')
                                        ->required(),
                                ])
                                ->required()
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 7,
                                    '2xl' => 7,
                                ])
                                ->native(false),
                                ToggleButtons::make('answer')
                                ->label('Apakah sudah sesuai?')
                                ->boolean()
                                ->inline()
                                ->live()
                                ->required()
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 3,
                                    '2xl' => 3,
                                ])
                                ->afterStateUpdated(function (Set $set, $state){
                                    $set('point', $state ? 3.1 : 0);
                                }),
                            
                            TextInput::make('point')
                                ->label('Point')
                                ->default(0)
                                ->numeric()
                                ->readOnly()
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 2,
                                    '2xl' => 2,
                                ]),
                            

                            Textarea::make('notes')
                                ->label('Catatan')
                                ->autosize()
                                ->required()
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 12,
                                    '2xl' => 12,
                                ]),
                            
                        ])
                        ->addActionLabel('Tambah Checklist Check Brankas')
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('number')->label('Nomor Audit')->searchable(),
                TextColumn::make('date_audit')->label('Tanggal'), 
                TextColumn::make('office.name')->label('Kantor Cabang')->badge()->color('primary'), 
                TextColumn::make('total_point')->label('Point')->badge()->color('warning'), 
                TextColumn::make('grade')->label('Grade')->badge()->color('info'), 
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListAudits::route('/'),
            'create' => Pages\CreateAudit::route('/create'),
            'edit' => Pages\EditAudit::route('/{record}/edit'),
        ];
    }
}
