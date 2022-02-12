<?php

namespace Usanzadunje\Exceptions;

class NotFoundException
{
    public static function handle()
    {
        header('HTTP/1.1 404 Not Found');

        require resource_path('views/errors/404.php');
    }
}