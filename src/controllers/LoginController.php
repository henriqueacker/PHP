<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\LoginHandler;
class LoginController extends Controller {
    
  
    public function cadastro(){
        $this->render('register');
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

        $token = LoginHandler::verificarLogin($email, $password);
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
    public function deslogar(){
        
    }


}