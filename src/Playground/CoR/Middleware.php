<?php

namespace Usanzadunje\Playground\CoR;

abstract class Middleware
{
    private Middleware $next;

    public function setNext(Middleware $next)
    {
        $this->next = $next;

        return $next;
    }

    public function check(string $email, string $password)
    {
        if (!$this->next) {
            return true;
        }

        return $this->next->check($email, $password);
    }
}