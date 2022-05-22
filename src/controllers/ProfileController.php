<?php
namespace src\controllers;

use \core\Controller;
use src\models\Usuario;
use src\handlers\UsuarioHandler;
use src\handlers\PostHandler;


class ProfileController extends Controller {

    private $loggedUser;

    public function __construct(){
        $this->loggedUser  = UsuarioHandler::checkLogin();
        if($this->loggedUser === false){
            $this->redirect('/login');
        }
        
    }

    public function index($atributos = []) {
        $id = $this->loggedUser->getId();

        if(!empty($atributos['id'])){
            $id = $atributos['id'];
        }

        $usuario = UsuarioHandler::getUsuario($id, true);

        if(!$usuario){
            $this->redirect("/");
        }

        $this->render('profile',[
            'loggedUser'=>$this->loggedUser,
            'usuario'=>$usuario
        ]);
    }



}