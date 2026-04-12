<?php

namespace App\Http\Controllers;

use App\Services\DocsRenderer;
use App\Services\DocsService;
use Illuminate\Support\Str;

class DocsController extends Controller
{
    public function __invoke(
        DocsService $docs,
        DocsRenderer $renderer,
        string $project,
        ?string $segments = null,
    ) {
        $resolved = $docs->resolve($project, $segments);

        abort_if($resolved === null, 404);

        $markdown = $docs->markdown($resolved);

        abort_if($markdown === null, 404);

        $rendered = $renderer->render($markdown, [
            'project' => $resolved['project'],
            'version' => $resolved['version'],
            'slug' => $resolved['slug'],
            'default_slug' => $resolved['default_slug'],
        ]);

        $navigation = $this->buildNavigation(
            sections: $docs->navigation($resolved['project'], $resolved['folder']),
            docs: $docs,
            project: $resolved['project'],
            version: $resolved['version'],
            currentSlug: $resolved['slug'],
        );

        return response()->view('docs.show', [
            'project' => $resolved['project'],
            'projectConfig' => $resolved['project_config'],
            'version' => $resolved['version'],
            'isLatest' => $resolved['is_latest'],
            'currentSlug' => $resolved['slug'],
            'versions' => $docs->versions($resolved['project']),
            'latestVersion' => $docs->latestVersion($resolved['project']),
            'navigation' => $navigation,
            'toc' => $rendered['toc'],
            'html' => $rendered['html'],
            'pageTitle' => $this->extractTitle($markdown, $resolved['slug']),
        ]);
    }

    protected function buildNavigation(
        array $sections,
        DocsService $docs,
        string $project,
        string $version,
        string $currentSlug,
    ): array {
        $result = [];

        foreach ($sections as $section) {
            $items = [];

            foreach ($section['items'] as $item) {
                $itemSlug = (string) ($item['slug'] ?? '');

                if ($itemSlug === '') {
                    continue;
                }

                $items[] = [
                    'label' => (string) ($item['label'] ?? ''),
                    'slug' => $itemSlug,
                    'badge' => $item['badge'] ?? null,
                    'url' => $docs->url($project, $itemSlug, $version),
                    'is_active' => $itemSlug === $currentSlug,
                ];
            }

            if ($items === []) {
                continue;
            }

            $result[] = [
                'title' => (string) ($section['title'] ?? ''),
                'items' => $items,
            ];
        }

        return $result;
    }

    protected function extractTitle(string $markdown, string $slug): string
    {
        if (preg_match('/^#\s+(.+)$/m', $markdown, $matches) === 1) {
            return trim((string) $matches[1]);
        }

        return Str::headline(str_replace('/', ' ', $slug));
    }
}
