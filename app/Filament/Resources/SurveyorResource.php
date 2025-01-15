<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Office;
use Filament\Forms\Get;
use Filament\Forms\Set;
use App\Models\Surveyor;
use Filament\Forms\Form;
use App\Models\Permohonan;
use Filament\Tables\Table;
use Filament\Support\RawJs;
use Filament\Actions\EditAction;
use Filament\Resources\Resource;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\CheckboxList;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Resources\SurveyorResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SurveyorResource\RelationManagers;
use App\Filament\Resources\SurveyorResource\Pages\EditSurveyor;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use App\Filament\Resources\SurveyorResource\Pages\ListSurveyors;
use App\Filament\Resources\SurveyorResource\Pages\CreateSurveyor;

class SurveyorResource extends Resource
{
    protected static ?string $model = Surveyor::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-magnifying-glass';

    protected static ?string $navigationGroup = 'Si Akad';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Data Surveyor')
                    ->columns([
                        'sm' => 2,
                        'xl' => 12,
                        '2xl' => 12,
                    ])
                    ->schema([
                        Hidden::make('office_id')
                            ->label('Kode Kantor')
                            ->default(function (): string{
                                $office = Office::whereIn('id', (array) auth()->user()->office_id)->first();
                                    return $office->id;
                                }
                            )->columnSpan([
                                'sm' => 2,
                                'xl' => 6,
                                '2xl' => 6,
                            ]),
                        Hidden::make('make_by')
                            ->label('Data ini di Buat oleh ')
                            ->default(auth()->user()->name)
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 6,
                                '2xl' => 6,
                            ]),
                        Select::make('permohonan_id')
                            ->label('Nama Anggota')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 5,
                                '2xl' => 5,
                            ])
                            ->options(
                                Permohonan::whereIn('office_id',(array)auth()->user()->office_id)
                                    ->with('anggota') // Eager load the anggota relationship
                                    ->get()
                                    ->pluck('anggota.name', 'id') // Get the name and id for the select options
                            )
                            ->searchable()
                            ->native(false)
                            ->live()// Set the default value for editing
                            ->afterStateUpdated(function (Get $get, Set $set, $state) {
                                // You can add any additional logic here if needed after the state is updated
                                $permohonan = Permohonan::find($get('permohonan_id'));
                                if ($permohonan) {
                                    // $set('anggota_id', $permohonan->anggota_id);
                                    $set('nik', $permohonan->anggota->nik);
                                }
                            }),
                        TextInput::make('nik')
                            ->label('NIK')
                            ->readOnly()
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ]),
                        Select::make('status_berkas')
                            ->label('Status Berkas')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 3,
                                '2xl' => 3,
                            ])
                            ->options([
                                'sudah_lengkap' => 'Sudah Lengkap',
                                'belum_lengkap' => 'Belum Lengkap',
                            ])
                            ->native(false),
                        TextInput::make('kemampuan_bayar')
                            ->label('Kemampuan')
                            ->required()
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->numeric()
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ]),
                        TextInput::make('nominal_approval')
                            ->label('Nominal Approval')
                            ->required()
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->numeric()
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ]),
                        Select::make('recommendation')
                            ->label('Rekomendasi Surveyor')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ])
                            ->options([
                                'approved' => 'Approved',
                                'approve_pending' => 'Approve Pending',
                                'rejected' => 'Rejected',
                            ])
                            ->native(false),
                        FileUpload::make('file_history')
                            ->label('Upload File Histori')
                            ->directory('surveyor')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ]),
                        FileUpload::make('file_dokumentasi')
                            ->label('Upload File Dokumentasi')
                            ->directory('surveyor')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ]),
                        FileUpload::make('file_surveyor')
                            ->label('Upload File Surveyor')
                            ->directory('surveyor')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ]),
                        CheckboxList::make('dokumentasi')
                            ->label('Dokumentasi')
                            ->required()
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 3,
                                '2xl' => 3,
                            ])
                            ->options([
                                'foto_rumah' => 'Foto Rumah',
                                'foto_usaha' => 'Foto Usaha'
                            ])
                            ->columns(1),
                        RichEditor::make('note')
                            ->label('Catatan Survey')
                            ->required()
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 9,
                                '2xl' => 9,
                            ]),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('permohonan.anggota.name')->label('Nama')->searchable(),
                TextColumn::make('permohonan.anggota.nik')
                    ->label('NIK')
                    ->badge()
                    ->color('success')
                    ->copyable()
                    ->copyMessage('NIK berhasil di copy!')
                    ->copyMessageDuration(1500)
                    ->searchable(),
                TextColumn::make('nominal_approval')->label('Nominal Approval')->money('IDR', locale: 'id'),
                TextColumn::make('recommendation')
                    ->label('Rekomendasi')
                    ->badge()
                    ->icon('heroicon-m-bell')
                    ->color(fn (string $state): string => match ($state) {
                        'approved' => 'primary',
                        'approve_pending' => 'warning',
                        'rejected' => 'danger',
                    }),
                Tables\Columns\TextColumn::make('file_surveyor')
                    ->label('Berkas')
                    ->badge()
                    ->icon('heroicon-m-envelope')
                    ->color('primary')
                    ->simpleLightbox("https://jagoflutter.com/wp-content/uploads/2023/08/FIC-Fullstack-Laravel-Template-Auth-Fortify-Login-Register-Email-Verification.pdf", defaultDisplayUrl: true)
                    ->formatStateUsing(fn ($state) => 'Dokumen'),    
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
            'index' => Pages\ListSurveyors::route('/'),
            'create' => Pages\CreateSurveyor::route('/create'),
            'edit' => Pages\EditSurveyor::route('/{record}/edit'),
        ];
    }
}
