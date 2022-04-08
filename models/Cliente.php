<?php

class Cliente{
    private $IdCliente;
    private $Nome;
    private $Email;
    private $Telefone;
    
    public function getIdCliente()
    {
        return $this->IdCliente;
    }
    function getNome(){
        return $this->Nome;
    } 
    function getEmail(){
        return $this->Email;
    }
    function getTelefone(){
        return $this->Telefone;
    }
    function setEmail($Email){
        $this->Email = $Email;
    }
    function setNome($Nome){
        $this->Nome = $Nome;
    }

    function setTelefone($Telefone){
        $this->Telefone = $Telefone;
    }

    public function setIdCliente($IdCliente)
    {
        $this->IdCliente = $IdCliente;

        return $this;
    }
}
