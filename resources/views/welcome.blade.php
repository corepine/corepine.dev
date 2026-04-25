<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Corepine · Artisan tools you can ship today</title>
    <meta name="description" content="Corepine is home to polished Artisan tools with documentation you can publish and ship.">

    @include('partials.theme-head')

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="corepine-page min-h-full bg-white text-zinc-950 antialiased dark:bg-zinc-950 dark:text-zinc-50">
<div class="corepine-grid pointer-events-none fixed inset-0 -z-10 opacity-70 dark:opacity-40"></div>

<header class="sticky top-0 z-40 border-b border-zinc-200/80 bg-white/90 backdrop-blur-xl dark:border-zinc-800 dark:bg-zinc-950/90">
    <div class="mx-auto flex w-full max-w-7xl items-center gap-6 px-4 py-4 sm:px-6 lg:px-8">
        <a href="/" class="inline-flex items-center gap-3">
            <img
                src="{{ asset('brand/corepine-logo-mark.svg') }}"
                alt="Corepine logo"
                class="h-8 w-8"
                width="32"
                height="32"
            >
            <span>
                <span class="font-space block text-xl font-semibold tracking-tight">Corepine</span>
                <span class="block text-xs uppercase tracking-[0.18em] text-zinc-500 dark:text-zinc-400">Laravel packages</span>
            </span>
        </a>

        <nav class="ml-auto hidden items-center gap-8 text-sm md:flex">
            <a href="#products" class="text-zinc-600 transition hover:text-zinc-950 dark:text-zinc-300 dark:hover:text-zinc-50">Products</a>
            <a href="#principles" class="text-zinc-600 transition hover:text-zinc-950 dark:text-zinc-300 dark:hover:text-zinc-50">Principles</a>
            <a href="#documentation" class="text-zinc-600 transition hover:text-zinc-950 dark:text-zinc-300 dark:hover:text-zinc-50">Documentation</a>
        </nav>

        <a href="/modal/docs" class="hidden border border-teal-600 bg-teal-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-teal-500 md:inline-flex">
            Modal docs
        </a>

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
</header>

