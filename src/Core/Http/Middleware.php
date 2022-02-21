<?php

namespace Usanzadunje\Core\Http;

use Closure;

abstract class Middleware
{
    private Middleware $next;

    public function setNext(Middleware $next)
    {
        $this->next = $next;

        return $next;
    }

    public function handle(Request $request, Closure $next)
    {
        if (!$this->next) {
            return true;
        }

        return $this->next->handle($request, $next);
    }
}