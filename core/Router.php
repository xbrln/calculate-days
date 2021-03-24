<?php

declare(strict_types=1);

final class Router
{
    protected $routes = [
        'GET' => [],
        'POST' => [],
    ];

    public static function load($routesFile)
    {
        $router = new static;
        require $routesFile;
        return $router;
    }

    public function get(string $uri, string $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post(string $uri, string $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    public function direct($uri, $requestType)
    {
        if (!array_key_exists($uri, $this->routes[$requestType])) {
            throw new Exception("No route found for {$uri}");
        }
        return $this->callAction(...explode('@', $this->routes[$requestType][$uri]));
    }

    protected function callAction(string $controller, string $method)
    {
        $controllerObject = new $controller;
        if (!method_exists($controllerObject, $method)) {
            throw new Exception("Method {$method} does not exist in {$controller}");
        }
        return $controllerObject->$method();
    }
}
