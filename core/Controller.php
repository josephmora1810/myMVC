<?php

namespace Core;
use Core\View;

class Controller
{
    public function __construct()
    {
        Middleware::ensureSession();
    }
    
    protected function view(string $view, array $data = [], string $layout = 'layouts/app')
    {
        View::render($view, $data, $layout);
    }


    protected function error($code = 404){
        http_response_code($code);

        $path = "../app/Views/errors/{$code}.php";

        if(!file_exists($path)){
            echo "error {$code}";
            exit;
        }

        require $path;

        exit;
    }
}