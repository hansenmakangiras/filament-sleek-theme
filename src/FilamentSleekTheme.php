<?php

namespace HansenMakangiras\FilamentSleekTheme;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Colors\Color;
use Filament\View\PanelsRenderHook;
use Illuminate\Support\HtmlString;
use InvalidArgumentException;

class FilamentSleekTheme implements Plugin
{
    /**
     * @var array<string, string>|string
     */
    public array|string $primaryColor = Color::Blue;

    /**
     * @var array<string, string>|string|null
     */
    public array|string|null $grayColor = null;

    public string $theme = 'vendor/hansenmakangiras/filament-sleek-theme/resources/css/theme.css';

    public ?string $fontFamily = null;

    public ?string $fontUrl = null;

    public ?string $fontProvider = null;

    public bool $oled = false;

    public string $radius = 'sleek';

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
        $colors = [
            'primary' => $this->primaryColor,
        ];

        if ($this->grayColor !== null) {
            $colors['gray'] = $this->grayColor;
        }

        $panel
            ->colors($colors)
            ->viteTheme($this->theme);

        if ($this->fontFamily !== null) {
            $panel->font($this->fontFamily, $this->fontUrl, $this->fontProvider);
        }

        $classes = [];

        if ($this->oled) {
            $classes[] = 'sleek-oled';
        }

        if ($this->radius === 'subtle') {
            $classes[] = 'sleek-radius-subtle';
        }

        if (! empty($classes)) {
            $classString = implode(' ', $classes);
            $panel->renderHook(
                PanelsRenderHook::BODY_START,
                fn () => new HtmlString("<script>document.documentElement.classList.add('{$classString}');document.body?.classList.add('{$classString}');</script>"),
            );
        }
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
     * Set the gray palette color (e.g. Color::Slate, Color::Zinc, Color::Neutral).
     *
     * @param  array<string, string>|string|null  $color
     */
    public function grayColor(array|string|null $color): static
    {
        $this->grayColor = $color;

        return $this;
    }

    /**
     * Get the gray palette color.
     *
     * @return array<string, string>|string|null
     */
    public function getGrayColor(): array|string|null
    {
        return $this->grayColor;
    }

    /**
     * Set custom typography font.
     */
    public function font(string $family, ?string $url = null, ?string $provider = null): static
    {
        $this->fontFamily = $family;
        $this->fontUrl = $url;
        $this->fontProvider = $provider;

        return $this;
    }

    public function getFontFamily(): ?string
    {
        return $this->fontFamily;
    }

    public function getFontUrl(): ?string
    {
        return $this->fontUrl;
    }

    public function getFontProvider(): ?string
    {
        return $this->fontProvider;
    }

    /**
     * Enable or disable pure black / OLED dark mode.
     */
    public function oled(bool $condition = true): static
    {
        $this->oled = $condition;

        return $this;
    }

    public function isOled(): bool
    {
        return $this->oled;
    }

    /**
     * Set curved border radius style ('sleek' or 'subtle').
     */
    public function radius(string $radius): static
    {
        $this->radius = in_array($radius, ['sleek', 'subtle']) ? $radius : 'sleek';

        return $this;
    }

    /**
     * Apply subtle (minimal) border-radius style.
     */
    public function subtle(bool $condition = true): static
    {
        $this->radius = $condition ? 'subtle' : 'sleek';

        return $this;
    }

    public function getRadius(): string
    {
        return $this->radius;
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

    /**
     * Apply a curated aesthetic theme preset.
     */
    public function preset(string $preset): static
    {
        return match (strtolower($preset)) {
            'emerald' => $this->emerald(),
            'indigo' => $this->indigo(),
            'violet' => $this->violet(),
            'rose' => $this->rose(),
            'amber' => $this->amber(),
            'cyan' => $this->cyan(),
            'sky' => $this->sky(),
            'ocean' => $this->ocean(),
            'sunset' => $this->sunset(),
            default => throw new InvalidArgumentException("Unknown preset [{$preset}]. Supported presets: emerald, indigo, violet, rose, amber, cyan, sky, ocean, sunset."),
        };
    }

    public function emerald(): static
    {
        return $this->primaryColor(Color::Emerald)->grayColor(Color::Slate);
    }

    public function indigo(): static
    {
        return $this->primaryColor(Color::Indigo)->grayColor(Color::Slate);
    }

    public function violet(): static
    {
        return $this->primaryColor(Color::Violet)->grayColor(Color::Zinc);
    }

    public function rose(): static
    {
        return $this->primaryColor(Color::Rose)->grayColor(Color::Stone);
    }

    public function amber(): static
    {
        return $this->primaryColor(Color::Amber)->grayColor(Color::Neutral);
    }

    public function cyan(): static
    {
        return $this->primaryColor(Color::Cyan)->grayColor(Color::Zinc);
    }

    public function sky(): static
    {
        return $this->primaryColor(Color::Sky)->grayColor(Color::Slate);
    }

    public function ocean(): static
    {
        return $this->primaryColor('#0284c7')->grayColor(Color::Slate);
    }

    public function sunset(): static
    {
        return $this->primaryColor('#f97316')->grayColor(Color::Neutral);
    }
}
