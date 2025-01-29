<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\SyncDate;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Date;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\SyncDateResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SyncDateResource\RelationManagers;

class SyncDateResource extends Resource
{
    protected static ?string $model = SyncDate::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Settings';
    protected static ?string $navigationLabel = 'Sync Date';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                DatePicker::make('date_start')
                    ->label('Start Date')
                    ->live()
                    ->afterStateUpdated(function ($state, callable $set, $get) {
                        $dateStart = $get('date_start');
                        $dateEnd = $get('date_end');
    
                        if ($dateStart && $dateEnd) {
                            $startt = \Carbon\Carbon::parse($dateStart);
                            $endt = \Carbon\Carbon::parse($dateEnd);
                            $start = \Carbon\Carbon::parse($dateStart);
                            $end = \Carbon\Carbon::parse($dateEnd);
                            $totalActiveDays = 0;
                            while ($start->lte($end)) {
                                if (!$start->isFriday()) {
                                    $totalActiveDays++;
                                }
                                $start->addDay();
                            }
                            $totalDays = $startt->diffInDays($endt);
                            $set('total_day', $totalDays);
                            $set('active_day', $totalActiveDays);
                        } else {
                            $set('total_day', null);
                            $set('active_day', null);
                        }
                    }),
                DatePicker::make('date_end')
                    ->label('End Date')
                    ->live()
                    ->afterStateUpdated(function ($state, callable $set, $get) {
                        $dateStart = $get('date_start');
                        $dateEnd = $get('date_end');
    
                        if ($dateStart && $dateEnd) {
                            $startt = \Carbon\Carbon::parse($dateStart);
                            $endt = \Carbon\Carbon::parse($dateEnd);
                            $start = \Carbon\Carbon::parse($dateStart);
                            $end = \Carbon\Carbon::parse($dateEnd);
                            $totalActiveDays = 0;
                            while ($start->lte($end)) {
                                if (!$start->isFriday()) {
                                    $totalActiveDays++;
                                }
                                $start->addDay();
                            }
                            $totalDays = $startt->diffInDays($endt);
                            $set('total_day', $totalDays);
                            $set('active_day', $totalActiveDays);
                        } else {
                            $set('total_day', null);
                            $set('active_day', null);
                        }
                    }),
                TextInput::make('total_day')
                    ->label('Total Days')
                    ->live(),
                TextInput::make('active_day')
                    ->label('Active Days')
                    ->live()
                    
            ]);
    }
    
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('date_start')->label('Tanggal Mulai')->badge()->color('primary'),
                TextColumn::make('date_end')->label('Tanggal Selesai')->badge()->color('danger'),
                TextColumn::make('total_day')->label('Total Hari')->badge()->color('info')->formatStateUsing(fn ($state) => $state ? $state . ' Hari' : null),
                TextColumn::make('active_day')->label('Hari Aktif')->badge()->color('info')->formatStateUsing(fn ($state) => $state ? $state . ' Hari' : null),
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
            'index' => Pages\ListSyncDates::route('/'),
            'create' => Pages\CreateSyncDate::route('/create'),
            'edit' => Pages\EditSyncDate::route('/{record}/edit'),
        ];
    }
}
