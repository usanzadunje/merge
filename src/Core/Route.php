<?php

namespace Usanzadunje\Core;

use Usanzadunje\Core\Extendable\Singleton;

class Route extends Singleton
{
    private ?string $path;
    private ?array $query = null;
    private array $params = [];
    private ?string $routeSignature = null;
    private array $allRoutes;

    protected function __construct()
    {
        $this->allRoutes = require base_path('routes/web.php');
        $this->path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $this->getRouteQuery();
        $this->getRouteParams();
    }

    /**
     * Extracts route parameters. And returns them as integers.
     * It only extracts number. FOR NOW
     *
     * @return int[]|null
     */
    private function getRouteParamValues(): ?array
    {
        preg_match_all('(\d+)', $this->path, $routeParams);

        if (empty($routeParams[0])) {
            return null;
        }

        return array_map(fn($el) => (int)$el, $routeParams[0]);
    }

    private function getRouteParamNames(): ?array
    {
        $routeParamNames = null;

        // Changing every integer parameter to regex expression which presents
        // any character as long as it is not forward slash
        $regex = preg_replace('(\d+)', '([^\/]+)', $this->path);

        $regex = "!^" . str_replace('/', '\/', $regex) . "$!";

        // Getting only route paths
        $routePaths = array_keys($this->allRoutes);

        // Compare each path with given expression and save callable for that specific route path when
        // match occurs. Exit on first match.
        foreach ($routePaths as $path) {
            $hit = preg_match($regex, $path, $matches);

            if ($hit) {
                $this->routeSignature = $path;
                $userRouteParams = array_slice($matches, 1);

                foreach ($userRouteParams as $param) {
                    $routeParamNames[] = str_replace('}', '', str_replace('{', '', $param));
                }

                break;
            }
        }


        return $routeParamNames;
    }

    private function getRouteParams(): void
    {
        $routeParamNames = $this->getRouteParamNames();
        $routeParamValues = $this->getRouteParamValues();

        if (
            is_null($routeParamNames) || is_null($routeParamValues) ||
            count($routeParamNames) !== count($routeParamValues)
        ) {
            return;
        }

        foreach ($routeParamNames as $key => $value) {
            $this->params[$value] = $routeParamValues[$key];
        }
    }

    private function getRouteQuery()
    {
        $fullQuery = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);

        $queryParts = explode('&', $fullQuery);

        foreach ($queryParts as $part) {
            $singleQuery = explode('=', $part);
            $queryKey = $singleQuery[0];
            $queryValue = $singleQuery[1];

            $this->query[$queryKey] = $queryValue;
        }
    }

    public function path(): string
    {
        return $this->path;
    }

    public function query(string $key): ?string
    {
        return $this->query ? $this->query[$key] : null;
    }

    public function param(string $key): mixed
    {
        return $this->params ? $this->params[$key] : null;
    }

    public function params(): array
    {
        return $this->params ? array_values($this->params) : [];
    }

    public function routeSignature(): ?string
    {
        return $this->routeSignature;
    }

    public function action(): ?array
    {
        return $this->routeSignature ? $this->allRoutes[$this->routeSignature] : null;
    }

}