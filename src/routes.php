<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@login');
$router->get('/cadastro', 'LoginController@cadastro');
$router->get('/login', 'LoginController@login');
$router->post('/login', 'LoginController@loginAction');