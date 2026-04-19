# Custom Layouts

Use custom layouts when you want full control over modal chrome while still keeping Corepine Modal stack behavior, transitions, overlay handling, and close APIs.

This is the usual pattern when `shell=false`.

## When To Use This

Use a custom layout when you need:

- a fully custom header
- a toolbar or search UI above the body
- a composed footer with forms, filters, counters, or mixed actions
- your own spacing and section structure

If you only need standard heading, description, close button, and simple footer buttons, keep the built-in shell.

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
    :showClose="false"
>
    
       {{--Content--}}

    <x-slot:footer>
        <div class="flex justify-end">
            <x-corepine.modal.close> Cancel </x-corepine.modal.close>

            <button type="button">Save</button>
        </div>
    </x-slot:footer>
</x-corepine.modal.layout>
```



In this mode, `<x-corepine.modal.layout />` becomes your shell helper.

## Header Override Rule

`<x-corepine.modal.layout />` supports a named `header` slot.

When `x-slot:header` is present:

- `heading`,`description`,`showClose` is ignored
- your custom header is rendered instead

If you do not provide a custom `header` slot, the built-in close icon is auto by default. That means it appears only when built-in `heading` or `description` text exists, unless you explicitly set `showClose=true`.

## Custom Header Example

```blade
<x-corepine.modal.layout>

    <x-slot:header>
        <h2> Team Directory </h2>

        <x-corepine.modal.close>
            Close
        </x-corepine.modal.close>
    </x-slot:header>

    
    {{--Content--}}
    

    <x-slot:footer>
        <button>
             Done
        </button>
    </x-slot:footer>
</x-corepine.modal.layout>
```

Because the custom header slot exists, the built-in `Manage Users`, description text, and close icon are not rendered.

## No Header Example

If you want no built-in header chrome at all, just omit `heading` and `description`:

```blade
<x-corepine.modal.layout>
    <div class="text-sm text-zinc-600 dark:text-zinc-300">
        Body content without the built-in header UI.
    </div>
</x-corepine.modal.layout>
```

Because `showClose` is auto by default, omitting `heading` and `description` also keeps the built-in close button hidden.

## Rule Of Thumb

- Use built-in shell plus `actions` for simple confirm/cancel dialogs
- Use built-in shell plus custom footer for richer footer content
- Use `shell=false` plus `<x-corepine.modal.layout />` when you want full manual layout control

## Related

- Shared runtime options: [Modal Attributes](doc:modal-attributes)
- Component reference: [Blade Components](doc:blade-components)
- Button-style shell actions: [Declarative Actions](doc:declarative-actions)
