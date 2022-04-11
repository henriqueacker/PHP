<?php

use core\Model;

class Usuario extends Model{
    private $Email;
    private $Senha;
    private $IdUsuario;

   function getEmail(){
       return $this->Email;
   }
   function getSenha(){
       return $this->Senha;
   }
   function getIdUsuario(){
       return $this->IdUsuario;
   }
   function setEmail($Email){
       $this->Email = $Email;
   }
   function setSenha($Senha){
    $this->Senha = $Senha;
   }
   function setIdUsuario($IdUsuario){
    $this->IdUsuario = $IdUsuario;
    }
}

