# Standalone Blade Modal

Use standalone mode when you want a modal UI without creating a Livewire modal class.

Good for simple dialogs, quick sheets, and static interaction blocks.

## Host Requirement

- Standalone-only usage: host is optional
- Mixed app (stack modals + standalone): still render the global host once

Global host (for stack mode):

```blade
<x-corepine.modal.assets />
```

## Recommended: Trigger With Dispatch Events

### Alpine `@click` Syntax

```blade
<div x-data>
    <button
        type="button"
        @click="$dispatch('modal.open', { id: 'user-sheet' })"
    >
        Open Sheet
    </button>

    <button
        type="button"
        @click="$dispatch('modal.close', { id: 'user-sheet' })"
    >
        Close Sheet
    </button>
</div>
```

### Livewire Blade `wire:click` Syntax

```blade
<button
    type="button"
    wire:click="$dispatch('modal.open', { id: 'user-sheet' })"
>
    Open Sheet
</button>

<x-corepine.modal id="user-sheet" type="sheet" heading="User Details" description="Quick account summary">
    <p class="text-sm text-zinc-600 dark:text-zinc-300">Standalone modal body</p>

    <x-slot:footer>
        <button
            type="button"
            wire:click="$dispatch('modal.close', { id: 'user-sheet' })"
            class="rounded-md border px-3 py-2 text-sm"
        >
            Close
        </button>
    </x-slot:footer>
</x-corepine.modal>
```

### Livewire PHP Syntax

```php
$this->dispatch('modal.open', id: 'user-sheet');
$this->dispatch('modal.close', id: 'user-sheet');
$this->dispatch('modal.toggle', id: 'user-sheet');
```

## Header Options (Important)

Standalone now supports a named `header` slot with explicit override behavior.

When `x-slot:header` is present:

- Built-in `heading`/`description` are not rendered
- Built-in close icon is not rendered
- This is true even if the header slot is intentionally empty

### Header Slot With Classes And Attributes

Header slot attributes/classes are merged onto the header wrapper, so this works:

```blade
<x-corepine.modal id="billing-help" type="modal">
    <x-slot:header class="font-bold text-lg" data-testid="custom-header">
        Custom header
    </x-slot:header>

    <p class="text-sm">Custom content...</p>

    <x-slot:footer>
        <button type="button" class="rounded-md border px-3 py-2 text-sm">Done</button>
    </x-slot:footer>
</x-corepine.modal>
```

### Intentionally Empty Header (No Close Icon)

```blade
<x-corepine.modal id="empty-header-example" type="modal">
    <x-slot:header class="min-h-8"></x-slot:header>

    <p class="text-sm">Body content without the built-in header UI.</p>
</x-corepine.modal>
```

### Built-In Header (No Header Slot)

If you do not provide `x-slot:header`, the built-in header uses:

- `heading`
- `description`
- `showClose`

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
| `showClose` | `bool` | `true` | Built-in close button |
| `class` | `string` | `''` | Extra panel classes |
| `modalAttributes` | `array` | `[]` | Bulk attribute payload (merged) |

Standalone named slots:

- `x-slot:header`: full header override (including intentionally empty override)
- `x-slot:footer`: custom footer content

## Event Names

Default event names:

- `modal.open`
- `modal.close`
- `modal.toggle`

If you renamed events in config, use your renamed values.

## Optional Non-Livewire Fallback

If you are outside Livewire, you can still trigger standalone modals with browser events:

```html
<button
    type="button"
    onclick="window.dispatchEvent(new CustomEvent('modal.open', { detail: { id: 'user-sheet' } }))"
>
    Open Sheet
</button>
```

## Continue

- Full type and position behavior: [Types & Positioning](doc:modal-types-positioning)
- Full attribute reference (shared concepts): [Modal Attributes](doc:modal-attributes)
