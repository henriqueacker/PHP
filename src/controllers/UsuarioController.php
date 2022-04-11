<?php
namespace src\controllers;
use core\Controller;

class UsuarioController extends Controller{

    public function add(){
        $this->render('add');
    }

}