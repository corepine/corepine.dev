# Modal Attributes

This guide provides a complete reference for `modalAttributes()` and runtime modal options.

The concepts on this page apply to both:

- Livewire modal class mode (`extends Corepine\Modal\Modal`)
- Standalone Blade mode (`<x-corepine.modal ... />`)

## Start Here First

If you are new to modal configuration, start with these core attributes:

- `type`
- `placement`
- `heading`
- `description`
- `actions`
- `dismissible`
- `closeOnEscape`

## Full Attributes Table

| Key | Type | Default | What It Controls |
| --- | --- | --- | --- |
| `type` | `modal \| drawer \| sheet` | `modal` | Visual presentation mode. |
| `placement` | `Placement \| string` | by type | Panel placement. `sheet` is always bottom. |
| `origin` | `Placement \| string` | follows type/placement | Transform origin for motion feel. |
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
| `shell` | `bool` | `true` | Built-in shell (header/body/footer). Set `false` when you want to render your own chrome, usually with `<x-corepine.modal.layout />`. |
| `heading` | `string \| null` | `null` | Shell heading text. |
| `description` | `string \| null` | `null` | Shell description text. |
| `showClose` | `bool \| null` | `auto` | Show close icon in shell header. Auto means the icon appears only when built-in `heading` or `description` content exists. Ignored when a custom layout or standalone `header` slot overrides the built-in header. |
| `footerActionsAlignment` | `Alignment \| string` | `end` | Footer action alignment. |
| `actions` | `array` | `[]` | Declarative footer buttons. Use custom footer content for richer interactive footers. |
| `class` | `string` | `''` | Extra panel class names. |

## Type Behavior Rules

- `sheet` always resolves to `placement=bottom` and `origin=bottom`.
- `drawer` only accepts `left` and `right`.
- `modal` accepts `center`, `top`, `bottom`, `left`, `right`.
- Invalid drawer placement falls back to `right`.
- Invalid modal placement falls back to `center`.

## Example Presets

### Standard Dialog

```php
public static function modalAttributes(): array
{
    return [
        'type' => 'modal',
        'placement' => 'center',
        'heading' => 'Edit Profile',
        'dismissible' => true,
    ];
}
```

### Right Drawer

```php
public static function modalAttributes(): array
{
    return [
        'type' => 'drawer',
        'placement' => 'right',
        'size' => 'xl',
    ];
}
```

### Draggable Bottom Sheet

```php
public static function modalAttributes(): array
{
    return [
        'type' => 'sheet',
        'height' => '70vh',
        'maxHeight' => '90vh',
        'draggable' => true,
        'showDragHandle' => true,
        'dragCloseThreshold' => 0.35,
    ];
}
```

## Class Override Guidance

If you prefer a class-first approach, use `class` to define panel styling.

This works well for width, height, spacing, rounding, and other project-specific visual overrides.

```php
public static function modalAttributes(): array
{
    return [
        'type' => 'modal',
        'placement' => 'center',
        'class' => 'max-w-3xl h-[70vh] rounded-2xl billing-help-modal',
    ];
}
```

## Footer Guidance

Use `actions` for simple shell footer buttons such as `Cancel`, `Save`, or `Delete`.

If your footer needs richer content such as an input, comment composer, upload UI, or mixed layout, use custom footer rendering instead of encoding that into `actions`.

- Standalone Blade mode: use `x-slot:footer`
- Custom shell composition: use `<x-corepine.modal.footer />`
- Full manual modal layout: set `shell=false` and render `<x-corepine.modal.layout />`

## Header Override Rule

If you render a custom `header` slot on `<x-corepine.modal />` or `<x-corepine.modal.layout />`, the built-in header props stop applying for that component instance.

- `heading` is ignored
- `description` is ignored
- `showClose` is ignored
- the custom header markup is rendered instead

Without a custom header slot, `showClose` is auto by default. That means the built-in close icon stays hidden when both `heading` and `description` are empty, unless you explicitly set `showClose=true`.

## Related

- Action payloads and fluent API: [Declarative Actions](doc:declarative-actions)
- Standalone-specific attribute usage: [Standalone Blade Modal](doc:standalone-blade-modal)
- Manual shell composition: [Custom Layouts](doc:custom-layouts)
- Runtime behavior and custom events: [Events](doc:events)
