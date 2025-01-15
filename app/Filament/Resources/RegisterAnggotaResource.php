<?php

namespace App\Filament\Resources;

use Carbon\Carbon;
use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Office;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\RegisterAnggota;
use Filament\Resources\Resource;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\RegisterAnggotaResource\Pages;
use Teguh02\IndonesiaTerritoryForms\IndonesiaTerritoryForms;
use App\Filament\Resources\RegisterAnggotaResource\RelationManagers;

class RegisterAnggotaResource extends Resource
{
    protected static ?string $model = RegisterAnggota::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Si Akad';
    public static function form(Form $form): Form
    {

        return $form
            ->schema([
                Section::make()
                ->columns([
                    'sm' => 2,
                    'xl' => 8,
                    '2xl' => 8,
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
                    TextInput::make('name')
                        ->label('Nama Anggota')
                        ->required()
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 8,
                            '2xl' => 8,
                        ]),
                    TextInput::make('tempat_lahir')
                        ->label('Tempat Lahir')
                        ->required()
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 2,
                            '2xl' => 2,
                        ]),
                    TextInput::make('nik')
                        ->label('NIK')
                        ->required()
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 2,
                            '2xl' => 2,
                        ]),
                    DatePicker::make('tanggal_lahir')
                        ->required()
                        ->live()
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 2,
                            '2xl' => 2,
                        ])
                        ->afterStateUpdated(function (Set $set, $state) {
                            $set('age', Carbon::parse($state)->age);
                        }),
                    TextInput::make('age')
                        ->readOnly()
                        ->required()
                        ->label('Umur Anggota')
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 2,
                            '2xl' => 2,
                        ]),
                    TextInput::make('no_hp')
                        ->label('Nomor WhatsApp')
                        ->required()
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 2,
                            '2xl' => 2,
                        ]),
                    Select::make('jenis_kelamin')
                        ->required()
                        ->options([
                            'laki-laki' => 'Laki-Laki',
                            'perempuan' => 'Perempuan'
                        ])
                        ->searchable()
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 2,
                            '2xl' => 2,
                        ])
                        ->native(false),
                    Select::make('agama')
                        ->required()
                        ->options([
                            'islam' => 'Islam',
                            'kristen' => 'Kristen',
                            'other' => 'Lainya',
                        ])
                        ->searchable()
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 2,
                            '2xl' => 2,
                        ])
                        ->native(false),
                    Select::make('pendidikan')
                        ->required()
                        ->options([
                            'sd' => 'SD',
                            'smp' => 'SMP',
                            'sma' => 'SMA',
                            'd3' => 'D3',
                            's1' => 'Sarjana S1',
                            'other' => 'Lainya',
                        ])
                        ->searchable()
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 2,
                            '2xl' => 2,
                        ])
                        ->native(false),
                    Select::make('kewarganegaraan')
                        ->required()
                        ->options([
                            'indonesia' => 'Indonesia',
                            'wna' => 'WNA',
                        ])
                        ->searchable()
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 2,
                            '2xl' => 2,
                        ])
                        ->native(false),
                    Select::make('pekerjaan')
                        ->required()
                        ->options([
                            'wiraswasta' => 'Wiraswasta',
                            'petani' => 'Petani',
                            'pedagang' => 'Pedagang',
                            'guru' => 'Guru',
                            'other' => 'Lainya',
                        ])
                        ->searchable()
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 2,
                            '2xl' => 2,
                        ])
                        ->native(false),
                    TextInput::make('alamat')
                        ->label('Alamat')
                        ->required()
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 4,
                            '2xl' => 4,
                        ]),
                    IndonesiaTerritoryForms::make()
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 8,
                            '2xl' => 8,
                        ]),
                    FileUpload::make('foto')
                        ->image()
                        ->directory('rumah')
                        ->imageEditor()
                        ->imageEditorAspectRatios([
                            '16:9',
                            '4:3',
                            '1:1',
                        ])
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 4,
                            '2xl' => 4,
                        ]),
                    TextInput::make('lat_long')
                        ->label('Lokasi Rumah')
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 4,
                            '2xl' => 4,
                        ]),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('nik')->label('NIK')->badge()->color('success')->searchable(),
                TextColumn::make('office.name')->label('Kantor'),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'waiting' => 'gray',
                        'whitelist' => 'success',
                        'blacklist' => 'danger',
                    })
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
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListRegisterAnggotas::route('/'),
            'create' => Pages\CreateRegisterAnggota::route('/create'),
            'edit' => Pages\EditRegisterAnggota::route('/{record}/edit'),
        ];
    }
}
