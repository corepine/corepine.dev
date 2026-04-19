# Corepine Modal

Corepine Modal is a stack-based modal system for Laravel Livewire.

If you are new to modal systems, think of it this way: you open small focused UI panels on top of your current page, complete a task, then close them without leaving the page.

## What You Get

- `modal` for centered dialogs
- `drawer` for left/right side panels
- `sheet` for bottom mobile-style panels
- Stack support (open a child modal above a parent modal)
- Typed modal classes (`extends Corepine\Modal\Modal`)
- Standalone Blade modals when you do not need a Livewire modal class
- Configurable events, useful for package authors and larger apps

## Which Mode Should You Choose?

- Use `modal` for confirmations, short forms, and focused tasks.
- Use `drawer` for contextual editing when users should still feel connected to the page underneath.
- Use `sheet` for mobile-first interactions and quick actions near the bottom of the screen.

Full guide: [Types & Placements](doc:modal-types-positioning)

## Requirements

- PHP `^8.2|^8.3|^8.4`
- Laravel `^11.0|^12.0|^13.0`
- Livewire `^3.7|^4.0`

## Suggested Learning Path

1. [Installation & Setup](doc:installation)
2. [Quick Start](doc:quick-start)
3. [Open / Close APIs](doc:open-close-apis)

## For Package Authors

If your package may run inside many apps, avoid hardcoded event strings. Use the facade event resolver from [Events](doc:events).
