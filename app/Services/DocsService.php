<?php

namespace App\Services;

class DocsService
{
    public function projects(): array
    {
        return config('docs.projects', []);
    }

    public function project(string $project): ?array
    {
        return $this->projects()[$project] ?? null;
    }

    public function versions(string $project): array
    {
        return $this->project($project)['versions'] ?? [];
    }

    public function latestVersion(string $project): ?string
    {
        $versions = array_values($this->versions($project));

        return $versions === [] ? null : end($versions);
    }

    public function defaultSlug(string $project): string
    {
        return $this->project($project)['default_slug'] ?? 'welcome';
    }

    public function contentPath(string $project): string
    {
        $path = $this->project($project)['content_path'] ?? resource_path("views/docs/{$project}");

        return rtrim($path, '/');
    }

    public function navigationFile(string $project): string
    {
        return $this->project($project)['navigation_file'] ?? '_nav.json';
    }

    public function folderForVersion(string $project, string $version): ?string
    {
        $folder = array_search($version, $this->versions($project), true);

        return $folder === false ? null : $folder;
    }

    public function versionForFolder(string $project, string $folder): ?string
    {
        return $this->versions($project)[$folder] ?? null;
    }

    public function isLatestVersion(string $project, string $version): bool
    {
        return $version === $this->latestVersion($project);
    }

    public function resolve(string $project, ?string $segments): ?array
    {
        $projectConfig = $this->project($project);

        if ($projectConfig === null) {
            return null;
        }

        $parts = $this->explodeSegments($segments);
        $knownVersions = array_values($this->versions($project));

        $version = null;

        if ($parts !== [] && in_array($parts[0], $knownVersions, true)) {
            $version = array_shift($parts);
        }

        $version ??= $this->latestVersion($project);

        if ($version === null) {
            return null;
        }

        $folder = $this->folderForVersion($project, $version);

        if ($folder === null) {
            return null;
        }

        $slug = implode('/', $parts);
        $defaultSlug = $this->defaultSlug($project);
        $slug = $slug === '' ? $defaultSlug : $slug;

        $slug = preg_replace('/\.(md|markdown)$/i', '', $slug) ?? $slug;
        $sanitizedSlug = $this->sanitizeSlug($slug);

        if ($sanitizedSlug === null || $sanitizedSlug === '') {
            return null;
        }

        $filePath = $this->contentPath($project)."/{$folder}/{$sanitizedSlug}.md";

        return [
            'project' => $project,
            'project_config' => $projectConfig,
            'version' => $version,
            'folder' => $folder,
            'slug' => $sanitizedSlug,
            'default_slug' => $defaultSlug,
            'is_latest' => $this->isLatestVersion($project, $version),
            'file_path' => $filePath,
            'exists' => is_file($filePath),
        ];
    }

    public function markdown(array $resolved): ?string
    {
        $path = $resolved['file_path'] ?? null;

        if (! is_string($path) || ! is_file($path)) {
            return null;
        }

        $content = file_get_contents($path);

        return $content === false ? null : $content;
    }

    public function navigation(string $project, string $folder): array
    {
        $path = $this->contentPath($project)."/{$folder}/".$this->navigationFile($project);

        if (! is_file($path)) {
            return [];
        }

        $raw = file_get_contents($path);

        if ($raw === false) {
            return [];
        }

        $decoded = json_decode($raw, true);

        if (! is_array($decoded)) {
            return [];
        }

        $sections = $decoded['sections'] ?? $decoded;

        if (! is_array($sections)) {
            return [];
        }

        $normalized = [];

        foreach ($sections as $section) {
            if (! is_array($section)) {
                continue;
            }

            $items = [];
            foreach ($section['items'] ?? [] as $item) {
                if (! is_array($item)) {
                    continue;
                }

                $label = trim((string) ($item['label'] ?? ''));
                $slug = trim((string) ($item['slug'] ?? ''));

                if ($label === '' || $slug === '') {
                    continue;
                }

                $items[] = [
                    'label' => $label,
                    'slug' => $slug,
                    'badge' => isset($item['badge']) ? (string) $item['badge'] : null,
                ];
            }

            if ($items === []) {
                continue;
            }

            $normalized[] = [
                'title' => trim((string) ($section['title'] ?? '')),
                'items' => $items,
            ];
        }

        return $normalized;
    }

