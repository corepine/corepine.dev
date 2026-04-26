<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $pageTitle }} · {{ $projectConfig['label'] ?? ucfirst($project) }} · Corepine</title>

    @include('partials.theme-head')

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}">

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body
    x-data="{ mobileNavOpen: false }"
    x-on:keydown.escape.window="mobileNavOpen = false"
    class="corepine-page min-h-full bg-white text-zinc-950 antialiased dark:bg-zinc-950 dark:text-zinc-50"
>
<div class="corepine-grid pointer-events-none fixed inset-0 -z-10 opacity-60 dark:opacity-35"></div>

<header class="sticky top-0 z-40 border-b border-zinc-200/80 bg-white/90 backdrop-blur-xl dark:border-zinc-800 dark:bg-zinc-950/90">
    <div class="mx-auto flex w-full max-w-7xl items-center gap-4 px-4 py-4 sm:px-6 lg:px-8">
        <button
            type="button"
            class="inline-flex h-10 w-10 items-center justify-center border border-zinc-300 bg-white text-zinc-700 transition hover:border-zinc-400 lg:hidden dark:border-zinc-700 dark:bg-zinc-900 dark:text-zinc-100 dark:hover:border-zinc-500"
            aria-label="Open navigation"
            x-on:click="mobileNavOpen = true"
        >
            ☰
        </button>

        <a href="/" class="inline-flex items-center gap-3">
            <img
                src="{{ asset('brand/corepine-logo-mark.svg') }}"
                alt="Corepine logo"
                class="h-8 w-8"
                width="32"
                height="32"
            >
            <span>
                <span class="font-space block text-lg font-semibold tracking-tight">Corepine</span>
                <span class="block text-xs uppercase tracking-[0.18em] text-zinc-500 dark:text-zinc-400">Documentation</span>
            </span>
        </a>

        <span class="hidden text-xs font-semibold uppercase tracking-[0.18em] text-zinc-500 dark:text-zinc-400 sm:inline-flex">
            {{ $projectConfig['label'] ?? ucfirst($project) }}
        </span>

        <div class="ml-auto flex items-center gap-3">
            <label class="sr-only" for="version-switch">Version</label>
            <select
                id="version-switch"
                class="border border-zinc-300 bg-white px-3 py-2 text-sm text-zinc-700 outline-none transition focus:border-teal-500 dark:border-zinc-700 dark:bg-zinc-900 dark:text-zinc-100 dark:focus:border-teal-500"
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
                data-theme-toggle
                class="inline-flex h-10 w-10 items-center justify-center border border-zinc-300 bg-white text-zinc-700 transition hover:border-zinc-400 hover:bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900 dark:text-zinc-200 dark:hover:border-zinc-500 dark:hover:bg-zinc-800"
                aria-label="Theme toggle"
            >
                <span class="sr-only">Toggle theme</span>

                <span data-theme-icon="light" class="hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                    </svg>
                </span>

                <span data-theme-icon="dark" class="hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
                    </svg>
                </span>

                <span data-theme-icon="system">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25m18 0A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25m18 0V12a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 12V5.25" />
                    </svg>
                </span>
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
        class="fixed inset-y-0 left-0 w-[85vw] max-w-xs overflow-y-auto border-r border-zinc-200 bg-white p-4 dark:border-zinc-800 dark:bg-zinc-950"
    >
        <div class="mb-4 flex items-center justify-between gap-3">
            <div class="inline-flex items-center gap-2.5">
                <img
                    src="{{ asset('brand/corepine-logo-mark.svg') }}"
                    alt="Corepine logo"
                    class="h-8 w-8"
                    width="32"
                    height="32"
                >
                <p class="font-space text-base font-semibold tracking-tight">Documentation</p>
            </div>
            <button
                type="button"
                class="inline-flex h-10 w-10 items-center justify-center border border-zinc-300 bg-white text-zinc-700 dark:border-zinc-700 dark:bg-zinc-900 dark:text-zinc-100"
                x-on:click="mobileNavOpen = false"
                aria-label="Close navigation"
            >
                ✕
            </button>
        </div>

        <label class="sr-only" for="mobile-version-switch">Version</label>
        <select
            id="mobile-version-switch"
            class="mb-5 w-full border border-zinc-300 bg-white px-3 py-2 text-sm text-zinc-700 outline-none transition focus:border-teal-500 dark:border-zinc-700 dark:bg-zinc-900 dark:text-zinc-100 dark:focus:border-teal-500"
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
            <div class="space-y-6">
                @foreach ($navigation as $section)
                    <div>
                        @if ($section['title'] !== '')
                            <h3 class="mb-2 text-xs font-semibold uppercase tracking-[0.18em] text-zinc-500 dark:text-zinc-400">{{ $section['title'] }}</h3>
                        @endif

                        <ul class="space-y-1">
                            @foreach ($section['items'] as $item)
                                <li>
                                    <a
                                        href="{{ $item['url'] }}"
                                        class="flex items-center justify-between border-l-2 px-3 py-2 text-sm transition {{ $item['is_active'] ? 'border-teal-500 bg-teal-50 text-zinc-950 dark:bg-teal-950/20 dark:text-zinc-50' : 'border-transparent text-zinc-700 hover:border-zinc-300 hover:bg-zinc-50 hover:text-zinc-900 dark:text-zinc-300 dark:hover:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:text-zinc-100' }}"
                                    >
                                        <span>{{ $item['label'] }}</span>
                                        @if ($item['badge'])
                                            <span class="text-[10px] uppercase tracking-[0.16em] text-zinc-500 dark:text-zinc-400">{{ $item['badge'] }}</span>
                                        @endif
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </aside>
</div>

