<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\RecapitulationHR;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RecapitulationHRExport;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\RecapitulationHRResource\Pages;
use App\Filament\Resources\RecapitulationHRResource\RelationManagers;
use Filament\Forms\Components\Tabs\Tab;

class RecapitulationHRResource extends Resource
{
    protected static ?string $model = RecapitulationHR::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Rekapitulasi HR';

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
                TextColumn::make('note')->label('Rekapitulasi'),
                TextColumn::make('start_periode')->label('Periode Awal'),
                TextColumn::make('end_periode')->label('Periode Akhir'),
                TextColumn::make('make_by')->label('Dibuat Oleh'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Action::make('recap')
                ->label('Export Point')
                ->icon('heroicon-o-arrow-down-tray')
                ->action(function () {
                    return Excel::download(new RecapitulationHRExport, 'recapitulation-hr.xlsx');
                }),
                
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
            'index' => Pages\ListRecapitulationHRS::route('/'),
            'create' => Pages\CreateRecapitulationHR::route('/create'),
            'edit' => Pages\EditRecapitulationHR::route('/{record}/edit'),
        ];
    }
}
