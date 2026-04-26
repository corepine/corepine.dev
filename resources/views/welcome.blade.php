<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Corepine · Built, tested, and verified Laravel tools</title>
    <meta name="description" content="Corepine builds tested and verified Laravel tools you can ship without rebuilding the same product flows from scratch.">

    @include('partials.theme-head')

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body data-cursor-glow="true" class="corepine-page min-h-full bg-white text-zinc-950 antialiased dark:bg-zinc-950 dark:text-zinc-50">
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
                <span class="block text-xs uppercase tracking-[0.18em] text-zinc-500 dark:text-zinc-400">Laravel tools</span>
            </span>
        </a>

        <nav class="ml-auto hidden items-center gap-8 text-sm md:flex">
            <a href="#products" class="text-zinc-600 transition hover:text-zinc-950 dark:text-zinc-300 dark:hover:text-zinc-50">Products</a>
            <a href="#why-corepine" class="text-zinc-600 transition hover:text-zinc-950 dark:text-zinc-300 dark:hover:text-zinc-50">Why Corepine</a>
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
    <section class="relative overflow-hidden border-b border-zinc-200 dark:border-zinc-800">
     

        <div class="relative mx-auto w-full max-w-7xl px-4 pt-16 pb-12 sm:px-6 lg:px-8 lg:pt-20 lg:pb-16">
            <div class="mx-auto max-w-4xl text-center">
                <a href="/modal/docs" class="inline-flex items-center gap-3 border border-teal-200 bg-white/90 px-3 py-2 text-sm font-medium text-zinc-700 shadow-sm transition hover:border-teal-300 hover:text-zinc-950 dark:border-teal-900/70 dark:bg-zinc-950/80 dark:text-zinc-200 dark:hover:border-teal-700 dark:hover:text-zinc-50">
                    <span class="inline-flex items-center gap-2 bg-teal-500 px-2.5 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="h-3.5 w-3.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m13.5 4.5-7.5 12h6l-1.5 6 7.5-12h-6l1.5-6Z" />
                        </svg>
                        Now shipping
                    </span>
                    <span>Modal 0.1x</span>
                </a>

                <div class="mt-8 flex items-center justify-center gap-4 text-sm font-medium uppercase tracking-[0.18em] text-zinc-400 dark:text-zinc-500">
                    <span>Laravel</span>
                    <span class="h-1.5 w-1.5 rounded-full bg-zinc-300 dark:bg-zinc-700"></span>
                    <span>Livewire</span>
                    <span class="h-1.5 w-1.5 rounded-full bg-zinc-300 dark:bg-zinc-700"></span>
                    <span>Vue</span>
                </div>

                <h1 class="font-space mt-8 text-5xl font-normal tracking-[-0.065em] text-zinc-950 sm:text-6xl lg:text-[5.5rem] lg:leading-[0.92] dark:text-zinc-50">
                    Artisan tools for shipping faster.
                </h1>

                <p class="mx-auto mt-7 max-w-3xl text-xl leading-9 text-zinc-600 dark:text-zinc-300">
                    Corepine gives Laravel teams polished tools for modals, actions, and product flows, with the docs and release clarity needed to put them to work.
                </p>

                <div class="mt-10 flex flex-wrap items-center justify-center gap-4">
                    <a href="#products" class="inline-flex items-center justify-center border border-zinc-950 bg-zinc-950 px-6 py-3 text-sm font-semibold text-white transition hover:bg-zinc-800 dark:border-zinc-50 dark:bg-zinc-50 dark:text-zinc-950 dark:hover:bg-zinc-200">
                        Explore tools
                    </a>
                    <a href="/modal/docs" class="inline-flex items-center justify-center gap-2 border border-zinc-300 bg-white/90 px-6 py-3 text-sm font-semibold text-zinc-800 transition hover:border-zinc-400 hover:bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-950/80 dark:text-zinc-100 dark:hover:border-zinc-500 dark:hover:bg-zinc-900">
                        View Modal docs
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.75 21 12m0 0-3.75 3.25M21 12H3" />
                        </svg>
                    </a>
                </div>

         
            </div>

            <div class="relative mx-auto mt-16 max-w-6xl">
                <div class="overflow-hidden rounded-[2rem] border border-zinc-200 bg-white/90 p-3 shadow-[0_24px_80px_-40px_rgba(15,23,42,0.28)] backdrop-blur dark:border-zinc-800 dark:bg-zinc-950/90">
                    <div class="overflow-hidden rounded-[1.6rem] border border-zinc-200 bg-white dark:border-zinc-800 dark:bg-zinc-950">
                        <div class="flex items-center justify-between border-b border-zinc-200 px-5 py-3 dark:border-zinc-800">
                            <div class="flex items-center gap-2">
                                <span class="h-2.5 w-2.5 rounded-full bg-zinc-300 dark:bg-zinc-700"></span>
                                <span class="h-2.5 w-2.5 rounded-full bg-zinc-300 dark:bg-zinc-700"></span>
                                <span class="h-2.5 w-2.5 rounded-full bg-teal-400 dark:bg-teal-500"></span>
                                <span class="ml-2 text-xs font-medium text-zinc-500 dark:text-zinc-400">corepine/modal</span>
                            </div>
                            <a href="/modal/docs" class="text-sm font-medium text-teal-700 transition hover:text-teal-600 dark:text-teal-300 dark:hover:text-teal-200">
                                Open docs
                            </a>
                        </div>

                        <div class="grid lg:grid-cols-[280px_minmax(0,1fr)]">
                            <div class="border-b border-zinc-200 bg-zinc-50/90 p-5 dark:border-zinc-800 dark:bg-zinc-900/90 lg:border-b-0 lg:border-r">
                                <div class="border border-zinc-200 bg-white px-3 py-2 text-sm text-zinc-400 dark:border-zinc-800 dark:bg-zinc-950 dark:text-zinc-500">
                                    Search components...
                                </div>

                                <div class="mt-5 space-y-2 text-sm">
                                    <div class="border border-zinc-200 bg-white px-4 py-3 font-medium text-zinc-900 dark:border-zinc-700 dark:bg-zinc-950 dark:text-zinc-100">Centered modal</div>
                                    <div class="px-4 py-2 text-zinc-500 dark:text-zinc-400">Bottom sheet</div>
                                    <div class="px-4 py-2 text-zinc-500 dark:text-zinc-400">Drawer right</div>
                                    <div class="px-4 py-2 text-zinc-500 dark:text-zinc-400">Actions</div>
                                    <div class="px-4 py-2 text-zinc-500 dark:text-zinc-400">Events</div>
                                </div>
                            </div>

                            <div class="bg-white dark:bg-zinc-950">
                                <div class="border-b border-zinc-200 px-6 py-5 dark:border-zinc-800">
                                    <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-zinc-500 dark:text-zinc-400">Available now</p>
                                    <h2 class="font-space mt-2 text-3xl font-semibold tracking-[-0.04em] text-zinc-950 dark:text-zinc-50">Modal</h2>
                                    <p class="mt-3 max-w-2xl text-sm leading-7 text-zinc-600 dark:text-zinc-300">
                                        A Laravel modal tool for drawers, layered flows, and action-driven interfaces.
                                    </p>
                                </div>

                                <div class="bg-zinc-50 p-5 dark:bg-zinc-900">
                                    <div class="overflow-hidden rounded-[1.4rem] border border-zinc-200 bg-white dark:border-zinc-800 dark:bg-zinc-950">
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
                                </div>
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
                        Tools that save your team time.
                    </h2>
                </div>

                <div class="grid gap-8 border-t border-zinc-200 pt-8 dark:border-zinc-800 sm:grid-cols-2">
                    <article>
                        <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-teal-700 dark:text-teal-300">Now shipping</p>
                        <h3 class="font-space mt-3 text-2xl font-semibold">Modal</h3>
                        <p class="mt-3 text-sm leading-7 text-zinc-600 dark:text-zinc-300">
                            A tested modal tool for Laravel teams that need to ship real product flows faster.
                        </p>
                    </article>

                    <article>
                        <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-zinc-500 dark:text-zinc-400">What’s next</p>
                        <h3 class="font-space mt-3 text-2xl font-semibold">More Corepine tools</h3>
                        <p class="mt-3 text-sm leading-7 text-zinc-600 dark:text-zinc-300">
                            More tools are coming with the same standard: built, tested, verified, and ready to ship.
                        </p>
                    </article>
                </div>
            </div>
        </div>

        
    </section>

    <section id="why-corepine" class="border-b border-zinc-200 dark:border-zinc-800">
        <div class="mx-auto w-full max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-[0.85fr_1.15fr]">
                <div>
                    <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-zinc-500 dark:text-zinc-400">Why Corepine</p>
                    <h2 class="font-space mt-4 text-4xl font-semibold tracking-[-0.05em] text-zinc-950 dark:text-zinc-50">
                        We handle the tool so you can ship the product.
                    </h2>
                </div>

                <div class="grid gap-x-10 gap-y-8 sm:grid-cols-2">
                    <div class="border-t border-zinc-200 pt-5 dark:border-zinc-800">
                        <p class="font-space text-xl font-semibold">Built</p>
                        <p class="mt-3 text-sm leading-7 text-zinc-600 dark:text-zinc-300">Corepine tools start as real implementation work, not placeholder ideas.</p>
                    </div>
                    <div class="border-t border-zinc-200 pt-5 dark:border-zinc-800">
                        <p class="font-space text-xl font-semibold">Tested</p>
                        <p class="mt-3 text-sm leading-7 text-zinc-600 dark:text-zinc-300">Each release is meant to hold up in real usage, not just in a screenshot.</p>
                    </div>
                    <div class="border-t border-zinc-200 pt-5 dark:border-zinc-800">
                        <p class="font-space text-xl font-semibold">Verified</p>
                        <p class="mt-3 text-sm leading-7 text-zinc-600 dark:text-zinc-300">We ship tools with a quality bar your team can trust.</p>
                    </div>
                    <div class="border-t border-zinc-200 pt-5 dark:border-zinc-800">
                        <p class="font-space text-xl font-semibold">Time back</p>
                        <p class="mt-3 text-sm leading-7 text-zinc-600 dark:text-zinc-300">Your team spends less time building the tool and more time shipping the product around it.</p>
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
                        Everything needed to implement fast.
                    </h2>
                    <p class="mt-6 text-base leading-8 text-zinc-600 dark:text-zinc-300">
                        Install guides, usage examples, API references, and versioned docs are there so your team can move from idea to release faster.
                    </p>

                    <div class="mt-8 space-y-4 border-t border-zinc-200 pt-8 dark:border-zinc-800">
                        <div>
                            <p class="font-space text-lg font-semibold">Install</p>
                            <p class="mt-2 text-sm leading-7 text-zinc-600 dark:text-zinc-300">Get the tool into your app quickly with a clear setup path.</p>
                        </div>
                        <div>
                            <p class="font-space text-lg font-semibold">Use</p>
                            <p class="mt-2 text-sm leading-7 text-zinc-600 dark:text-zinc-300">Examples and references help your team implement the tool without guesswork.</p>
                        </div>
                        <div>
                            <p class="font-space text-lg font-semibold">Maintain</p>
                            <p class="mt-2 text-sm leading-7 text-zinc-600 dark:text-zinc-300">Versioned docs keep releases clear as the tool grows.</p>
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
