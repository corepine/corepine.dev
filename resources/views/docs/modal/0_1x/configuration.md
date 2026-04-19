# Configuration

Corepine Modal configuration lives in `config/corepine-modal.php`.

You get this file after publishing config.

## Example Config File

This is the shape of the config in one place:

```php
return [
    'events' => [
        'listen' => [
            'open' => 'corepine.modal.open',
            'close' => 'corepine.modal.close',
        ],
        'dispatch' => [
            'opened' => 'corepine.modal.opened',
            'closed' => 'corepine.modal.closed',
        ],
    ],

    'defaults' => [
        'attributes' => [
            'closeOnEscape' => true,
            'dismissible' => true,
            'size' => 'lg',
            'blur' => true,
        ],
    ],

    'sizes' => [
        'default' => 'max-w-xl sm:max-w-full',
        'editor' => 'max-w-[960px]',
        'wide-sheet' => 'max-w-[1200px]',
    ],
];
```

## Main Parts

- `events.listen`: incoming command event names
- `events.dispatch`: outgoing notification event names
- `defaults.attributes`: global default modal attributes
- `sizes`: reusable width tokens

## Using A Size Token

Once a size token exists in config, use it in modal attributes:

```php
[
    'size' => 'editor',
]
```

## Recommended Strategy

- Keep defaults close to your product's UX style.
- Use size tokens for consistency across teams.
- Namespace events in package-heavy ecosystems.

## Continue

- Event behavior details: [Events](doc:events)
- Canonical component list: [Blade Components](doc:blade-components)
