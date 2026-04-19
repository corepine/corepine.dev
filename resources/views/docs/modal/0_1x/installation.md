# Installation & Setup

This page covers the normal onboarding flow in one place: install the package, publish config, add modal assets, import the package CSS into your app, and verify everything is wired correctly.

## Requirements

- PHP `^8.2|^8.3|^8.4`
- Laravel `^11.0|^12.0|^13.0`
- Livewire `^3.7|^4.0`

Livewire is required for stack mode because the modal host is a Livewire component. Standalone Blade + Alpine usage is still supported when you do not need class-based stacked modals.

## Step 1: Install The Package

```bash
composer require corepine/modal
```

This installs the package and registers its service provider.

## Step 2: Publish Config (Recommended)

```bash
php artisan vendor:publish --tag=corepine-modal-config
```

This creates `config/corepine-modal.php`.

The config file is where you change:

- Event names such as `modal.open` and `modal.close`
- Default modal behavior such as `dismissible` and `closeOnEscape`
- Reusable size tokens for wider editors or custom layouts

Reference page: [Configuration](doc:configuration)

## Step 3: Add Modal Assets To Your Layout

If you use stack mode, render the modal host once in your main layout, usually before `</body>`:

```blade
<x-corepine.modal.assets />
```

This host:

- Mounts the Livewire modal manager
- Listens for modal events
- Manages parent/child modal stack state
- Renders overlays, transitions, and shell output

Without this host, `modal.open` events fire but nothing appears.

## Step 4: Import Package CSS Into Your App Build

Import the package stylesheet into your main app CSS so modal styles are compiled through the same Tailwind pipeline as the rest of your app:

```css
@import "../../vendor/corepine/modal/resources/css/app.css";
```

Use this when:

- You already manage styles through `resources/css/app.css`
- You want the package styles bundled with the rest of your frontend assets
- You want a single Tailwind-driven CSS workflow in the app

## Step 5: Understand The Two Runtime Modes

- `Livewire stack mode`: open Livewire modal components and support child modals stacked above parent modals
- `Standalone Blade mode`: render `<x-corepine.modal />` directly and control it with browser events

If you only use standalone Blade modals, the Livewire host is optional.

Standalone guide: [Standalone Blade Modal](doc:standalone-blade-modal)

## Step 6: Rebuild Frontend Assets

If you imported package CSS into your app stylesheet, rebuild your frontend assets:

```bash
npm run dev
```

If styles still look unchanged, restart the watcher once.

## Next Step

Build your first modal flow here: [Quick Start](doc:quick-start)
