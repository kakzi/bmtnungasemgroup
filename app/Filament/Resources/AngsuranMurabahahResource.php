<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AngsuranMurabahahResource\Pages;
use App\Filament\Resources\AngsuranMurabahahResource\RelationManagers;
use App\Models\AngsuranMurabahah;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AngsuranMurabahahResource extends Resource
{
    protected static ?string $model = AngsuranMurabahah::class;

    protected static ?string $navigationIcon = 'heroicon-o-swatch';

    protected static ?string $navigationGroup = 'Master';

    protected static ?string $naligationLabel = 'Angsuran Murabahah';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('bulan')
                    ->label('Bulan')
                    ->required(),
                TextInput::make('ujroh')
                    ->label('Ujroh')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('bulan')
                    ->label('Bulan'),
                TextColumn::make('ujroh')
                    ->label('Ujroh')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListAngsuranMurabahahs::route('/'),
            'create' => Pages\CreateAngsuranMurabahah::route('/create'),
            'edit' => Pages\EditAngsuranMurabahah::route('/{record}/edit'),
        ];
    }
}
