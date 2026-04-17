# Votes

Threads supports per-user upvote/downvote toggles on comments.

## Upvote / Downvote API

```php
use Corepine\Threads\Threads;

Threads::comment($comment)
    ->user(auth()->user())
    ->upvote();

Threads::comment($comment)
    ->user(auth()->user())
    ->downvote();
```

## Panel Control

Use your panel provider to control:

- Upvote action visibility
- Downvote action visibility
- Upvote count visibility
- Downvote count visibility

```php
return $panel
    ->upvoteAction(true)
    ->downvoteAction(true)
    ->showUpvotesCount(true)
    ->showDownvotesCount(true);
```

## Related

- Central behavior config: [Panel Provider](doc:panel-provider)
- Full config file options: [Configuration](doc:configuration)
