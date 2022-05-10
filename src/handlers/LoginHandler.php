<?php
namespace src\handlers;

use src\models\Usuario;

class LoginHandler{
    
    public static function checkLogin(){
        if(!empty($_SESSION['token'])){

            $token = $_SESSION['token'];

            $data = Usuario::select()->where('token', $token)->one();

            if(count($data)>0){
                $loggedUser = new Usuario();
                $loggedUser->Id = $data['id'];
                $loggedUser->email= $data['email'];
                $loggedUser->nome = $data['nome'];

                return $loggedUser;
            }
        }
        return false;
    }
}

