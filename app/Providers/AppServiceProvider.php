<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Filament::serving(function() {
            Filament::registerNavigationGroups([
                NavigationGroup::make()
                    ->label('Data Surat')
                    ->collapsed(),
                NavigationGroup::make()
                    ->label('Laporan')
                    ->collapsed(),
                NavigationGroup::make()
                    ->label('Refrensi')
                    ->collapsed(),
            ]);
            Filament::registerNavigationItems(
                [
                    //
                ]
            );
        });
    }
}
