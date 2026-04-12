# Modal Attributes

This page is the complete reference for `modalAttributes()` and runtime modal options.

These concepts apply to:

- Livewire modal class mode (`extends Corepine\Modal\Modal`)
- Standalone Blade mode (`<x-corepine.modal ... />`)

## Start Here First (Beginner Set)

Learn these before everything else:

- `type`
- `position`
- `heading`
- `description`
- `actions`
- `dismissible`
- `closeOnEscape`

## Full Attributes Table

| Key | Type | Default | What It Controls |
| --- | --- | --- | --- |
| `type` | `modal \| drawer \| sheet` | `modal` | Visual presentation mode. |
| `position` | `Placement \| string` | by type | Panel placement. `sheet` is always bottom. |
| `origin` | `Placement \| string` | follows type/position | Transform origin for motion feel. |
| `size` | `string` | `default` | Width token from config or custom classes. |
| `height` | `string \| number \| null` | `null` | Panel height (or initial sheet height). |
| `maxHeight` | `string \| number \| null` | `null` | Maximum panel height cap. |
| `dismissible` | `bool` | `true` | Click outside to close. |
| `draggable` | `bool` | type-aware | Sheet drag/resize interaction. |
| `showDragHandle` | `bool` | type-aware | Sheet drag handle visibility. |
| `dragCloseThreshold` | `float` | `0.3` | Sheet close threshold while dragging. |
| `closeOnEscape` | `bool` | `true` | Escape closes top layer. |
| `closeAllOnEscape` | `bool` | `false` | Escape closes entire stack. |
| `destroyOnClose` | `bool` | `true` | Remove layer state after close. |
| `dispatchCloseEvent` | `bool` | `false` | Emit close event for the component layer. |
| `blur` | `bool` | `false` | Scrim blur effect. |
| `shell` | `bool` | `true` | Built-in shell (header/body/footer). |
| `heading` | `string \| null` | `null` | Shell heading text. |
| `description` | `string \| null` | `null` | Shell description text. |
| `showClose` | `bool` | `true` | Show close icon in shell header. |
| `footerActionsAlignment` | `Alignment \| string` | `end` | Footer action alignment. |
| `actions` | `array` | `[]` | Declarative footer actions. |
| `class` | `string` | `''` | Extra panel class names. |

## Type Behavior Rules

- `sheet` always resolves to `position=bottom` and `origin=bottom`.
- `drawer` only accepts `left` and `right`.
- `modal` accepts `center`, `top`, `bottom`, `left`, `right`.
- Invalid drawer position falls back to `right`.
- Invalid modal position falls back to `center`.

## Example Presets

### Standard Dialog

```php
[
    'type' => 'modal',
    'position' => 'center',
    'heading' => 'Edit Profile',
    'dismissible' => true,
]
```

### Right Drawer

```php
[
    'type' => 'drawer',
    'position' => 'right',
    'size' => 'xl',
]
```

### Draggable Bottom Sheet

```php
[
    'type' => 'sheet',
    'height' => '70vh',
    'maxHeight' => '90vh',
    'draggable' => true,
    'showDragHandle' => true,
    'dragCloseThreshold' => 0.35,
]
```

## Related

- Action payloads and fluent API: [Declarative Actions](doc:declarative-actions)
- Standalone-specific attribute usage: [Standalone Blade Modal](doc:standalone-blade-modal)
- Runtime behavior and custom events: [Events](doc:events)
