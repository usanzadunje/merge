<?php

namespace Usanzadunje\Core;

use Usanzadunje\Support\DotEnv;

class App
{
    public function __construct()
    {
        (new DotEnv(base_path() . '/.env'))->load();
        (new Router())->initialize();
    }
}