<?php
namespace src\controllers;
use core\Controller;

use src\models\Usuario;

class UsuarioController extends Controller{

    public function add(){
        $this->render('add');
}
    public function addUsuario(){
        $nick = filter_input(INPUT_POST, 'nick');
        $email = filter_input(INPUT_POST, 'email');
        $senha = filter_input(INPUT_POST, 'password');

        $novaSenha = md5($senha);
        if($email && $senha){
            $data = Usuario::select()->where('email', $email)->execute();
      
            if(count($data) === 0){
                Usuario::insert([
                    'email'=>$email,
                    'senha'=>$novaSenha,
                    'nick'=>$nick  
                ])->execute();  
            }
        }
    }
    public function login(){
        $email = filter_input(INPUT_POST, 'email');
        $senha = filter_input(INPUT_POST, 'password');
        $senha = md5($senha);
        $dados = Usuario::select()
                    ->where('email', $email)
                    ->where('senha', $senha)
                    ->get();          
       if(count($dados) === 0){
            echo "<script>alert('Senha/Login invalidos')</script>";
            echo "<script>history.back() </script>";
       }else{
           $_SESSION['logado'] = true;
           $this->render('404');
       }
    }
    public function deslogar(){
        session_unset();
        session_destroy();
        $this->render('index');
    }
   
}