# Setup

This page explains the two runtime modes and what `include-styles` actually does.

## Choose Your Runtime Mode

- `Livewire stack mode`: you open Livewire modal components and can stack child modals.
- `Standalone Blade mode`: you render `<x-corepine.modal />` directly and control it with browser events.

## Livewire Stack Mode (Host Required)

Render the host once in your main layout (usually before `</body>`):

```blade
<x-corepine.modal.assets />
```

What this host does:

- Mounts the Livewire modal manager
- Listens to modal events (`modal.open`, `modal.close`, ...)
- Maintains stack state (parent/child modals)
- Renders overlays, transitions, and shell output

Without this host, stack mode open events fire but nothing appears.

## What `include-styles` Means

You can ask the host to inject package CSS directly:

```blade
<x-corepine.modal.assets include-styles />
```

In plain language: this outputs a `<link>` tag to `vendor/corepine-modal/app.css` for you.

Use it when:

- You want fastest setup
- You are not importing package CSS in your own build pipeline

Avoid using it when you already import package CSS via your own `resources/css/app.css`.

## `include-styles` vs `@import`

| Option | Best For | Notes |
| --- | --- | --- |
| `<x-corepine.modal.assets include-styles />` | Quick setup | Auto-injects stylesheet link from host |
| `@import "../../vendor/corepine/modal/resources/css/app.css";` | Tailwind/Vite pipeline | Keeps style loading in your main CSS build |

Use one strategy, not both.

## Standalone Blade Mode (Host Optional)

If you only use standalone `<x-corepine.modal />` components, the Livewire host is not required.

Standalone guide: [Standalone Blade Modal](doc:standalone-blade-modal)

## Quick Verification Checklist

- Stack mode: modal opens and closes with escape
- Standalone mode: `modal.open` event toggles the target `id`
- No duplicated CSS strategy (choose one)

## Next Step

If you use Tailwind/Vite pipeline CSS, continue here: [Tailwind Setup](doc:tailwind-setup)
