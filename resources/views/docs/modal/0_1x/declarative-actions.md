# Declarative Actions

Declarative actions let you define modal footer buttons as data.

This keeps your modal shell consistent while still calling component methods.

Use `actions` when your footer is button-driven.

`actions` accepts an array of action definitions.

If you need richer footer content such as inputs, comment composers, uploads, or mixed layouts, keep the shell and render a custom footer instead of stretching `actions` beyond buttons.

## Two Action Types

- `close`: closes one/all modal layers
- `method`: calls a Livewire method on the modal component

## Fluent Action Example

```php
use Corepine\Modal\Actions\Action;

public static function modalAttributes(): array
{
    return [
        'actions' => [
            Action::make('cancel')
                ->label('Cancel')
                ->attributes([
                    'class' => 'min-w-24',
                ])
                ->dispatch([
                    'users-refreshed' => ['user' => 5],
                ])
                ->dispatchTo([
                    'orders.table' => [
                        'sync-user' => ['user' => 5],
                    ],
                ])
                ->close(),

            Action::make('save')
                ->label('Save')
                ->primary()
                ->attributes([
                    'wire:loading.attr' => 'disabled',
                    'wire:target' => 'save',
                ])
                ->action('save'),
        ],
    ];
}
```

Use `attributes([...])` when you need HTML or Livewire attributes on the rendered action button.

## Common Fluent Helpers

- `method()` / `action()`
- `close(count, destroy, closeAll)`
- `dispatch()` / `dispatchTo()` on close actions
- `disabled()`
- `visible()`
- `color()` and shortcuts (`primary`, `danger`, `success`, `warning`, `info`, `gray`, `dark`)
- `accent()`
- `outline()`
- `attributes()`

## Practical Pattern

For most CRUD modals, start with:

- A `Cancel` close action
- A `Save` method action

Then expand with color/disabled/visibility rules as needed.

## Footer Guidance

Use `actions` when the footer is mostly buttons.

Use a custom footer when the footer needs richer UI, for example:

- text inputs or comment fields
- helper text or validation messaging
- upload controls
- mixed content like buttons plus form fields

In those cases:

- keep `shell=true` if you still want the built-in shell chrome
- use `x-slot:footer` in standalone Blade mode
- use `<x-corepine.modal.footer />` or `<x-corepine.modal.layout />` for custom composition
- use `shell=false` only when you want full manual control of the entire modal layout

## Continue

- Full modal field reference: [Modal Attributes](doc:modal-attributes)
- Event behavior and naming: [Events](doc:events)
