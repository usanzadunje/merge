<?php

namespace Usanzadunje\Playground\CoR;

class UserExists extends Middleware
{
    public function check(string $email, string $password)
    {
        if ($email !== 'exists@live.com') {
            echo 'User does nto exists';

            return false;
        }

        return parent::check($email, $password);
    }
}