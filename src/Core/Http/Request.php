<?php

namespace Usanzadunje\Core\Http;

use Usanzadunje\Core\Extendable\Singleton;
use Usanzadunje\Core\Route;

class Request extends Singleton
{
    private ?string $path;
    private ?string $query;

    protected function __construct()
    {
        $this->path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $this->query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
    }

    public function route()
    {
        return Route::getInstance();
    }
}