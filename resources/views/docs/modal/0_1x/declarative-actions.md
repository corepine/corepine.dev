# Declarative Actions

Declarative actions let you define modal footer buttons as data.

This keeps your modal shell consistent while still calling component methods.

Use `actions` when your footer is button-driven.

If you need richer footer content such as inputs, comment composers, uploads, or mixed layouts, keep the shell and render a custom footer instead of stretching `actions` beyond buttons.

## Two Action Types

- `close`: closes one/all modal layers
- `method`: calls a Livewire method on the modal component

## Fluent Action Example

```php
use Corepine\Modal\Actions\Action;

'actions' => [
    Action::make('cancel')
        ->label('Cancel')
        ->close(),

    Action::make('save')
        ->label('Save')
        ->primary()
        ->action('save'),
]
```

## Equivalent Array Example

```php
'actions' => [
    [
        'type' => 'close',
        'label' => 'Cancel',
    ],
    [
        'type' => 'method',
        'label' => 'Save',
        'method' => 'save',
    ],
]
```

## Common Fluent Helpers

- `method()` / `action()`
- `close(count, destroy, closeAll)`
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

## When Not To Use `actions`

Use a custom footer when the footer needs arbitrary UI, for example:

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
