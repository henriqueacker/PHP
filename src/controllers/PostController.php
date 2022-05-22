<?php
namespace src\controllers;

use \core\Controller;
use src\models\Usuario;
use src\handlers\UsuarioHandler;
use src\handlers\PostHandler;

class PostController extends Controller {

    private $loggedUser;

    public function __construct(){
        $this->loggedUser  = UsuarioHandler::checkLogin();
        if($this->loggedUser === false){
            $this->redirect('/login');
        }
        
    }

   public function new(){
       $body = filter_input(INPUT_POST, 'body');

       if($body){
           PostHandler::adicionardPost(
               $this->loggedUser->getId(),
               'text',
                $body
            );
       }
       $this->redirect("/");
   }


}