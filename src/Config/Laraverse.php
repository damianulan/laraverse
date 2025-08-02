<?php

namespace Laraverse\Config;

use Illuminate\Support\Facades\Route;
use Laraverse\Builders\VerseBuilder;
use Illuminate\Http\Request;

class Laraverse
{

    public static function routes(): void
    {
        $structure = array_keys(VerseBuilder::getStructure());
        foreach ($structure as $path) {
            $url = str_replace('.', '/', $path);
            Route::get($url, function (Request $request) use ($path) {
                $request->request->add([
                    'path' => $path,
                ]);

                return (new \Laraverse\Http\Controllers\BaseController())->index($request);
            })->name($path);
        }
    }
}
