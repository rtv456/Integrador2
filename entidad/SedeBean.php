<?php

class SedeBean
{

	public $idSede;
	public $descripcion;
	public $estado;

	function setIdSede($idSede) { $this->idSede = $idSede; }
	function getIdSede() { return $this->idSede; }
	function setDescripcion($descripcion) { $this->descripcion = $descripcion; }
	function getDescripcion() { return $this->descripcion; }
	function setEstado($estado) { $this->estado = $estado; }
	function getEstado() { return $this->estado; }

}
