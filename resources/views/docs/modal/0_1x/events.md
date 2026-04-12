# Event System

Corepine Modal exposes incoming and outgoing events.

- Incoming events are commands sent to the modal host.
- Outgoing events are notifications emitted by the host after state changes.

## Default Incoming Events

- `modal.open`: open a modal component/layer
- `modal.open-sheet`: open as sheet mode
- `modal.close`: close specific/current layer
- `modal.close-top`: close N layers from top
- `modal.close-all`: close the entire stack
- `modal.destroy`: remove modal state entry
- `modal.reset`: reset host modal state
- `modal.toggle`: toggle by id

## Default Outgoing Events

- `modal.opened`: emitted after a layer opens
- `modal.closed`: emitted after a layer closes
- `modal.changed`: emitted when stack state changes
- `modal.all-closed`: emitted when stack becomes empty
- `modal.component-closed`: optional component-level close event

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
