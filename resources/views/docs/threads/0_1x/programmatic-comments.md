# Programmatic Comments

Use the fluent API when creating comments/replies from services, jobs, or controllers.

## Create A Top-Level Comment

```php
use Corepine\Threads\Threads;

$comment = Threads::for($post)
    ->by(auth()->user())
    ->body('This is a top-level comment')
    ->create();
```

## Create A Reply

```php
$reply = Threads::for($post)
    ->by(auth()->user())
    ->parent($comment)
    ->body('This is a reply')
    ->create();
```

## Use ThreadService Directly

```php
use Corepine\Threads\Services\ThreadService;

$comment = app(ThreadService::class)
    ->for($post)
    ->by(auth()->user())
    ->body('Service-created comment')
    ->create();
```

Use this pattern when you prefer explicit dependency injection over facades.

## Related

- Vote APIs: [Votes](doc:votes)
- Model relations after trait setup: [Relationships](doc:relationships)
