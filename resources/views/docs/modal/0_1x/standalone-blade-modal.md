# Standalone Blade Modal

Use standalone mode when you want a modal UI without creating a Livewire modal class.

Good for simple dialogs, quick sheets, and static interaction blocks.

## A Basic Example

This is the full shape of a standalone modal:

```blade
<x-corepine.modal
    id="billing-help"
    type="modal"
    heading="Billing Help"
    description="Quick answers for your billing questions."
>
    <p>Standalone modal body</p>

    <x-slot:footer>
        <button type="button">Done</button>
    </x-slot:footer>
</x-corepine.modal>
```

What this gives you:

- built-in header from `heading` and `description`
- modal body from the default slot
- footer docked to the bottom from `x-slot:footer`

## Opening The Modal

There are multiple ways to open a standalone modal.

The common requirement is that the modal has an `id`.

### Alpine `@click`

```blade
<div x-data>
    <button
        type="button"
        @click="$dispatch('modal.open', { id: 'billing-help' })"
    >
        Open Billing Help
    </button>
</div>
```

### Livewire Blade `wire:click`

```blade
<button
    type="button"
    wire:click="$dispatch('modal.open', { id: 'billing-help' })"
>
    Open Billing Help
</button>
```

### Livewire PHP

```php
$this->dispatch('modal.open', id: 'billing-help');
```

### Open Helper

If you prefer a Blade helper instead of dispatching the event yourself, you can use `<x-corepine.modal.actions.open />` with `modal-id`:

```blade
<x-corepine.modal.actions.open modal-id="billing-help">
    Open Billing Help
</x-corepine.modal.actions.open>
```

To close it, dispatch `modal.close` with the same `id`:

```php
$this->dispatch('modal.close', id: 'billing-help');
```

## Host Requirement

- Standalone-only usage: host is optional
- Mixed app (stack modals + standalone): still render the global host once

Global host:

```blade
<x-corepine.modal.assets />
```

## Header And Footer Options

Once the base modal makes sense, you can decide how much of the built-in chrome you want to keep.

### Built-In Header And Docked Footer

If you pass `heading` or `description`, the built-in header is rendered.

If you add `x-slot:footer`, the footer is automatically docked to the bottom.

```blade
<x-corepine.modal
    id="billing-help"
    type="modal"
    heading="Billing Help"
    description="Quick answers for your billing questions."
>
    <p>Standalone modal body</p>

    <x-slot:footer>
        <button>Done</button>
    </x-slot:footer>
</x-corepine.modal>
```

If both `heading` and `description` are empty, the built-in close button stays hidden unless you explicitly pass `show-close="true"`.

### Custom Header

If you need your own header, provide `x-slot:header`.

You can still keep the docked footer at the bottom with `x-slot:footer`:

```blade
<x-corepine.modal id="billing-help" type="modal">
    <x-slot:header class="font-bold">
        Custom header
    </x-slot:header>

    <p>Custom content...</p>

    <x-slot:footer>
        <button type="button">Done</button>
    </x-slot:footer>
</x-corepine.modal>

The classes and attributes on `x-slots` are merged onto the rendered wrappers:
 
## Standalone Close Helper

Inside a standalone modal, `<x-corepine.modal.close />` automatically detects the nearest standalone modal id and closes that modal.

```blade
<x-corepine.modal id="billing-help" type="modal" heading="Billing Help">
    <p>Standalone modal body</p>

    <x-slot:footer>
        <x-corepine.modal.close>
            Close
        </x-corepine.modal.close>
    </x-slot:footer>
</x-corepine.modal>
```

If you want to target a specific standalone modal explicitly, use `modal-id`:

```blade
<x-corepine.modal.close modal-id="billing-help">
    Close
</x-corepine.modal.close>
```

Use `modal-id` instead of `id` so you can still use the normal HTML `id` attribute on the rendered button.

## Standalone Component Attributes

These are the main attributes available on `<x-corepine.modal />`:

| Attribute | Type | Default | Meaning |
| --- | --- | --- | --- |
| `id` | `string \| null` | `null` | Target id for open/close/toggle events |
| `open` | `bool` | `false` | Initial open state |
| `type` | `modal \| drawer \| sheet` | inferred | Presentation mode |
| `drawer` | `bool \| null` | `null` | Legacy/shortcut to force drawer mode |
| `sheet` | `bool \| null` | `null` | Legacy/shortcut to force sheet mode |
| `bottomSheet` | `bool \| null` | `null` | Legacy sheet alias |
| `position` | `string \| null` | by type | Placement (`sheet` always bottom) |
| `origin` | `string \| null` | by type | Transform origin |
| `size` | `string` | `default` | Width token or class string |
| `height` | `string \| number \| null` | `null` | Panel/initial sheet height |
| `maxHeight` | `string \| number \| null` | `null` | Max height limit |
| `draggable` | `bool \| null` | type-aware | Sheet drag behavior |
| `showDragHandle` | `bool \| null` | type-aware | Drag handle visibility |
| `dragCloseThreshold` | `float \| null` | `0.3` | Drag-to-close threshold |
| `dismissible` | `bool \| null` | `true` | Click outside closes panel |
| `closeOnEscape` | `bool` | `true` | Escape closes top/current modal |
| `closeAllOnEscape` | `bool` | `false` | Escape closes all layers |
| `blur` | `bool` | `false` | Backdrop blur |
| `heading` | `string \| null` | `null` | Built-in header title |
| `description` | `string \| null` | `null` | Built-in header subtitle |
| `showClose` | `bool \| null` | `auto` | Built-in close button. Auto shows it only when built-in `heading` or `description` exists. |
| `class` | `string` | `''` | Extra panel classes |
| `modalAttributes` | `array` | `[]` | Bulk attribute payload (merged) |

Standalone named slots:

- `x-slot:header`: full header override
- `x-slot:footer`: custom footer content docked to the bottom

## Optional Non-Livewire Fallback

If you are outside Livewire, you can still trigger standalone modals with browser events:

```html
<button
    type="button"
    onclick="window.dispatchEvent(new CustomEvent('modal.open', { detail: { id: 'billing-help' } }))"
>
    Open Billing Help
</button>
```

## Continue

- Full type and position behavior: [Types & Positioning](doc:modal-types-positioning)
- Full attribute reference (shared concepts): [Modal Attributes](doc:modal-attributes)
- Manual shell composition for `shell=false`: [Custom Layouts](doc:custom-layouts)
