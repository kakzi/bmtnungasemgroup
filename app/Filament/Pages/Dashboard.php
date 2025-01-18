<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\FundingMarketingChart;
use App\Filament\Widgets\FundingMarketingOverview;
use App\Filament\Widgets\MarketingOverview;
use Filament\Forms\Get;
use Filament\Forms\Form;
use Filament\Actions\Action;
use Illuminate\Contracts\View\View;
use Filament\Forms\Components\Select;
use Filament\Support\Enums\Alignment;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\DatePicker;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use App\Models\Kantor; // Pastikan untuk mengimport model Kantor
use App\Models\User;

class Dashboard extends \Filament\Pages\Dashboard
{
    use HasPageShield;

    protected function getShieldRedirectPath(): string
    {
        return '/admin/users'; // Redirect jika user tidak memiliki akses
    }

    protected static ?string $title = 'Kinerja Marketing';
    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-line';

    use HasFiltersForm;

    public ?string $startDate = null;
    public ?string $endDate = null;
    public ?string $kantor = null; // Properti untuk filter kantor

    public function getWidgets(): array
    {
        return [
            MarketingOverview::class,           // Widget bawah
            FundingMarketingChart::class,           // Widget bawah
        ];
    }
    public function filtersForm(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->columns([
                        'sm' => 2,
                        'xl' => 3,
                        '2xl' => 3,
                    ])
                    ->schema([
                        DatePicker::make('startDate')
                            ->label('Tanggal Mulai')
                            ->maxDate(fn (Get $get) => $get('endDate') ?: now()),
                        DatePicker::make('endDate')
                            ->label('Tanggal Selesai')
                            ->minDate(fn (Get $get) => $get('startDate') ?: now())
                            ->maxDate(now()),
                            // Inside your form or resource
                        Select::make('marketing')
                                ->label('Nama Marketing')
                                ->options(function () {
                                    return User::with('roles') // Load roles relationship
                                        ->whereHas('roles', function ($query) { // Use 'roles' instead of 'role' for many-to-many
                                            $query->where('name', 'Marketing'); // Filter by role name
                                        })
                                        ->pluck('name', 'id'); // Get name and id for the select options
                                })
                                ->searchable(), // Optional: make the select searchable
                    ]),
            ]);
    }
}