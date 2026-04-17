# Setup

This page shows the minimum wiring required to make comments work in your app.

## Step 1: Mark Models As Commentable / Commenter

Add `Commentable` to models that should receive comments:

```php
use Corepine\Threads\Models\Concerns\Commentable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Commentable;
}
```

Add `Commenter` to models that should author comments:

```php
use Corepine\Threads\Models\Concerns\Commenter;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Commenter;
}
```

## Step 2: Render Threads In Blade

```blade
<livewire:threads :model="$post" />
```

`$post` can be any Eloquent model using `Commentable`.

## Step 3: Verify Auth + Permissions

Confirm the current user model uses `Commenter` and your app authentication is active on the page where you render Threads.

## Quick Verification Checklist

- The thread component renders under your model page.
- Authenticated users can create top-level comments.
- Replies appear nested under parent comments.
- If enabled, vote buttons and counts display correctly.

## Continue

- Build a full flow: [Quick Start](doc:quick-start)
- Configure behavior: [Configuration](doc:configuration)
