# Filament Sleek Theme

A **modern, sleek, responsive, and customizable** theme for FilamentPHP v4 & v5, designed to elevate your admin panel with curved interfaces, pill navigation, and minimal shadow styling.

> [!NOTE]
> Originally forked from [resmatech/filament-awin-theme](https://github.com/resmatech/filament-awin-theme). Maintained and updated by [Hansen Makangiras](https://github.com/hansenmakangiras) with full **Filament v5 & v4 dual compatibility**, Service Provider support, and modern testing setup.

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

### 2. Add CSS to Vite
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

*(Optional)* You can also publish the CSS files directly into your project:
```bash
php artisan vendor:publish --tag=filament-sleek-theme-css
```

### 3. Register the Plugin
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

## 🎨 Customizing the Primary Color

The `FilamentSleekTheme` plugin allows you to set a custom primary color for your Filament panel.

### Using Filament’s Built-in Color Palettes
```php
use HansenMakangiras\FilamentSleekTheme\FilamentSleekTheme;
use Filament\Support\Colors\Color;

$panel
    ->plugins([
        FilamentSleekTheme::make()
            ->primaryColor(Color::Emerald),
    ]);
```

### Using a Custom Hex Color
```php
FilamentSleekTheme::make()
    ->primaryColor('#3b82f6');
```

## Screenshots
<table>
    <tbody>
        <tr>
            <td>
                <a href="https://raw.githubusercontent.com/resmatech/filament-awin-theme/refs/heads/main/images/Dashboard-dark.png" target="_blank">
                    <img style="border-radius: 10px" src="https://raw.githubusercontent.com/resmatech/filament-awin-theme/refs/heads/main/images/Dashboard-dark.png" alt="Dashboard Dark"/>
                </a>
            </td>
            <td>
                <img style="border-radius: 10px" src="https://raw.githubusercontent.com/resmatech/filament-awin-theme/refs/heads/main/images/Dashboard-light.png" alt="Dashboard Light"/>
            </td>
        </tr>
        <tr>
            <td>
                <a href="https://raw.githubusercontent.com/resmatech/filament-awin-theme/refs/heads/main/images/Form-dark.png" target="_blank">
                    <img style="border-radius: 10px" src="https://raw.githubusercontent.com/resmatech/filament-awin-theme/refs/heads/main/images/Form-dark.png" alt="Form Dark"/>
                </a>
            </td>
            <td>
                <img style="border-radius: 10px" src="https://raw.githubusercontent.com/resmatech/filament-awin-theme/refs/heads/main/images/Form-light.png" alt="Form Light"/>
            </td>
        </tr>
        <tr>
            <td>
                <a href="https://raw.githubusercontent.com/resmatech/filament-awin-theme/refs/heads/main/images/Table-dark.png" target="_blank">
                    <img style="border-radius: 10px" src="https://raw.githubusercontent.com/resmatech/filament-awin-theme/refs/heads/main/images/Table-dark.png" alt="Table Dark"/>
                </a>
            </td>
            <td>
                <img style="border-radius: 10px" src="https://raw.githubusercontent.com/resmatech/filament-awin-theme/refs/heads/main/images/Table-light.png" alt="Table Light"/>
            </td>
        </tr>
        <tr>
            <td>
                <a href="https://raw.githubusercontent.com/resmatech/filament-awin-theme/refs/heads/main/images/Notifications-dark.png" target="_blank">
                    <img style="border-radius: 10px" src="https://raw.githubusercontent.com/resmatech/filament-awin-theme/refs/heads/main/images/Notifications-dark.png" alt="Notifications Dark"/>
                </a>
            </td>
            <td>
                <img style="border-radius: 10px" src="https://raw.githubusercontent.com/resmatech/filament-awin-theme/refs/heads/main/images/Notifications-light.png" alt="Notifications Light"/>
            </td>
        </tr>
    </tbody>
</table>

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
