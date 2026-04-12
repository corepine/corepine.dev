# Corepine Docs Content

## Structure

Each package lives under its own directory:

```text
resources/views/docs/{project}/{version_folder}/
```

Example:

```text
resources/views/docs/modal/0_1x/
```

## Required Files Per Version

- `_nav.json`: sidebar sections and page slugs.
- `*.md`: markdown pages referenced from `_nav.json`.

## Linking Between Pages

Use `doc:` links for version-aware routing:

```md
[Installation](doc:installation)
[Theme section](doc:styling#theme-tokens)
```

When users browse an older version, these links keep that version prefix automatically.

## TOC Depth

TOC levels are configured in `config/docs.php`:

- `min_level` (default `2`)
- `max_level` (default `3`)

Current behavior:

- H2 and H3 are shown in the in-page sidebar.
- H4+ are hidden from the in-page sidebar.
