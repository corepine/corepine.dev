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

## Submit Directly From The Layout

If you put a submit handler on the layout itself, the outer wrapper automatically becomes a real `<form>`.

You can do this with `wire:submit...` or `x-on:submit...`.

That means you do not need to create another form inside the modal.

```blade
<x-corepine.modal.layout
    heading="Manage Users"
    description="Search and view users in your system."
    wire:submit="save"
>
    {{-- Content --}}

    <x-slot:footer>
        <button type="submit">
            Save
        </button>
    </x-slot:footer>
</x-corepine.modal.layout>
```

When submit attributes are present, the layout:

- renders the outer wrapper as a form
- includes CSRF automatically for non-GET forms
- spoofs `PUT`, `PATCH`, and `DELETE` methods when needed

## Modal Form

This is the usual pattern when your modal is really a form:

```blade
<x-corepine.modal.layout
    heading="Manage Users"
    description="Search and view users in your system."
    wire:submit="save"
>
    {{-- Content --}}

    <x-slot:footer>
        <x-corepine.modal.actions.close>
            Cancel
        </x-corepine.modal.actions.close>

        <button type="submit">
            Save
        </button>
    </x-slot:footer>
</x-corepine.modal.layout>
```

Because the layout becomes the form, you do not need to add another `<form>` inside it.

The standalone `<x-corepine.modal />` component supports the same submit-aware form behavior too.

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
        <x-corepine.modal.actions.close>
            Cancel
        </x-corepine.modal.actions.close>
    </x-slot:footer>
</x-corepine.modal.layout>
```

## Custom Header

You can also take full control of the header by providing a `header` slot:

```blade
<x-corepine.modal.layout>
    <x-slot:header>
        <h2>Team Directory</h2>

        <x-corepine.modal.actions.close>
            Close
        </x-corepine.modal.actions.close>
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


## Related

- Shared runtime options: [Modal Attributes](doc:modal-attributes)
- Component reference: [Blade Components](doc:blade-components)
- Button-style shell actions: [Declarative Actions](doc:declarative-actions)
