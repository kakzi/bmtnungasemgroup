<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Audit;
use App\Models\Office;
use Filament\Forms\Set;
use Filament\Forms\Form;
use App\Models\AntiFraud;
use App\Models\AntiFroud;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\ToggleButtons;
use App\Filament\Resources\AntiFraudResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AntiFraudResource\RelationManagers;

class AntiFraudResource extends Resource
{
    protected static ?string $model = AntiFroud::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'SPI';
    protected static ?string $navigationLabel = 'Checklist Anti Fraud';
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

                                                $AWAL = 'ANTI-FRAUD-SPI';
                                                $bulanRomawi = array("", "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");
                                                // Get the last agreement number
                                                $noUrutAkhir = AntiFroud::where('office_id', $state)
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

                        Section::make('Pendampingan Marketing')
                                    ->schema([
                                        Repeater::make('user_id')
                                            ->hiddenlabel()
                                            ->schema([
                                                Select::make('user_id')
                                                    ->label('Nama Marketing')
                                                    ->live()
                                                    ->options(
                                                        User::where('role_id', 4)
                                                            ->get()
                                                            ->pluck('name', 'id')
                                                    )
                                                    ->searchable()
                                                    ->columnSpan([
                                                        'sm' => 2,
                                                        'xl' => 12,
                                                        '2xl' => 12,
                                                    ]),
                                                Repeater::make('pendampingan_marketing')
                                                    ->hiddenlabel()
                                                    ->relationship('antiFraud')
                                                    ->columns([
                                                        'sm' => 2,
                                                        'xl' => 12,
                                                        '2xl' => 12,
                                                        
                                                    ])
                                                    ->schema([
                                                        Select::make('question_marketings_id')
                                                            ->label('Point Check Pendampingan Marketing')
                                                            ->relationship(name: 'question_marketing', titleAttribute: 'question')
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
                                                    ->addActionLabel('Tambah Checklist Pendampingan Marketing')
                                                    ])
                                        
                                    ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListAntiFrauds::route('/'),
            'create' => Pages\CreateAntiFraud::route('/create'),
            'edit' => Pages\EditAntiFraud::route('/{record}/edit'),
        ];
    }
}
