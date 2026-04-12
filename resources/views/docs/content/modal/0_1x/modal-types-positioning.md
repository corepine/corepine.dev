# Types & Positioning

Corepine Modal supports three presentation types. Choosing the right one improves UX more than styling tweaks.

## `modal`: Centered Dialog

Use `modal` for short, focused actions:

- Confirm delete
- Edit a few fields
- Show a compact form or warning

```php
public static function modalAttributes(): array
{
    return [
        'type' => 'modal',
        'position' => 'center',
        'origin' => 'center',
        'heading' => 'Edit User',
    ];
}
```

`modal` supports these positions:

- `center`
- `top`
- `bottom`
- `left`
- `right`

## `drawer`: Side Panel

Use `drawer` when users should keep page context while editing details.

```php
public static function modalAttributes(): array
{
    return [
        'type' => 'drawer',
        'position' => 'right',
        'heading' => 'Filters',
    ];
}
```

Drawer position rules:

- Valid: `left`, `right`
- Any invalid value falls back to `right`

## `sheet`: Bottom Sheet

Use `sheet` for mobile-friendly actions and short workflows near the bottom edge.

```php
public static function modalAttributes(): array
{
    return [
        'type' => 'sheet',
        'heading' => 'Quick Actions',
        'draggable' => true,
        'showDragHandle' => true,
        'dragCloseThreshold' => 0.3,
    ];
}
```

Sheet behavior rules:

- Position is always `bottom`
- Origin is always `bottom`
- `draggable` defaults to enabled for sheets
- `showDragHandle` follows `draggable` by default
- `dragCloseThreshold` controls how far users drag before closing

## Position vs Origin

- `position` controls where the panel appears.
- `origin` controls transform origin (animation direction emphasis).

For `modal`, you can set both.

For `drawer`, origin follows side position.

For `sheet`, both are always bottom.

## Examples

### Top Modal

```php
[
    'type' => 'modal',
    'position' => 'top',
    'origin' => 'top',
]
```

### Left Drawer

```php
[
    'type' => 'drawer',
    'position' => 'left',
]
```

### Draggable Sheet With Taller Start Height

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

## Continue

- How to open/close each type from code: [Open / Close APIs](doc:open-close-apis)
- Full field-by-field reference: [Modal Attributes](doc:modal-attributes)
