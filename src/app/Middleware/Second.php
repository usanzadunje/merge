<?php

namespace Usanzadunje\app\Middleware;

use Usanzadunje\Core\Middleware;
use Usanzadunje\Core\Request;

class Second extends Middleware
{
    public function handle(Request $request,)
    {
        echo 'Second';

        return parent::handle($request);
    }
}