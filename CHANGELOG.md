# Changelog

All notable changes to this project will be documented in this file.

## [1.3.0] - 2026-10-20

### Added
- 🪄 **Topbar Contrast Mode (`topbarContrast()`):** Added first-class fluent method `->topbarContrast()` and config option `'topbar_contrast' => false` to render the topbar in matching deep dark slate (`#0f172a`), creating a unified, seamless header frame for the entire panel alongside `sidebarContrast()`.
- 🏢 **Compact Tenant Menu:** Added tight spacing, 1.5rem avatars, and adjusted typography for the tenant switcher in `compact()` mode.
- 📊 **Full Dashboard & Page Density in `compact()` Mode:** Extended compact styling across the entire Filament UI:
  - **Stats Overview Widgets:** Tightened padding (`0.75rem 1rem`), scaled value typography (`1.375rem`), and decreased content gap.
  - **Page Layout & Header:** Reduced page vertical padding and block spacing from 32px to 16px, tightened heading typography and header gaps.
  - **Buttons:** Condensed buttons to 2rem height with `py-1 px-3` and 1rem icons.
  - **Section Cards & Forms:** Overrode contained section paddings to `0.625rem 0.875rem`, reduced form grid gaps, and condensed label/hint margins.
  - **Modals:** Compacted modal headers, content, and footers.

### Fixed
- ☀️ **Strict Dark Scoping for OLED Mode (`oled()`):** Enforced `.dark` scoping across all OLED pure-black selectors (`.dark.sleek-oled`, `html.dark.sleek-oled`, `body.dark.sleek-oled`), preventing OLED styles from unintentionally forcing dark backgrounds onto the sidebar and canvas when the user switches to Light mode.
- 🎨 **Light Mode Inset Canvas in `topbarContrast()`:** Explicitly styled `.fi-main-ctn` with light background (`#f8fafc`) and subtle borders in light mode when `topbarContrast()` is active, ensuring dark text, page titles, and breadcrumbs are 100% legible against the light canvas while the topbar and sidebar retain their dark frame.
- 🖤 **Refined OLED Pure Black Mode (`oled()`):** Upgraded border lines from virtually invisible `#1a1a1a` to crisp `#27272a` (zinc-800 hairline borders), framing tables, sections, and containers with luxury modern contrast. Added first-class OLED styling for dropdown panels (`.fi-dropdown-panel`), theme switchers, table rows, and modals (`#0c0c0e`, border `#27272a`, deep elevation shadows) — eliminating clashing slate blue backgrounds on user and tenant menus in OLED mode.
- 🌟 **Dark Mode Sidebar Menu Hover Visibility (`accentGlow()` & standard):** Replaced stripped `@apply dark:hover:bg-gray-800` with high-contrast, rounded-full pill hover styling in dark mode. When `accentGlow()` is active, inactive sidebar navigation items on hover now render a clearly visible rounded pill tinted with 20% primary color and a soft, ambient neon glow (`box-shadow: 0 0 14px 1px color-mix(...)`), crisp `#ffffff` labels, and matching tenant switcher hover states across dark, OLED, and light modes.
- 🌟 **Smooth Rounded Accent Glow (`accentGlow()`):** Removed `overflow: hidden` on `.fi-sidebar-item` and `.fi-sidebar-item-btn` that was clipping the glow into a flat, boxy rectangle. Shifted to radial non-offset blur (`0 0 16px 2px`) that smoothly diffuses around the pill curvature.
- 📐 **Seamless Content Join in `sidebarContrast()`:** Removed awkward rounded scoop (`border-top-left-radius: 0 !important; border-start-start-radius: 0 !important;`) on `.fi-main-ctn` so the main content joins completely flush against the dark sidebar.
- 🏢 **Tenant Dropdown Contrast:** Targeted `.fi-tenant-menu-trigger-tenant-name` and chevron icons with high-contrast text (`#f8fafc`) on dark sidebar surfaces, eliminating low-contrast or invisible text in light mode.
- 🔆 **Active Navigation Item Contrast in Dark & Light Modes:** Enforced pure white `#ffffff !important` with 600 font weight on active navigation item labels and icons in both light and dark mode, preventing washed-out mint or pale green text.
- 🪟 **Frosted Glass Seamless Topbar (`glass()`):** Removed bottom border line from `.fi-topbar` under the logo to ensure an unbroken, clean layout matching the default sleek design.
- 🏢 **Frosted Glass Dropdown Readability:** Enforced solid opaque backgrounds on `.fi-dropdown-panel` in `glass()` mode, preventing bright underlying elements (such as green active sidebar navigation pills) from bleeding through and obscuring menu items.
- 👤 **Circular User Trigger & Rounded Dropdown Items:** Enforced `rounded-full` on `.fi-user-menu-trigger` to eliminate flat rectangular hover boxes around avatars, and added `rounded-xl` hover pills to dropdown items and theme switcher buttons.
- 📐 **Signature Curved Content Frame in `topbarContrast()`:** Preserved the signature `2.25rem` (`rounded-ss-4xl`) corner on `.fi-main-ctn` when `topbarContrast()` is active, framing it against a unified `#0f172a` dark body background for seamless visual integration between topbar, sidebar, and content.

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
- 🐛 **Fixed Accent Glow CSS Syntax in Tailwind v4:** Replaced deprecated `rgba(var(--primary-500))` with modern CSS `color-mix(in srgb, var(--primary-500) X%, transparent)` which natively supports OKLCH color palettes in Tailwind v4 and Filament v5 without browser property discards.
- ⚡ **Synchronous Head Injection & CSP Nonce Support:** Moved theme mode classes injection to `PanelsRenderHook::HEAD_END` (with `BODY_START` fallback) and attached `Vite::cspNonce()` to guarantee classes apply before initial DOM paint and comply with Content Security Policies.
- 📐 **Full Table & Form Compact Overrides:** Added `padding-block` overrides for `.fi-ta-cell`, `.fi-ta-col`, `.fi-ta-text`, input wrappers, and row min-heights to eliminate high default padding in Filament v5 tables.
- 🌓 **Complete Sidebar Contrast Styling:** Comprehensive styling for `#fi-main-sidebar`, `.fi-sidebar-header-ctn`, `.fi-sidebar-header-controls`, tenant menus, group collapse buttons, inactive item labels, icons, hover states, and active grouped border parts.
- 🪟 **True Frosted Glassmorphism:** Applied translucent background colors, borders, and `backdrop-filter: blur() saturate()` to topbars, modal windows, and dropdown panels so frosted glass is clearly visible against light and dark backdrops.
- ⚡ **SPA / Livewire Navigated Support:** Added `livewire:navigated` and `livewire:init` listeners so classes remain active during Filament SPA navigation (`->spa()`).

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