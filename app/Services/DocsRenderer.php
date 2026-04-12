<?php

namespace App\Services;

use DOMDocument;
use DOMXPath;
use Illuminate\Support\Str;
use League\CommonMark\CommonMarkConverter;

class DocsRenderer
{
    public function __construct(
        protected DocsService $docs,
    ) {
    }

    public function render(string $markdown, array $context): array
    {
        $converter = new CommonMarkConverter([
            'html_input' => 'allow',
            'allow_unsafe_links' => false,
        ]);

        $html = (string) $converter->convert($markdown);

        return $this->postProcess($html, $context);
    }

    protected function postProcess(string $html, array $context): array
    {
        $dom = new DOMDocument('1.0', 'UTF-8');
        $flags = LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD;
        $useInternalErrors = libxml_use_internal_errors(true);
        $wrapped = '<?xml encoding="UTF-8" ?><div id="doc-root">'.$html.'</div>';

        $dom->loadHTML($wrapped, $flags);
        $xpath = new DOMXPath($dom);

        $toc = [];
        $tocMin = (int) config('docs.toc.min_level', 2);
        $tocMax = (int) config('docs.toc.max_level', 3);

        foreach ($xpath->query('//a[@href]') as $anchor) {
            $href = (string) $anchor->getAttribute('href');
            $anchor->setAttribute('href', $this->rewriteHref($href, $context));
        }

        $seenIds = [];
        $headings = $xpath->query('//h1|//h2|//h3|//h4|//h5|//h6');

        foreach ($headings as $heading) {
            $nodeName = (string) $heading->nodeName;
            $level = (int) substr($nodeName, 1);
            $text = trim((string) $heading->textContent);

            if ($text === '') {
                continue;
            }

            $baseId = Str::slug($text);
            $baseId = $baseId !== '' ? $baseId : 'section';

            $seenIds[$baseId] = ($seenIds[$baseId] ?? 0) + 1;
            $id = $seenIds[$baseId] > 1 ? "{$baseId}-{$seenIds[$baseId]}" : $baseId;
            $heading->setAttribute('id', $id);

            if ($level >= $tocMin && $level <= $tocMax) {
                $toc[] = [
                    'level' => $level,
                    'id' => $id,
                    'text' => $text,
                ];
            }
        }

        $root = $xpath->query('//*[@id="doc-root"]')->item(0);
        $processedHtml = '';

        if ($root !== null) {
            foreach ($root->childNodes as $child) {
                $processedHtml .= $dom->saveHTML($child);
            }
        }

        libxml_clear_errors();
        libxml_use_internal_errors($useInternalErrors);

        return [
            'html' => $processedHtml,
            'toc' => $toc,
        ];
    }

    protected function rewriteHref(string $href, array $context): string
    {
        if ($href === '' || str_starts_with($href, '#')) {
            return $href;
        }

        $project = (string) ($context['project'] ?? '');
        $version = (string) ($context['version'] ?? '');
        $currentSlug = (string) ($context['slug'] ?? 'welcome');
        $defaultSlug = (string) ($context['default_slug'] ?? 'welcome');

        if ($project === '' || $version === '') {
            return $href;
        }

        if (str_starts_with($href, 'doc:')) {
            $target = substr($href, 4);

            return $this->docs->url($project, $target, $version);
        }

        if ($this->isExternalHref($href) || str_starts_with($href, '/')) {
            return $href;
        }

        [$path, $fragment] = $this->splitFragment($href);

        if ($this->hasNonMarkdownExtension($path)) {
            return $href;
        }

        if ($path === '') {
            $path = $currentSlug;
        } elseif (str_starts_with($path, './') || str_starts_with($path, '../')) {
            $resolved = $this->resolveRelativeSlug($currentSlug, $path, $defaultSlug);

            if ($resolved === null) {
                return $href;
            }

            $path = $resolved;
        } else {
            $path = preg_replace('/\.(md|markdown)$/i', '', $path) ?? $path;
        }

        $target = $path;

        if ($fragment !== null && $fragment !== '') {
            $target .= "#{$fragment}";
        }

        return $this->docs->url($project, $target, $version);
    }

    protected function splitFragment(string $value): array
    {
        $parts = explode('#', $value, 2);

        return [$parts[0], $parts[1] ?? null];
    }

    protected function isExternalHref(string $href): bool
    {
        return (bool) preg_match('/^[a-zA-Z][a-zA-Z0-9+\-.]*:/', $href) || str_starts_with($href, '//');
    }

    protected function hasNonMarkdownExtension(string $path): bool
    {
        $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));

        if ($extension === '') {
            return false;
        }

        return ! in_array($extension, ['md', 'markdown'], true);
    }

    protected function resolveRelativeSlug(string $currentSlug, string $relativePath, string $defaultSlug): ?string
    {
        $relativePath = preg_replace('/\.(md|markdown)$/i', '', $relativePath) ?? $relativePath;
        $currentDirectory = dirname($currentSlug);
        $currentDirectory = $currentDirectory === '.' ? '' : trim($currentDirectory, '/');

        $stack = $currentDirectory === '' ? [] : explode('/', $currentDirectory);

        foreach (explode('/', str_replace('\\', '/', $relativePath)) as $segment) {
            if ($segment === '' || $segment === '.') {
                continue;
            }

            if ($segment === '..') {
                array_pop($stack);
                continue;
            }

            if ($segment === '') {
                return null;
            }

            $stack[] = $segment;
        }

        $resolved = implode('/', $stack);
        $sanitized = $this->docs->sanitizeSlug($resolved);

        if ($sanitized === null) {
            return null;
        }

        return $sanitized === '' ? $defaultSlug : $sanitized;
    }
}

