<?php

namespace Usanzadunje\Core\Http;

use Usanzadunje\Core\Extendable\Singleton;
use Usanzadunje\Core\Route;

class Request extends Singleton
{
    private ?string $path;
    private ?string $query;
    private ?string $method;

    protected function __construct()
    {
        $this->path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $this->query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

    public function route()
    {
        return Route::getInstance();
    }

    public function all()
    {
        return $_POST;
    }

    public function method()
    {
        return $this->method;
    }

    public function redirect(string $path, $statusCode = 303): void
    {
        $appUrl = getenv('APP_URL');

        header("Location: $appUrl$path", true, $statusCode);
    }
}