# Changelog

All notable changes to this project will be documented in this file.

## [1.0.0] - 2026-10-20

### Added
- 🚀 Rebranded to **`hansenmakangiras/filament-sleek-theme`** with dedicated namespace `HansenMakangiras\FilamentSleekTheme`.
- ⚡ Full dual support for **Filament v4** & **Filament v5** (`^4.0|^5.0`) and Laravel 11, 12, & 13.
- 📦 Added `FilamentSleekThemeServiceProvider` with asset publishing support (`filament-sleek-theme-css`).
- 🧪 Added full test suite using Pest and Orchestra Testbench.
- ⚙️ Added GitHub Actions CI workflow for PHP 8.2, 8.3, and 8.4.
- 🔍 Added Livewire v4 scanning paths to `resources/css/theme.css`.

### Changed
- Modernized `package.json` with `@tailwindcss/cli: ^4.3.3` and prettier formatting scripts.
- Cleaned up unused imports and added `getPrimaryColor()` getter.