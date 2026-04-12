# API & Events

Control modal behavior with a compact, predictable API.

## Core Methods

- `open()` opens the modal.
- `close()` closes the modal.
- `toggle()` flips open/closed state.
- `title()` and `description()` set visible content.

## Lifecycle Events

### Before open

Use preflight checks for permissions, stale state, or prerequisites.

### On confirm

Run save/delete workflows and surface toast feedback.

### On close

Reset temporary form state and clear optimistic UI markers.

## Related Docs

- [Quick Start](doc:quick-start)
- [Styling](doc:styling)
