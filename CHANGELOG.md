# Changelog

All notable changes to this project will be documented in this file.

## [1.2.0] - 2026-10-20

### Added
- 📜 **Native Thin Scrollbars (`thinScrollbars()`):** Replaced bulky OS scrollbars with modern 6px curved scrollbars (supporting WebKit & Firefox) with light and dark mode adaptation.
- 🗜️ **Compact / High-Density Mode (`compact()`):** Optimized table rows, form inputs, and sidebar spacing for data-heavy applications.
- 🪟 **Frosted Glass / Glassmorphism (`glass()`):** Added modern backdrop blur (`backdrop-blur-md`) and translucent styling to topbars, modals, and dropdowns.
- ✨ **Subtle Accent Glow (`accentGlow()`):** Added ambient glow effects to active navigation items, buttons on hover, and form inputs.
- 🌓 **Sidebar Contrast Mode (`sidebarContrast()`):** Renders a dark high-contrast sidebar in light mode.
- ⚙️ **Global Configuration File (`config/filament-sleek-theme.php`):** Added published configuration file for centralized theme settings across panels.
- 🚀 **Install Command `--publish-config`:** Added flag and interactive prompt to publish the config file during installation.
- 🧪 Added full test coverage for all new modes, config defaults, and installer flags (19 tests, 48 assertions).

### Fixed
- 🐛 **Fixed DOMException in Multi-Class Injection:** Fixed JavaScript error where multiple space-separated classes in `classList.add()` threw a `DOMException`, preventing classes like `.sleek-compact` from attaching to the DOM.
- ⚡ **SPA / Livewire Navigated Support:** Added `livewire:navigated` listener so classes remain active during Filament SPA navigation (`->spa()`).
- 🗜️ **Comprehensive Table & Form Compact Overrides:** Replaced superficial cell selectors with deep overrides targeting `.fi-ta-col`, `.fi-ta-text`, `.fi-ta-actions`, inputs, and form grids using `!important` to achieve visible, high-density compaction.

## [1.1.0] - 2026-10-20

### Added
- 🚀 **Artisan Install Command:** Added `php artisan filament-sleek:install` with optional `--publish-css` flag to streamline setup.
- 🎨 **Gray Color Customization:** Added `grayColor()` fluent method with support for Filament palettes (`Color::Slate`, `Color::Zinc`, etc.) and hex codes.
- 🔤 **Font / Typography Helper:** Added `font()` method to easily specify custom fonts with automatic font family, URL, and provider configuration on the Panel.
- ✨ **Curated Aesthetic Presets:** Added built-in design presets: `emerald()`, `indigo()`, `violet()`, `rose()`, `amber()`, `cyan()`, `sky()`, `ocean()`, `sunset()`, and `preset(string)`.
- 🖤 **OLED Pure Black Dark Mode:** Added `oled()` method and `.sleek-oled` CSS styles for pitch-black `#000000` backgrounds on dark mode.
- 📐 **Subtle Border Radius Mode:** Added `radius('subtle')` / `subtle()` method and `.sleek-radius-subtle` styles for a cleaner, understated rectangular rounded aesthetic.
- 🧪 Added full test coverage for all new theme customization methods and the install command.

### Fixed
- 🐛 **CSS Resolution in Symlinked / Path Repositories & Custom Themes:** Removed fragile relative `../../../../../vendor/filament/...` import from `resources/css/theme.css` which caused `@tailwindcss/vite` build failures when installed via Composer path repository or when imported into a custom panel theme.
- 🛡️ **Preserve Panel Vite Theme:** Prevented `FilamentSleekTheme::register()` from overwriting an already configured `$panel->viteTheme(...)`, and added support for disabling theme registration via `->theme(null)`.

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