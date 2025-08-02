<?php

use Illuminate\Support\Facades\Route;

Route::prefix('laraverse')->name('laraverse.')->middleware('web')->group(function () {
    Route::get('/app.js', function () {
        $path = laraverse_dist('app.js');
        return response()->file($path, ['Content-Type' => 'text/javascript']);
    })->name('js');
    Route::get('/app.min.css', function () {
        $path = laraverse_dist('app.min.css');
        return response()->file($path, ['Content-Type' => 'text/css']);
    })->name('css');
});
