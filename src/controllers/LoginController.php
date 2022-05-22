<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\UsuarioHandler;
class LoginController extends Controller {
    


    public function cadastro(){
        $message = " ";
        if(!empty($_SESSION['message'])){
            $message =$_SESSION['message'];
            $_SESSION['message'] = " ";
        }
        $this->render('/register',[
            'message'=>$message
        ]);
    }
  
    public function cadastroAction(){
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');
        $nome = filter_input(INPUT_POST, 'nome');
        
        if($email && $password && $nome){

            if(UsuarioHandler::verificaEmail($email)=== false){
                $token = UsuarioHandler::adicionarUsuario($nome, $email, $password);
                $_SESSION['token'] = $token;
                $this->redirect('/login');
            }else{
                $_SESSION['message'] = "E-mail já cadastrado";
                $this->redirect('/cadastro');
            }
        }else{
            $this->redirect('/cadastro');
        }
    }


    public function login(){
        $message = " ";
        if(!empty($_SESSION['message'])){
            $message =$_SESSION['message'];
            $_SESSION['message'] = " ";
        }
        $this->render('/login',[
            'message'=>$message
        ]);
     }
     
    public function loginAction(){
       $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
       $password = filter_input(INPUT_POST, 'password');

       if($email && $password){

        $token = UsuarioHandler::verificarLogin($email, $password);
        if($token){
            $_SESSION['token'] = $token;
            $this->redirect('/');
        }else{
            $_SESSION['message'] = "Usuário/Senha inválidos";
            $this->redirect('/login');
        }
       }else{
           $_SESSION['message'] = "Digite os campos email e/ou senha.";
           $this->redirect('/login');
       }
    }
    public function logout(){
        $_SESSION['token'] = '';
        $this->redirect('/login');
    }


}