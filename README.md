# Corepine.dev

[![Laravel Forge Site Deployment Status](https://img.shields.io/endpoint?url=https%3A%2F%2Fforge.laravel.com%2Fsite-badges%2F610d5c07-3a2c-494e-a3fc-44bc2c20d457&style=plastic)](https://forge.laravel.com/namu-makwembo/gorgeous-star-olq/3156502)

Official website: [corepine.dev](https://corepine.dev)

Corepine.dev is the official website and documentation hub for Corepine Laravel packages.

Corepine focuses on plug-and-go package building blocks for real product teams, including ecommerce, social, and business workflows. The goal is fast setup, strong defaults, and room to customize.

## Tags

`laravel` `documentation` `packages` `ui` `livewire` `blade` `product-tools`

## Current Scope

- Marketing landing page (`/`)
- Versioned package docs
- Package docs: Modal (`/modal/docs`)
- Package docs: Threads (`/threads/docs`)

## Local Development

1. Install dependencies:

```bash
composer install
npm install
```

2. Prepare app env (first run):

```bash
cp .env.example .env
php artisan key:generate
```

3. Start dev servers:

```bash
php artisan serve --port=8002
npm run dev
```

## Docs System (Quick Summary)

- Route entrypoint: `/{project}/docs/{segments?}`
- Docs content source: `resources/views/docs/{project}/{version_folder}/*.md`
- Sidebar source per version: `_nav.json`
- Latest version URLs omit the version segment
- Older versions keep the version segment automatically
- Markdown links support version-aware `doc:` syntax and relative `.md` links

For the full maintainer guide (version upgrades, linking rules, and structure), see [docs.md](docs.md).

## Changelog

See [CHANGELOG.md](CHANGELOG.md).
