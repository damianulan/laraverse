<?php

if (!function_exists('laraverse_dist')) {
    function laraverse_dist($path = null)
    {
        return __DIR__ . '/../dist/' . $path;
    }
}

if (!function_exists('nest_page')) {
    function nest_page(array $values, $page): array
    {
        $nested = [];
        $current = &$nested;

        $i = 0;
        foreach ($values as $value) {
            $i++;
            if ($i === count($values)) {
                $current[$value][] = $page;
            }
            $current = &$current[$value];
        }

        return $nested;
    }
}

if (!function_exists('is_array_nested')) {
    function is_array_nested(array $arr): bool
    {
        return is_array(reset($arr));
    }
}
