<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');
$router->get('/novo', 'UsuarioController@add');
$router->post('/novo', 'UsuarioController@addUsuario');
$router->post('/', 'UsuarioController@login');