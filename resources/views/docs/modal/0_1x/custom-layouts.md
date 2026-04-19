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
    <div class="space-y-4">
        <p class="text-sm text-zinc-600 dark:text-zinc-300">
            Search and view users in your system.
        </p>
    </div>

    <x-slot:footer>
        <div class="flex w-full justify-end gap-2">
            <x-corepine.modal.close>
                Cancel
            </x-corepine.modal.close>

            <button type="button" class="rounded-md bg-zinc-900 px-3 py-2 text-sm text-white dark:bg-zinc-100 dark:text-zinc-900">
                Save
            </button>
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

This is true even if the header slot is intentionally empty.

If you do not provide a custom `header` slot, the built-in close icon is auto by default. That means it appears only when built-in `heading` or `description` text exists, unless you explicitly set `showClose=true`.

## Custom Header Example

```blade
<x-corepine.modal.layout
>
    <x-slot:header class="flex items-center justify-between gap-4">
        <div class="min-w-0">
            <h2 class="text-base font-semibold text-zinc-900 dark:text-zinc-100">
                Team Directory
            </h2>

            <p class="text-sm text-zinc-500 dark:text-zinc-400">
                Search and filter active users.
            </p>
        </div>

        <div class="flex items-center gap-2">
            <input
                type="search"
                placeholder="Search users..."
                class="w-56 rounded-md border border-zinc-300 px-3 py-2 text-sm dark:border-zinc-700 dark:bg-zinc-900"
            />

            <x-corepine.modal.close class="rounded-md border px-3 py-2 text-sm">
                Close
            </x-corepine.modal.close>
        </div>
    </x-slot:header>

    <div class="space-y-3">
        <p class="text-sm text-zinc-600 dark:text-zinc-300">Users table or custom content goes here.</p>
    </div>

    <x-slot:footer>
        <div class="flex w-full items-center justify-between">
            <p class="text-sm text-zinc-500 dark:text-zinc-400">42 users</p>

            <div class="flex gap-2">
                <button type="button" class="rounded-md border px-3 py-2 text-sm">Export</button>
                <button type="button" class="rounded-md bg-zinc-900 px-3 py-2 text-sm text-white dark:bg-zinc-100 dark:text-zinc-900">Done</button>
            </div>
        </div>
    </x-slot:footer>
</x-corepine.modal.layout>
```

Because the custom header slot exists, the built-in `Manage Users`, description text, and close icon are not rendered.

## Empty Header Example

If you want no header chrome at all, provide an empty header slot:

```blade
<x-corepine.modal.layout heading="Hidden Heading" description="Hidden Description">
    <x-slot:header class="min-h-8"></x-slot:header>

    <div class="text-sm text-zinc-600 dark:text-zinc-300">
        Body content without the built-in header UI.
    </div>
</x-corepine.modal.layout>
```

This still suppresses `heading`, `description`, and the built-in close button.

## Rule Of Thumb

- Use built-in shell plus `actions` for simple confirm/cancel dialogs
- Use built-in shell plus custom footer for richer footer content
- Use `shell=false` plus `<x-corepine.modal.layout />` when you want full manual layout control

## Related

- Shared runtime options: [Modal Attributes](doc:modal-attributes)
- Component reference: [Blade Components](doc:blade-components)
- Button-style shell actions: [Declarative Actions](doc:declarative-actions)
