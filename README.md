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

### Combine Everything Fluently
```php
FilamentSleekTheme::make()
    ->primaryColor(Color::Cyan)
    ->grayColor(Color::Zinc)
    ->font('Poppins')
    ->oled()
    ->subtle();
```

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
<table>
    <tbody>
        <tr>
            <td>
                <a href="./images/Dashboard-dark.png" target="_blank">
                    <img style="border-radius: 10px" src="./images/Dashboard-dark.png" alt="Dashboard Dark"/>
                </a>
            </td>
            <td>
                <a href="./images/Dashboard-light.png" target="_blank">
                    <img style="border-radius: 10px" src="./images/Dashboard-light.png" alt="Dashboard Light"/>
                </a>
            </td>
        </tr>
        <tr>
            <td>
                <a href="./images/Form-dark.png" target="_blank">
                    <img style="border-radius: 10px" src="./images/Form-dark.png" alt="Form Dark"/>
                </a>
            </td>
            <td>
                <a href="./images/Form-light.png" target="_blank">
                    <img style="border-radius: 10px" src="./images/Form-light.png" alt="Form Light"/>
                </a>
            </td>
        </tr>
        <tr>
            <td>
                <a href="./images/Table-dark.png" target="_blank">
                    <img style="border-radius: 10px" src="./images/Table-dark.png" alt="Table Dark"/>
                </a>
            </td>
            <td>
                <a href="./images/Table-light.png" target="_blank">
                    <img style="border-radius: 10px" src="./images/Table-light.png" alt="Table Light"/>
                </a>
            </td>
        </tr>
        <tr>
            <td>
                <a href="./images/Notifications-dark.png" target="_blank">
                    <img style="border-radius: 10px" src="./images/Notifications-dark.png" alt="Notifications Dark"/>
                </a>
            </td>
            <td>
                <a href="./images/Notifications-light.png" target="_blank">
                    <img style="border-radius: 10px" src="./images/Notifications-light.png" alt="Notifications Light"/>
                </a>
            </td>
        </tr>
    </tbody>
</table>

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
