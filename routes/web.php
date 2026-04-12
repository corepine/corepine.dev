<?php

use App\Http\Controllers\DocsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{project}/docs/{segments?}', DocsController::class)
    ->where('segments', '.*')
    ->name('docs.show');
