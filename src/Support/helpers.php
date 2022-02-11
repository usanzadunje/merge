<?php

use Composer\Autoload\ClassLoader;

if (!function_exists('base_path')) {

    function base_path(string $path = null): string
    {
        $reflection = new \ReflectionClass(ClassLoader::class);

        return rtrim(dirname($reflection->getFileName(), 3) . "/$path", '/');
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

    function config(string $config)
    {
        list($file, $key) = explode('.', $config, 2);

        $config = require base_path("src/config/$file.php");

        return $config[$key];
    }
}

if (!function_exists('dd')) {

    function dd($variable)
    {
        echo "<pre>";
        var_dump($variable);
        echo "<pre/>";

        die();
    }
}