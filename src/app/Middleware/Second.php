<?php

namespace Usanzadunje\app\Middleware;

use Usanzadunje\Core\Http\Middleware;
use Usanzadunje\Core\Http\Request;

class Second extends Middleware
{
    public function handle(Request $request,)
    {
        echo 'Second';

        return parent::handle($request);
    }
}