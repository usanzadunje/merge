<?php

namespace Usanzadunje\app\Http\Middleware;

use Usanzadunje\Core\Http\Middleware;
use Usanzadunje\Core\Http\Request;

class Third extends Middleware
{
    public function handle(Request $request,)
    {
        echo 'Third';

        return parent::handle($request);
    }
}