<?php

namespace Usanzadunje\Exceptions\Commands;

class ParameterMissingException
{
    public static function handle(string $parameter)
    {
        echo "Parameter '$parameter' is not set. \n";
    }
}