<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');


$router->get('/login', 'LoginController@login');
$router->post('/login', 'LoginController@loginAction');

$router->get('/cadastro', 'LoginController@cadastro');
$router->post('/cadastro', 'LoginController@cadastroAction');

//$router->get('/pesquisa');
// $router->get('/perfil');
// $router->get('/sair');