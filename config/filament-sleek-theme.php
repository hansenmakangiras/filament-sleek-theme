<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Aesthetic Preset
    |--------------------------------------------------------------------------
    |
    | Supported: 'emerald', 'indigo', 'violet', 'rose', 'amber',
    |            'cyan', 'sky', 'ocean', 'sunset', or null.
    |
    */

    'preset' => null,

    /*
    |--------------------------------------------------------------------------
    | Primary Color
    |--------------------------------------------------------------------------
    |
    | Filament Color palette name (e.g. 'indigo', 'emerald') or HEX code.
    |
    */

    'primary_color' => null,

    /*
    |--------------------------------------------------------------------------
    | Gray Palette Color
    |--------------------------------------------------------------------------
    |
    | Supports 'slate', 'zinc', 'neutral', 'stone', 'gray', or a custom HEX.
    |
    */

    'gray_color' => null,

    /*
    |--------------------------------------------------------------------------
    | Typography / Font
    |--------------------------------------------------------------------------
    |
    | Configure the default font family, custom stylesheet URL, or provider.
    |
    */

    'font' => [
        'family' => null,
        'url' => null,
        'provider' => null,
    ],

    /*
    |--------------------------------------------------------------------------
    | OLED Dark Mode
    |--------------------------------------------------------------------------
    |
    | When enabled, dark mode renders true pitch-black (#000000) backgrounds
    | ideal for high-contrast OLED displays.
    |
    */

    'oled' => false,

    /*
    |--------------------------------------------------------------------------
    | Border Radius Style
    |--------------------------------------------------------------------------
    |
    | Supported: 'sleek' (curved/pill design) or 'subtle' (understated rounded).
    |
    */

    'radius' => 'sleek',

    /*
    |--------------------------------------------------------------------------
    | Compact / High Density Mode
    |--------------------------------------------------------------------------
    |
    | Tightens table cells, form fields, and sidebar spacing for data-heavy
    | applications (ERP, Finance, CRM).
    |
    */

    'compact' => false,

    /*
    |--------------------------------------------------------------------------
    | Frosted Glass / Glassmorphism
    |--------------------------------------------------------------------------
    |
    | Adds backdrop blur and translucent surfaces to topbars, modals,
    | and dropdown menus.
    |
    */

    'glass' => false,

    /*
    |--------------------------------------------------------------------------
    | Native Thin Scrollbars
    |--------------------------------------------------------------------------
    |
    | Replaces bulky default browser scrollbars with minimal, modern
    | 6px curved scrollbars that adapt to light and dark themes.
    |
    */

    'thin_scrollbars' => true,

    /*
    |--------------------------------------------------------------------------
    | Accent Glow
    |--------------------------------------------------------------------------
    |
    | Adds modern soft neon ambient glow to active navigation pills, primary
    | buttons on hover, and focused inputs.
    |
    */

    'accent_glow' => false,

    /*
    |--------------------------------------------------------------------------
    | Sidebar Contrast
    |--------------------------------------------------------------------------
    |
    | When enabled in light mode, renders the sidebar in deep dark contrast
    | while keeping the main content bright and clean.
    |
    */

    'sidebar_contrast' => false,

];
