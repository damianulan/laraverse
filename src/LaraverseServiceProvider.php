<?php

namespace Laraverse;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\Support\Facades\Blade;
use Laraverse\Config\Laraverse;

/**
 * @author Damian Ułan <damian.ulan@protonmail.com>
 * @copyright 2025 damianulan
 * @package Laraverse
 * @license MIT
 */
class LaraverseServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/laraverse.php', 'laraverse');
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        $this->app->bind('laraverse', function () {
            return new Laraverse();
        });
    }

    /**
     * When this method is apply we have all laravel providers and methods available
     */
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'laraverse');

        $this->loadTranslationsFrom(__DIR__ . '/../lang', 'laraverse');

        $this->publishes([
            __DIR__ . '/../lang'                   => $this->app->langPath('vendor/laraverse'),
        ], 'laraverse-langs');

        $this->publishes([
            __DIR__ . '/../config/laraverse.php'   => config_path('laraverse.php'),
        ], 'laraverse-config');

        $this->publishes([
            __DIR__ . '/../resources/views'        => resource_path('views/vendor/laraverse'),
        ], 'laraverse-views');


        $this->publishes([
            __DIR__ . '/../config/laraverse.php'   => config_path('laraverse.php'),
        ], 'laraverse');

        $this->registerBladeDirectives();
        $this->registerCommands();
    }

    public function registerBladeDirectives(): void {}

    public function registerCommands(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([]);
        }
    }
}
