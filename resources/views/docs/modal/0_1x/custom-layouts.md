# Custom Layouts

Use custom layouts when you need full control over modal chrome while still keeping Corepine Modal stack behavior, transitions, overlay handling, and close APIs.

This is the recommended pattern when `shell=false`.

## When To Use This

Use a custom layout when the built-in shell is too limited for your UI.

If you only need a standard heading, description, close button, and simple footer actions, keep the built-in shell.

## Disabling layout

Disable the host shell in `modalAttributes()`:

```php
public static function modalAttributes(): array
{
    return [
        'shell' => false,
        'dismissible' => true,
        'class'=>'h-[90vh]'
        'closeOnEscape' => true,
    ];
}
```

Then render your own view structure in the modal template:

```blade
<div>
    No shell
</div>
```


## Custom Layout Component

If you prefer to keep the built-in structured modal layout, render your layout component directly in the modal view:


```blade
<x-corepine.modal.layout
    heading="Manage Users"
    description="Search and view users in your system."
>
    {{-- Content --}}

</x-corepine.modal.layout>
```

In this mode, `<x-corepine.modal.layout />` acts as your shell helper.

## Submit Directly From The Layout

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


    <button type="submit">
        Save
    </button>
</x-corepine.modal.layout>
```

Because the layout becomes the form, you do not need to add another `<form>` inside it.

The standalone `<x-corepine.modal />` component supports the same submit-aware form behavior too.

## Custom Header And Footer

If you want full control over the modal chrome, provide both `header` and `footer` slots on the same layout.


![centered modal](image:modal/custom-header-footer)

```blade
<x-corepine.modal.layout>
    <x-slot name="header">
        <h2>Custom Header Content</h2>
    </x-slot>

    <div class="px-6 py-5">
        Content
    </div>

    <x-slot name="footer">
        <h2>Custom Footer Content</h2>
    </x-slot>
</x-corepine.modal.layout>
```

## Related

- Shared runtime options: [Modal Attributes](doc:modal-attributes)
- Component reference: [Blade Components](doc:blade-components)
- Button-style shell actions: [Declarative Actions](doc:declarative-actions)
