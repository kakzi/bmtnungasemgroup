<?php

namespace App\Providers\Filament;

use Filament\Pages;
use Filament\Panel;
use Filament\Widgets;
use Filament\PanelProvider;
use Filament\Enums\ThemeMode;
use Filament\Support\Colors\Color;
use Awcodes\LightSwitch\Enums\Alignment;
use Filament\Navigation\NavigationGroup;
use App\Filament\Resources\OfficeResource;
use Awcodes\LightSwitch\LightSwitchPlugin;
use Filament\Http\Middleware\Authenticate;
use Filament\Navigation\NavigationBuilder;
use Jeffgreco13\FilamentBreezy\BreezyCore;
use Awcodes\FilamentVersions\VersionsPlugin;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use DiogoGPinto\AuthUIEnhancer\AuthUIEnhancerPlugin;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Swis\Filament\Backgrounds\FilamentBackgroundsPlugin;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Njxqlus\FilamentProgressbar\FilamentProgressbarPlugin;
use Leandrocfe\FilamentApexCharts\FilamentApexChartsPlugin;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use SolutionForest\FilamentSimpleLightBox\SimpleLightBoxPlugin;
use Tapp\FilamentAuthenticationLog\FilamentAuthenticationLogPlugin;


class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->defaultThemeMode(ThemeMode::Dark)
            ->brandLogo(asset('images/logo.png'))
            ->darkModeBrandLogo(asset('images/logo-dark.png'))
            ->brandLogoHeight('3rem')
            ->favicon(asset('images/favicon.png'))
            // ->sidebarCollapsibleOnDesktop()
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            // ->pages([
            //     Pages\Dashboard::class,
            // ])
            // ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            // ->widgets([
            //     // Widgets\AccountWidget::class,
            //     // Widgets\FilamentInfoWidget::class,
            // ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
                \Hasnayeen\Themes\Http\Middleware\SetTheme::class

            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->plugins([
                // \TomatoPHP\FilamentUsers\FilamentUsersPlugin::make(),
                \BezhanSalleh\FilamentShield\FilamentShieldPlugin::make(),
                \Hasnayeen\Themes\ThemesPlugin::make(),
                FilamentProgressbarPlugin::make()->color('#00BFFF'),
                FilamentApexChartsPlugin::make(),
                SimpleLightBoxPlugin::make(),
                AuthUIEnhancerPlugin::make()
                    ->formPanelPosition('right')
                    ->formPanelWidth('40%')
                    ->emptyPanelBackgroundImageOpacity('70%'),
                // FilamentAuthenticationLogPlugin::make(),
                // VersionsPlugin::make(),
                // FilamentBackgroundsPlugin::make(),
                LightSwitchPlugin::make()
                    ->position(Alignment::BottomCenter),
                BreezyCore::make()
                    ->myProfile(
                        shouldRegisterUserMenu: true, // Sets the 'account' link in the panel User Menu (default = true)
                        shouldRegisterNavigation: false, // Adds a main navigation item for the My Profile page (default = false)
                        navigationGroup: 'Settings', // Sets the navigation group for the My Profile page (default = null)
                        hasAvatars: false, // Enables the avatar upload form component (default = false)
                        slug: 'my-profile' // Sets the slug for the profile page (default = 'my-profile')
                    ),
                ])
            ->databaseNotifications()
            ->databaseNotificationsPolling('30s');
            
    }
}
