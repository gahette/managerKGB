<?php

namespace Router;

class Router
{
    public string $url;
    public array $routes = [];

    /**
     * @param $url
     */
    public function __construct($url)
    {

        $this->url = trim($url, '/');
    }

    public function get(string $path, string $action)
    {
        $this->routes['GET'][] = new Route($path, $action);
    }

    public function run()
    {
        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if ($route->matches($this->url)) {
                $route->execute();
            }
        }
        header('HTTP/1.0 404 Not Found');
    }
}