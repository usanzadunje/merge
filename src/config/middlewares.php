<?php

use Usanzadunje\app\Http\Middleware\First;
use Usanzadunje\app\Http\Middleware\Second;
use Usanzadunje\app\Http\Middleware\Third;

return [
    First::class,
    Second::class,
    Third::class,
];