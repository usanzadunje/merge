<?php

use Composer\Autoload\ClassLoader;
use JetBrains\PhpStorm\NoReturn;
use Usanzadunje\Core\Route;

if (!function_exists('base_path')) {

    function base_path(string $path = null): string
    {
        $reflection = new \ReflectionClass(ClassLoader::class);

        return rtrim(dirname($reflection->getFileName(), 3) . "/src/$path", '/');
    }
}

if (!function_exists('resource_path')) {

    function resource_path(string $path = null): string
    {
        $reflection = new \ReflectionClass(ClassLoader::class);

        return rtrim(dirname($reflection->getFileName(), 3) . "/src/resources/$path", '/');
    }
}

if (!function_exists('config')) {

    function config(string $config): string
    {
        list($file, $key) = explode('.', $config, 2);

        $config = require base_path("config/$file.php");

        return $config[$key];
    }
}

if (!function_exists('dd')) {

    #[NoReturn] function dd($variable)
    {
        echo "<pre>";
        var_dump($variable);
        echo "<pre/>";

        die();
    }
}