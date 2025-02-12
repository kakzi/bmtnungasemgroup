<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Karakter;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use App\Exports\KarakterExport;
use Filament\Resources\Resource;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\KarakterResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\KarakterResource\RelationManagers;

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
            ->headerActions([
                Action::make('karakter')
                ->label('Export Point')
                ->icon('heroicon-o-arrow-down-tray')
                ->action(function () {
                    return Excel::download(new KarakterExport, 'poin-karakter.xlsx');
                }),
                
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
