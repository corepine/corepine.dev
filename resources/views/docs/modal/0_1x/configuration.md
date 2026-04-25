# Configuration

Corepine Modal configuration lives in `config/corepine-modal.php`.

You get this file after publishing config.

## Example Config File

This is the shape of the config in one place:

```php

return [
    /*
    |--------------------------------------------------------------------------
    | Modal Events
    |--------------------------------------------------------------------------
    |
    | Event names used by the modal host, helpers, and lifecycle hooks.
    | Rename these if your application needs a different event namespace.
    |
    */
    'events' => [
        'listen' => [
            // Incoming events consumed by the modal host and helpers.
            'open' => 'modal.open',
            'open_sheet' => 'modal.open-sheet',
            'close' => 'modal.close',
            'close_top' => 'modal.close-top',
            'close_all' => 'modal.close-all',
            'destroy' => 'modal.destroy',
            'reset' => 'modal.reset',
            'toggle' => 'modal.toggle',
        ],
        'dispatch' => [
            // Outgoing events emitted by the package after host state changes.
            'opened' => 'modal.opened',
            'closed' => 'modal.closed',
            'changed' => 'modal.changed',
            'all_closed' => 'modal.all-closed',
            'component_closed' => 'modal.component-closed',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Modal Attributes
    |--------------------------------------------------------------------------
    |
    | These values are merged into every modal unless a component or runtime
    | payload overrides them.
    |
    */
    'defaults' => [
        'attributes' => [
            // Close behavior.
            'closeOnEscape' => true,
            'closeAllOnEscape' => false,
            'dispatchCloseEvent' => false,
            'destroyOnClose' => true,
            'dismissible' => true,

            // Visual presentation.
            'blur' => false,
            'type' => 'modal',
            'drawer' => false,
            'sheet' => false,
            'isolate' => false,
            'placement' => 'center',
            'origin' => 'center',
            'size' => 'default',
            'height' => null,
            'maxHeight' => null,
            'class' => '',

            // Built-in shell content.
            'shell' => true,
            'heading' => null,
            'description' => null,
            'showClose' => null,

            // Footer action defaults.
            'footerActionsAlignment' => 'end',
            'actions' => [],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Modal Sizes
    |--------------------------------------------------------------------------
    |
    | Fully custom size tokens. Values are utility class strings.
    | Example: 'sheet' => 'max-w-[92vw]', 'dialog' => 'max-w-2xl'
    |
    */
    'sizes' => [
        'default' => 'max-w-lg sm:max-w-full',
        'sm' => 'max-w-sm',
        'md' => 'max-w-md',
        'lg' => 'max-w-lg',
        'xl' => 'max-w-xl',
        '2xl' => 'max-w-2xl',
        '3xl' => 'max-w-3xl',
        '4xl' => 'max-w-4xl',
        '5xl' => 'max-w-5xl',
        '6xl' => 'max-w-6xl',
        '7xl' => 'max-w-7xl',
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
