# Isolate

`isolate` is a stack visibility feature.

Use it when you want to open a new modal on top of the current one without visually replacing the modal underneath.

## What It Does

By default, Corepine Modal keeps previous layers in the stack, but only the active top layer is shown.

When you open a modal with `isolate=true`:

- the previous modal stays in the stack
- the previous modal also stays visible underneath
- the new modal appears above it as the active layer

So `isolate` does not remove the old modal from the stack.

It changes the presentation so the newly opened modal feels like an overlay on top of the existing modal instead of a full visual handoff.

## When To Use This

Use `isolate` for short secondary interactions such as:

- confirm dialogs above a larger form modal
- quick pickers above a drawer
- small helper modals that should keep the parent context visible

If the new modal is a full step change and the previous layer should visually disappear, keep the default behavior and do not enable `isolate`.

## Open An Isolated Modal From A Modal Class

Pass `isolate` in the third argument:

```php
$this->openModal('modals.confirm-delete', ['user' => 5], [
    'isolate' => true,
]);
```

This keeps the current modal visible while the confirmation modal opens above it.

## Set It In `modalAttributes()`

If a modal should usually behave as an isolated overlay, define it on the modal itself:

```php
public static function modalAttributes(): array
{
    return [
        'isolate' => true,
        'type' => 'modal',
        'heading' => 'Confirm Delete',
        'dismissible' => true,
    ];
}
```

With this approach, every time that modal is opened in stack mode, it will keep the previous modal visible underneath by default.

This is the better choice when isolation is part of the modal's normal behavior, not just a one-off open action.

## Open An Isolated Modal With Events

```php
$this->dispatch('modal.open',
    component: 'modals.confirm-delete',
    arguments: ['user' => 5],
    modalAttributes: ['isolate' => true],
);
```

Blade event dispatch works the same way:

```blade
<button
    type="button"
    wire:click="$dispatch('modal.open', {
        component: 'modals.confirm-delete',
        arguments: { user: {{ $user->id }} },
        modalAttributes: { isolate: true }
    })"
>
    Delete User
</button>
```

## Open An Isolated Modal With Blade Helpers

```blade
<x-corepine.modal.actions.open
    component="modals.confirm-delete"
    :arguments="['user' => $user->id]"
    isolate="true"
>
    <button type="button">Delete User</button>
</x-corepine.modal.actions.open>
```

## Mental Model

Think of `isolate` like this:

- normal stack open: previous modal remains mounted but hidden
- isolated stack open: previous modal remains mounted and visible

The top modal is still the active modal.

Close behavior is still stack-based, so closing the isolated modal returns focus to the previous layer.

## Related

- Base stack behavior: [Open / Close APIs](doc:open-close-apis)
- Full attribute reference: [Modal Attributes](doc:modal-attributes)
