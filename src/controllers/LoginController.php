<?php
namespace src\controllers;

use \core\Controller;
use src\models\Usuario;
class LoginController extends Controller {
    
  
    public function cadastro(){
        $this->render('register');
    }
    public function login(){
       $this->render('index');
    }
    public function deslogar(){
        
    }


}