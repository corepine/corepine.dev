# Installation

This page explains what to run and why each command matters.

## Requirements

- PHP `^8.2|^8.3|^8.4`
- Laravel `^11.0|^12.0|^13.0`
- Livewire `^3.7|^4.0`

Livewire is required by the package because stack mode uses a Livewire host.
Standalone Alpine + Blade usage is still fully supported.

## Step 1: Install The Package

```bash
composer require corepine/modal
```

This downloads the package and registers its service provider.

## Step 2: Publish Config (Recommended)

```bash
php artisan vendor:publish --tag=corepine-modal-config
```

This creates `config/corepine-modal.php`, where you can change:

- Event names (`modal.open`, `modal.close`, ...)
- Default modal behavior (`dismissible`, `closeOnEscape`, ...)
- Size tokens (`default`, `lg`, custom editor size, ...)

## What To Do Next

1. Understand runtime mode setup: [Setup](doc:setup)
2. Choose CSS strategy: [Tailwind Setup](doc:tailwind-setup)
3. Build your first modal: [Quick Start](doc:quick-start)
