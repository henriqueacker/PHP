<?php
namespace src\models;
use core\Model;

class Agenda extends Model{
    private $Data;
    private $Hora;
    private $Cliente;
    private $Telefone;
    private $IdCliente;
    public function getData()
    {
        return $this->Data;
    }

    public function getHora()
    {
        return $this->Hora;
    }

    public function getCliente()
    {
        return $this->Cliente;
    }
   
    public function getTelefone()
    {
        return $this->Telefone;
    } 
    public function getIdCliente()
    {
        return $this->IdCliente;
    }
    
    public function setData($Data)
    {
        $this->Data = $Data;

        return $this;
    }
}