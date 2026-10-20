# Changelog

All notable changes to this project will be documented in this file.

## [1.2.0] - 2026-10-20

### Added
- 🚀 Support for **Filament v5** while maintaining backwards compatibility with **Filament v4** (`^4.0|^5.0`).
- 📦 Added `FilamentAwinThemeServiceProvider` with asset publishing support (`filament-awin-theme-css`).
- 🧪 Added full test suite using Pest and Orchestra Testbench.
- ⚙️ Added GitHub Actions CI workflow for PHP 8.2, 8.3, and 8.4.
- 🔍 Added Livewire scanning paths to `resources/css/theme.css` for Livewire v4 compatibility.

### Changed
- Cleaned up `package.json` build scripts and removed erroneous dependencies (`install`, `npm`).
- Cleaned up `composer.json` by removing dead Facade alias and registering actual ServiceProvider.


## [1.1.0] - 2025-09-10

### Added
- 🎨 Ability to customize the **primary color** of the Filament panel via `primaryColor()` method.
  - Supports Filament color palettes (`Color::Blue`, `Color::Emerald`, etc.) and custom hex values.