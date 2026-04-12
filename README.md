# Corepine.dev

Corepine.dev is the home site and documentation hub for Corepine Laravel packages.

Corepine focuses on plug-and-go package building blocks for real product teams, including ecommerce, social, and business workflows. The goal is fast setup, strong defaults, and room to customize.

## Current Scope

- Marketing landing page (`/`)
- Versioned package docs
- First package docs: Modal (`/modal/docs`)

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
