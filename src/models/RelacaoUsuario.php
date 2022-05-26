<?php

namespace src\models;

use core\Model;

class RelacaoUsuario extends Model{
    private $id;
    private $usuario_from;
    private $usuario_to;

    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getUsuario_from(){
		return $this->usuario_from;
	}

	public function setUsuario_from($usuario_from){
		$this->usuario_from = $usuario_from;
	}

	public function getUsuario_to(){
		return $this->usuario_to;
	}

	public function setUsuario_to($usuario_to){
		$this->usuario_to = $usuario_to;
	}
}