# Security

Corepine Modal does not automatically authenticate or authorize modal access for you.

Opening a modal is only a UI event. Your modal class and its methods still need the same server-side checks you would add anywhere else in Laravel or Livewire.

## What You Should Protect

Add the checks that match your app:

- authentication checks
- model policy checks
- gates and permissions
- validation on mutating actions
- re-authorization inside methods that change data

## Authorize In `mount()`

Use `mount()` to block access as soon as the modal is created.

```php
use Illuminate\Support\Facades\Gate;

public function mount(User $user): void
{
    Gate::authorize('update', $user);

    $this->user = $user;
    $this->name = $user->name;
}
```

This is the right place for checks such as:

- `auth()->check()`
- `Gate::authorize(...)`
- `$this->authorize(...)`
- model policy checks like `update`, `view`, or `delete`

## Re-Authorize Mutating Methods

Do not rely only on the open step.

If a method updates data, deletes records, or performs any sensitive action, authorize that method too:

```php
use Illuminate\Support\Facades\Gate;

public function save(): void
{
    Gate::authorize('update', $this->user);

    // validate and persist

    $this->closeModal();
}
```

This matters because modal actions still call normal server-side methods. Those methods should protect themselves directly.

## Modal Actions Still Hit Your Methods

Declarative actions do not bypass authorization.

If an action calls `save`, `delete`, or another method, that method still needs its own checks:

```php
'actions' => [
    Action::make('save')->label('Save')->primary()->action('save'),
],
```

The security belongs in the `save()` method itself.

## Do Not Trust Client Input

Treat modal arguments and client-triggered open events like any other request input.

- validate incoming data
- resolve models safely
- authorize against the resolved model
- do not assume that because a button was hidden, the action is protected

## Typical Pattern

```php
use App\Models\User;
use Illuminate\Support\Facades\Gate;

public User $user;

public function mount(User $user): void
{
    Gate::authorize('update', $user);

    $this->user = $user;
}

public function save(): void
{
    Gate::authorize('update', $this->user);

    $this->validate([
        'name' => ['required', 'string', 'max:255'],
    ]);

    $this->user->update([
        'name' => $this->name,
    ]);

    $this->closeModal();
}
```

## Rule Of Thumb

- authorize access in `mount()`
- authorize mutating methods again inside the method
- validate all user-controlled input on the server
- use normal Laravel auth, gates, and policies

## Related

- First modal example: [Quick Start](doc:quick-start)
- Shared modal options: [Modal Attributes](doc:modal-attributes)
- Action wiring: [Declarative Actions](doc:declarative-actions)