<main>
    <section class="border-b border-zinc-200 dark:border-zinc-800">
        <div class="mx-auto grid w-full max-w-7xl gap-12 px-4 py-16 sm:px-6 lg:grid-cols-[minmax(0,1fr)_minmax(360px,0.9fr)] lg:items-center lg:px-8 lg:py-24">
            <div>
                <div class="inline-flex items-center gap-2 border border-teal-200 bg-teal-50 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.18em] text-teal-700 dark:border-teal-900/70 dark:bg-teal-950/30 dark:text-teal-300">
                    Built for Laravel
                </div>

                <h1 class="font-space mt-8 max-w-4xl text-5xl font-normal tracking-[-0.06em] text-zinc-950 sm:text-6xl lg:text-[5.2rem] lg:leading-[0.94] dark:text-zinc-50">
                    Artisan tools you can ship today.
                </h1>

                <p class="mt-8 max-w-2xl text-xl leading-9 text-zinc-600 dark:text-zinc-300">
                    Corepine is the home for Laravel tools and documentation built to feel polished, stable, and ready for real teams.
                </p>

                <div class="mt-10 flex flex-wrap gap-4">
                    <a href="/modal/docs" class="inline-flex items-center border border-teal-600 bg-teal-600 px-6 py-3 text-sm font-semibold text-white transition hover:bg-teal-500">
                        Browse docs
                    </a>
                    <a href="#products" class="inline-flex items-center border border-zinc-300 px-6 py-3 text-sm font-semibold text-zinc-800 transition hover:border-zinc-400 hover:bg-zinc-50 dark:border-zinc-700 dark:text-zinc-100 dark:hover:border-zinc-500 dark:hover:bg-zinc-900">
                        View packages
                    </a>
                </div>

                <div class="mt-12 grid max-w-3xl gap-6 border-t border-zinc-200 pt-8 text-sm dark:border-zinc-800 sm:grid-cols-3">
                    <div>
                        <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-zinc-500 dark:text-zinc-400">Focus</p>
                        <p class="mt-3 font-space text-xl font-semibold">Tools</p>
                        <p class="mt-2 leading-7 text-zinc-600 dark:text-zinc-300">Polished building blocks for Laravel apps.</p>
                    </div>
                    <div>
                        <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-zinc-500 dark:text-zinc-400">Standard</p>
                        <p class="mt-3 font-space text-xl font-semibold">Reliable</p>
                        <p class="mt-2 leading-7 text-zinc-600 dark:text-zinc-300">Built for real usage, not just showcase pages.</p>
                    </div>
                    <div>
                        <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-zinc-500 dark:text-zinc-400">Docs</p>
                        <p class="mt-3 font-space text-xl font-semibold">Shippable</p>
                        <p class="mt-2 leading-7 text-zinc-600 dark:text-zinc-300">Documentation that feels ready for public release.</p>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="border border-zinc-200 bg-white dark:border-zinc-800 dark:bg-zinc-950">
                    <div class="flex items-center justify-between border-b border-zinc-200 px-4 py-3 dark:border-zinc-800">
                        <div>
                            <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-zinc-500 dark:text-zinc-400">Corepine standard</p>
                            <p class="mt-1 font-space text-lg font-semibold">Tools built to launch cleanly</p>
                        </div>
                        <a href="/modal/docs" class="text-sm font-medium text-teal-700 transition hover:text-teal-600 dark:text-teal-300 dark:hover:text-teal-200">
                            Open docs
                        </a>
                    </div>

                    <div class="grid gap-0 lg:grid-cols-[1.05fr_0.95fr]">
                        <div class="border-b border-zinc-200 p-5 dark:border-zinc-800 lg:border-b-0 lg:border-r">
                            <p class="text-sm leading-7 text-zinc-600 dark:text-zinc-300">
                                Corepine tools are designed to ship with cleaner defaults, solid interfaces, and documentation that looks ready for customers and teams.
                            </p>

                            <div class="mt-6 space-y-4 border-t border-zinc-200 pt-6 dark:border-zinc-800">
                                <div>
                                    <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-zinc-500 dark:text-zinc-400">Packages</p>
                                    <p class="mt-2 text-sm text-zinc-700 dark:text-zinc-200">Focused Laravel building blocks with practical defaults</p>
                                </div>
                                <div>
                                    <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-zinc-500 dark:text-zinc-400">Documentation</p>
                                    <p class="mt-2 text-sm text-zinc-700 dark:text-zinc-200">Structured, versioned, and ready to publish</p>
                                </div>
                                <div>
                                    <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-zinc-500 dark:text-zinc-400">Shipping goal</p>
                                    <p class="mt-2 text-sm text-zinc-700 dark:text-zinc-200">Give each package a public-facing quality bar from day one</p>
                                </div>
                            </div>
                        </div>

                        <div class="grid gap-0 divide-y divide-zinc-200 dark:divide-zinc-800">
                            <div class="bg-zinc-50 p-5 dark:bg-zinc-900">
                                <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-zinc-500 dark:text-zinc-400">What Corepine is</p>
                                <p class="mt-2 text-sm leading-7 text-zinc-700 dark:text-zinc-200">A home for Laravel teams that want stronger defaults and documentation that already feels launch-ready.</p>
                            </div>
                            <div class="p-5">
                                <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-zinc-500 dark:text-zinc-400">Accent</p>
                                <div class="mt-3 h-2 w-full bg-teal-500"></div>
                            </div>
                            <div class="p-5">
                                <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-zinc-500 dark:text-zinc-400">Live now</p>
                                <p class="mt-2 text-sm text-zinc-700 dark:text-zinc-200">Modal docs</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="products" class="border-b border-zinc-200 dark:border-zinc-800">
        <div class="mx-auto w-full max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-[0.9fr_1.1fr]">
                <div>
                    <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-zinc-500 dark:text-zinc-400">Products</p>
                    <h2 class="font-space mt-4 text-4xl font-semibold tracking-[-0.05em] text-zinc-950 dark:text-zinc-50">
                        Tools that feel ready from day one.
                    </h2>
                </div>

                <div class="grid gap-8 border-t border-zinc-200 pt-8 dark:border-zinc-800 sm:grid-cols-2">
                    <article>
                        <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-teal-700 dark:text-teal-300">Now shipping</p>
                        <h3 class="font-space mt-3 text-2xl font-semibold">Modal</h3>
                        <p class="mt-3 text-sm leading-7 text-zinc-600 dark:text-zinc-300">
                            A polished modal package with public docs, a clear API surface, and UI flows built for real apps.
                        </p>
                    </article>

                    <article>
                        <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-zinc-500 dark:text-zinc-400">Roadmap</p>
                        <h3 class="font-space mt-3 text-2xl font-semibold">More Corepine tools</h3>
                        <p class="mt-3 text-sm leading-7 text-zinc-600 dark:text-zinc-300">
                            Future tools will follow the same standard: polished implementation with documentation ready to publish.
                        </p>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <section id="principles" class="border-b border-zinc-200 dark:border-zinc-800">
        <div class="mx-auto w-full max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-[0.85fr_1.15fr]">
                <div>
                    <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-zinc-500 dark:text-zinc-400">Principles</p>
                    <h2 class="font-space mt-4 text-4xl font-semibold tracking-[-0.05em] text-zinc-950 dark:text-zinc-50">
                        Built to feel complete before launch day.
                    </h2>
                </div>

                <div class="grid gap-x-10 gap-y-8 sm:grid-cols-2">
                    <div class="border-t border-zinc-200 pt-5 dark:border-zinc-800">
                        <p class="font-space text-xl font-semibold">Shippable docs</p>
                        <p class="mt-3 text-sm leading-7 text-zinc-600 dark:text-zinc-300">Every tool should have documentation that already feels publishable and stable.</p>
                    </div>
                    <div class="border-t border-zinc-200 pt-5 dark:border-zinc-800">
                        <p class="font-space text-xl font-semibold">Clear package surfaces</p>
                        <p class="mt-3 text-sm leading-7 text-zinc-600 dark:text-zinc-300">Corepine should present tools like products, not unfinished internal projects.</p>
                    </div>
                    <div class="border-t border-zinc-200 pt-5 dark:border-zinc-800">
                        <p class="font-space text-xl font-semibold">Consistent quality bar</p>
                        <p class="mt-3 text-sm leading-7 text-zinc-600 dark:text-zinc-300">The site, package pages, and docs should all feel like one shippable system.</p>
                    </div>
                    <div class="border-t border-zinc-200 pt-5 dark:border-zinc-800">
                        <p class="font-space text-xl font-semibold">Simple presentation</p>
                        <p class="mt-3 text-sm leading-7 text-zinc-600 dark:text-zinc-300">The layout stays restrained so the package and documentation do the talking.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="documentation">
        <div class="mx-auto w-full max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-[1.1fr_0.9fr]">
                <div class="grid gap-4 md:grid-cols-3">
                    <figure class="border border-zinc-200 bg-white p-3 dark:border-zinc-800 dark:bg-zinc-950">
                        <div class="aspect-[4/3] overflow-hidden border border-zinc-200 bg-zinc-50 dark:border-zinc-800 dark:bg-zinc-900">
                            <img
                                src="{{ asset('assets/modal/centered-modal-light.png') }}"
                                alt="Centered modal screenshot"
                                class="h-full w-full object-cover dark:hidden"
                            >
                            <img
                                src="{{ asset('assets/modal/centered-modal-dark.png') }}"
                                alt="Centered modal screenshot"
                                class="hidden h-full w-full object-cover dark:block"
                            >
                        </div>
                        <figcaption class="mt-3 text-sm text-zinc-500 dark:text-zinc-400">Centered modal</figcaption>
                    </figure>

                    <figure class="border border-zinc-200 bg-white p-3 dark:border-zinc-800 dark:bg-zinc-950">
                        <div class="aspect-[4/3] overflow-hidden border border-zinc-200 bg-zinc-50 dark:border-zinc-800 dark:bg-zinc-900">
                            <img
                                src="{{ asset('assets/modal/bottom-sheet-light.png') }}"
                                alt="Bottom sheet screenshot"
                                class="h-full w-full object-cover dark:hidden"
                            >
                            <img
                                src="{{ asset('assets/modal/bottom-sheet-dark.png') }}"
                                alt="Bottom sheet screenshot"
                                class="hidden h-full w-full object-cover dark:block"
                            >
                        </div>
                        <figcaption class="mt-3 text-sm text-zinc-500 dark:text-zinc-400">Bottom sheet</figcaption>
                    </figure>

                    <figure class="border border-zinc-200 bg-white p-3 dark:border-zinc-800 dark:bg-zinc-950">
                        <div class="aspect-[4/3] overflow-hidden border border-zinc-200 bg-zinc-50 dark:border-zinc-800 dark:bg-zinc-900">
                            <img
                                src="{{ asset('assets/modal/drawer-right-light.png') }}"
                                alt="Drawer modal screenshot"
                                class="h-full w-full object-right dark:hidden"
                            >
                            <img
                                src="{{ asset('assets/modal/drawer-right-dark.png') }}"
                                alt="Drawer modal screenshot"
                                class="hidden h-full w-full object-right dark:block"
                            >
                        </div>
                        <figcaption class="mt-3 text-sm text-zinc-500 dark:text-zinc-400">Drawer</figcaption>
                    </figure>
                </div>

                <div>
                    <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-zinc-500 dark:text-zinc-400">Documentation</p>
                    <h2 class="font-space mt-4 text-4xl font-semibold tracking-[-0.05em] text-zinc-950 dark:text-zinc-50">
                        Documentation that ships with the tool.
                    </h2>
                    <p class="mt-6 text-base leading-8 text-zinc-600 dark:text-zinc-300">
                        Corepine documentation should feel public, stable, and ready for real users from the moment a tool goes live.
                    </p>

                    <div class="mt-8 space-y-4 border-t border-zinc-200 pt-8 dark:border-zinc-800">
                        <div>
                            <p class="font-space text-lg font-semibold">Versioned</p>
                        <p class="mt-2 text-sm leading-7 text-zinc-600 dark:text-zinc-300">Each tool keeps documentation that can grow without losing structure.</p>
                        </div>
                        <div>
                            <p class="font-space text-lg font-semibold">Public-facing</p>
                            <p class="mt-2 text-sm leading-7 text-zinc-600 dark:text-zinc-300">The docs are meant to look ready for teams, customers, and production use.</p>
                        </div>
                        <div>
                            <p class="font-space text-lg font-semibold">Consistent</p>
                            <p class="mt-2 text-sm leading-7 text-zinc-600 dark:text-zinc-300">The package page and docs share the same quality bar and visual language.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<footer class="border-t border-zinc-200 py-8 text-center text-sm text-zinc-500 dark:border-zinc-800 dark:text-zinc-400">
    Corepine © {{ now()->year }} · Laravel tools and docs you can ship.
</footer>

@include('partials.theme-toggle-script')
</body>
</html>
