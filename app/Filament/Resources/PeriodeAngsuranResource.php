<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\PeriodeAngsuran;
use Filament\Resources\Resource;
use Filament\Pages\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PeriodeAngsuranResource\Pages;
use App\Filament\Resources\PeriodeAngsuranResource\RelationManagers;
use App\Filament\Resources\PeriodeAngsuranResource\Pages\EditPeriodeAngsuran;
use App\Filament\Resources\PeriodeAngsuranResource\Pages\ListPeriodeAngsurans;
use App\Filament\Resources\PeriodeAngsuranResource\Pages\CreatePeriodeAngsuran;

class PeriodeAngsuranResource extends Resource
{
    protected static ?string $model = PeriodeAngsuran::class;

    protected static ?string $navigationIcon = 'heroicon-o-circle-stack';

    protected static ?string $navigationGroup = 'Master';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('periode')
                    ->required()
                    ->label('Periode Angsuran')
                    ->maxLength(255),

                TextInput::make('percentage')
                    ->required()
                    ->label('Persentase Ujroh')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('periode')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('slug'),
                TextColumn::make('percentage'),
                    
            ])
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
            'index' => Pages\ListPeriodeAngsurans::route('/'),
            'create' => Pages\CreatePeriodeAngsuran::route('/create'),
            'edit' => Pages\EditPeriodeAngsuran::route('/{record}/edit'),
        ];
    }
}
