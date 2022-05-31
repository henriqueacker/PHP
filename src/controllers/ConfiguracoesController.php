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

        $message = '';
        if(!empty($_SESSION['message'])) {
            $message = $_SESSION['message'];
            $_SESSION['message'] = '';
        }

        $this->render('config', [
            'loggedUser' => $this->loggedUser,
            'user' => $user,
            'message' => $message
        ]);
    }
    public function save(){
        $avatar = $_FILES['avatar']['name'];
        $capa = $_FILES['capa']['name'];
        $nome =filter_input(INPUT_POST, 'nome');
        $dtNascimento = filter_input(INPUT_POST, 'dt_nascimento');
        $cidade = filter_input(INPUT_POST, 'cidade');
        $password = filter_input(INPUT_POST, 'password');
        $passwordConfirm = filter_input(INPUT_POST, 'passwordconfirm');
        
        //Valida o nome
        if(empty($nome)){
            $_SESSION['message'] = 'Nome deve ser preenchido';
            $this->redirect('/configuracoes');
        }

        //Validando as datas
        $dtNascimento = explode('/', $dtNascimento);
        if(count($dtNascimento) != 3) {
            $_SESSION['message'] = 'Data de nascimento inválida!';
            $this->redirect('/configuracoes');
        }
        $birthdate = $dtNascimento[2].'-'.$dtNascimento[1].'-'.$dtNascimento[0];
        if(strtotime($birthdate) === false) {
            $_SESSION['message'] = 'Data de nascimento inválida!';
            $this->redirect('/configuracoes');
        }

        if($password != $passwordConfirm){
            $_SESSION['message'] = 'As senhas não conferem';
            $this->redirect('/configuracoes');
        }

        $usuario  = new Usuario();
        $usuario->setId($this->loggedUser->getId());
        $usuario->setNome($nome);
        $usuario->setAvatar($avatar);
        $usuario->setCapa($capa);
        $usuario->setDtnascimento($birthdate);
        $usuario->setCidade($cidade);
        $usuario->setSenha($password);

        $update = UsuarioHandler::UpdateDados($usuario);

        if($update){
            echo "<script>alert('Dados Salvo com sucesso!')</script>";
            // $this->redirect('/configuracoes');
        }
        $this->redirect('/configuracoes');
        
    }



}