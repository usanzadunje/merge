<?php

namespace Usanzadunje\app\Middleware;

use Usanzadunje\Core\Middleware;
use Usanzadunje\Core\Request;

class First extends Middleware
{
    public function handle(Request $request,)
    {
        echo 'First';

        return parent::handle($request);
    }
}