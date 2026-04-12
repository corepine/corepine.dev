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
            const KEY = 'corepine-theme';
            const stored = localStorage.getItem(KEY);
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            const isDark = stored === 'dark' || (stored !== 'light' && prefersDark);

            document.documentElement.classList.toggle('dark', isDark);
            document.documentElement.style.colorScheme = isDark ? 'dark' : 'light';
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
            <a href="/modal/docs" class="rounded-lg bg-teal-600 px-3 py-2 font-medium text-white transition hover:bg-teal-500">Docs</a>
        </nav>

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
                    <p class="text-xs uppercase tracking-[0.12em] text-zinc-500 dark:text-zinc-400">corepine/modal</p>
                    <p class="font-space mt-2 text-xl font-semibold">Ship interactions with zero glue code.</p>
                    <p class="mt-2 text-sm leading-6 text-zinc-600 dark:text-zinc-300">
                        Add polished modal workflows, event hooks, and theme tokens in minutes. Built for practical Laravel teams.
                    </p>

                    <div class="mt-5 grid gap-2 text-sm">
                        <div class="rounded-lg border border-zinc-200 bg-white px-3 py-2 dark:border-zinc-700 dark:bg-zinc-900">✓ Accessible keyboard and focus behavior</div>
                        <div class="rounded-lg border border-zinc-200 bg-white px-3 py-2 dark:border-zinc-700 dark:bg-zinc-900">✓ Fast setup with predictable defaults</div>
                        <div class="rounded-lg border border-zinc-200 bg-white px-3 py-2 dark:border-zinc-700 dark:bg-zinc-900">✓ Layout and style control for your brand</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="packages" class="mx-auto w-full max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
        <div class="rounded-3xl border border-zinc-200 bg-white/80 p-6 dark:border-zinc-800 dark:bg-zinc-900/70 sm:p-8">
            <h2 class="font-space text-3xl font-bold tracking-tight">Package Waves</h2>
            <p class="mt-3 max-w-3xl text-zinc-600 dark:text-zinc-300">
                Start with Modal docs now, then layer additional packages as they launch. This structure is designed so each package keeps its own versioned docs while sharing the same Corepine experience.
            </p>

            <div class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                <article class="rounded-2xl border border-zinc-200 bg-zinc-50 p-4 dark:border-zinc-700 dark:bg-zinc-950/60">
                    <p class="text-xs uppercase tracking-[0.12em] text-zinc-500">Now</p>
                    <h3 class="font-space mt-2 text-xl font-semibold">Modal</h3>
                    <p class="mt-2 text-sm text-zinc-600 dark:text-zinc-300">Dialog and workflow components for confirmations, forms, and product actions.</p>
                </article>
                <article class="rounded-2xl border border-zinc-200 bg-zinc-50 p-4 dark:border-zinc-700 dark:bg-zinc-950/60">
                    <p class="text-xs uppercase tracking-[0.12em] text-zinc-500">Next</p>
                    <h3 class="font-space mt-2 text-xl font-semibold">Commerce Tools</h3>
                    <p class="mt-2 text-sm text-zinc-600 dark:text-zinc-300">Checkout helpers, discount flows, product modals, and post-purchase UX.</p>
                </article>
                <article class="rounded-2xl border border-zinc-200 bg-zinc-50 p-4 dark:border-zinc-700 dark:bg-zinc-950/60">
                    <p class="text-xs uppercase tracking-[0.12em] text-zinc-500">Next</p>
                    <h3 class="font-space mt-2 text-xl font-semibold">Social & Business</h3>
                    <p class="mt-2 text-sm text-zinc-600 dark:text-zinc-300">Community prompts, moderation dialogs, and internal workflow modules.</p>
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
                <a href="/modal/docs" class="rounded-lg border border-zinc-300 px-3 py-2 text-sm font-medium transition hover:border-zinc-400 dark:border-zinc-700 dark:hover:border-zinc-500">
                    Open docs
                </a>
            </div>

            <div class="mt-6 grid gap-4 md:grid-cols-3">
                <div class="group relative overflow-hidden rounded-2xl border border-zinc-200 bg-zinc-50 p-3 dark:border-zinc-700 dark:bg-zinc-950/60">
                    <div class="aspect-[4/3] rounded-xl border border-dashed border-zinc-300 bg-zinc-100/80 dark:border-zinc-700 dark:bg-zinc-900"></div>
                    <p class="mt-3 text-sm text-zinc-500 dark:text-zinc-400">Modal package screenshot slot</p>
                </div>
                <div class="group relative overflow-hidden rounded-2xl border border-zinc-200 bg-zinc-50 p-3 dark:border-zinc-700 dark:bg-zinc-950/60">
                    <div class="aspect-[4/3] rounded-xl border border-dashed border-zinc-300 bg-zinc-100/80 dark:border-zinc-700 dark:bg-zinc-900"></div>
                    <p class="mt-3 text-sm text-zinc-500 dark:text-zinc-400">Commerce package screenshot slot</p>
                </div>
                <div class="group relative overflow-hidden rounded-2xl border border-zinc-200 bg-zinc-50 p-3 dark:border-zinc-700 dark:bg-zinc-950/60">
                    <div class="aspect-[4/3] rounded-xl border border-dashed border-zinc-300 bg-zinc-100/80 dark:border-zinc-700 dark:bg-zinc-900"></div>
                    <p class="mt-3 text-sm text-zinc-500 dark:text-zinc-400">Social/business package screenshot slot</p>
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
        const KEY = 'corepine-theme';
        const root = document.documentElement;
        const button = document.getElementById('theme-toggle');
        const light = button?.querySelector('.theme-toggle-light');
        const dark = button?.querySelector('.theme-toggle-dark');

        const resolveTheme = () => {
            const stored = localStorage.getItem(KEY);
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

            return stored === 'dark' || (stored !== 'light' && prefersDark) ? 'dark' : 'light';
        };

        const applyTheme = (theme) => {
            const isDark = theme === 'dark';

            root.classList.toggle('dark', isDark);
            root.style.colorScheme = isDark ? 'dark' : 'light';
        };

        const syncIcons = () => {
            const isDark = root.classList.contains('dark');
            light?.classList.toggle('hidden', isDark);
            dark?.classList.toggle('hidden', !isDark);
        };

        button?.addEventListener('click', () => {
            const nextTheme = root.classList.contains('dark') ? 'light' : 'dark';
            localStorage.setItem(KEY, nextTheme);
            applyTheme(nextTheme);
            syncIcons();
        });

        window.addEventListener('pageshow', () => {
            applyTheme(resolveTheme());
            syncIcons();
        });

        window.addEventListener('storage', (event) => {
            if (event.key === KEY) {
                applyTheme(resolveTheme());
                syncIcons();
            }
        });

        applyTheme(resolveTheme());
        syncIcons();
    })();
</script>
</body>
</html>
