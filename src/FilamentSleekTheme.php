<?php

namespace HansenMakangiras\FilamentSleekTheme;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Colors\Color;
use Filament\View\PanelsRenderHook;
use Illuminate\Support\Facades\Vite;
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

    public ?string $theme = null;

    protected bool $hasCustomTheme = false;

    public ?string $fontFamily = null;

    public ?string $fontUrl = null;

    public ?string $fontProvider = null;

    public bool $oled = false;

    public string $radius = 'sleek';

    public bool $compact = false;

    public bool $glass = false;

    public bool $thinScrollbars = true;

    public bool $accentGlow = false;

    public bool $sidebarContrast = false;

    public function __construct()
    {
        if (function_exists('config')) {
            if ($preset = config('filament-sleek-theme.preset')) {
                $this->preset((string) $preset);
            }

            if ($primary = config('filament-sleek-theme.primary_color')) {
                $this->primaryColor($primary);
            }

            if ($gray = config('filament-sleek-theme.gray_color')) {
                $this->grayColor($gray);
            }

            $font = config('filament-sleek-theme.font', []);
            if (! empty($font['family'])) {
                $this->font($font['family'], $font['url'] ?? null, $font['provider'] ?? null);
            }

            if (config('filament-sleek-theme.oled', false)) {
                $this->oled();
            }

            if ($radius = config('filament-sleek-theme.radius')) {
                $this->radius((string) $radius);
            }

            $this->compact = (bool) config('filament-sleek-theme.compact', false);
            $this->glass = (bool) config('filament-sleek-theme.glass', false);
            $this->thinScrollbars = (bool) config('filament-sleek-theme.thin_scrollbars', true);
            $this->accentGlow = (bool) config('filament-sleek-theme.accent_glow', false);
            $this->sidebarContrast = (bool) config('filament-sleek-theme.sidebar_contrast', false);
        }
    }

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

        $panel->colors($colors);

        if ($this->hasCustomTheme) {
            if ($this->theme !== null) {
                $panel->viteTheme($this->theme);
            }
        } elseif ($panel->getViteTheme() === null) {
            $panel->viteTheme($this->getTheme());
        }

        if ($this->fontFamily !== null) {
            $panel->font($this->fontFamily, $this->fontUrl, $this->fontProvider);
        }

        $classes = [];

        if ($this->isOled()) {
            $classes[] = 'sleek-oled';
        }

        if ($this->getRadius() === 'subtle') {
            $classes[] = 'sleek-radius-subtle';
        }

        if ($this->isCompact()) {
            $classes[] = 'sleek-compact';
        }

        if ($this->isGlass()) {
            $classes[] = 'sleek-glass';
        }

        if ($this->isThinScrollbars()) {
            $classes[] = 'sleek-scrollbars';
        }

        if ($this->isAccentGlow()) {
            $classes[] = 'sleek-glow';
        }

        if ($this->isSidebarContrast()) {
            $classes[] = 'sleek-sidebar-contrast';
        }

        if (! empty($classes)) {
            $jsonClasses = json_encode(array_values($classes));
            $hookCallback = function () use ($jsonClasses): HtmlString {
                $nonce = class_exists(Vite::class)
                    ? Vite::cspNonce()
                    : null;
                $nonceAttr = filled($nonce) ? " nonce=\"{$nonce}\"" : '';

                return new HtmlString(
                    "<script{$nonceAttr}>(function(){const c={$jsonClasses};const a=()=>{c.forEach(k=>{document.documentElement.classList.add(k);if(document.body){document.body.classList.add(k);}});};a();if(document.readyState==='loading'){document.addEventListener('DOMContentLoaded',a);}document.addEventListener('livewire:navigated',a);document.addEventListener('livewire:init',a);})();</script>"
                );
            };

            $panel->renderHook(PanelsRenderHook::HEAD_END, $hookCallback);
            $panel->renderHook(PanelsRenderHook::BODY_START, $hookCallback);
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
     * Enable or disable compact / high-density mode.
     */
    public function compact(bool $condition = true): static
    {
        $this->compact = $condition;

        return $this;
    }

    public function isCompact(): bool
    {
        return $this->compact;
    }

    /**
     * Enable or disable frosted glass / glassmorphism mode.
     */
    public function glass(bool $condition = true): static
    {
        $this->glass = $condition;

        return $this;
    }

    public function isGlass(): bool
    {
        return $this->glass;
    }

    /**
     * Enable or disable native thin / sleek scrollbars.
     */
    public function thinScrollbars(bool $condition = true): static
    {
        $this->thinScrollbars = $condition;

        return $this;
    }

    public function isThinScrollbars(): bool
    {
        return $this->thinScrollbars;
    }

    /**
     * Enable or disable subtle accent ambient glow.
     */
    public function accentGlow(bool $condition = true): static
    {
        $this->accentGlow = $condition;

        return $this;
    }

    public function isAccentGlow(): bool
    {
        return $this->accentGlow;
    }

    /**
     * Enable or disable sidebar contrast mode in light theme.
     */
    public function sidebarContrast(bool $condition = true): static
    {
        $this->sidebarContrast = $condition;

        return $this;
    }

    public function isSidebarContrast(): bool
    {
        return $this->sidebarContrast;
    }

    /**
     * Set the Vite theme CSS path, or null to disable setting a theme.
     */
    public function theme(?string $theme): static
    {
        $this->theme = $theme;
        $this->hasCustomTheme = true;

        return $this;
    }

    /**
     * Get the Vite theme CSS path.
     */
    public function getTheme(): ?string
    {
        return $this->theme ?? 'vendor/hansenmakangiras/filament-sleek-theme/resources/css/theme.css';
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
