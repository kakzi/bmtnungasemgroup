<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KarakterResource\Pages;
use App\Filament\Resources\KarakterResource\RelationManagers;
use App\Models\Karakter;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KarakterResource extends Resource
{
    protected static ?string $model = Karakter::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Karakter';

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
                TextColumn::make('laporan')->label('Laporan'),
                TextColumn::make('type')->label('Karakter')->badge()->color('primary'),
                TextColumn::make('poin')->label('Poin')->badge()->color('primary'),
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
            'index' => Pages\ListKarakters::route('/'),
            'create' => Pages\CreateKarakter::route('/create'),
            'edit' => Pages\EditKarakter::route('/{record}/edit'),
        ];
    }
}
