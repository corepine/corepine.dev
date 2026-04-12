# Declarative Actions

Declarative actions let you define modal footer buttons as data.

This keeps your modal shell consistent while still calling component methods.

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

## Continue

- Full modal field reference: [Modal Attributes](doc:modal-attributes)
- Event behavior and naming: [Events](doc:events)
