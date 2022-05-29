<?php
namespace src\controllers;

use \core\Controller;
use src\models\Usuario;
use src\handlers\UsuarioHandler;
use src\handlers\PostHandler;


class ConfiguracoesController extends Controller {

    private $loggedUser;

    public function __construct(){
        $this->loggedUser  = UsuarioHandler::checkLogin();
        if($this->loggedUser === false){
            $this->redirect('/login');
        }
        
    }

    public function index() {
       

        $user = UsuarioHandler::getUsuario($this->loggedUser->getId());

        $flash = '';
        if(!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }

        $this->render('config', [
            'loggedUser' => $this->loggedUser,
            'user' => $user,
            'flash' => $flash
        ]);
    }
    public function save(){
        $avatar = $_FILES['avatar'];
        $capa = $_FILES['capa'];
        $nome =filter_input(INPUT_POST, 'nome');
        $dtNascimento = filter_input(INPUT_POST, 'dt_nascimento');
        $cidade = filter_input(INPUT_POST, 'cidade');
        $password = filter_input(INPUT_POST, 'password');
        $passwordConfirm = filter_input(INPUT_POST, 'passwordconfirm');
       
        $usuario  = UsuarioHandler::getUsuario($this->loggedUser->getId());
        
        
    }



}