# Configuration

Corepine Modal configuration lives in `config/corepine-modal.php`.

You get this file after publishing config.

## Main Sections

- `events.listen`: incoming command event names
- `events.dispatch`: outgoing notification event names
- `defaults.attributes`: global default modal attributes
- `sizes`: reusable width tokens

## Example: Customize Defaults

```php
'defaults' => [
    'attributes' => [
        'closeOnEscape' => true,
        'dismissible' => true,
        'size' => 'lg',
        'blur' => true,
    ],
],
```

## Example: Add Size Tokens

```php
'sizes' => [
    'default' => 'max-w-xl sm:max-w-full',
    'editor' => 'max-w-[960px]',
    'wide-sheet' => 'max-w-[1200px]',
],
```

Then use it in modal attributes:

```php
[
    'size' => 'editor',
]
```

## Example: Namespace Events

```php
'events' => [
    'listen' => [
        'open' => 'corepine.modal.open',
        'close' => 'corepine.modal.close',
    ],
    'dispatch' => [
        'opened' => 'corepine.modal.opened',
    ],
],
```

## Recommended Strategy

- Keep defaults close to your product's UX style.
- Use size tokens for consistency across teams.
- Namespace events in package-heavy ecosystems.

## Continue

- Event behavior details: [Events](doc:events)
- Canonical component list: [Blade Components](doc:blade-components)
