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
                $loggedUser->setId($data['id']);
                $loggedUser->setNome($data['nome']);
                $loggedUser->setEmail($data['email']);
                $loggedUser->setSenha($data['senha']);
                $loggedUser->setDtnascimento($data['data']); 
                $loggedUser->setCidade($data['cidade']);
                $loggedUser->setAvatar($data['avatar']);
                $loggedUser->setCapa($data['capa']);
                $loggedUser->setToken($data['token']);

                return $loggedUser;
            }
        }
        return false;
    }
    public static function verificarLogin($email, $password){
        $user = Usuario::select()->where('email', $email)->one();
        if($user){
            if(password_verify($password, $user['senha'])){
                $token = md5(time().rand(0, 9999).time());
                Usuario::update()->set('token', $token)->where('email', $email)->execute();
                return true;
            }
        }
        return false;
    }
}

