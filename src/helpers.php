<?php

if (!function_exists('laraverse_dist')) {
    function laraverse_dist($path = null)
    {
        return __DIR__ . '/../dist/' . $path;
    }
}
