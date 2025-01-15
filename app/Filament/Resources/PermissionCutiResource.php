<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Cuti;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\PermissionCuti;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PermissionCutiResource\Pages;
use App\Filament\Resources\PermissionCutiResource\RelationManagers;

class PermissionCutiResource extends Resource
{
    protected static ?string $model = Cuti::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Cuti';

    protected static ?string $navigationGroup = 'HR';

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
                TextColumn::make('user.name')->label('Nama')->searchable(),
                TextColumn::make('reason')->label('Keterangan'),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'gray',
                        'approved' => 'success',
                        'rejected' => 'danger',
                    }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('approved')
                ->label('Approve')
                ->color('primary')
                ->button()
                ->outlined()
                ->icon('heroicon-m-check-badge')
                ->requiresConfirmation()
                ->form([
                    Forms\Components\Select::make('status')
                        ->label('Setujui')
                        ->required()
                        ->options([
                            'approved' => 'Approved',
                            'rejected' => 'Rejected',
                        ])->native(false),
                    
                ])->action(function (Cuti $record, array $data) {
                    $record->update([
                        'status' => $data['status']
                    ]);

                }),
            Tables\Actions\Action::make('rejected')
                ->label('Rejected')
                ->color('danger')
                ->button()
                ->icon('heroicon-m-check-badge')
                ->requiresConfirmation()
                ->form([
                    Forms\Components\Select::make('status')
                        ->label('Rejected?')
                        ->required()
                        ->options([
                            'approved' => 'Approved',
                            'rejected' => 'Rejected',
                        ])->native(false),
                    
                ])->action(function (Cuti $record, array $data) {
                    $record->update([
                        'status' => $data['status']
                    ]);

                }),
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
            'index' => Pages\ListPermissionCutis::route('/'),
            'create' => Pages\CreatePermissionCuti::route('/create'),
            'edit' => Pages\EditPermissionCuti::route('/{record}/edit'),
        ];
    }
}
