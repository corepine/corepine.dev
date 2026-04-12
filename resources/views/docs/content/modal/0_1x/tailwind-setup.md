# Tailwind Setup

Use this page if your app compiles CSS through Tailwind/Vite.

## The Goal

Include Corepine Modal styles in your main CSS build so all modal classes are available in your compiled output.

## Add The Import

In your main stylesheet (usually `resources/css/app.css`):

```css
@import "../../vendor/corepine/modal/resources/css/app.css";
```

## What This Does

- Loads package modal styles into your app CSS bundle
- Preserves a single CSS pipeline in your project
- Lets Tailwind see package `@source` paths shipped by the package

## Do I Still Need `include-styles`?

No. If you use the `@import` approach, keep `include-styles` off.

If you prefer host-injected styles, use `<x-corepine.modal.assets include-styles />` and skip this import.

## Rebuild Assets

```bash
npm run dev
```

If styles still look unchanged, restart your frontend watcher once.

## Next Step

Build your first modal class and open flow: [Quick Start](doc:quick-start)
