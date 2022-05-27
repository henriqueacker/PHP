<?php
namespace src\controllers;

use \core\Controller;
use src\models\Usuario;
use src\handlers\UsuarioHandler;
use src\handlers\PostHandler;


class ProfileController extends Controller {

    private $loggedUser;

    public function __construct(){
        $this->loggedUser  = UsuarioHandler::checkLogin();
        if($this->loggedUser === false){
            $this->redirect('/login');
        }
        
    }

    public function index($atributos = []) {
        $id = $this->loggedUser->getId();
        $page = intval(filter_input(INPUT_GET, 'page'));

        if(!empty($atributos['id'])){
            $id = $atributos['id'];
        }

        $usuario = UsuarioHandler::getUsuario($id, true);

        if(!$usuario){
            $this->redirect("/");
        }
        $feed = PostHandler::getUserFeed($id, $page, $this->loggedUser->getId());

        $isFollowing = false;
        if($usuario->getId() != $this->loggedUser->getId()){
            $isFollowing = UsuarioHandler::isFollowing($this->loggedUser->getId(),$usuario->getId() );
        }



        $this->render('profile',[
            'loggedUser'=>$this->loggedUser,
            'usuario'=>$usuario,
            'feed'=>$feed, 
            'isFollowing'=>$isFollowing
        ]);
    }
    public  function follow($atributos){
        $usuario_to =  intval($atributos['id']);

        $exists = UsuarioHandler::verificaId($usuario_to);
        
        if($exists){
            if(UsuarioHandler::isFollowing($this->loggedUser->getId(), $usuario_to)){
                UsuarioHandler::unfollow($this->loggedUser->getId(), $usuario_to);
            }else{
                UsuarioHandler::follow($this->loggedUser->getId(), $usuario_to);
            }
        }
            $this->redirect('/perfil/'.$usuario_to);
    }
    public function friends($atributos =[]){
        $id = $this->loggedUser->getId();
       

        if(!empty($atributos['id'])){
            $id = $atributos['id'];
        }
        $usuario = UsuarioHandler::getUsuario($id, true);
        if(!$usuario){
            $this->redirect("/");
        }
        
        $isFollowing = false;
        if($usuario->getId() != $this->loggedUser->getId()){
            $isFollowing = UsuarioHandler::isFollowing($this->loggedUser->getId(),$usuario->getId() );
        }

        
        $this->render('profile_friends',[
            'loggedUser'=>$this->loggedUser,
            'usuario'=>$usuario,
            'isFollowing'=>$isFollowing
        ]);
    }



}