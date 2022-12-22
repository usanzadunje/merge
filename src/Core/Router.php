<?php

namespace Usanzadunje\Core;

use Usanzadunje\Exceptions\NotFoundException;

class Router
{

    public static function initialize()
    {
        $container = new Container();
        $routeAction = route()->action();

        if (!$routeAction) {
            NotFoundException::handle();
        }

        // TODO LET ROUTE PARAMETERS BE OTHER TYPES THAN STRINGS
        call_user_func($routeAction, ...$container->resolveActionDependencies(...$routeAction));
    }
}