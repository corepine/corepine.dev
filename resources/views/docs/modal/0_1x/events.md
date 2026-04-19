# Event System

Corepine Modal exposes incoming and outgoing events.

- Incoming events are commands sent to the modal host.
- Outgoing events are notifications emitted by the host after state changes.
- Close commands can also carry post-close dispatch instructions.

## Default Incoming Events

- `modal.open`: open a modal component/layer
- `modal.open-sheet`: open as sheet mode
- `modal.close`: close specific/current layer and optionally pass `destroy`, `dispatch`, or `dispatchTo`
- `modal.close-top`: close N layers from top and optionally pass `count`, `destroy`, `dispatch`, or `dispatchTo`
- `modal.close-all`: close the entire stack and optionally pass `destroy`, `dispatch`, or `dispatchTo`
- `modal.destroy`: remove modal state entry
- `modal.reset`: reset host modal state
- `modal.toggle`: toggle by id

## Default Outgoing Events

- `modal.opened`: emitted after a layer opens
- `modal.closed`: emitted after a layer closes
- `modal.changed`: emitted when stack state changes
- `modal.all-closed`: emitted when stack becomes empty
- `modal.component-closed`: optional component-level close event when the modal enables `dispatchCloseEvent`

## Post-Close Dispatch Payloads

`dispatch` and `dispatchTo` are not part of the built-in outgoing event list above. They are extra events you ask the modal to emit after a close succeeds.

- `dispatch`: emit normal Livewire/browser events after close
- `dispatchTo`: emit targeted Livewire events to a named component after close

These payloads can be sent with `modal.close`, `modal.close-top`, and `modal.close-all`, or configured directly on modal actions and modal components.

```php
$this->closeModal(
    destroy: false,
    dispatch: [
        'users-refreshed' => ['user' => $this->user->id],
    ],
    dispatchTo: [
        'orders.table' => [
            'sync-user' => ['user' => $this->user->id],
        ],
    ],
);
```

If you want a modal component to emit events every time it closes, define the close hooks on the modal class:

```php
protected function dispatchCloseEvents(): array
{
    return [
        'users-refreshed' => ['user' => $this->user->id],
    ];
}

protected function dispatchCloseEventsTo(): array
{
    return [
        'orders.table' => [
            'sync-user' => ['user' => $this->user->id],
        ],
    ];
}
```

## Listening In JavaScript

```html
<script>
window.addEventListener('modal.opened', (event) => {
    console.log('Modal opened', event.detail)
})

window.addEventListener('modal.closed', (event) => {
    console.log('Modal closed', event.detail)
})
</script>
```

## Renaming Event Names

If your app or package needs namespacing, customize event names in `config/corepine-modal.php`:

```php
'events' => [
    'listen' => [
        'open' => 'acme.modal.open',
        'close' => 'acme.modal.close',
    ],
    'dispatch' => [
        'opened' => 'acme.modal.opened',
    ],
],
```

## Package-Safe Event Resolution

When writing reusable packages, do not hardcode strings. Resolve active names from the service:

```php
use Corepine\Modal\Facades\Modal;

$openEvent = Modal::event()->openModal();
$closeEvent = Modal::event()->closeModal();
```

## Continue

- System-wide defaults: [Configuration](doc:configuration)
- Triggering behavior from UI and class methods: [Open / Close APIs](doc:open-close-apis)
