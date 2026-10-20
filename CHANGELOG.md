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

### Added
- 🏷️ **Universal Pill Badges:** Applied `rounded-full` styling across all Filament status tags and pills (`.fi-badge`), transforming table status badges, infolists, and form hints into modern, elegant capsule pills.
- 🌫️ **Cinematic Modal Backdrop Blur:** Added `backdrop-filter: blur(8px) saturate(130%)` to `.fi-modal-close-overlay`, smoothly blurring the background behind open modals and slide-overs for enhanced focus and visual depth.

### Fixed
- 📑 **Table Column & Filter Dropdown Stacking in Glass Mode (`glass()`):** Fixed an issue where closed table rows containing action dropdown groups (`ActionGroup`) had their `z-index` set to 30 unconditionally via `:has(.fi-dropdown-panel)`, causing their action buttons (`: Aksi`) and status badges to draw directly on top of open table header dropdowns (Column Manager and Filter popovers). Elevated the table header toolbar stacking context (`z-index: 25`, and `z-index: 40 !important` when a dropdown is open) and restricted row/cell stacking context elevation (`z-index: 30`) strictly to when a row dropdown is actively open (`[aria-expanded="true"]`).
- 👤 **My Profile & Aside Sections Breathing Room & Theme Alignment (`profil-saya` / `:aside="true"`):** Fixed an issue where aside sections (`.fi-section.fi-aside`, such as Filament Breezy's My Profile page and form aside sections) were boxed inside a 4px padded container with double borders, touching each other with zero breathing room and not respecting Glass and OLED base themes. Made `.fi-section.fi-aside` a transparent layout grid, transformed the content container (`.fi-section.fi-aside > .fi-section-content-ctn`) into the sleek card with authentic frosted glass acrylic in Glass mode and pitch-black in OLED mode, and enforced a generous 2rem (`gap-8`) breathing room between stacked profile sections without cramped divide lines.
- 🖤 **Eliminate Slate-Blue in OLED Mode across Custom Pages & Filament Shield:** Overrode Tailwind's dark gray variables in OLED mode (`--color-gray-950: #000000`, `--color-gray-900: #09090b`, `--color-gray-800: #121215`, `--color-gray-700: #27272a`) and added explicit container overrides for all `dark:bg-gray-900` / `dark:bg-gray-800` classes. Custom pages like Panduan Pengguna and plugin views like Filament Shield (Roles & Permissions) now render in clean, pure OLED dark instead of slate blue.
- 📑 **Contained Form & Schema Tabs in OLED Mode:** Styled `.fi-sc-tabs`, `.fi-sc-tabs.fi-contained`, `.fi-tabs.fi-contained`, and `.fi-sc-tabs-tab` with OLED `#09090b` backgrounds and `#27272a` hairline borders, eliminating the blue box appearance on tabbed edit forms (such as Transaction Edit) and Shield role permission containers.
- 📊 **Individual Stats Overview Card Borders:** Added explicit 1px solid borders (`border border-gray-300 dark:border-gray-700` and `border: 1px solid #27272a !important` in OLED mode) to individual stat item cards (`.fi-wi-stats-overview-stat`), ensuring cards in reports and dashboards always have crisp, visible outlines without outer container clutter.
- 🔍 **Global Search Overlay Modernization & OLED/Glass Support:** Upgraded `.fi-global-search-results-ctn` from `rounded-lg` to modern `rounded-2xl shadow-2xl`, with dark/light group headers and subtle item borders. Added complete styling for OLED mode (`#0c0c0e`, `#27272a` hairline borders) and frosted glass mode (`blur(24px) saturate(190%)`, translucent surface, specular rings).
- 📋 **Nested Form Components (Repeater, Builder & Key-Value):** Upgraded `.fi-fo-repeater-item`, `.fi-fo-builder-item`, and `.fi-fo-key-value` to modern rounded containers with dedicated headers. Fully adapted them across OLED mode (`#09090b` cards, `#0c0c0e` headers) and Glass mode (`blur(14px)`, acrylic fills).
- ✍️ **Rich Editor & Markdown Editor Styling:** Framed `.fi-fo-rich-editor` and `.fi-fo-markdown-editor` in sleek rounded containers with seamlessly matching toolbars across default, OLED, and Glass modes.
- ☑️ **Table Selection Indicator Bar:** Styled the bulk record selection toolbar (`.fi-ta-selection-indicator`) with matching translucent surfaces in Glass mode and OLED dark finishes in OLED mode.
- 🔔 **Toast Notifications in OLED & Glass Modes:** Added first-class styling for Filament toast notifications (`.fi-no-notification`). In OLED mode, notifications now use true OLED dark surface (`#0c0c0e`) and hairline borders (`#27272a`). In Glass mode, notifications feature frosted glass acrylics (`backdrop-filter: blur(20px)`, translucent backgrounds, and specular highlights).
- 📑 **Tabs Container Adaptations across OLED, Glass & Subtle Modes:** Enhanced `.fi-tabs` and its inner card layer (`.fi-tabs::before`) to seamlessly conform to all theme variations: pure black & OLED surfaces in OLED mode, frosted glass translucent surfaces in Glass mode, and proper `0.75rem` / `0.5rem` border radii in `subtle()` mode.
- 📐 **Dashboard Chart & Generic Widgets Height Stretch:** Ensured all non-table dashboard widgets (`.fi-wi-widget:not(.fi-wi-stats-overview)`) and their inner `.fi-section` stretch via `flex flex-col flex-1 h-full`, preventing awkward bottom empty space when widgets sit alongside taller items in a dashboard grid.
- 📊 **Table Header Action Column Compact Padding:** Ensured `.fi-ta-actions-header-cell` and `.fi-ta-empty-header-cell` are included in the compact table header selectors, guaranteeing completely uniform vertical alignment across all columns in `compact()` mode.
- 📊 **Table Header Action Column Stray Border Removal:** Fixed an issue where a stray horizontal line/border was visible directly above the table empty actions column header cell (`.fi-ta-actions-header-cell.fi-ta-empty-header-cell`) while other columns had none. Enforced zero top border on `.fi-ta-content-ctn`, `thead th`, `.fi-ta-header-cell`, `.fi-ta-actions-header-cell`, and `.fi-ta-empty-header-cell`, and included the empty action header cell selectors across Glass and OLED mode styling rules.
- 📐 **Dashboard Table Widget Height & Bottom Empty Space Fix:** Fixed an issue where table widgets inside a dashboard grid (such as unpaginated widgets placed alongside taller widgets) left an awkward empty gray space/tray at the bottom. Made `.fi-wi-widget.fi-wi-table`, `.fi-ta`, `.fi-ta-ctn`, `.fi-ta-main`, and `.fi-ta-content-ctn` stretch cleanly via `flex flex-col flex-1 h-full`, ensuring the inner card seamlessly fills the widget height with uniform border padding and properly centers empty states.
- 📑 **Table Dropdown & Filter Stacking Context in Glass Mode (`glass()`):** Fixed an issue where column toggle and filter dropdown panels (`.fi-dropdown-panel`) were partially sliced and obscured behind table rows and summary rows. Removed nested `backdrop-filter` from `.fi-ta-header`, `.fi-ta-header-toolbar`, and `.fi-ta-header-cell` that was creating an isolated stacking trap, elevated `.fi-ta-header-toolbar` with `z-index: 20`, guaranteed `z-index: 50 !important` on all dropdown panels, and added matching translucent styling to table summary rows.
- 📊 **Stats Overview Outer Container Cleanup:** Eliminated redundant outer background plate and borders around `StatsOverviewWidget` containers (`.fi-wi-stats-overview`, `.fi-section-not-contained`, `.fi-sc-section-not-contained`) across default, glass, and OLED modes. Each stat widget card now sits cleanly and independently on the canvas without nested outer boxes or distracting backgrounds peeking through the gaps between stat items.
- 🪟 **True Full-Dashboard Glassmorphism (`glass()`):** Transformed `.sleek-glass` into a real, full-dashboard glassmorphism system:
  - **Floating Panels & Dropdowns:** Converted `.fi-dropdown-panel` and `.fi-modal-window` to authentic frosted glass (`rgba(255, 255, 255, 0.8)`, `backdrop-filter: blur(20px) saturate(190%)`, white glass borders) so underlying table rows, widgets, and charts visibly blur through floating menus.
  - **Cards, Widgets & Table Acrylics:** Applied frosted translucent fills (`rgba(255, 255, 255, 0.72)` in light, `rgba(15, 23, 42, 0.65)` in dark), `blur(18px)`, and inner glass reflection rings to stats overview widgets, section cards, and tables.
  - **Ambient Canvas Mesh Gradient:** Added ultra-subtle ambient multi-color radial gradient meshes to `.fi-main-ctn` across light, dark, and OLED modes, allowing frosted glass cards to refract light dynamically.
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