<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Nette\Utils\Html;
use Filament\Forms\Form;
use App\Models\Attendance;
use Filament\Tables\Table;
use Nette\Utils\ImageColor;
use Faker\Provider\ar_EG\Text;
use Filament\Resources\Resource;
use App\Exports\AttendanceExport;
use Illuminate\Support\HtmlString;
use Filament\Tables\Actions\Action;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AttendanceDataExport;
use Illuminate\Support\Facades\Blade;
use Filament\Forms\Components\Actions;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\Layout\Grid;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AttendanceResource\Pages;
use App\Filament\Resources\AttendanceResource\RelationManagers;

class AttendanceResource extends Resource
{
    protected static ?string $model = Attendance::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    protected static ?string $navigationLabel = 'Absensi';

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
                Grid::make()
                    ->columns(1)
                    ->schema([
                        Split::make([
                            Grid::make()
                                ->columns(2)
                                ->schema([
                                    ImageColumn::make('detail.0.photo')
                                        ->height(100)
                                        ->width(85)
                                        ->extraImgAttributes(['class' => 'rounded-lg']),
                                    ImageColumn::make('detail.1.photo')
                                        ->height(100)
                                        ->width(85)
                                        ->default('https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y')
                                        ->extraImgAttributes(['class' => 'rounded-lg']),

                                ])->grow(false),
                            Stack::make([
                                    TextColumn::make('user.name')->searchable()->fontFamily('Poppins')->label('Nama'),
                                    TextColumn::make('user.roles.name'),
                                    Grid::make()
                                        ->columns(3)
                                        ->schema([
                                            TextColumn::make('detail.0.pukul')->icon('heroicon-m-clock')->badge()->color('primary'),
                                            TextColumn::make('detail.0.type')->icon('heroicon-m-face-smile')->badge()->color('primary')->formatStateUsing(fn ($state) => match ($state) {
                                                'in' => 'Datang',
                                            }),
                                            TextColumn::make('detail.0.point')->icon('heroicon-m-star')->badge()->color('primary'),
                                            TextColumn::make('detail.1.pukul')->icon('heroicon-m-clock')->badge()->color('warning'),
                                            TextColumn::make('detail.1.type')->icon('heroicon-m-face-smile')->badge()->color('warning')->formatStateUsing(fn ($state) => match ($state) {
                                                'out' => 'Pulang',
                                            }),
                                            TextColumn::make('detail.1.point')->icon('heroicon-m-star')->badge()->color('warning'),
                                        ])->extraAttributes(['class' => 'space-y-1'])
                                ])->grow(false)->extraAttributes(['class' => 'space-y-0'])
                        ]),
                        
                    ])
                
            ])
            ->contentGrid([
                'md' => 2,
                'xl' => 2
            ])
            ->headerActions([
                Action::make('export')
                ->label('Export Point')
                ->icon('heroicon-o-arrow-down-tray')
                ->action(function () {
                    return Excel::download(new AttendanceExport, 'poin-absensi.xlsx');
                }),
                Action::make('export_data')
                ->label('Export Data Absensi')
                ->color('success')
                ->icon('heroicon-o-document-text')
                ->action(function () {
                    return Excel::download(new AttendanceDataExport, 'data-absensi.xlsx');
                }),
            ])
            ->filters([

            ])
            ->modifyQueryUsing(function (Builder $query) { 
                return $query->orderByDesc('created_at');
            })
            ->actions([
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
                // Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListAttendances::route('/'),
            'create' => Pages\CreateAttendance::route('/create'),
            'edit' => Pages\EditAttendance::route('/{record}/edit'),
        ];
    }
}
