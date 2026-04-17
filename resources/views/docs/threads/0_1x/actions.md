# Actions

The `actions()` callback customizes each comment row action dropdown.

## Supported Return Types

The callback receives `$comment` and `$user` (nullable), and can return:

- `Corepine\Threads\Action[]` (recommended)
- `HtmlString`
- `view(...)` output
- `null`

## Example With Action Objects

```php
use Corepine\Threads\Action;

->actions(fn ($comment, $user) => [
    Action::make('report')
        ->label('Report')
        ->icon('threads::icons.downvote-inactive', ['class' => 'size-4 text-red-500'])
        ->danger()
        ->authorize(fn ($comment, $user) => $user !== null)
        ->action(function ($comment) {
            $comment->update(['body' => '[REPORTED] ' . $comment->body]);
        }),

    Action::make('hide')
        ->label('Hide')
        ->visible(fn ($comment, $user) => $user && (string) $comment->commenter_id === (string) $user->getKey())
        ->action(fn ($comment) => $comment->delete()),
]);
```

## Action Callback Parameters

`Action::action(...)` callbacks are context-injected. You can request only what you need:

- `$component` (current Livewire comment component)
- `$comment`
- `$user`
- `$action` (`Corepine\Threads\Action`)

Example:

```php
Action::make('report')
    ->action(fn ($component, $comment) => $component->dispatch('threads-report-comment', commentId: (string) $comment->id));
```

Parameter order is not fixed.

## Action Icons

Action objects support icon component names or Htmlable values:

```php
Action::make('archive')
    ->label('Archive')
    ->icon('threads::icons.upvote-active', [
        'class' => 'size-4 text-zinc-500',
        'aria-hidden' => 'true',
    ])
    ->action(fn ($comment) => $comment->delete());
```

Notes:

- Strings must be Blade component names (for example `threads::icons.upvote-active`).
- To pass raw SVG/HTML, use an `HtmlString` / `Htmlable` value.
- Icon attributes are merged into the rendered icon component.

## Blade View Output Example

```php
->actions(fn ($comment, $user) => view('threads.actions.comment', compact('comment', 'user')));
```

In your view, use dropdown variant buttons for matching spacing/hover behavior:

```blade
@if($user)
    <x-threads.button variant="dropdown" x-on:click.prevent="$wire.toggleUpvote()">
        Quick upvote
    </x-threads.button>
@endif
```

## Related

- Global defaults and panel behavior: [Configuration](doc:configuration)
- Service-level APIs: [Programmatic Comments](doc:programmatic-comments)
