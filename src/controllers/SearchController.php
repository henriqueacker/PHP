<?php
namespace src\controllers;
use src\handlers\UsuarioHandler;
use \core\Controller;
use src\handlers\PostHandler;

class SearchController extends Controller {

    public function __construct(){
        $this->loggedUser  = UsuarioHandler::checkLogin();
        if($this->loggedUser === false){
            $this->redirect('/login');
        }
        
    }
    public function index($atributos = []){
        $search = filter_input(INPUT_GET, 'search');

        if(empty($search)){
            $this->render("home");
        }
     
        $usuarios = UsuarioHandler::searchUsuario($search);
        $posts = PostHandler::searchPost($search);
        $this->render('search',[
            'loggedUser'=>$this->loggedUser,
            'search'=> $search,
            'usuarios'=>$usuarios,
            'posts'=>$posts
         
        ]);
    }
}