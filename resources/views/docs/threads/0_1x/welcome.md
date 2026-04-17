# Corepine Threads

Corepine Threads is a Laravel + Livewire package for adding modern threaded comments to any Eloquent model.

If you are new to comment systems, think of Threads as a reusable discussion layer: you attach it to a model, render one component, and users can post nested replies with voting support.

## What You Get

- Polymorphic comment targets (`Post`, `Project`, `Product`, ...)
- Polymorphic commenters (`User`, `Admin`, ...)
- Nested replies
- Upvote/downvote actions
- Feature flags and icon view customization
- Optional panel provider for fluent behavior control

## How The System Works

1. Add the `Commentable` trait to models that receive comments.
2. Add the `Commenter` trait to models that write comments.
3. Render `<livewire:threads :model="$yourModel" />` in Blade.
4. Optionally customize behavior with a panel provider and config.

## Requirements

- PHP `^8.2|^8.3|^8.4`
- Laravel `^11|^12|^13`
- Livewire `^3.7|^4.0`

## Suggested Learning Path

1. [Installation](doc:installation)
2. [Setup](doc:setup)
3. [Quick Start](doc:quick-start)
4. [Panel Provider](doc:panel-provider)
5. [Actions](doc:actions)
6. [Configuration](doc:configuration)
