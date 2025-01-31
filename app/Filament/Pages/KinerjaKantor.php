<?php

namespace App\Filament\Pages;

use App\Models\User;
use App\Models\Office;
use Filament\Forms\Get;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use App\Filament\Widgets\OfficeOverview;
use Filament\Forms\Components\DatePicker;
use App\Filament\Widgets\MarketingOverview;
use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Widgets\MarketingChartOverview;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use App\Filament\Widgets\MarketingLandingChartOverview;

class KinerjaKantor extends \Filament\Pages\Dashboard
{
    use HasPageShield;

    protected function getShieldRedirectPath(): string
    {
        return '/admin/users'; // Redirect jika user tidak memiliki akses
    }
    protected static string $routePath = 'finance';
    protected static ?string $title = 'Kinerja Kantor';
    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-line';

    use HasFiltersForm;

    public ?string $startDate = null;
    public ?string $endDate = null;
    public ?string $kantor = null; // Properti untuk filter kantor

    public function getWidgets(): array
    {
        return [
            OfficeOverview::class,
            // MarketingOverview::class,    
            // MarketingChartOverview::class,          // Widget bawah
            // MarketingLandingChartOverview::class,          // Widget bawah
        ];
    }
    public function filtersForm(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->columns([
                        'sm' => 2,
                        'xl' => 12,
                        '2xl' => 12,
                    ])
                    ->schema([
                        DatePicker::make('date')
                            ->label('Tanggal')
                            ->default(now())
                            ->columnSpan([
                                'sm' => 2,
                                'xl' => 3,
                                '2xl' => 3,
                            ]),   
                            // Inside your form or resource
                        Select::make('office')
                                ->label('Kantor')
                                ->options(function () {
                                    return Office::pluck('name', 'id'); // Get name and id for the select options
                                })
                                ->columnSpan([
                                    'sm' => 2,
                                    'xl' => 9,
                                    '2xl' => 9,
                                ])
                                ->multiple()
                                ->searchable(), // Optional: make the select searchable
                    ]),
            ]);
    }
}
