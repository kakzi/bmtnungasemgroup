<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Permohonan;
use Filament\Tables\Table;
use App\Models\Approvement;
use Filament\Support\RawJs;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ApprovementResource\Pages;
use App\Filament\Resources\ApprovementResource\RelationManagers;

class ApprovementResource extends Resource
{
    protected static ?string $model = Approvement::class;

    protected static ?string $navigationIcon = 'heroicon-o-finger-print';

    protected static ?string $navigationLabel = 'Approvement';

    protected static ?string $navigationGroup = 'Si Akad';


    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('permohonan.anggota.name')->searchable()->sortable(),
                TextColumn::make('permohonan.anggota.nik')
                    ->label('NIK')
                    ->badge()
                    ->color('success')
                    ->copyable()
                    ->copyMessage('NIK berhasil di copy!')
                    ->copyMessageDuration(1500)
                    ->searchable(),
                TextColumn::make('permohonan.jumlah_permohonan')->label('Permohonan')->money('IDR', locale: 'id'),
                TextColumn::make('surveyor.nominal_approval')->label('Saran')->money('IDR', locale: 'id'),
                TextColumn::make('surveyor.recommendation')
                    ->label('Rekomendasi')
                    ->badge()
                    ->icon('heroicon-m-bell')
                    ->color(fn (string $state): string => match ($state) {
                        'approved' => 'primary',
                        'approve_pending' => 'warning',
                        'rejected' => 'danger',
                    }),
                
            ])
            ->modifyQueryUsing(function (Builder $query) { 
                $id = auth()->user()->id;
                $check = User::with('roles')->where('id', $id)->first();
                if($check->roles[0]->name == 'Staff') {
                    return $query->where('kep_asesor', 'waiting');
                } else if($check->roles[0]->name == 'Branch Manager') {
                    return $query->whereIn('office_id', (array) auth()->user()->office_id)->where('kep_asesor', 'waiting');
                } else if($check->roles[0]->name == 'Regional Manager') {
                    return $query->whereIn('office_id', (array) auth()->user()->office_id)->where('kep_asesor', 'waiting');
                } else if($check->roles[0]->name == 'Manager') {
                    return $query->where('kep_asesor', 'waiting');
                } else if($check->roles[0]->name == 'Asisten Direktur Utama') {
                    return $query->where('kep_asesor', 'waiting');
                } else if($check->roles[0]->name == 'Direktur Utama') {
                    return $query->where('kep_asesor', 'waiting');
                } else if($check->roles[0]->name == 'Teller') {
                    return $query->whereIn('office_id', (array) auth()->user()->office_id)->where('kep_asesor', 'waiting');
                } else if($check->roles[0]->name == 'Marketing') {
                    return $query->whereIn('office_id', (array) auth()->user()->office_id)->where('kep_asesor', 'waiting');
                } else {
                    return $query->where('kep_asesor', 'waiting');
                }
                
            })
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('process')
                    ->label('Process')
                    ->color('primary')
                    ->button()
                    ->outlined()
                    ->icon('heroicon-m-check-badge')
                    ->requiresConfirmation()
                    ->form([
                        Forms\Components\Hidden::make('make_by')
                            ->default(auth()->user()->name),
                        Forms\Components\Select::make('kep_asesor')
                            ->label('Keputusan Asesor')
                            ->required()
                            ->options([
                                'approved' => 'Approved',
                                'approval_pending' => 'Approval Pending',
                                'rejected' => 'Rejected',
                            ])->native(false),
                        Forms\Components\TextInput::make('nominal_asesor')
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')->required()
                            ->numeric(),
                        Forms\Components\RichEditor::make('catatan_asesor')->required(),
                    ])->action(function (Approvement $record, array $data) {
                        $record->update([
                            'make_by' => $data['make_by'],
                            'kep_asesor' => $data['kep_asesor'],
                            'nominal_asesor' => $data['nominal_asesor'],
                            'catatan_asesor' => $data['catatan_asesor'],
                        ]);

                        Permohonan::where('id', $record['permohonan_id'])
                            ->update(['status_permohonan' => $data['kep_asesor']]);
                    }),
            ])
            ->bulkActions([
                
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
            'index' => Pages\ListApprovements::route('/'),
            'create' => Pages\CreateApprovement::route('/create'),
            'edit' => Pages\EditApprovement::route('/{record}/edit'),
        ];
    }
}
