<?php
namespace src\controllers;

use \core\Controller;
use src\models\Usuario;
use src\handlers\UsuarioHandler;
use src\handlers\PostHandler;


class HomeController extends Controller {

    private $loggedUser;

    public function __construct(){
        $this->loggedUser  = UsuarioHandler::checkLogin();
        if($this->loggedUser === false){
            $this->redirect('/login');
        }
        
    }

    public function index() {
        $page = intval(filter_input(INPUT_GET, 'page'));


        $feed = PostHandler::getHomeFeed(
            $this->loggedUser->getId(),
            $page
        );

        $this->render('home',[
            'loggedUser'=>$this->loggedUser,
            'feed'=>$feed
        ]);
    }



}