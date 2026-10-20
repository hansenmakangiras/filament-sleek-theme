<?php

namespace Resma\FilamentAwinTheme;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentAwinThemeServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-awin-theme';

    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasAssets();
    }

    public function packageBooted(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../resources/css' => resource_path('css/filament/awin-theme'),
            ], 'filament-awin-theme-css');
        }
    }
}
