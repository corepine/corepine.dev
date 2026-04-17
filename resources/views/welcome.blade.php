<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Corepine · Plug-and-Go Laravel Packages</title>
    <meta name="description" content="Corepine builds production-ready Laravel packages you can install and ship fast: ecommerce, social, and business flows with polished defaults.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Space+Grotesk:wght@400;500;700&display=swap" rel="stylesheet">

    <script>
        (() => {
            const STORAGE_KEY = 'corepine-theme';
            const LEGACY_KEY = 'theme';

            const normalizePreference = (value) => {
                if (value === 'light' || value === 'dark' || value === 'system') {
                    return value;
                }

                return 'system';
            };

            let preference = 'system';

            try {
                const stored = localStorage.getItem(STORAGE_KEY) ?? localStorage.getItem(LEGACY_KEY);
                preference = normalizePreference(stored);
                localStorage.setItem(STORAGE_KEY, preference);
                localStorage.removeItem(LEGACY_KEY);
            } catch (error) {
                // Ignore storage access errors and keep system default.
            }

            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            const isDark = preference === 'dark' || (preference === 'system' && prefersDark);

            document.documentElement.classList.toggle('dark', isDark);
            document.documentElement.style.colorScheme = isDark ? 'dark' : 'light';
            document.documentElement.dataset.themePreference = preference;
        })();
    </script>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="min-h-full bg-zinc-100 text-zinc-800 antialiased dark:bg-zinc-950 dark:text-zinc-100">
<div class="pointer-events-none fixed inset-0 -z-10 overflow-hidden">
    <div class="absolute -top-40 left-1/2 h-[36rem] w-[36rem] -translate-x-1/2 rounded-full bg-teal-500/25 blur-3xl dark:bg-teal-500/30"></div>
    <div class="absolute -bottom-40 right-0 h-[28rem] w-[28rem] rounded-full bg-cyan-400/20 blur-3xl dark:bg-cyan-400/20"></div>
    <div class="absolute inset-0 bg-[linear-gradient(rgba(24,24,27,0.045)_1px,transparent_1px),linear-gradient(90deg,rgba(24,24,27,0.045)_1px,transparent_1px)] bg-[size:26px_26px] dark:bg-[linear-gradient(rgba(255,255,255,0.05)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.05)_1px,transparent_1px)]"></div>
</div>

<header class="sticky top-0 z-40 border-b border-zinc-200/80 bg-zinc-100/80 backdrop-blur-xl dark:border-zinc-800 dark:bg-zinc-950/80">
    <div class="mx-auto flex w-full max-w-7xl items-center gap-3 px-4 py-3 sm:px-6 lg:px-8">
        <a href="/" class="inline-flex items-center gap-2.5 rounded-lg px-1 py-0.5">
            <img
                src="{{ asset('brand/corepine-logo-mark.svg') }}"
                alt="Corepine logo"
                class="h-8 w-8 rounded-md"
                width="32"
                height="32"
            >
            <span class="font-space text-xl font-semibold tracking-tight text-zinc-900 dark:text-zinc-100">Corepine</span>
        </a>
        <span class="hidden rounded-full border border-zinc-300 bg-white px-2.5 py-1 text-xs font-medium text-zinc-600 dark:border-zinc-700 dark:bg-zinc-900 dark:text-zinc-300 sm:inline-flex">
            Laravel Packages
        </span>

        <nav class="ml-auto hidden items-center gap-2 text-sm md:flex">
            <a href="#packages" class="rounded-lg px-3 py-2 text-zinc-600 transition hover:bg-zinc-200/70 hover:text-zinc-900 dark:text-zinc-300 dark:hover:bg-zinc-800 dark:hover:text-zinc-100">Packages</a>
            <a href="#showcase" class="rounded-lg px-3 py-2 text-zinc-600 transition hover:bg-zinc-200/70 hover:text-zinc-900 dark:text-zinc-300 dark:hover:bg-zinc-800 dark:hover:text-zinc-100">Showcase</a>
            <a href="/modal/docs" class="rounded-lg px-3 py-2 text-zinc-600 transition hover:bg-zinc-200/70 hover:text-zinc-900 dark:text-zinc-300 dark:hover:bg-zinc-800 dark:hover:text-zinc-100">Modal Docs</a>
            <a href="/threads/docs" class="rounded-lg bg-teal-600 px-3 py-2 font-medium text-white transition hover:bg-teal-500">Threads Docs</a>
        </nav>

        <button
            type="button"
            data-theme-toggle
            class="inline-flex h-10 w-10 items-center justify-center rounded-lg border border-zinc-300 bg-white text-zinc-700 transition hover:border-zinc-400 hover:bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900 dark:text-zinc-200 dark:hover:border-zinc-500 dark:hover:bg-zinc-800"
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
</header>

