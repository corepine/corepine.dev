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
$this->closeTopModal(2);
$this->closeAll();
```

What each method does:

- `openModal(component, arguments)`: opens a standard modal stack item
- `openBottomSheet(component, arguments)`: opens as a sheet from bottom
- `closeModal()`: closes current top layer
- `closeTopModal(count)`: closes top `count` layers
- `closeAll()`: clears the full stack

## Dispatch Events From Livewire PHP

Use this when you want to trigger modals from another Livewire component:

```php
$this->dispatch('modal.open',
    component: 'modals.edit-user',
    arguments: ['user' => 5],
);

$this->dispatch('modal.close', count: 1);
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
        @click="$dispatch('modal.close', { count: 1 })"
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
    wire:click="$dispatch('modal.close', { count: 1 })"
>
    Close Top
</button>
```

## Blade Action Wrappers

```blade
<x-corepine.modal.actions.open component="modals.edit-user" :arguments="['user' => $user->id]">
    <button type="button">Edit</button>
</x-corepine.modal.actions.open>

<x-corepine.modal.actions.close count="1" :destroy="true">
    Close
</x-corepine.modal.actions.close>
```

These wrappers are useful for reusable, declarative UI elements.

## Optional Non-Livewire JS Fallback

If you are outside Livewire, browser events are still supported (`window.dispatchEvent(new CustomEvent(...))`).

## Continue

- No Livewire modal class mode: [Standalone Blade Modal](doc:standalone-blade-modal)
- Event name customization: [Events](doc:events)
