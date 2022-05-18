<?php
namespace src\models;
use core\Model;

class Usuario extends Model{
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $dt_nascimento;
    private $cidade;
    private $avatar;
    private $capa;
    private $token;
    
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id =  $id;
    }
    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome =  $nome;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email =  $email;
    }
    public function getSenha(){
        return $this->senha;
    }
    public function setSenha($senha){
        $this->senha =  $senha;
    }
    public function getDtnascimento(){
        return $this->dt_nascimento;
    }
    public function setDtnascimento($dt_nascimento){
        $this->dt_nascimento =  $dt_nascimento;
    }
    public function getCidade(){
        return $this->cidade;
    }
    public function setCidade($cidade){
        $this->cidade =  $cidade;
    }
    public function getAvatar(){
        return $this->avatar;
    }
    public function setAvatar($avatar){
        $this->avatar =  $avatar;
    }
    public function getCapa(){
        return $this->capa;
    }
    public function setCapa($capa){
        $this->capa =  $capa;
    }
    public function getToken(){
        return $this->token;
    }
    public function setToken($token){
        $this->token =  $token;
    }
    




}

