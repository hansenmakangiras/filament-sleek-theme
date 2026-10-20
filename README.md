# Filament Sleek Theme

[![Latest Version on Packagist](https://img.shields.io/packagist/v/hansenmakangiras/filament-sleek-theme.svg?style=flat-square)](https://packagist.org/packages/hansenmakangiras/filament-sleek-theme)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/hansenmakangiras/filament-sleek-theme/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/hansenmakangiras/filament-sleek-theme/actions?query=workflow%3Arun-tests+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/hansenmakangiras/filament-sleek-theme.svg?style=flat-square)](https://packagist.org/packages/hansenmakangiras/filament-sleek-theme)
[![License](https://img.shields.io/packagist/l/hansenmakangiras/filament-sleek-theme.svg?style=flat-square)](https://packagist.org/packages/hansenmakangiras/filament-sleek-theme)
[![PHP Version](https://img.shields.io/packagist/dependency-v/hansenmakangiras/filament-sleek-theme/php?style=flat-square)](https://packagist.org/packages/hansenmakangiras/filament-sleek-theme)
[![Filament](https://img.shields.io/badge/filament-v4%20%7C%20v5-f59e0b?style=flat-square)](https://filamentphp.com)

A **modern, sleek, responsive, and customizable** theme for FilamentPHP v4 & v5, designed to elevate your admin panel with curved interfaces, pill navigation, and minimal shadow styling.

> [!NOTE]
> Originally forked from [resmatech/filament-awin-theme](https://github.com/resmatech/filament-awin-theme). Maintained and updated by [Hansen Makangiras](https://github.com/hansenmakangiras) with full **Filament v5 & v4 dual compatibility**, Service Provider support, and modern testing setup.

<p align="center">
  <img src="./images/screenshot/sidebar-contrast-glass-compact-accentglow-preview.png" alt="Filament Sleek Theme Preview" width="100%">
</p>

## ✨ Features

- **FilamentPHP v4 & v5 Ready** – Fully compatible with both Filament v4 and v5
- **Dark/Light Mode** – Toggle between elegant color schemes
- **Curved & Pill Design** – Smooth rounded cards, table containers, and pill-shaped navigation
- **Fully Responsive** – Works flawlessly on desktop and mobile devices
- **Tailwind CSS v4** – Built on modern Tailwind CSS v4 styling
- **Plug & Play** – Minimal setup, configure colors effortlessly

## Installation

### 1. Install via Composer
```bash
composer require hansenmakangiras/filament-sleek-theme
```

### 2. Run the Install Command (Recommended)
You can quickly install and set up the package using the Artisan command:
```bash
php artisan filament-sleek:install
```
Or optionally publish the CSS files directly into your project:
```bash
php artisan filament-sleek:install --publish-css
```

### 3. Add CSS to Vite
In your `vite.config.js`, include the theme's CSS:
```js
input: [
    // ...existing files,
    'vendor/hansenmakangiras/filament-sleek-theme/resources/css/theme.css'
],
```
Then rebuild assets:
```bash
npm run build
```

*(Optional)* If you prefer publishing assets manually:
```bash
php artisan vendor:publish --tag=filament-sleek-theme-css
```

### 4. Register the Plugin
In your panel provider (e.g. `app/Providers/Filament/AdminPanelProvider.php`):
```php 
use HansenMakangiras\FilamentSleekTheme\FilamentSleekTheme;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...your existing config
        ->plugins([
            FilamentSleekTheme::make(),
        ]);
}
```

## 🎨 Theme Customization

### 1. Curated Aesthetic Presets
Instantly apply harmonious colors and typography tailored for Sleek Theme:
```php
FilamentSleekTheme::make()
    ->emerald() // Emerald primary + Slate gray + Inter font
    // or: ->indigo(), ->violet(), ->rose(), ->amber(), ->cyan(), ->sky(), ->ocean(), ->sunset()
```
Or specify by preset name:
```php
FilamentSleekTheme::make()->preset('violet');
```

### 2. Custom Primary & Gray Colors
Easily change primary accent and dark/light gray undertones (Slate, Zinc, Neutral, Stone, Gray):
```php
use Filament\Support\Colors\Color;

FilamentSleekTheme::make()
    ->primaryColor(Color::Violet)
    ->grayColor(Color::Slate);
```
Or using custom hex values:
```php
FilamentSleekTheme::make()
    ->primaryColor('#6366f1')
    ->grayColor('#64748b');
```

### 3. Custom Font / Typography
Set your panel's typography with a single line:
```php
FilamentSleekTheme::make()
    ->font('Plus Jakarta Sans', 'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap');
```

### 4. OLED / Pure Black Dark Mode
Switch dark mode from standard deep charcoal to true `#000000` pitch black for high-contrast OLED displays:
```php
FilamentSleekTheme::make()
    ->oled();
```

### 5. Border Radius & Subtle Style
Prefer clean, subtle rounded corners instead of the ultra-curved default pill containers:
```php
FilamentSleekTheme::make()
    ->subtle(); // or ->radius('subtle')
```

### 6. Compact / High Density Mode
Tighten table cells, form fields, and sidebar items for data-dense applications (ERP, Finance, CRM):
```php
FilamentSleekTheme::make()
    ->compact();
```

### 7. Frosted Glass / Glassmorphism
Add modern translucent backdrop blur (`backdrop-blur-md`) to the topbar, modals, and dropdowns:
```php
FilamentSleekTheme::make()
    ->glass();
```

### 8. Native Thin Scrollbars
Replace bulky OS scrollbars with minimal, modern 6px curved scrollbars (enabled by default):
```php
FilamentSleekTheme::make()
    ->thinScrollbars(); // or ->thinScrollbars(false) to disable
```

### 9. Subtle Accent Ambient Glow
Give active navigation pills and primary button hovers a soft modern ambient neon glow:
```php
FilamentSleekTheme::make()
    ->accentGlow();
```

### 10. Sidebar Contrast Mode
Render a dark high-contrast sidebar in light mode while keeping your main content area bright and clean:
```php
FilamentSleekTheme::make()
    ->sidebarContrast();
```

### 11. Topbar Contrast Mode
Render a dark high-contrast topbar in light mode, seamlessly unifying the header frame with the sidebar:
```php
FilamentSleekTheme::make()
    ->sidebarContrast()
    ->topbarContrast();
```

### Combine Everything Fluently
```php
FilamentSleekTheme::make()
    ->emerald()
    ->oled()
    ->glass()
    ->compact()
    ->accentGlow()
    ->sidebarContrast()
    ->topbarContrast();
```

## ⚙️ Global Configuration File (Optional)

You can publish the configuration file to define global defaults across all panels (especially useful for multi-panel applications):

```bash
php artisan vendor:publish --tag=filament-sleek-theme-config
```
or via the install command:
```bash
php artisan filament-sleek:install --publish-config
```

The published `config/filament-sleek-theme.php` allows you to set defaults for:
- `preset`
- `primary_color` & `gray_color`
- `font`
- `oled`
- `radius`
- `compact`
- `glass`
- `thin_scrollbars`
- `accent_glow`
- `sidebar_contrast`
- `topbar_contrast`

## 🛠️ Customizing Theme CSS (Optional)

If you published the CSS files via `vendor:publish` or `--publish-css`:
```bash
php artisan vendor:publish --tag=filament-sleek-theme-css
```
You can point the plugin to your published file:
```php
FilamentSleekTheme::make()
    ->theme('resources/css/filament/sleek-theme/theme.css')
```

## Screenshots

### 🌟 Frosted Glass & Ambient Glow
<p align="center">
  <a href="./images/screenshot/glass-preview.png" target="_blank">
    <img src="./images/screenshot/glass-preview.png" alt="Frosted Glass Preview" width="100%">
  </a>
</p>

### 🖤 OLED Pure Black Dark Mode with Accent Glow
<p align="center">
  <a href="./images/screenshot/oled-darkmode-accentglow-preview.png" target="_blank">
    <img src="./images/screenshot/oled-darkmode-accentglow-preview.png" alt="OLED Dark Mode with Accent Glow" width="100%">
  </a>
</p>

### 🌓 Combined Modes: Glass, Compact & Sidebar Contrast
<table>
    <thead>
        <tr>
            <th width="50%">Light Mode (Glass + Compact + Accent Glow)</th>
            <th width="50%">Dark Mode (Glass + Compact + Accent Glow)</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <a href="./images/screenshot/sidebar-contrast-glass-compact-accentglow-preview.png" target="_blank">
                    <img src="./images/screenshot/sidebar-contrast-glass-compact-accentglow-preview.png" alt="Sidebar Contrast Glass Compact Light"/>
                </a>
            </td>
            <td>
                <a href="./images/screenshot/sidebar-contrast-glass-compact-accentglow-darkmode-preview.png" target="_blank">
                    <img src="./images/screenshot/sidebar-contrast-glass-compact-accentglow-darkmode-preview.png" alt="Sidebar Contrast Glass Compact Dark"/>
                </a>
            </td>
        </tr>
    </tbody>
</table>

### 📊 Sidebar Contrast & High-Density Compact Mode
<table>
    <thead>
        <tr>
            <th width="50%">Sidebar Contrast</th>
            <th width="50%">Sidebar Contrast + Compact Mode</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <a href="./images/screenshot/sidebar-contrast-preview.png" target="_blank">
                    <img src="./images/screenshot/sidebar-contrast-preview.png" alt="Sidebar Contrast Preview"/>
                </a>
            </td>
            <td>
                <a href="./images/screenshot/sidebar-contrast-compact-preview.png" target="_blank">
                    <img src="./images/screenshot/sidebar-contrast-compact-preview.png" alt="Sidebar Contrast Compact Preview"/>
                </a>
            </td>
        </tr>
    </tbody>
</table>

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
