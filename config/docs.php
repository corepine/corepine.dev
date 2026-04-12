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
            'default_slug' => 'welcome',
            'navigation_file' => '_nav.json',
            'content_path' => base_path('docs-content/modal'),
            'versions' => [
                '0_1x' => '0.1x',
            ],
        ],
    ],
];

