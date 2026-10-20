<?php

use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Colors\Color;
use HansenMakangiras\FilamentSleekTheme\FilamentSleekTheme;

it('can instantiate the plugin', function () {
    $plugin = FilamentSleekTheme::make();

    expect($plugin)->toBeInstanceOf(FilamentSleekTheme::class)
        ->and($plugin)->toBeInstanceOf(Plugin::class);
});

it('has the correct plugin id', function () {
    $plugin = FilamentSleekTheme::make();

    expect($plugin->getId())->toBe('filament-sleek-theme');
});

it('can customize primary color with palette or hex', function () {
    $plugin = FilamentSleekTheme::make();

    // Default primary color
    expect($plugin->getPrimaryColor())->toBe(Color::Blue);

    // Custom palette
    $plugin->primaryColor(Color::Emerald);
    expect($plugin->getPrimaryColor())->toBe(Color::Emerald);

    // Custom hex
    $plugin->primaryColor('#3b82f6');
    expect($plugin->getPrimaryColor())->toBe('#3b82f6');
});

it('can register plugin into a filament panel', function () {
    $plugin = FilamentSleekTheme::make()->primaryColor(Color::Emerald);
    $panel = (new Panel)->id('admin');

    $plugin->register($panel);

    expect($panel->getId())->toBe('admin')
        ->and($panel->getViteTheme())->toBe('vendor/hansenmakangiras/filament-sleek-theme/resources/css/theme.css');
});

it('can customize vite theme path', function () {
    $plugin = FilamentSleekTheme::make();

    // Default theme path
    expect($plugin->getTheme())->toBe('vendor/hansenmakangiras/filament-sleek-theme/resources/css/theme.css');

    // Custom theme path
    $customPath = 'resources/css/filament/sleek-theme/theme.css';
    $plugin->theme($customPath);
    expect($plugin->getTheme())->toBe($customPath);

    $panel = (new Panel)->id('admin');
    $plugin->register($panel);
    expect($panel->getViteTheme())->toBe($customPath);
});
