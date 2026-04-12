<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $pageTitle }} · {{ $projectConfig['label'] ?? ucfirst($project) }} · Corepine</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Space+Grotesk:wght@400;500;700&display=swap" rel="stylesheet">

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <script>
        (() => {
            const stored = localStorage.getItem('corepine-theme');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            if (stored === 'dark' || (!stored && prefersDark)) {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>
</head>
<body
    x-data="{ mobileNavOpen: false }"
    x-on:keydown.escape.window="mobileNavOpen = false"
    class="min-h-full bg-zinc-100 text-zinc-800 antialiased dark:bg-zinc-950 dark:text-zinc-100"
>
<div class="pointer-events-none fixed inset-0 -z-10 overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_20%_20%,rgba(20,184,166,0.14),transparent_35%),radial-gradient(circle_at_80%_10%,rgba(14,116,144,0.12),transparent_40%)] dark:bg-[radial-gradient(circle_at_20%_20%,rgba(13,148,136,0.2),transparent_35%),radial-gradient(circle_at_80%_10%,rgba(14,116,144,0.16),transparent_40%)]"></div>
    <div class="absolute inset-0 bg-[linear-gradient(rgba(24,24,27,0.03)_1px,transparent_1px),linear-gradient(90deg,rgba(24,24,27,0.03)_1px,transparent_1px)] bg-[size:22px_22px] dark:bg-[linear-gradient(rgba(255,255,255,0.04)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.04)_1px,transparent_1px)]"></div>
</div>

<header class="sticky top-0 z-40 border-b border-zinc-200/80 bg-zinc-100/85 backdrop-blur-xl dark:border-zinc-800 dark:bg-zinc-950/85">
    <div class="mx-auto flex w-full max-w-7xl items-center gap-3 px-4 py-3 sm:px-6 lg:px-8">
        <button
            type="button"
            class="inline-flex h-10 w-10 items-center justify-center rounded-lg border border-zinc-300 bg-white text-zinc-700 transition hover:border-zinc-400 lg:hidden dark:border-zinc-700 dark:bg-zinc-900 dark:text-zinc-100 dark:hover:border-zinc-500"
            aria-label="Open navigation"
            x-on:click="mobileNavOpen = true"
        >
            ☰
        </button>

        <a href="/" class="inline-flex items-center gap-2.5 rounded-lg px-1 py-0.5">
            <img
                src="{{ asset('brand/corepine-logo-mark.svg') }}"
                alt="Corepine logo"
                class="h-7 w-7 rounded-md"
                width="28"
                height="28"
            >
            <span class="font-space text-lg font-semibold tracking-tight text-zinc-900 dark:text-zinc-100">Corepine</span>
        </a>
        <span class="hidden rounded-full border border-teal-300/70 bg-teal-100 px-2.5 py-1 text-xs font-medium text-teal-800 dark:border-teal-900 dark:bg-teal-950 dark:text-teal-300 sm:inline-flex">
            {{ $projectConfig['label'] ?? ucfirst($project) }} Docs
        </span>
        <div class="ml-auto flex items-center gap-3">
            <label class="sr-only" for="version-switch">Version</label>
            <select
                id="version-switch"
                class="rounded-lg border border-zinc-300 bg-white px-3 py-2 text-sm text-zinc-700 outline-none transition focus:border-teal-500 dark:border-zinc-700 dark:bg-zinc-900 dark:text-zinc-100 dark:focus:border-teal-500"
                onchange="if (this.value) window.location.href = this.value"
            >
                @foreach ($versions as $folder => $routeVersion)
                    <option
                        value="{{ docs()->url($project, $currentSlug, $routeVersion) }}"
                        @selected($routeVersion === $version)
                    >
                        {{ $routeVersion }}@if($routeVersion === $latestVersion) · latest @endif
                    </option>
                @endforeach
            </select>

            <button
                type="button"
                id="theme-toggle"
                class="inline-flex h-10 w-10 items-center justify-center rounded-lg border border-zinc-300 bg-white text-zinc-700 transition hover:border-zinc-400 dark:border-zinc-700 dark:bg-zinc-900 dark:text-zinc-100 dark:hover:border-zinc-500"
                aria-label="Toggle theme"
            >
                <span class="theme-toggle-light">☀</span>
                <span class="theme-toggle-dark hidden">☾</span>
            </button>
        </div>
    </div>
</header>

<div
    x-cloak
    x-show="mobileNavOpen"
    class="relative z-50 lg:hidden"
    aria-modal="true"
    role="dialog"
>
    <div
        x-show="mobileNavOpen"
        x-transition.opacity
        class="fixed inset-0 bg-zinc-950/55"
        x-on:click="mobileNavOpen = false"
    ></div>

    <aside
        x-show="mobileNavOpen"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="-translate-x-full opacity-0"
        x-transition:enter-end="translate-x-0 opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="translate-x-0 opacity-100"
        x-transition:leave-end="-translate-x-full opacity-0"
        class="fixed inset-y-0 left-0 w-[85vw] max-w-xs overflow-y-auto border-r border-zinc-200 bg-zinc-100 p-4 shadow-2xl dark:border-zinc-800 dark:bg-zinc-950"
    >
        <div class="mb-4 flex items-center justify-between gap-3">
            <div class="inline-flex items-center gap-2.5">
                <img
                    src="{{ asset('brand/corepine-logo-mark.svg') }}"
                    alt="Corepine logo"
                    class="h-7 w-7 rounded-md"
                    width="28"
                    height="28"
                >
                <p class="font-space text-base font-semibold tracking-tight">Documentation</p>
            </div>
            <button
                type="button"
                class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-zinc-300 bg-white text-zinc-700 dark:border-zinc-700 dark:bg-zinc-900 dark:text-zinc-100"
                x-on:click="mobileNavOpen = false"
                aria-label="Close navigation"
            >
                ✕
            </button>
        </div>

        <label class="sr-only" for="mobile-version-switch">Version</label>
        <select
            id="mobile-version-switch"
            class="mb-5 w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-sm text-zinc-700 outline-none transition focus:border-teal-500 dark:border-zinc-700 dark:bg-zinc-900 dark:text-zinc-100 dark:focus:border-teal-500"
            onchange="if (this.value) window.location.href = this.value"
        >
            @foreach ($versions as $folder => $routeVersion)
                <option
                    value="{{ docs()->url($project, $currentSlug, $routeVersion) }}"
                    @selected($routeVersion === $version)
                >
                    {{ $routeVersion }}@if($routeVersion === $latestVersion) · latest @endif
                </option>
            @endforeach
        </select>

        <div x-on:click="if ($event.target.closest('a')) mobileNavOpen = false">
            @include('docs.partials.sidebar-nav', ['navigation' => $navigation])
        </div>
    </aside>
</div>

<div class="mx-auto grid w-full max-w-7xl gap-6 px-4 py-8 sm:px-6 lg:grid-cols-[260px_minmax(0,1fr)] lg:px-8 xl:grid-cols-[260px_minmax(0,1fr)_220px]">
    <aside class="hidden rounded-2xl border border-zinc-200 bg-white/70 p-4 backdrop-blur dark:border-zinc-800 dark:bg-zinc-900/60 lg:sticky lg:top-24 lg:block lg:h-[calc(100vh-7.5rem)] lg:overflow-y-auto">
        @include('docs.partials.sidebar-nav', ['navigation' => $navigation])
    </aside>

    <main class="rounded-2xl border border-zinc-200 bg-white/75 p-6 shadow-[0_1px_0_rgba(255,255,255,0.7)] backdrop-blur dark:border-zinc-800 dark:bg-zinc-900/70 sm:p-10">
        <div class="mb-8 flex flex-wrap items-center gap-3">
            <span class="rounded-full border border-zinc-300 bg-zinc-100 px-3 py-1 text-xs font-medium text-zinc-600 dark:border-zinc-700 dark:bg-zinc-800 dark:text-zinc-300">
                {{ $projectConfig['label'] ?? ucfirst($project) }}
            </span>
            <span class="rounded-full border border-zinc-300 bg-zinc-100 px-3 py-1 text-xs font-medium text-zinc-600 dark:border-zinc-700 dark:bg-zinc-800 dark:text-zinc-300">
                v{{ $version }}{{ $isLatest ? ' (latest)' : '' }}
            </span>
        </div>

        <article class="docs-markdown">
            {!! $html !!}
        </article>
    </main>

    <aside class="hidden xl:block xl:sticky xl:top-24 xl:h-[calc(100vh-7.5rem)] xl:overflow-y-auto">
        <div class="rounded-2xl border border-zinc-200 bg-white/70 p-4 backdrop-blur dark:border-zinc-800 dark:bg-zinc-900/60">
            <h3 class="mb-3 text-xs font-semibold uppercase tracking-[0.12em] text-zinc-500 dark:text-zinc-400">On This Page</h3>

            @if ($toc === [])
                <p class="text-sm text-zinc-500 dark:text-zinc-400">No section headings on this page yet.</p>
            @else
                <ul class="space-y-2 text-sm">
                    @foreach ($toc as $entry)
                        <li class="{{ $entry['level'] === 3 ? 'ml-3' : '' }}">
                            <a href="#{{ $entry['id'] }}" class="text-zinc-600 transition hover:text-teal-600 dark:text-zinc-300 dark:hover:text-teal-300">
                                {{ $entry['text'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </aside>
</div>

<script>
    (() => {
        const root = document.documentElement;
        const button = document.getElementById('theme-toggle');
        const light = button?.querySelector('.theme-toggle-light');
        const dark = button?.querySelector('.theme-toggle-dark');

        const syncIcons = () => {
            const isDark = root.classList.contains('dark');
            light?.classList.toggle('hidden', isDark);
            dark?.classList.toggle('hidden', !isDark);
        };

        button?.addEventListener('click', () => {
            root.classList.toggle('dark');
            localStorage.setItem('corepine-theme', root.classList.contains('dark') ? 'dark' : 'light');
            syncIcons();
        });

        syncIcons();
    })();
</script>
</body>
</html>
