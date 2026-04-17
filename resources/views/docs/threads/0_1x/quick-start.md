# Quick Start

This guide creates a real comment flow with top-level comments, replies, and votes.

## Step 1: Render Threads On A Model Page

```blade
{{-- resources/views/posts/show.blade.php --}}

<h1>{{ $post->title }}</h1>

<livewire:threads :model="$post" />
```

## Step 2: Create A Top-Level Comment Programmatically

```php
use Corepine\Threads\Threads;

$comment = Threads::for($post)
    ->by(auth()->user())
    ->body('This is a top-level comment')
    ->create();
```

## Step 3: Create A Reply

```php
$reply = Threads::for($post)
    ->by(auth()->user())
    ->parent($comment)
    ->body('This is a reply')
    ->create();
```

## Step 4: Toggle Votes

```php
Threads::comment($comment)
    ->user(auth()->user())
    ->upvote();

Threads::comment($comment)
    ->user(auth()->user())
    ->downvote();
```

## What Just Happened?

- `Threads::for($post)` scopes actions to one commentable model.
- `by()` sets the authenticated commenter.
- `parent()` creates a nested reply relation.
- `comment(...)->upvote()` and `downvote()` toggle vote state for that user.

## Next Pages

- Provider-level customization: [Panel Provider](doc:panel-provider)
- Build custom dropdown actions: [Actions](doc:actions)
- Tune panel behavior and icons: [Configuration](doc:configuration)
