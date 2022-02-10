<?php

use Usanzadunje\Authentication\Authentication;

if (!function_exists('auth')) {

    function auth(): Authentication
    {
        return new Authentication();
    }
}