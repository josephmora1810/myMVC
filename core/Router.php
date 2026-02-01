<?php

namespace Core;

use Exception;

class Router
{
    protected array $routes = [
        'GET' => [],
        'POST' => []
    ];

    public function get(string $uri, string $action){
        $this->routes['GET'][$this->cleanUri($uri)] = $action;
    }

    public function post(string $uri, string $action){
        $this->routes['POST'][$this->cleanUri($uri)] = $action;
    }

    public function resolve(){

        $method = $_SERVER['REQUEST_METHOD'];

        //Quitamos Query Strigs (?a=1)
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        
        //limpiar slashes
        $uri = $this->cleanUri($uri);

        if(!isset($this->routes[$method][$uri])){
            throw new Exception('Ruta no encontrada', 404);
        }

        return $this->routes[$method][$uri];
    }

    protected function cleanUri(string $uri): string {
        return '/' . trim($uri, '/');
    }
}