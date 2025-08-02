<?php

namespace Laraverse\Builders;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use JsonSerializable;
use Illuminate\Contracts\Support\Jsonable;
use Laraverse\Builders\VersePage;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Symfony\Component\Finder\SplFileInfo;

class VerseBuilder
{

    protected array $structure = [];
    protected array $navigation = [];

    public function __construct()
    {
        //
    }

    public static function boot()
    {
        $instance = new self();
        $paths = config('laraverse.sources', []);
        $structure = [];

        if (!empty($paths) && is_array($paths)) {
            foreach ($paths as $slug => $path) {
                $fullpath = base_path() . '/' . $path;
                $files = File::allFiles($fullpath);
                $mainPath = $fullpath . '/../README.md';
                if (File::exists($mainPath)) {
                    $file = new SplFileInfo($mainPath, "", "");
                    if ($file) {
                        $page = new VersePage($file, $slug, true);
                        $structure[$slug] = $page;
                    }
                }
                if (!empty($files)) {
                    foreach ($files as $file) {
                        $page = new VersePage($file, $slug);
                        $structure[$page->getPath()] = $page;
                    }
                }
            }
        }
        $instance->structure = $structure;
        $navigation_keys = array_keys(Arr::dot($structure));
        $navigation = array();
        foreach ($navigation_keys as $nav) {
            $navigation[] = Str::beforeLast($nav, '.');
        }
        $instance->navigation = array_unique($navigation);

        return $instance;
    }

    public static function getStructure()
    {
        return self::boot()->structure;
    }

    public static function findPage(string $path): ?VersePage
    {
        $structure = self::getStructure();
        return Arr::pull($structure, $path) ?? null;
    }
}
