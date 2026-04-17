# Installation

This page covers package installation and the recommended installer workflow.

## Requirements

- PHP `^8.2|^8.3|^8.4`
- Laravel `^11|^12|^13`
- Livewire `^3.7|^4.0`

## Step 1: Install The Package

```bash
composer require corepine/threads
```

## Step 2: Run The Installer (Recommended)

```bash
php artisan threads:install
```

The installer uses prompts so you can choose what to publish:

- config
- migrations
- panel provider
- views

## Step 3: Run Migrations

If you did not choose `--migrate` in the installer, run:

```bash
php artisan migrate
```

Threads creates its own comment and attachment tables.

## Non-Interactive / CI Example

```bash
php artisan threads:install --config --migrations --panel --migrate
```

Available command options:

- `--config`
- `--migrations`
- `--panel`
- `--views`
- `--migrate`
- `--force`

## Manual Publish Tags (Optional)

If you prefer manual publishing, use package-specific tags:

```bash
php artisan vendor:publish --provider="Corepine\Threads\ThreadsServiceProvider" --tag=threads-config
php artisan vendor:publish --provider="Corepine\Threads\ThreadsServiceProvider" --tag=threads-migrations
php artisan vendor:publish --provider="Corepine\Threads\ThreadsServiceProvider" --tag=threads-provider
php artisan vendor:publish --provider="Corepine\Threads\ThreadsServiceProvider" --tag=threads-views
```

## What To Do Next

1. Wire your models and component: [Setup](doc:setup)
2. Build first end-to-end thread: [Quick Start](doc:quick-start)
3. Customize interaction behavior: [Panel Provider](doc:panel-provider)
