<?php

namespace Core;

use Exception;

class App
{
    public function run()
    {
        try{
            //conectar a la base de datos
            Database::connect();

            $router = new Router();

            require_once dirname(__DIR__) . '/routes/web.php';
            $action = $router->resolve();

            [$controllerName, $method] = explode('@', $action);

            $controllerClass = 'App\\Controllers\\' . $controllerName;

            if(!class_exists($controllerClass)){
                throw new Exception("El controlador {$controllerName} no existe.", 404);
            }

            $controller = new $controllerClass();

            if(!method_exists($controller, $method)){
                throw new Exception("El método {$method} no existe en el controlador {$controllerName}.", 404);
            }

            call_user_func([$controller, $method]);

        }catch(Exception $e){

            $code = $e->getCode() ?: 500;
            if ($code < 400 || $code >= 600) {$code = 500;};
            
            http_response_code($code);

            if (($_ENV['APP_ENV'] ?? 'development') !== 'production') {
                echo "<pre><b>Error:</b> {$e->getMessage()}</pre>";
                exit;
            }

            require "../app/Views/errors/{$code}.php";
            exit;
        }
    }
}
