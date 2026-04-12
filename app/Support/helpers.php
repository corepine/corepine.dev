<?php

use App\Services\DocsService;

if (! function_exists('docs')) {
    function docs(): DocsService
    {
        return app(DocsService::class);
    }
}

