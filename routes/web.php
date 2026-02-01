<?php

/** @var \Core\Router $router */

use App\Controllers\UsersController;

$router->get('/', 'HomeController@index');

$router->get('/login', 'AuthController@login');
$router->post('/login', 'AuthController@authenticate');

$router->get('/register', 'AuthController@register');
$router->post('/register', 'AuthController@store');

$router->get('users/show', 'UsersController@show');