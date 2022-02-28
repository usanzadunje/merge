<?php

use Usanzadunje\Core\Template;
use Usanzadunje\Core\Route;

if (!function_exists('route')) {

    function route(): Route
    {
        return Route::getInstance();
    }
}

if (!function_exists('view')) {

    function view(string $path, array $parameters = []): string
    {
        return (new Template($path, $parameters))->render();
    }
}