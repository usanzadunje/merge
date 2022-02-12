<?php

namespace Usanzadunje\Core;

use Usanzadunje\Support\DotEnv;

class App
{
    public static function initialize()
    {
        // Write values from .env, so they are readable through 'getenv' function
        DotEnv::initialize();

        // Initialize router which will call right action for called route
        Router::initialize();
    }
}