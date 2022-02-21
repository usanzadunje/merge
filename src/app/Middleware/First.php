<?php

namespace Usanzadunje\app\Middleware;

use Usanzadunje\Core\Http\Middleware;
use Usanzadunje\Core\Http\Request;

class First extends Middleware
{
    public function handle(Request $request,)
    {
        echo 'First';

        return parent::handle($request);
    }
}