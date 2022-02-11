<?php

namespace Usanzadunje\Core;

class Router
{
    private ?string $path;
    private ?string $query;

    public function __construct()
    {
        $this->path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $this->query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
    }

    public function route()
    {
        $regx = preg_replace('(\d+)', '([^\/]+)', $this->path);


        $routes = require base_path('src/routes/web.php');
        $routes = array_keys($routes);

        foreach ($routes as $route) {
            $hit = preg_match("\/posts\/{id}", $route, $matches);
            echo "$route | ";
            echo "$regx \n";

            if($hit){
                dd('we got a hit');
            }
        }

        echo "\n";
        dd("-------------------------");
        call_user_func($routes[$this->path]);
    }
}