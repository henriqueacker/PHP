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
                $loggedUser->setEmail($data['email']);
                $loggedUser->setSenha($data['senha']);
                $loggedUser->setNome($data['nome']);
                $loggedUser->setDtnascimento($data['dt_nascimento']); 
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
                return $token;
            }
        }
        return false;
    }
    public static function verificaEmail($email){
        $user = Usuario::select()->where('email', $email)->one();
        return $user ? true: false;
    }
    public static function adicionarUsuario($nome, $email, $password){
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $token = md5(time().rand(0, 9999).time());
        Usuario::insert([
            'email'=> $email,
            'senha'=>$hash,
            'nome'=>$nome,
            'token'=>$token

        ])->execute();

        return $token;
    }
}

