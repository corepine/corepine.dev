# Quick Start

Build your first modal.

Corepine modals are basically normal Livewire components. The main difference is:

- your component extends `Corepine\Modal\Modal`
- you define modal UI and behavior in `modalAttributes()`

## Step 1: Create A Livewire Component

```bash
php artisan make:livewire user-list
```

This creates a livewire component at:

- `resources/views/components/⚡user-list.blade.php`

Update that file with a simple list and one `Delete` action:

```php
<?php

use App\Models\User;
use Corepine\Modal\Modal;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Gate;

new class extends Modal
{
    public Collection $users;

    public function mount(): void
    {
        $this->loadUsers();
    }

    public static function modalAttributes(): array
    {
        return [
            'heading' => 'Users',
            'description' => 'Simple list with delete action',
        ];
    }

    public function deleteUser(int $userId): void
    {
        $user = User::findOrFail($userId);

        Gate::authorize('delete', $user);

        $user->delete();

        $this->loadUsers();
    }

    protected function loadUsers(): void
    {
        $this->users = User::query()
            ->orderBy('name')
            ->limit(10)
            ->get();
    }
};
?>

<div>
    <ul class="space-y-2">
        @forelse ($users as $user)
            <li class="flex items-center justify-between">
                <span>{{ $user->name }}</span>

                <button
                    type="button"
                    wire:click="deleteUser({{ $user->id }})"
                >
                    Delete
                </button>
            </li>
        @empty
            <li>No users found.</li>
        @endforelse
    </ul>
</div>
```

## Step 2: Open The Modal

Use `wire:click` on your button:

```blade
<button
    type="button"
    wire:click="$dispatch('modal.open', { component: 'user-list' })"
>
    Open Users
</button>
```



## Next: Modal Attributes

If you want to customize behavior, layout, or styling, continue here: [Modal Attributes](doc:modal-attributes)
