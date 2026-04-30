<?php

use App\Http\Controllers\DocsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/docs/{project}/{segments?}', DocsController::class)
    ->where('segments', '.*')
    ->name('docs.show');

Route::get('/{project}', fn (string $project) => redirect()->route('docs.show', ['project' => $project], 301))
    ->where('project', implode('|', array_keys(config('docs.projects', []))));

Route::get('/{project}/docs/{segments?}', function (string $project, ?string $segments = null) {
    abort_if(! array_key_exists($project, config('docs.projects', [])), 404);

    $params = ['project' => $project];
    if ($segments !== null && $segments !== '') {
        $params['segments'] = $segments;
    }

    return redirect()->route('docs.show', $params, 301);
})->where('segments', '.*');
