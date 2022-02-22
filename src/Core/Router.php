<?php

namespace Usanzadunje\Core;

use Usanzadunje\Core\Http\Request;
use Usanzadunje\Exceptions\NotFoundException;

class Router
{
    public static function initialize()
    {
        $container = new Container();
        $routeAction = route()->action();

        // If we did not find any routes that match expression simply throw 404.
        if (!$routeAction) {
            NotFoundException::handle();
        }

        // Call controller action and provide parameters to it.
        // Parameters are always integers. FOR NOW
        $container->resolveFunction(...$routeAction);

        call_user_func($routeAction, ...route()->params());
    }
}