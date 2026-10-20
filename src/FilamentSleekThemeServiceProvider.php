<?php

namespace HansenMakangiras\FilamentSleekTheme;

use HansenMakangiras\FilamentSleekTheme\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentSleekThemeServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-sleek-theme';

    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasConfigFile('filament-sleek-theme')
            ->hasCommand(InstallCommand::class);
    }

    public function packageBooted(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/css' => resource_path('css/filament/sleek-theme'),
            ], 'filament-sleek-theme-css');
        }
    }
}
