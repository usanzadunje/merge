<?php

namespace Usanzadunje\Exceptions;

class NotFoundException
{
    /**
     * Generates 404(Not Found) Exception response
     *
     * @return void
     */
    public static function handle()
    {
        header('HTTP/1.1 404 Not Found');

        require resource_path('views/errors/404.php');
    }
}