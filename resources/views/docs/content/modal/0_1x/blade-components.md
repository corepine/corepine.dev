# Blade Components

Corepine Modal ships Blade components for host setup, rendering, and actions.

## Core Components

- `<x-corepine.modal.assets />`: renders the global host and supporting assets
- `<x-corepine.modal />`: standalone modal definition (no Livewire modal class required)
- `<x-corepine.modal.layout />`: shell layout helper for custom composition
- `<x-corepine.modal.footer />`: shell footer rendering helper

## Action Components

- `<x-corepine.modal.actions.open />`: declarative open trigger wrapper
- `<x-corepine.modal.actions.close />`: declarative close trigger wrapper

## Example: Open Wrapper

```blade
<x-corepine.modal.actions.open component="modals.edit-user" :arguments="['user' => $user->id]">
    <button type="button">Edit</button>
</x-corepine.modal.actions.open>
```

## Example: Close Wrapper

```blade
<x-corepine.modal.actions.close count="1" :destroy="true">
    Close
</x-corepine.modal.actions.close>
```

## Continue

- Open/close behavior and stack methods: [Open / Close APIs](doc:open-close-apis)
- Host requirement and standalone mode: [Standalone Blade Modal](doc:standalone-blade-modal)