<main>
    <section class="mx-auto grid w-full max-w-7xl gap-10 px-4 pt-16 pb-14 sm:px-6 lg:grid-cols-[1.08fr_0.92fr] lg:items-center lg:px-8 lg:pt-24">
        <div class="animate-[fade-in_700ms_ease-out]">
            <span class="inline-flex items-center rounded-full border border-teal-400/50 bg-teal-100 px-3 py-1 text-xs font-semibold uppercase tracking-[0.12em] text-teal-800 dark:border-teal-700 dark:bg-teal-950 dark:text-teal-300">
                Corepine for Laravel
            </span>

            <h1 class="font-space mt-5 text-4xl font-bold tracking-tight text-zinc-900 sm:text-5xl lg:text-6xl dark:text-zinc-100">
                Plug-and-go Laravel packages for teams that ship weekly.
            </h1>

            <p class="mt-6 max-w-xl text-lg leading-8 text-zinc-600 dark:text-zinc-300">
                Corepine delivers production-ready package flows for ecommerce, social, and business products so you can spend less time wiring basics and more time building what makes your app unique.
            </p>

            <div class="mt-8 flex flex-wrap items-center gap-3">
                <a href="/modal/docs" class="inline-flex items-center rounded-xl bg-teal-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-teal-500">
                    Explore Modal Docs
                </a>
                <a href="/threads/docs" class="inline-flex items-center rounded-xl bg-cyan-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-cyan-500">
                    Explore Threads Docs
                </a>
                <a href="#packages" class="inline-flex items-center rounded-xl border border-zinc-300 bg-white px-5 py-3 text-sm font-semibold text-zinc-700 transition hover:border-zinc-400 dark:border-zinc-700 dark:bg-zinc-900 dark:text-zinc-100 dark:hover:border-zinc-500">
                    View Package Roadmap
                </a>
            </div>

            <div class="mt-10 grid max-w-xl gap-3 sm:grid-cols-3">
                <div class="rounded-xl border border-zinc-200 bg-white/80 p-3 dark:border-zinc-800 dark:bg-zinc-900/70">
                    <p class="text-xs uppercase tracking-[0.14em] text-zinc-500 dark:text-zinc-400">Focus</p>
                    <p class="mt-1 font-semibold">Ecommerce</p>
                </div>
                <div class="rounded-xl border border-zinc-200 bg-white/80 p-3 dark:border-zinc-800 dark:bg-zinc-900/70">
                    <p class="text-xs uppercase tracking-[0.14em] text-zinc-500 dark:text-zinc-400">Focus</p>
                    <p class="mt-1 font-semibold">Social</p>
                </div>
                <div class="rounded-xl border border-zinc-200 bg-white/80 p-3 dark:border-zinc-800 dark:bg-zinc-900/70">
                    <p class="text-xs uppercase tracking-[0.14em] text-zinc-500 dark:text-zinc-400">Focus</p>
                    <p class="mt-1 font-semibold">Business</p>
                </div>
            </div>
        </div>

        <div class="relative animate-[fade-up_800ms_ease-out]">
            <div class="rounded-3xl border border-zinc-200 bg-white/85 p-6 shadow-xl shadow-zinc-900/5 dark:border-zinc-800 dark:bg-zinc-900/80 dark:shadow-black/25">
                <div class="mb-5 flex items-center gap-2">
                    <span class="h-2.5 w-2.5 rounded-full bg-rose-500"></span>
                    <span class="h-2.5 w-2.5 rounded-full bg-amber-400"></span>
                    <span class="h-2.5 w-2.5 rounded-full bg-emerald-500"></span>
                </div>

                <div class="rounded-2xl border border-zinc-200 bg-zinc-50 p-4 dark:border-zinc-700 dark:bg-zinc-950">
                    <p class="text-xs uppercase tracking-[0.12em] text-zinc-500 dark:text-zinc-400">corepine/threads</p>
                    <p class="font-space mt-2 text-xl font-semibold">Threaded comments ready in minutes.</p>
                    <p class="mt-2 text-sm leading-6 text-zinc-600 dark:text-zinc-300">
                        Add nested discussion, votes, and polymorphic model support with one Livewire component.
                    </p>

                    <div class="mt-5 grid gap-2 text-sm">
                        <div class="rounded-lg border border-zinc-200 bg-white px-3 py-2 dark:border-zinc-700 dark:bg-zinc-900">✓ Polymorphic comment targets and commenters</div>
                        <div class="rounded-lg border border-zinc-200 bg-white px-3 py-2 dark:border-zinc-700 dark:bg-zinc-900">✓ Nested replies with optional upvote/downvote UX</div>
                        <div class="rounded-lg border border-zinc-200 bg-white px-3 py-2 dark:border-zinc-700 dark:bg-zinc-900">✓ Fluent panel provider for app-wide policy control</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="packages" class="mx-auto w-full max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
        <div class="rounded-3xl border border-zinc-200 bg-white/80 p-6 dark:border-zinc-800 dark:bg-zinc-900/70 sm:p-8">
            <h2 class="font-space text-3xl font-bold tracking-tight">Package Waves</h2>
            <p class="mt-3 max-w-3xl text-zinc-600 dark:text-zinc-300">
                Corepine packages keep versioned docs per package while sharing one consistent developer experience.
            </p>

            <div class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                <article class="rounded-2xl border border-zinc-200 bg-zinc-50 p-4 dark:border-zinc-700 dark:bg-zinc-950/60">
                    <p class="text-xs uppercase tracking-[0.12em] text-zinc-500">Now</p>
                    <h3 class="font-space mt-2 text-xl font-semibold">Modal</h3>
                    <p class="mt-2 text-sm text-zinc-600 dark:text-zinc-300">Dialog and workflow components for confirmations, forms, and product actions.</p>
                </article>
                <article class="rounded-2xl border border-zinc-200 bg-zinc-50 p-4 dark:border-zinc-700 dark:bg-zinc-950/60">
                    <p class="text-xs uppercase tracking-[0.12em] text-zinc-500">Now</p>
                    <h3 class="font-space mt-2 text-xl font-semibold">Threads</h3>
                    <p class="mt-2 text-sm text-zinc-600 dark:text-zinc-300">Threaded comments, nested replies, and moderation-friendly interactions for model pages.</p>
                </article>
                <article class="rounded-2xl border border-zinc-200 bg-zinc-50 p-4 dark:border-zinc-700 dark:bg-zinc-950/60">
                    <p class="text-xs uppercase tracking-[0.12em] text-zinc-500">Next</p>
                    <h3 class="font-space mt-2 text-xl font-semibold">Commerce & Workflows</h3>
                    <p class="mt-2 text-sm text-zinc-600 dark:text-zinc-300">Checkout helpers, discount journeys, and internal business flow modules.</p>
                </article>
            </div>
        </div>
    </section>

    <section id="showcase" class="mx-auto w-full max-w-7xl px-4 pb-20 sm:px-6 lg:px-8">
        <div class="rounded-3xl border border-zinc-200 bg-white/80 p-6 dark:border-zinc-800 dark:bg-zinc-900/70 sm:p-8">
            <div class="flex flex-wrap items-end justify-between gap-3">
                <div>
                    <h2 class="font-space text-3xl font-bold tracking-tight">Showcase Ready</h2>
                    <p class="mt-2 text-zinc-600 dark:text-zinc-300">Drop your polished screenshots here as packages go live.</p>
                </div>
                <div class="flex items-center gap-2">
                    <a href="/modal/docs" class="rounded-lg border border-zinc-300 px-3 py-2 text-sm font-medium transition hover:border-zinc-400 dark:border-zinc-700 dark:hover:border-zinc-500">
                        Open Modal docs
                    </a>
                    <a href="/threads/docs" class="rounded-lg border border-zinc-300 px-3 py-2 text-sm font-medium transition hover:border-zinc-400 dark:border-zinc-700 dark:hover:border-zinc-500">
                        Open Threads docs
                    </a>
                </div>
            </div>

            <div class="mt-6 grid gap-4 md:grid-cols-3">
                <div class="group relative overflow-hidden rounded-2xl border border-zinc-200 bg-zinc-50 p-3 dark:border-zinc-700 dark:bg-zinc-950/60">
                    <div class="aspect-[4/3] rounded-xl border border-dashed border-zinc-300 bg-zinc-100/80 dark:border-zinc-700 dark:bg-zinc-900"></div>
                    <p class="mt-3 text-sm text-zinc-500 dark:text-zinc-400">Modal package screenshot slot</p>
                </div>
                <div class="group relative overflow-hidden rounded-2xl border border-zinc-200 bg-zinc-50 p-3 dark:border-zinc-700 dark:bg-zinc-950/60">
                    <div class="aspect-[4/3] rounded-xl border border-dashed border-zinc-300 bg-zinc-100/80 dark:border-zinc-700 dark:bg-zinc-900"></div>
                    <p class="mt-3 text-sm text-zinc-500 dark:text-zinc-400">Threads package screenshot slot</p>
                </div>
                <div class="group relative overflow-hidden rounded-2xl border border-zinc-200 bg-zinc-50 p-3 dark:border-zinc-700 dark:bg-zinc-950/60">
                    <div class="aspect-[4/3] rounded-xl border border-dashed border-zinc-300 bg-zinc-100/80 dark:border-zinc-700 dark:bg-zinc-900"></div>
                    <p class="mt-3 text-sm text-zinc-500 dark:text-zinc-400">Commerce and workflow package screenshot slot</p>
                </div>
            </div>
        </div>
    </section>
