<?php

use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Colors\Color;
use Resma\FilamentAwinTheme\FilamentAwinTheme;

it('can instantiate the plugin', function () {
    $plugin = FilamentAwinTheme::make();

    expect($plugin)->toBeInstanceOf(FilamentAwinTheme::class)
        ->and($plugin)->toBeInstanceOf(Plugin::class);
});

it('has the correct plugin id', function () {
    $plugin = FilamentAwinTheme::make();

    expect($plugin->getId())->toBe('filament-awin-theme');
});

it('can customize primary color with palette or hex', function () {
    $plugin = FilamentAwinTheme::make();

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
    $plugin = FilamentAwinTheme::make()->primaryColor(Color::Emerald);
    $panel = new Panel();

    $plugin->register($panel);

    expect($panel->getId())->toBeNull();
});
