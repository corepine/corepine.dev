# Standalone Blade Modal

Use standalone mode when you want modal behavior without creating a Livewire modal class.

It is useful for simple dialogs, quick sheets, and static interaction blocks.

## Basic Example

```blade
<div x-data>
    <button
        type="button"
        @click="$dispatch('modal.open', { id: 'billing-help' })"
    >
        Open Billing Help
    </button>

    <x-corepine.modal
        id="billing-help"
        type="modal"
        heading="Billing Help"
        description="Quick answers for your billing questions."
    >
        <p>Standalone modal body</p>

        <x-slot:footer>
            <x-corepine.modal.actions.close>
                Done
            </x-corepine.modal.actions.close>
        </x-slot:footer>
    </x-corepine.modal>
</div>
```

This is the basic standalone flow:

- give the modal an `id`
- dispatch `modal.open` with that `id`
- render content inside `<x-corepine.modal />`

For header, footer, form, and shell composition patterns, continue to [Layout](doc:layout).

## Host Requirement

- Standalone-only usage: host is optional
- Mixed app (stack modals + standalone): still render the global host once

```blade
<x-corepine.modal.assets />
```

## Standalone Component Attributes

These are the most common attributes available on `<x-corepine.modal />`:

| Attribute | Type | Default | Meaning |
| --- | --- | --- | --- |
| `id` | `string \| null` | `null` | Target id for open/close/toggle events |
| `open` | `bool` | `false` | Initial open state |
| `type` | `modal \| drawer \| sheet` | inferred | Presentation mode |
| `placement` | `string \| null` | by type | Placement (`sheet` always bottom) |
| `origin` | `string \| null` | by type | Transform origin |
| `size` | `string` | `default` | Width token or class string |
| `height` | `string \| number \| null` | `null` | Panel or initial sheet height |
| `maxHeight` | `string \| number \| null` | `null` | Max height limit |
| `draggable` | `bool \| null` | type-aware | Sheet drag behavior |
| `showDragHandle` | `bool \| null` | type-aware | Drag handle visibility |
| `dragCloseThreshold` | `float \| null` | `0.3` | Drag-to-close threshold |
| `dismissible` | `bool \| null` | `true` | Click outside closes panel |
| `closeOnEscape` | `bool` | `true` | Escape closes the current modal |
| `closeAllOnEscape` | `bool` | `false` | Escape closes all layers |
| `blur` | `bool` | `false` | Backdrop blur |
| `heading` | `string \| null` | `null` | Built-in header title |
| `description` | `string \| null` | `null` | Built-in header subtitle |
| `showClose` | `bool \| null` | `auto` | Built-in close button. Auto shows it only when built-in `heading` or `description` exists. |
| `class` | `string` | `''` | Extra panel classes |

## Continue

- Full type and placement behavior: [Types & Placements](doc:modal-types-positioning)
- Full attribute reference: [Modal Attributes](doc:modal-attributes)
- Header, footer, and shell composition: [Layout](doc:layout)
