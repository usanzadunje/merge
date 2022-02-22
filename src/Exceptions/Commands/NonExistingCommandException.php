<?php

namespace Usanzadunje\Exceptions\Commands;

class NonExistingCommandException
{
    public static function handle()
    {
        echo "Unknown command \n";
    }
}