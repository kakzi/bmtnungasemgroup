<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\ReportRegional;
use Filament\Resources\Resource;
use App\Models\ReportBranchManager;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Checkbox;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ReportRegionalResource\Pages;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use App\Filament\Resources\ReportRegionalResource\RelationManagers;

class ReportRegionalResource extends Resource
{
    protected static ?string $model = ReportRegional::class;

    protected static ?string $navigationIcon = 'heroicon-o-bug-ant';

    protected static ?string $navigationGroup = 'Reports';

    protected static ?string $navigationLabel = 'Regional Manager';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Data Laporan Regional Manager')
                    ->columns([
                        'sm' => 2,
                        'xl' => 12,
                        '2xl' => 12,
                    ])
                    ->schema([
                        Hidden::make('make_by')
                            ->label('Data ini di Buat oleh ')
                            ->default(auth()->user()->name)
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ]),

                        Toggle::make('pendampingan')->default(false)
                            ->label('Pendampingan')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ]),
                        Toggle::make('briefing')->default(false)
                            ->label('Briefing/Evaluasi')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ]),
                        Toggle::make('swot')->default(false)
                            ->label('Analisa SWOT')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 4,
                                '2xl' => 4,
                            ]),
                        Select::make('checklist_personil')
                            ->label('Laporan Branch Manager')
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 12,
                                '2xl' => 12,
                            ])
                            ->required()
                            ->multiple()
                            ->live()
                            ->options(
                                ReportBranchManager::with('users')
                                    ->whereIn('office_id', (array) auth()->user()->office_id)
                                    ->whereDate('created_at', today())
                                    ->get()
                                    ->pluck('users.name', 'id')
                            )
                            ->searchable(),
                        
                        FileUpload::make('file_pendampingan')
                                ->label('Upload Bukti Foto Pendampingan')
                                ->directory('report-regional')
                                ->required()
                                ->image()
                                ->optimize('webp')
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 4,
                                    '2xl' => 4,
                                ]),
                        FileUpload::make('file_briefing')
                                ->label('Upload Bukti Foto Briefing/Evaluasi')
                                ->directory('report-regional')
                                ->required()
                                ->image()
                                ->optimize('webp')
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 4,
                                    '2xl' => 4,
                                ]),
                        FileUpload::make('file_swot')
                                ->label('Upload Bukti Foto File SWOT')
                                ->directory('report-regional')
                                ->required()
                                ->image()
                                ->optimize('webp')
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 4,
                                    '2xl' => 4,
                                ]),
                            RichEditor::make('catatan_khusus')
                                ->label('Catatan')
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 12,
                                    '2xl' => 12,
                                ])

                                ]),

                                Section::make('Data Transport Jarak')
                                ->columns([
                                    'sm' => 2,
                                    'xl' => 12,
                                    '2xl' => 12,
                                ])->schema([
                                    TextInput::make('km_harian')
                                        ->label('KM Harian')
                                        ->required()
                                        ->numeric()
                                        ->columnSpan([
                                            'sm' => 2,
                                            'xl' => 4,
                                            '2xl' => 4,
                                        ]),
                                    TextInput::make('wilayah')
                                        ->label('Wilayah')
                                        ->required()
                                        ->columnSpan([
                                            'sm' => 2,
                                            'xl' => 4,
                                            '2xl' => 4,
                                        ]),
                                    
                                    FileUpload::make('foto_tarikan')
                                        ->label('Upload Bukti Foto Tarikan Terjauh')
                                        ->directory('report-marketing')
                                        ->required()
                                        ->image()
                                        ->optimize('webp')
                                        ->columnSpan([
                                            'sm' => 2,
                                            'xl' => 4,
                                            '2xl' => 4,
                                        ]),
                                    
                            ]),
                            Section::make('Pernyataan Kejujuran santri')
                                ->columns([
                                    'sm' => 2,
                                    'xl' => 12,
                                    '2xl' => 12,
                                ])->schema([
                                    Checkbox::make('kejujuran')->label('Saya mengirimkan data ini dengan sadar dan sejujur - jujurnya')->default(false)
                                        ->columnSpan([
                                            'sm' => 2,
                                            'xl' => 12,
                                            '2xl' => 12,
                                        ]),
                                    
                            ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('make_by')->label('Laporan')->searchable(),
                IconColumn::make('check_s')
                    ->label('SF')
                    ->boolean()
                    ->tooltip('Checked by Staff')
                    ->trueIcon('heroicon-o-check-badge')
                    ->falseIcon('heroicon-o-x-mark'),
                IconColumn::make('check_m')
                    ->label('MR')
                    ->boolean()
                    ->tooltip('Approved by Manager')
                    ->trueIcon('heroicon-o-check-badge')
                    ->falseIcon('heroicon-o-x-mark'),
                IconColumn::make('check_as')
                    ->label('AD')
                    ->boolean()
                    ->tooltip('Approved by Asdir')
                    ->trueIcon('heroicon-o-check-badge')
                    ->falseIcon('heroicon-o-x-mark'),
                IconColumn::make('check_dir')
                    ->label('DR')
                    ->boolean()
                    ->tooltip('Approved by Direktur')
                    ->trueIcon('heroicon-o-check-badge')
                    ->falseIcon('heroicon-o-x-mark'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                ->color('info')
                    ->button() // Makes the action a button
                ->extraAttributes([
                    'class' => 'bg-blue-500 hover:bg-blue-600 text-white font-bold  rounded-full',
                ]),
            Tables\Actions\ViewAction::make()
                ->color('warning')
                    ->button() // Makes the action a button
                ->extraAttributes([
                    'class' => 'bg-blue-500 hover:bg-blue-600 text-white font-bold  rounded-full',
                ]),
            Tables\Actions\DeleteAction::make()
                ->color('danger')
                    ->button() // Makes the action a button
                ->extraAttributes([
                    'class' => 'bg-blue-500 hover:bg-blue-600 text-white font-bold  rounded-full',
                ]),
            Tables\Actions\Action::make('customAction')
                ->label('Validate')
                ->icon('heroicon-o-check-badge')
                ->action(function (ReportRegional $record) {
                    $id = auth()->user()->id;
                    $check = User::with('roles')->where('id', $id)->first();
                    if($check->roles[0]->name == 'Staff') {
                        $record->update(['check_s' => true]);
                        Notification::make()
                            ->title('Laporan sudah di check!')
                            ->success()
                            ->send();
                    } else if($check->roles[0]->name == 'Branch Manager') {
                        $record->update(['check_bm' => true]);
                        Notification::make()
                            ->title('Laporan sudah di check!')
                            ->success()
                            ->send();
                    } else if($check->roles[0]->name == 'Regional Manager') {
                        $record->update(['check_rm' => true]);
                        Notification::make()
                            ->title('Laporan sudah di check!')
                            ->success()
                            ->send();
                    } else if($check->roles[0]->name == 'Manager') {
                        $record->update(['check_rm' => true]);
                        Notification::make()
                            ->title('Laporan sudah di check!')
                            ->success()
                            ->send();
                    } else if($check->roles[0]->name == 'Asisten Direktur Utama') {
                        $record->update(['check_as' => true]);
                        Notification::make()
                            ->title('Laporan sudah di check!')
                            ->success()
                            ->send();
                    } else if($check->roles[0]->name == 'Direktur Utama') {
                        $record->update(['check_dir' => true]);
                        Notification::make()
                            ->title('Laporan sudah di check!')
                            ->success()
                            ->send();
                    }
                
                    // Redirect to WhatsApp link (or open it in a new tab)
                    // return redirect()->away($whatsappUrl); 
                })
                ->requiresConfirmation() // Add confirmation dialog if needed
                ->color('primary')
                ->button() // Makes the action a button
                ->extraAttributes([
                    'class' => 'bg-blue-500 hover:bg-blue-600 text-white font-bold rounded-full',
                ])
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
            'index' => Pages\ListReportRegionals::route('/'),
            'create' => Pages\CreateReportRegional::route('/create'),
            'edit' => Pages\EditReportRegional::route('/{record}/edit'),
        ];
    }
}
