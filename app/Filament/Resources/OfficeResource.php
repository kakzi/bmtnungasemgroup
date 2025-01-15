<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Office;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\OfficeResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\OfficeResource\RelationManagers;

class OfficeResource extends Resource
{
    protected static ?string $model = Office::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    protected static ?string $navigationGroup = 'Master';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->label('Nama Kantor')
                    ->maxLength(255)->columnSpan(2)
                    ->live()
                    ->afterStateUpdated(function (Set $set, $state) {
                        // Get the maximum kode_kantor
                        $maxKodeKantor = Office::max('kode_kantor'); // Get the maximum kode_kantor

                        // Determine the next kode_kantor
                        $nextKodeKantor = $maxKodeKantor ? $maxKodeKantor + 1 : 1; // If maxKodeKantor is null, start from 1

                        // Set the next kode_kantor
                        $set('kode_kantor', sprintf("%03s", $nextKodeKantor)); // Format to 3 digits
                    }),
                TextInput::make('kode_kantor')
                    ->required()
                    ->label('Kode Kantor')
                    ->tel()->columnSpan(2),
                TextInput::make('telp')
                    ->required()
                    ->label('Nomor Kantor')
                    ->tel()->columnSpan(2),
                TextInput::make('village')
                    ->required()
                    ->label('Desa')
                    ->columnSpan(2),
                TextInput::make('lat')
                    ->required()
                    ->label('Latitude')->columnSpan(2),
                TextInput::make('long')
                    ->required()
                    ->label('Longitude')->columnSpan(2),
                TextInput::make('address')
                    ->required()
                    ->label('Alamat Kantor')
                    ->columnSpan(2),
            ])->columns(4);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('kode_kantor')
                    ->label('Kode Kantor')
                    ->searchable()
                    ->badge()
                    ->color('info')
                    ->sortable(),
                TextColumn::make('long')
                    ->label('Longitude')
                    ->searchable()
                    ->badge()
                    ->color('primary')
                    ->sortable(),
                TextColumn::make('lat')
                    ->label('Latitude')
                    ->searchable()
                    ->badge()
                    ->color('primary')
                    ->sortable(),
                // TextColumn::make('slug'),
                TextColumn::make('telp'),
                TextColumn::make('village'),
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
            'index' => Pages\ListOffices::route('/'),
            'create' => Pages\CreateOffice::route('/create'),
            'edit' => Pages\EditOffice::route('/{record}/edit'),
        ];
    }
}
