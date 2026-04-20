# Declarative Actions

Declarative actions let you define modal footer buttons as data.

Use `actions` when your footer is button-driven.

If your footer needs richer UI such as inputs, helper text, uploads, or mixed layouts, keep the shell and render a custom footer instead of stretching `actions` beyond buttons.

## Five Action Types

- `close`: closes one or more modal layers
- `method`: calls a Livewire method on the active modal component
- `dispatch`: renders a direct Livewire `$dispatch(...)` button
- `dispatchTo`: renders a direct Livewire `$dispatchTo(...)` button
- `button`: renders a plain HTML button with no modal click handler

## Fluent Action Example

```php
use Corepine\Modal\Actions\Action;

public static function modalAttributes(): array
{
    return [
        'actions' => [
            Action::make('cancel')
                ->label('Cancel')
                ->close(),

            Action::make('users')
                ->label('Users')
                ->dispatch('modal.open', [
                    'component' => 'users',
                ]),

            Action::make('focusUsers')
                ->label('Focus Users')
                ->dispatchTo('orders.table', 'sync-user', [
                    'user' => 5,
                ]),

            Action::make('save')
                ->label('Save')
                ->primary()
                ->attributes([
                    'wire:loading.attr' => 'disabled',
                    'wire:target' => 'save',
                ])
                ->action('save'),

            Action::make('submit')
                ->label('Submit')
                ->type('submit'),
        ],
    ];
}
```

## How Action Resolution Works

- `->action()` or `->method()` renders a modal method call
- `->dispatch()` renders a direct `$dispatch(...)` click
- `->dispatchTo()` renders a direct `$dispatchTo(...)` click
- `->type('submit')` or `->buttonType('submit')` renders a plain HTML submit button
- `->close()` renders the close pipeline

An action only becomes a method call when you explicitly set `action()` or `method()`.

That means this is now valid and does not try to call a missing modal method:

```php
Action::make('users')
    ->label('Users')
    ->dispatch('modal.open', [
        'component' => 'users',
    ]);
```

## Close Actions With Post-Close Events

Close actions can still dispatch events after the modal closes.

```php
Action::make('cancel')
    ->label('Cancel')
    ->dispatch('users-refreshed', ['user' => 5])
    ->dispatchTo('orders.table', 'sync-user', ['user' => 5])
    ->close();
```

When `close()` is chained, `dispatch()` and `dispatchTo()` are treated as post-close events instead of direct click actions.

## Common Fluent Helpers

- `method()` / `action()`
- `close(layers, destroy, closeAll)`
- `dispatch(event, payload = [])`
- `dispatchTo(target, event, payload = [])`
- `type()` / `buttonType()`
- `disabled()`
- `visible()`
- `color()` and shortcuts (`primary`, `danger`, `success`, `warning`, `info`, `gray`, `dark`)
- `accent()`
- `outline()`
- `attributes()`

Use `attributes([...])` when you need HTML or Livewire attributes on the rendered action button.

## Practical Pattern

For most CRUD modals, start with:

- a `Cancel` close action
- a `Save` method action

Then add direct `dispatch` or `dispatchTo` buttons when a footer button should open another modal or notify another component.

Use a plain `button` action when the button should participate in a normal form submit/reset flow.

## Continue

- Full modal field reference: [Modal Attributes](doc:modal-attributes)
- Event behavior and naming: [Events](doc:events)
