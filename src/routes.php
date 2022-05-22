<?php
use core\Router;
use src\controllers\LoginController;

$router = new Router();

$router->get('/', 'HomeController@index');


$router->get('/login', 'LoginController@login');
$router->post('/login', 'LoginController@loginAction');
$router->get('/sair', 'LoginController@logout');

$router->get('/cadastro', 'LoginController@cadastro');
$router->post('/cadastro', 'LoginController@cadastroAction');

$router->get('/perfil/{id}', 'ProfileController@index');
$router->get('/perfil', 'ProfileController@index');

//$router->get('/pesquisa');

//$router->get('/configuracoes');
//$router->get('/follow');
$router->post('/post/new', 'PostController@new');
