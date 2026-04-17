# Configuration

Threads configuration lives in `config/threads.php`.

## Main Sections

- `panel_provider` (optional fluent provider class)
- `table_prefix`
- `storage` (disk, visibility, directory)
- `theme.icons` (active/inactive icon Blade paths)

## Example: Panel Provider

```php
'panel_provider' => App\Providers\Threads\ThreadsPanelProvider::class,
```

## Feature Toggles Live In The Panel Provider

Use your provider class to control vote actions and count visibility:

```php
return $panel
    ->upvoteAction(true)
    ->downvoteAction(true)
    ->showUpvotesCount(true)
    ->showDownvotesCount(true);
```

## Recommended Strategy

- Keep `table_prefix` consistent across environments.
- Use a panel provider for app-wide interaction behavior and policy.
- Override view icon paths when you need custom brand icons.

## Continue

- UI-level customization: [Actions](doc:actions)
- Programmatic API usage: [Programmatic Comments](doc:programmatic-comments)
