<?php

namespace HansenMakangiras\FilamentSleekTheme;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Colors\Color;

class FilamentSleekTheme implements Plugin
{
    /**
     * @var array<string, string>|string
     */
    public array|string $primaryColor = Color::Blue;

    public string $theme = 'vendor/hansenmakangiras/filament-sleek-theme/resources/css/theme.css';

    public function getId(): string
    {
        return 'filament-sleek-theme';
    }

    public static function make(): static
    {
        return new static;
    }

    public function register(Panel $panel): void
    {
        $panel
            ->colors([
                'primary' => $this->primaryColor,
            ])
            ->viteTheme($this->theme);
    }

    public function boot(Panel $panel): void
    {
        //
    }

    /**
     * Set the primary color.
     *
     * @param  array<string, string>|string  $color
     */
    public function primaryColor(array|string $color): static
    {
        $this->primaryColor = $color;

        return $this;
    }

    /**
     * Get the primary color.
     *
     * @return array<string, string>|string
     */
    public function getPrimaryColor(): array|string
    {
        return $this->primaryColor;
    }

    /**
     * Set the Vite theme CSS path.
     */
    public function theme(string $theme): static
    {
        $this->theme = $theme;

        return $this;
    }

    /**
     * Get the Vite theme CSS path.
     */
    public function getTheme(): string
    {
        return $this->theme;
    }
}
