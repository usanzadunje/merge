<?php

namespace Usanzadunje\Core;

use Usanzadunje\Exceptions\NotFoundException;

class Router
{
    private Route $route;

    public function __construct()
    {
        $this->route = Route::getInstance();
    }

    public function initialize()
    {
        $routeAction = $this->route->action();

        // If we did not find any routes that match expression simply throw 404.
        if (!$routeAction) {
            NotFoundException::handle();
        }

        // Call controller action and provide parameters to it.
        // Parameters are always integers. FOR NOW
        call_user_func($routeAction, ...$this->route->params());
    }
}