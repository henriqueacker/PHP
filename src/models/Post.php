<?php
namespace src\models;
use core\Model;

class Post extends Model{
    private $id;
    private $id_usuario;
    private $tipo;
    private $dt_criacao;
    private $corpo;
    
    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getId_usuario(){
		return $this->id_usuario;
	}

	public function setId_usuario($id_usuario){
		$this->id_usuario = $id_usuario;
	}

	public function getTipo(){
		return $this->tipo;
	}

	public function setTipo($tipo){
		$this->tipo = $tipo;
	}

	public function getDt_criacao(){
		return $this->dt_criacao;
	}

	public function setDt_criacao($dt_criacao){
		$this->dt_criacao = $dt_criacao;
	}

	public function getCorpo(){
		return $this->corpo;
	}

	public function setCorpo($corpo){
		$this->corpo = $corpo;
	}
}