# Quick Start

This guide builds a real modal from start to finish and explains each part in plain language.

## What We Are Building

A user edit modal that:

- Opens from Livewire using dispatch events
- Shows heading/description with the built-in shell
- Includes footer actions (`Cancel` and `Save`)
- Calls a Livewire method to persist changes
- Closes itself after save

This example uses `actions` because the footer only needs buttons. If your footer needs richer content like an input or comment composer, use a custom footer instead.

## Step 1: Create A Modal Class

```php
<?php

namespace App\Livewire\Modals;

use App\Models\User;
use Corepine\Modal\Actions\Action;
use Corepine\Modal\Enums\ModalType;
use Corepine\Modal\Modal;
use Corepine\Support\Enums\Placement;

class EditUser extends Modal
{
    public User $user;

    public string $name = '';

    public function mount(User $user): void
    {
        $this->user = $user;
        $this->name = $user->name;
    }

    public static function modalAttributes(): array
    {
        return [
            'type' => ModalType::Modal,
            'position' => Placement::Center,
            'origin' => Placement::Center,
            'shell' => true,
            'heading' => 'Edit User',
            'description' => 'Update account details',
            'showClose' => true,
            'dismissible' => true,
            'closeOnEscape' => true,
            'actions' => [
                Action::make('cancel')->label('Cancel')->close(),
                Action::make('save')->label('Save')->primary()->action('save'),
            ],
        ];
    }

    public function save(): void
    {
       // ...
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.modals.edit-user');
    }
}
```


## Step 3: Open The Modal From Blade

If you use Alpine syntax, you can use `@click` with `$dispatch`:

```blade
<div x-data>
    <button
        type="button"
        @click="$dispatch('modal.open', { component: 'modals.edit-user', arguments: { user: {{ $user->id }} } })"
    >
        Edit User
    </button>
</div>
```

If you prefer Livewire attribute syntax, use `wire:click`:

```blade
<button
    type="button"
    wire:click="$dispatch('modal.open', { component: 'modals.edit-user', arguments: { user: {{ $user->id }} } })"
>
    Edit User
</button>
```

Both forms dispatch the same modal event payload.

## Step 4: Open The Modal (Livewire PHP Class)

You can dispatch from any Livewire component method:

```php
$this->dispatch('modal.open',
    component: 'modals.edit-user',
    arguments: ['user' => $userId],
);
```

## What Just Happened?

- The modal host listens for `modal.open`.
- It pushes `modals.edit-user` to the modal stack.
- Shell UI renders heading, description, close icon, and footer actions.
- Clicking `Save` triggers the `save()` method from your `Action::action('save')` definition.

## Most Important Attributes To Learn First

- `type`: chooses `modal`, `drawer`, or `sheet`
- `position`: controls placement
- `heading` and `description`: shell header text
- `actions`: footer buttons and behavior
- `dismissible`: outside click closes modal
- `closeOnEscape`: escape closes modal

Rule of thumb:

- use `actions` for button-driven footers
- use custom footer rendering for richer interactive footer content
- use `shell=false` only when you want to fully own the modal chrome

Deep dive: [Modal Attributes](doc:modal-attributes)

## Optional Non-Livewire Fallback

If you are outside Livewire, you can still use browser events (`window.dispatchEvent`).

Details and examples: [Standalone Blade Modal](doc:standalone-blade-modal)

## Next Pages

- Learn type behavior and placement rules: [Types & Positioning](doc:modal-types-positioning)
- Learn all open/close options: [Open / Close APIs](doc:open-close-apis)
