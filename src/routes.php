<?php
use core\Router;
use src\controllers\LoginController;
use src\controllers\ProfileController;

$router = new Router();

$router->get('/', 'HomeController@index');


$router->get('/login', 'LoginController@login');
$router->post('/login', 'LoginController@loginAction');
$router->get('/sair', 'LoginController@logout');

$router->get('/cadastro', 'LoginController@cadastro');
$router->post('/cadastro', 'LoginController@cadastroAction');


$router->get('/perfil/{id}/follow', 'ProfileController@follow');
$router->get('/perfil/{id}', 'ProfileController@index');
$router->get('/perfil', 'ProfileController@index');

//$router->get('/pesquisa');

//$router->get('/configuracoes');

$router->post('/post/new', 'PostController@new');
