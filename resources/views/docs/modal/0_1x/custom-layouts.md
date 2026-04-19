# Custom Layouts

Use custom layouts when you want full control over modal chrome while still keeping Corepine Modal stack behavior, transitions, overlay handling, and close APIs.

This is the usual pattern when `shell=false`.

## When To Use This

Use a custom layout when the built-in shell is too limited.

If you only need the standard heading, description, close button, and simple footer actions, keep the built-in shell.

## Basic Pattern

Disable the host shell in `modalAttributes()`:

```php
public static function modalAttributes(): array
{
    return [
        'shell' => false,
        'dismissible' => true,
        'closeOnEscape' => true,
    ];
}
```

Then render your own layout in the modal view:

```blade
<x-corepine.modal.layout
    heading="Manage Users"
    description="Search and view users in your system."
>
    {{-- Content --}}
    
</x-corepine.modal.layout>
```

In this mode, `<x-corepine.modal.layout />` becomes your shell helper.

## Adding A Footer

You can add footer actions with the `footer` slot:

If you want a footer that is docked to the bottom automatically, use the `footer` slot and the layout will place it in the bottom footer area for you.

```blade
<x-corepine.modal.layout
    heading="Manage Users"
    description="Search and view users in your system."
>

    {{-- Content --}}

    <x-slot:footer>
        <x-corepine.modal.close>
            Cancel
        </x-corepine.modal.close>
    </x-slot:footer>
</x-corepine.modal.layout>
```

## Custom Header

You can also take full control of the header by providing a `header` slot:

```blade
<x-corepine.modal.layout>
    <x-slot:header>
        <h2>Team Directory</h2>

        <x-corepine.modal.close>
            Close
        </x-corepine.modal.close>
    </x-slot:header>

    {{-- Content --}}

    <x-slot:footer>
        <button>
            Done
        </button>
    </x-slot:footer>
</x-corepine.modal.layout>
```

`<x-corepine.modal.layout />` supports a named `header` slot.

When `x-slot:header` is present:

- `heading`, `description`, and `showClose` are ignored
- your custom header is rendered instead

If you do not provide a custom `header` slot, the built-in close icon is auto by default. That means it appears only when built-in `heading` or `description` text exists, unless you explicitly set `showClose=true`.

## Rule Of Thumb

- Use built-in shell plus `actions` for simple confirm/cancel dialogs
- Use built-in shell plus custom footer for richer footer content
- Use `shell=false` plus `<x-corepine.modal.layout />` when you want full manual layout control

## Related

- Shared runtime options: [Modal Attributes](doc:modal-attributes)
- Component reference: [Blade Components](doc:blade-components)
- Button-style shell actions: [Declarative Actions](doc:declarative-actions)
