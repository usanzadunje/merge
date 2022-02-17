<?php

namespace Usanzadunje\app\Middleware;

use Usanzadunje\Core\Middleware;
use Usanzadunje\Core\Request;

class Third extends Middleware
{
    public function handle(Request $request,)
    {
        echo 'Third';

        return parent::handle($request);
    }
}