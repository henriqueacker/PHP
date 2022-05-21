<?php

namespace src\handlers;

use src\models\Post;

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

}
