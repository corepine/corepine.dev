# Blade Components

Corepine Modal ships Blade components for host setup, rendering, and actions.

## Core Components

- `<x-corepine.modal.assets />`: renders the global host and supporting assets
- `<x-corepine.modal />`: standalone modal definition (no Livewire modal class required)
- `<x-corepine.modal.layout />`: shell layout helper for custom composition when you want to own the modal structure
- `<x-corepine.modal.footer />`: shell footer rendering helper

## Standalone Slots

- `x-slot:header`: overrides built-in standalone header (`heading`/`description`/`showClose`)
- `x-slot:footer`: renders custom standalone footer, including richer content such as inputs or composed actions

## Layout Slots

- `x-slot:header` on `<x-corepine.modal.layout />`: overrides built-in layout header (`heading`/`description`/`showClose`)
- `x-slot:footer` on `<x-corepine.modal.layout />`: renders a composed footer area

If the layout `header` slot exists, the layout component ignores `heading`, `description`, and `showClose`. This is also true for an intentionally empty header slot.

If no `header` slot is provided, the built-in close icon is now auto-shown only when the built-in header has a `heading` or `description`. Use `showClose="true"` if you want the close icon without header text.

## Action Components

- `<x-corepine.modal.actions.open />`: declarative open trigger wrapper
- `<x-corepine.modal.actions.close />`: declarative close trigger wrapper

## Footer Composition Guidance

Use declarative `actions` when you only need footer buttons.

Use `x-slot:footer` or `<x-corepine.modal.footer />` when the footer needs arbitrary UI such as:

- comment inputs
- upload controls
- helper text
- mixed button and form layouts

Keep the shell enabled for those cases unless you need full manual modal chrome.

## Example: Open Wrapper

```blade
<x-corepine.modal.actions.open component="modals.edit-user" :arguments="['user' => $user->id]">
    <button type="button">Edit</button>
</x-corepine.modal.actions.open>
```

## Example: Close Wrapper

```blade
<x-corepine.modal.actions.close
    count="1"
    :destroy="true"
    :dispatch="['users-refreshed' => ['user' => $user->id]]"
    :dispatch-to="['orders.table' => ['sync-user' => ['user' => $user->id]]]"
>
    Close
</x-corepine.modal.actions.close>
```

`dispatch` fires regular follow-up events after close.

`dispatchTo` fires targeted Livewire events after close.

## Continue

- Full manual composition with `shell=false`: [Custom Layouts](doc:custom-layouts)
- Open/close behavior and stack methods: [Open / Close APIs](doc:open-close-apis)
- Host requirement and standalone mode: [Standalone Blade Modal](doc:standalone-blade-modal)
