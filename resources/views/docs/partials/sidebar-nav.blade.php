<div class="space-y-6">
    @foreach ($navigation as $section)
        <div>
            @if ($section['title'] !== '')
                <h3 class="mb-2 text-xs font-semibold uppercase tracking-[0.12em] text-zinc-500 dark:text-zinc-400">{{ $section['title'] }}</h3>
            @endif

            <ul class="space-y-1">
                @foreach ($section['items'] as $item)
                    <li>
                        <a
                            href="{{ $item['url'] }}"
                            class="flex items-center justify-between rounded-lg px-2.5 py-2 text-sm transition {{ $item['is_active'] ? 'bg-teal-100 text-teal-900 dark:bg-teal-900/35 dark:text-teal-200' : 'text-zinc-700 hover:bg-zinc-100 hover:text-zinc-900 dark:text-zinc-300 dark:hover:bg-zinc-800 dark:hover:text-zinc-100' }}"
                        >
                            <span>{{ $item['label'] }}</span>
                            @if ($item['badge'])
                                <span class="rounded-full border border-zinc-300 px-2 py-0.5 text-[10px] uppercase tracking-wide text-zinc-500 dark:border-zinc-700 dark:text-zinc-400">{{ $item['badge'] }}</span>
                            @endif
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
</div>