<div class="mx-auto grid w-full max-w-7xl gap-8 px-4 py-8 sm:px-6 lg:grid-cols-[240px_minmax(0,1fr)] lg:px-8 xl:grid-cols-[240px_minmax(0,1fr)_200px]">
    <aside class="hidden lg:block">
        <div class="lg:sticky lg:top-24">
            <div class="space-y-6">
                @foreach ($navigation as $section)
                    <div>
                        @if ($section['title'] !== '')
                            <h3 class="mb-2 text-xs font-semibold uppercase tracking-[0.18em] text-zinc-500 dark:text-zinc-400">{{ $section['title'] }}</h3>
                        @endif

                        <ul class="space-y-1">
                            @foreach ($section['items'] as $item)
                                <li>
                                    <a
                                        href="{{ $item['url'] }}"
                                        class="flex items-center justify-between border-l-2 px-3 py-2 text-sm transition {{ $item['is_active'] ? 'border-teal-500 bg-teal-50 text-zinc-950 dark:bg-teal-950/20 dark:text-zinc-50' : 'border-transparent text-zinc-700 hover:border-zinc-300 hover:bg-zinc-50 hover:text-zinc-900 dark:text-zinc-300 dark:hover:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:text-zinc-100' }}"
                                    >
                                        <span>{{ $item['label'] }}</span>
                                        @if ($item['badge'])
                                            <span class="text-[10px] uppercase tracking-[0.16em] text-zinc-500 dark:text-zinc-400">{{ $item['badge'] }}</span>
                                        @endif
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </aside>

    <main class="min-w-0 border border-zinc-200 bg-white p-6 dark:border-zinc-800 dark:bg-zinc-950 sm:p-10">
        <div class="mb-8 flex flex-wrap items-center gap-3 border-b border-zinc-200 pb-6 dark:border-zinc-800">
            <span class="text-xs font-semibold uppercase tracking-[0.18em] text-zinc-500 dark:text-zinc-400">
                {{ $projectConfig['label'] ?? ucfirst($project) }}
            </span>
            <span class="h-1 w-1 rounded-full bg-teal-500"></span>
            <span class="text-xs font-semibold uppercase tracking-[0.18em] text-zinc-500 dark:text-zinc-400">
                v{{ $version }}{{ $isLatest ? ' latest' : '' }}
            </span>
        </div>

        @yield('docs_content')
    </main>

    <aside class="hidden xl:block">
        <div class="xl:sticky xl:top-24">
            <div class="space-y-6">
                <div class="border-l border-zinc-200 pl-5 dark:border-zinc-800">
                    <h3 class="mb-3 text-xs font-semibold uppercase tracking-[0.18em] text-zinc-500 dark:text-zinc-400">On This Page</h3>

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

                <div class="border border-teal-200 bg-teal-50/80 p-4 dark:border-teal-900/70 dark:bg-teal-950/30">
                    <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-teal-700 dark:text-teal-300">Deel</p>
                    <p class="mt-3 text-sm leading-7 text-zinc-700 dark:text-zinc-200">Building a global team? Hire in 150+ countries fast, with local compliance and global payroll handled.</p>
                    <p class="mt-2 text-sm leading-7 text-zinc-700 dark:text-zinc-200">Book a demo now and get $500 in billing credits.</p>
                    <a
                        href="https://deel.com/referrals/Namu-A7EK4By5"
                        target="_blank"
                        rel="noopener noreferrer sponsored"
                        class="mt-4 inline-flex items-center border border-teal-300 bg-white px-3 py-2 text-sm font-medium text-teal-700 transition hover:border-teal-400 hover:text-teal-800 dark:border-teal-700 dark:bg-teal-950/40 dark:text-teal-300 dark:hover:border-teal-600 dark:hover:text-teal-200"
                    >
                        Book Deel demo
                    </a>
                </div>
            </div>
        </div>
    </aside>
</div>

@include('partials.theme-toggle-script')
</body>
</html>
