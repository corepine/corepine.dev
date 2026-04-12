# Quick Start

Create your first modal in a few minutes.

## Render a Basic Modal

```php
use Corepine\Modal\Modal;

Modal::make('welcome')
    ->title('Welcome to Corepine')
    ->description('Ship faster with ready-made package flows.')
    ->open();
```

### Next step

Use callbacks and event hooks from [API & Events](doc:api-events).

## Add Action Buttons

```php
Modal::make('confirm-delete')
    ->title('Delete this item?')
    ->confirmLabel('Delete')
    ->cancelLabel('Cancel')
    ->onConfirm(fn () => $this->delete());
```

### Design guidance

Use the [Styling](doc:styling) page to match your app brand.
