<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Procedure;
use Filament\Tables\Table;
use Faker\Provider\ar_EG\Text;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProcedureResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProcedureResource\RelationManagers;

class ProcedureResource extends Resource
{
    protected static ?string $model = Procedure::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Arsip HR';
    protected static ?string $navigationLabel = 'SOP';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('SOP')
                ->columns([
                    'sm' => 2,
                    'xl' => 12,
                    '2xl' => 12,
                ])
                    ->schema([
                        TextInput::make('title')->label('Nama SOP')
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpan([
                                        'sm' => 2,
                                        'xl' => 4,
                                        '2xl' => 4,
                                    ]),               
                        TextInput::make('number')->label('Nomor')
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpan([
                                        'sm' => 2,
                                        'xl' => 4,
                                        '2xl' => 4,
                                    ]), 
                        Select::make('type')
                                    ->label('Ruang Lingkup')
                                    ->columnSpan([
                                        'sm' => 2,
                                        'xl' => 4,
                                        '2xl' => 4,
                                    ])
                                    ->options([
                                        'SDI' => 'SDI',
                                        'BAITUL MAAL' => 'BAITUL MAAL',
                                        'BAITUL TAMWIL' => 'BAITUL TAMWIL',
                                        'KITA' => 'KITA',
                                        'AUDIT DAN CO' => 'AUDIT DAN CO',
                                    ])
                                    ->native(false),
                        FileUpload::make('file')
                                    ->label('Upload Berkas SOP')
                                    ->directory('sop')
                                    ->required()
                                    ->columnSpan([
                                        'sm' => 2,
                                        'xl' => 4,
                                        '2xl' => 4,
                                    ]),
                        RichEditor::make('description')
                                    ->columnSpan([
                                        'sm' => 2,
                                        'xl' => 8,                        
                                        '2xl' => 8,
                        ])            
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->label('Nama SOP')->searchable(),
                TextColumn::make('number')->label('Nomor')->searchable()->badge()->color('primary'),
                TextColumn::make('type')->label('Ruang Lingkup')->searchable()->badge()->color('warning'),
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
            'index' => Pages\ListProcedures::route('/'),
            'create' => Pages\CreateProcedure::route('/create'),
            'edit' => Pages\EditProcedure::route('/{record}/edit'),
        ];
    }
}
