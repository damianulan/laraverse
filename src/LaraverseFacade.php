<?php

namespace Laraverse;

use Illuminate\Support\Facades\Facade as BaseFacade;

class LaraverseFacade extends BaseFacade
{
    /**
     * Get the registered name of the component.
     */
    public static function getFacadeAccessor(): string
    {
        return 'laraverse';
    }
}