    public function route(string $slug = '', array $context = []): string
    {
        $project = $context['project'] ?? $this->currentProject() ?? array_key_first($this->projects());

        if (! is_string($project) || $project === '') {
            return '#';
        }

        $version = $context['version'] ?? $this->currentVersion($project) ?? $this->latestVersion($project);

        return $this->url($project, $slug, $version);
    }

    public function url(string $project, string $slug = '', ?string $version = null): string
    {
        if ($this->project($project) === null) {
            return '#';
        }

        $defaultSlug = $this->defaultSlug($project);
        [$slugWithoutFragment, $fragment] = $this->splitFragment($slug);

        $slugWithoutFragment = trim($slugWithoutFragment);
        $slugWithoutFragment = $slugWithoutFragment === '' ? $defaultSlug : $slugWithoutFragment;
        $slugWithoutFragment = preg_replace('/\.(md|markdown)$/i', '', $slugWithoutFragment) ?? $slugWithoutFragment;

        $sanitizedSlug = $this->sanitizeSlug($slugWithoutFragment);

        if ($sanitizedSlug === null || $sanitizedSlug === '') {
            $sanitizedSlug = $defaultSlug;
        }

        $version ??= $this->latestVersion($project);

        if ($version === null) {
            return '#';
        }

        if (! in_array($version, array_values($this->versions($project)), true)) {
            $version = $this->latestVersion($project);
        }

        $segments = [];

        if (! $this->isLatestVersion($project, $version)) {
            $segments[] = $version;
        }

        if ($sanitizedSlug !== $defaultSlug) {
            $segments[] = $sanitizedSlug;
        }

        $parameters = ['project' => $project];
        if ($segments !== []) {
            $parameters['segments'] = implode('/', $segments);
        }

        $url = route('docs.show', $parameters);

        if ($fragment !== null && $fragment !== '') {
            $url .= "#{$fragment}";
        }

        return $url;
    }

    public function currentContext(): ?array
    {
        if (! request()->routeIs('docs.show')) {
            return null;
        }

        $project = (string) request()->route('project', '');
        $segments = request()->route('segments');

        if ($project === '') {
            return null;
        }

        return $this->resolve($project, is_string($segments) ? $segments : null);
    }

    public function currentProject(): ?string
    {
        return $this->currentContext()['project'] ?? null;
    }

    public function currentVersion(?string $project = null): ?string
    {
        $context = $this->currentContext();

        if ($context === null) {
            return $project ? $this->latestVersion($project) : null;
        }

        if ($project !== null && $context['project'] !== $project) {
            return $this->latestVersion($project);
        }

        return $context['version'] ?? null;
    }

    public function sanitizeSlug(string $slug): ?string
    {
        $normalized = str_replace('\\', '/', $slug);
        $normalized = preg_replace('#/+#', '/', $normalized) ?? $normalized;
        $normalized = trim($normalized, '/');

        if ($normalized === '') {
            return '';
        }

        $segments = explode('/', $normalized);

        foreach ($segments as $segment) {
            if ($segment === '' || $segment === '.' || $segment === '..') {
                return null;
            }
        }

        return implode('/', $segments);
    }

    protected function splitFragment(string $value): array
    {
        $parts = explode('#', $value, 2);

        return [$parts[0], $parts[1] ?? null];
    }

    protected function explodeSegments(?string $segments): array
    {
        if ($segments === null) {
            return [];
        }

        $segments = trim($segments, '/');

        if ($segments === '') {
            return [];
        }

        return array_values(array_filter(explode('/', $segments), static fn (string $part) => $part !== ''));
    }
}
