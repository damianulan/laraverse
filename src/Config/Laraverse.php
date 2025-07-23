<?php

namespace Laraverse\Config;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

class Laraverse
{

    public static function routes(): void
    {
        Route::prefix('docs')->name('docs.')->group(function () {
            Route::get('/', [\Laraverse\Http\Controllers\BaseController::class, 'index'])->name('index');
        });
        Route::prefix('laraverse')->name('laraverse.')->group(function () {
            Route::get('/app.js', function () {
                $path = laraverse_dist('app.js');
                return response()->file($path, ['Content-Type' => 'text/javascript']);
            })->name('js');
            Route::get('/app.min.css', function () {
                $path = laraverse_dist('app.min.css');
                return response()->file($path, ['Content-Type' => 'text/css']);
            })->name('css');
        });
    }
}