</main>

<footer class="border-t border-zinc-200/80 py-8 text-center text-sm text-zinc-500 dark:border-zinc-800 dark:text-zinc-400">
    Corepine © {{ now()->year }} · Built for makers shipping Laravel products.
</footer>

<script>
    (() => {
        const STORAGE_KEY = 'corepine-theme';
        const LEGACY_KEY = 'theme';
        const CYCLE = ['light', 'dark', 'system'];
        const LABELS = {
            light: 'Light',
            dark: 'Dark',
            system: 'System',
        };
        const root = document.documentElement;
        const toggleButton = document.querySelector('[data-theme-toggle]');
        const icons = Array.from(document.querySelectorAll('[data-theme-icon]'));
        const mediaQuery = window.matchMedia('(prefers-color-scheme: dark)');

        if (! toggleButton || icons.length === 0) {
            return;
        }

        const normalizePreference = (value) => {
            if (value === 'light' || value === 'dark' || value === 'system') {
                return value;
            }

            return 'system';
        };

        const readStoredPreference = () => {
            try {
                const stored = localStorage.getItem(STORAGE_KEY);
                const legacy = localStorage.getItem(LEGACY_KEY);
                const normalized = normalizePreference(stored ?? legacy);
                localStorage.setItem(STORAGE_KEY, normalized);
                localStorage.removeItem(LEGACY_KEY);

                return normalized;
            } catch (error) {
                // Ignore storage access errors and use current in-memory state.
            }

            return normalizePreference(root.dataset.themePreference);
        };

        const resolveTheme = (preference) => {
            if (preference === 'light' || preference === 'dark') {
                return preference;
            }

            return mediaQuery.matches ? 'dark' : 'light';
        };

        const applyThemeAndUi = (preference) => {
            const theme = resolveTheme(preference);
            const isDark = theme === 'dark';

            root.classList.toggle('dark', isDark);
            root.style.colorScheme = isDark ? 'dark' : 'light';
            root.dataset.themePreference = preference;

            icons.forEach((icon) => {
                const isVisible = icon.dataset.themeIcon === preference;
                icon.classList.toggle('hidden', ! isVisible);
            });

            const currentIndex = CYCLE.indexOf(preference);
            const nextPreference = CYCLE[(currentIndex + 1) % CYCLE.length];
            const message = `Theme: ${LABELS[preference]}. Click to switch to ${LABELS[nextPreference]}.`;

            toggleButton.setAttribute('aria-label', message);
            toggleButton.setAttribute('title', message);
            toggleButton.dataset.themeCurrent = preference;
        };

        const setStoredPreference = (preference) => {
            const normalizedPreference = normalizePreference(preference);

            try {
                localStorage.setItem(STORAGE_KEY, normalizedPreference);
                localStorage.removeItem(LEGACY_KEY);
            } catch (error) {
                // Ignore storage access issues and keep in-memory state.
            }
        };

        const cyclePreference = () => {
            const current = normalizePreference(toggleButton.dataset.themeCurrent ?? readStoredPreference());
            const currentIndex = CYCLE.indexOf(current);
            const nextPreference = CYCLE[(currentIndex + 1) % CYCLE.length];

            setStoredPreference(nextPreference);
            applyThemeAndUi(nextPreference);
        };

        const refreshFromStoredPreference = () => {
            applyThemeAndUi(normalizePreference(readStoredPreference()));
        };

        toggleButton.addEventListener('click', cyclePreference);

        if (typeof mediaQuery.addEventListener === 'function') {
            mediaQuery.addEventListener('change', () => {
                const preference = normalizePreference(readStoredPreference());

                if (preference === 'system') {
                    applyThemeAndUi(preference);
                }
            });
        } else if (typeof mediaQuery.addListener === 'function') {
            mediaQuery.addListener(() => {
                const preference = normalizePreference(readStoredPreference());

                if (preference === 'system') {
                    applyThemeAndUi(preference);
                }
            });
        }

        window.addEventListener('pageshow', refreshFromStoredPreference);
        window.addEventListener('storage', (event) => {
            if (event.key === STORAGE_KEY || event.key === LEGACY_KEY) {
                refreshFromStoredPreference();
            }
        });

        refreshFromStoredPreference();
    })();
</script>
</body>
</html>
