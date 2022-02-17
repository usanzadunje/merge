<?php

namespace Usanzadunje\Playground\CoR;

class UserHasRole extends Middleware
{
    public function check(string $email, string $password)
    {
        if ($password !== 'role') {
            echo 'User does not have a role';

            return false;
        }

        echo 'Welcome <br/>';

        return parent::check($email, $password);
    }
}