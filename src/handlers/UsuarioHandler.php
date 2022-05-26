<?php
namespace src\handlers;

use src\models\Usuario;
use src\models\RelacaoUsuario;

class UsuarioHandler{
    
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
    public static function verificaId($id){
        $user = Usuario::select()->where('id', $id)->one();
        return $user ? true: false;
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
    public static function getUsuario($id, $full = false){
        $data = Usuario::select()->where('id', $id)->one();

        if($data){
            $usuario = new Usuario();
            $usuario->setId($data['id']);
            $usuario->setNome($data['nome']);
            $usuario->setDtnascimento($data['dt_nascimento']);
            $usuario->setCidade($data['cidade']);
            $usuario->setAvatar($data['avatar']);
            $usuario->setCapa($data['capa']);

            if($full){
                $usuario->seguidores = [];
                $usuario->seguindo = [];

                //Pegando os seguidores
                $seguidores = RelacaoUsuario::select()->where('usuario_to', $id)->get();
                foreach($seguidores as $seguidor){
                    $usuarioData = Usuario::select()->where('id', $seguidor['usuario_from'])->one();
                    $novoUsuario = new Usuario();
                    $novoUsuario->setId($usuarioData['id']);
                    $novoUsuario->setAvatar($usuarioData['avatar']);
                    $novoUsuario->setNome($usuarioData['nome']);

                    $usuario->seguidores[] = $novoUsuario;
                }

                //pegando seguindo
                $seguindo = RelacaoUsuario::select()->where('usuario_from', $id)->get();
                foreach($seguindo as $seguidor){
                    $usuarioData = Usuario::select()->where('id', $seguidor['usuario_to'])->one();
                    $novoUsuario = new Usuario();
                    $novoUsuario->setId($usuarioData['id']);
                    $novoUsuario->setAvatar($usuarioData['avatar']);
                    $novoUsuario->setNome($usuarioData['nome']);

                    $usuario->seguindo[] = $novoUsuario;
                }
            }
            return $usuario;

        }
        return false;
    }
    public static function isFollowing($from, $to ){
       $data = RelacaoUsuario::select()
        ->where('usuario_from', $from)
        ->where('usuario_to', $to)
        ->one();

        if($data){
            return true;
        }
        return false;
    }
    public static function follow($usuario_from, $usuario_to){
        RelacaoUsuario::insert([
            'usuario_from'=> $usuario_from,
            'usuario_to'=>$usuario_to
        ])->execute();
    }
    public static function unfollow($usuario_from, $usuario_to){
        RelacaoUsuario::delete()
            ->where('usuario_from', $usuario_from)
            ->where('usuario_to', $usuario_to)
            ->execute();
    }
}

