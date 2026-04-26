<?php

return [
    'toc' => [
        'min_level' => 2,
        'max_level' => 3,
    ],

    'projects' => [
        'modal' => [
            'label' => 'Modal',
            'description' => 'Ready-to-use modal flows for Laravel applications.',
            'repository' => 'https://github.com/corepine/modal',
            'default_slug' => 'welcome',
            'navigation_file' => '_nav.json',
            'content_path' => resource_path('views/docs/modal'),
            'versions' => [
                '0_1x' => '0.1x',
            ],
        ],
        // 'threads' => [
        //     'label' => 'Threads',
        //     'description' => 'Threaded comments and voting for Laravel + Livewire apps.',
        //     'repository' => 'https://github.com/corepine/threads',
        //     'default_slug' => 'welcome',
        //     'navigation_file' => '_nav.json',
        //     'content_path' => resource_path('views/docs/threads'),
        //     'versions' => [
        //         '0_1x' => '0.1x',
        //     ],
        // ],
    ],
];
