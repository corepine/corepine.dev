# Open / Close APIs

Corepine Modal uses a stack model.

That means each open call pushes a layer on top, and close calls remove one or more layers.

## Stack Mental Model

- First modal opens as layer 1
- Child modal opens above it as layer 2
- Closing top layer returns to layer 1

This is why methods like `closeTopModal(2)` exist.

## Open And Close From A Modal Class

```php
$this->openModal('modals.edit-user', ['user' => 5]);
$this->openBottomSheet('modals.user-sheet', ['user' => 5]);

$this->closeModal();
$this->closeModal(
    destroy: false,
    dispatch: ['users-refreshed' => ['user' => 5]],
    dispatchTo: ['orders.table' => ['sync-user' => ['user' => 5]]],
);
$this->closeTopModal(
    layers: 2,
    dispatch: ['users-refreshed' => ['user' => 5]],
);
$this->closeAll(
    dispatchTo: ['orders.table' => ['sync-user' => ['user' => 5]]],
);
```

What each method does:

- `openModal(component, arguments)`: opens a standard modal stack item
- `openBottomSheet(component, arguments)`: opens as a sheet from bottom
- `closeModal(destroy?, dispatch?, dispatchTo?)`: closes current top layer and can dispatch follow-up events after close
- `closeTopModal(layers, destroy?, dispatch?, dispatchTo?)`: closes top `layers` layers and can dispatch follow-up events after close
- `closeAll(destroy?, dispatch?, dispatchTo?)`: clears the full stack and can dispatch follow-up events after close

`dispatch` emits regular Livewire/browser events after the close completes.

`dispatchTo` emits targeted Livewire events after the close completes.

## Dispatch Events From Livewire PHP

Use this when you want to trigger modals from another Livewire component:

```php
$this->dispatch('modal.open',
    component: 'modals.edit-user',
    arguments: ['user' => 5],
);

$this->dispatch('modal.close', layers: 1);
$this->dispatch('modal.close-all');
```

## Dispatch Events From Blade (`@click` or `wire:click`)

Alpine style with `@click`:

```blade
<div x-data>
    <button
        type="button"
        @click="$dispatch('modal.open', { component: 'modals.edit-user', arguments: { user: {{ $user->id }} } })"
    >
        Edit
    </button>

    <button
        type="button"
        @click="$dispatch('modal.close', { layers: 1 })"
    >
        Close Top
    </button>
</div>
```

Livewire attribute style with `wire:click`:

```blade
<button
    type="button"
    wire:click="$dispatch('modal.open', { component: 'modals.edit-user', arguments: { user: {{ $user->id }} } })"
>
    Edit
</button>

<button
    type="button"
    wire:click="$dispatch('modal.close', { layers: 1 })"
>
    Close Top
</button>
```

## Blade Action Wrappers

```blade
<x-corepine.modal.actions.open component="modals.edit-user" :arguments="['user' => $user->id]">
    <button type="button">Edit</button>
</x-corepine.modal.actions.open>

<x-corepine.modal.actions.open modal-id="user-sheet">
    <button type="button">Open Sheet</button>
</x-corepine.modal.actions.open>

<x-corepine.modal.actions.close
    layers="1"
    :destroy="true"
    :dispatch="['users-refreshed' => ['user' => $user->id]]"
    :dispatch-to="['orders.table' => ['sync-user' => ['user' => $user->id]]]"
>
    Close
</x-corepine.modal.actions.close>
```

These wrappers are useful for reusable, declarative UI elements.

### Standalone Modal Open Helper

If you want to open a standalone Blade modal by id, pass `modal-id`:

```blade
<x-corepine.modal.actions.open modal-id="user-sheet">
    <button type="button">Open Sheet</button>
</x-corepine.modal.actions.open>
```

### Standalone Modal Close Helper

For standalone Blade modals (`<x-corepine.modal id="..." />`), the close helper can now target the standalone modal directly.

If the close helper is rendered inside a standalone modal, it automatically detects the nearest modal id and closes that modal.

```blade
<x-corepine.modal id="user-sheet" type="drawer">
    <x-slot:header>
        <h2 >Our Modals</h2>

        <x-corepine.modal.actions.close>
            Close
        </x-corepine.modal.actions.close>
    </x-slot:header>

    <p>Body content...</p>
</x-corepine.modal>
```

If you need to close a different standalone modal explicitly, pass `modal-id`:

```blade
<x-corepine.modal.actions.close modal-id="user-sheet">
    Close
</x-corepine.modal.actions.close>
```

`modal-id` is separate from the button's normal HTML `id` attribute and is supported by both open and close helpers.

## Optional Non-Livewire JS Fallback

If you are outside Livewire, browser events are still supported (`window.dispatchEvent(new CustomEvent(...))`).

## Continue

- No Livewire modal class mode: [Standalone Blade Modal](doc:standalone-blade-modal)
- Event name customization: [Events](doc:events)
