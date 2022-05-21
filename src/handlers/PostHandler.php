<?php

namespace src\handlers;

use src\models\Post;
use src\models\Usuario;
use src\models\RelacaoUsuario;
class PostHandler{

    public static function adicionardPost($idUser, $type, $body){
            if(!empty($idUser)){

                Post::insert([
                    'id_usuario'=>$idUser,
                    'tipo'=>$type,
                    'dt_criacao'=>date('Y-m-d H:i:s'),
                    'corpo'=>$body
                ])->execute();

            }
    }
    public static function getHomeFeed($idUser){
        $userList = RelacaoUsuario::select()->where('usuario_from', $idUser)->get();
        $users = [];
        foreach($userList as $userItem){
            $users[] = $userItem['usuario_to']; 
        }
        $users[] = $idUser;
      
        $postList = Post::select()->where('id_usuario', 'in', $users)->orderBy('dt_criacao','desc')->get();
        
        $posts = [];

        foreach($postList as $postItem){
            $newPost = new Post();
            $newPost->setId($postItem['id']);
            $newPost->setTipo($postItem['tipo']);
            $newPost->setDt_criacao($postItem['dt_criacao']);
            $newPost->setCorpo($postItem['corpo']);

            //Preencher as informações do Usuarios
            $newUser = Usuario::select()->where('id', $postItem['id_usuario'])->one();

            $newPost->user = new Usuario();
            $newPost->user->setId($newUser['id']);
            $newPost->user->setNome($newUser['nome']); 
            $newPost->user->setAvatar($newUser['avatar']); 

            $posts[]= $newPost;
        }
        return $posts;

    }

}
