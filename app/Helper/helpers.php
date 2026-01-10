<?php

use App\Models\GeneralSetting;
use illuminate\Support\Str;

/**
 *  set sidebar Active
 */
function setActive(array $routes, string $className = 'active')
{
    if (is_array($routes)) {
        foreach ($routes as $route) {
            if (request()->routeIs($route)) {
                return $className;
            }
        }
    }
    return '';
}

/**
 * limit text for product name
 */
function limitText($text, $limit = 20)
{
    return Str::limit($text, $limit);
}
