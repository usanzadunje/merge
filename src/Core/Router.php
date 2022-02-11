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
        $routeAction = null;
        $actionParams = null;

        // Getting all integer parameters(which will be give to controller action)
        preg_match_all('(\d+)', $this->path, $actionParams);

        // Changing every integer parameter to regex expression which presents
        // any character as long as it is not forward slash
        $regx = preg_replace('(\d+)', '([^\/]+)', $this->path);
        $regx = "!^" . str_replace('/', '\/', $regx) . "$!";

        $routes = require base_path('src/routes/web.php');

        // Getting route paths
        $routePaths = array_keys($routes);

        // Compare each path with given expression and save callable for that specific route path when
        // match occurs. Exit on first match.
        foreach ($routePaths as $path) {
            $hit = preg_match($regx, $path, $matches);

            if ($hit) {
                $routeAction = $routes[$path];
                break;
            }
        }

        // If we did not find any routes that match expression simply throw 404.
        if (!$routeAction) {
            header('HTTP/1.1 404 Not Found');
            require resource_path('views/errors/404.php');
        }

        // Call controller action and provide parameters to it.
        // Parameters are always strings. FOR NOW
        call_user_func($routeAction, ...$actionParams[0]);
    }
}