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

it('can customize gray color palette', function () {
    $plugin = FilamentSleekTheme::make();

    expect($plugin->getGrayColor())->toBeNull();

    $plugin->grayColor(Color::Slate);
    expect($plugin->getGrayColor())->toBe(Color::Slate);

    $panel = (new Panel)->id('admin');
    $plugin->register($panel);

    expect($panel->getColors()['gray'])->toBe(Color::Slate);
});

it('can configure custom typography font', function () {
    $plugin = FilamentSleekTheme::make()
        ->font('Plus Jakarta Sans');

    expect($plugin->getFontFamily())->toBe('Plus Jakarta Sans');

    $panel = (new Panel)->id('admin');
    $plugin->register($panel);

    expect($panel->getFontFamily())->toBe('Plus Jakarta Sans');
});

it('can apply curated aesthetic presets', function () {
    $plugin = FilamentSleekTheme::make()->emerald();
    expect($plugin->getPrimaryColor())->toBe(Color::Emerald)
        ->and($plugin->getGrayColor())->toBe(Color::Slate);

    $plugin->violet();
    expect($plugin->getPrimaryColor())->toBe(Color::Violet)
        ->and($plugin->getGrayColor())->toBe(Color::Zinc);

    $plugin->preset('sunset');
    expect($plugin->getPrimaryColor())->toBe('#f97316')
        ->and($plugin->getGrayColor())->toBe(Color::Neutral);
});

it('can enable oled dark mode', function () {
    $plugin = FilamentSleekTheme::make();
    expect($plugin->isOled())->toBeFalse();

    $plugin->oled();
    expect($plugin->isOled())->toBeTrue();

    $panel = (new Panel)->id('admin');
    $plugin->register($panel);
    expect($panel->getId())->toBe('admin');
});

it('can customize border radius style', function () {
    $plugin = FilamentSleekTheme::make();
    expect($plugin->getRadius())->toBe('sleek');

    $plugin->subtle();
    expect($plugin->getRadius())->toBe('subtle');

    $plugin->radius('sleek');
    expect($plugin->getRadius())->toBe('sleek');
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

it('does not overwrite existing panel vite theme if not explicitly customized', function () {
    $panel = (new Panel)->id('admin')->viteTheme('resources/css/filament/admin/theme.css');
    $plugin = FilamentSleekTheme::make();
    $plugin->register($panel);

    expect($panel->getViteTheme())->toBe('resources/css/filament/admin/theme.css');
});

it('can disable setting vite theme using theme null', function () {
    $panel = (new Panel)->id('admin');
    $plugin = FilamentSleekTheme::make()->theme(null);
    $plugin->register($panel);

    expect($panel->getViteTheme())->toBeNull();
});

it('can execute install command', function () {
    $this->artisan('filament-sleek:install --no-interaction')
        ->assertSuccessful();
});
