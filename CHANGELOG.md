# Changelog

All notable changes to this project will be documented in this file.

## [1.1.0] - 2026-10-20

### Added
- 🚀 **Artisan Install Command:** Added `php artisan filament-sleek:install` with optional `--publish-css` flag to streamline setup.
- 🎨 **Gray Color Customization:** Added `grayColor()` fluent method with support for Filament palettes (`Color::Slate`, `Color::Zinc`, etc.) and hex codes.
- 🔤 **Font / Typography Helper:** Added `font()` method to easily specify custom fonts with automatic font family, URL, and provider configuration on the Panel.
- ✨ **Curated Aesthetic Presets:** Added built-in design presets: `emerald()`, `indigo()`, `violet()`, `rose()`, `amber()`, `cyan()`, `sky()`, `ocean()`, `sunset()`, and `preset(string)`.
- 🖤 **OLED Pure Black Dark Mode:** Added `oled()` method and `.sleek-oled` CSS styles for pitch-black `#000000` backgrounds on dark mode.
- 📐 **Subtle Border Radius Mode:** Added `radius('subtle')` / `subtle()` method and `.sleek-radius-subtle` styles for a cleaner, understated rectangular rounded aesthetic.
- 🧪 Added full test coverage for all new theme customization methods and the install command.

## [1.0.1] - 2026-10-20

### Fixed
- 🐛 **Pagination Display Bug (Issue #13):** Removed rigid `grid grid-rows-[auto_auto]` on `.fi-main-ctn` which was causing table pagination controls and footers to disappear or fail to render.
- 🐛 **Modal Under Header Bug (Issue #14):** Fixed stacking context by replacing `sticky` with `relative` on `.fi-main-ctn` and ensuring `div.fi-modal` has top stacking context (`z-index: 9999`) above topbars and headers.
- 🛡️ **Conflict with Auth Page Enhancers (Issue #17):** Added scoped selectors `:not(:has(.custom-auth-wrapper))` so auth enhancer plugins like `AuthUIEnhancerPlugin` or custom split-screen layouts are not distorted by the default card backgrounds and borders.
- 📐 **Sidebar Menu Bleed:** Added `overflow: hidden` and `max-width: 100%` on `.fi-sidebar-item` to prevent navigation labels from overflowing during transition states.

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