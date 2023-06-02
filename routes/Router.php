<?php

namespace Router;

use App\Exceptions\NotFoundException;

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


    /**
     * @throws NotFoundException
     */
    public function run()
    {
        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if ($route->matches($this->url)) {
                return $route->execute();
            }
        }
        throw new NotFoundException("La page demandée est introuvable");
    }
}