# Panel Provider

Threads supports a panel provider class for fluent, centralized behavior configuration.

## Enable A Custom Provider

Publish a provider stub:

```bash
php artisan threads:install --panel
```

Then point `config/threads.php` to your class:

```php
'panel_provider' => App\Providers\Threads\ThreadsPanelProvider::class,
```

## Example Provider

```php
<?php

namespace App\Providers\Threads;

use Corepine\Threads\Panel;
use Corepine\Threads\Panel\ThreadsPanelProvider as BaseThreadsPanelProvider;

class ThreadsPanelProvider extends BaseThreadsPanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->upvoteAction(true)
            ->downvoteAction(true)
            ->showUpvotesCount(true)
            ->showDownvotesCount(true)
            ->deleteCommentUsing(fn ($comment, $user) => $comment->delete())
            ->actions(fn ($comment, $user) => view('threads.actions.comment', compact('comment', 'user')));
    }
}
```

## Common Use Cases

- Turn vote actions on/off per app context.
- Control vote count visibility.
- Override default delete strategy.
- Inject custom dropdown actions globally.

## Continue

Deep dive on action return types and callbacks: [Actions](doc:actions)
