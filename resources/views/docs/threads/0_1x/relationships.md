# Relationships

After adding the traits, Threads exposes useful model relations and counters.

## Commentable Model Helpers

On commentable models (for example `Post`):

- `$post->comments()` returns top-level comments
- `$post->commentsCount()` returns total comment count including replies

## Commenter Model Helpers

On commenter models (for example `User`):

- `$user->comments()` returns comments authored by that user

## Typical Use Cases

- Show a comment count badge in list pages.
- Filter content by users with recent discussion activity.
- Build moderation dashboards from commenter relations.

## Related

- API-based creation flow: [Programmatic Comments](doc:programmatic-comments)
- First wiring steps: [Setup](doc:setup)
