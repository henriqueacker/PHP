<?php
namespace src\controllers;
use core\Controller;

use src\models\Usuario;

class UsuarioController extends Controller{

    public function add(){
        $this->render('add');
    }
    public function addUser(){
        $email = filter_input(INPUT_POST, 'email');
        $senha = filter_input(INPUT_POST, 'password');

        $novaSenha = md5($senha);
        if($email && $senha){
            $data = Usuario::select()->where('email', $email)->execute();
      
            if(count($data) === 0){
                Usuario::insert([
                    'email'=>$email,
                    'senha'=>$novaSenha     
                ])->execute();  
            }
        }
    }
    public function login(){
        $email = filter_input(INPUT_POST, 'email');
        $senha = filter_input(INPUT_POST, 'password');
        $senha = md5($senha);
        $dados = Usuario::select()->where('email', $email)->execute();
          echo "datos";                  
       if(count($dados) === 0){
            echo 'logado';
       }
    }
}