<?php

namespace App\Filament\Resources;

use App\Exports\PointLKHSantriExport;
use Filament\Forms;
use Filament\Tables;
use App\Models\PointLKH;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\PointLkhSantri;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PointLKHResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PointLKHResource\RelationManagers;

class PointLKHResource extends Resource
{
    protected static ?string $model = PointLkhSantri::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'LKH Santri';

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
                TextColumn::make('user.name')->label('Nama Santri')->searchable(),
                TextColumn::make('user.roles.name')->label('Jabatan'),
                TextColumn::make('point_lkh')->label('Point')->badge()->color('primary'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Action::make('lkh')
                ->label('Export Point')
                ->icon('heroicon-o-arrow-down-tray')
                ->action(function () {
                    return Excel::download(new PointLKHSantriExport, 'poin-lkh.xlsx');
                }),
                
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
            'index' => Pages\ListPointLKHS::route('/'),
            'create' => Pages\CreatePointLKH::route('/create'),
            'edit' => Pages\EditPointLKH::route('/{record}/edit'),
        ];
    }
}
