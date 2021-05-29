<?php

class PerfilBean
{
		
public $idPerfil;
public $descripcion;
public $estado;

function setIdPerfil($idPerfil) { $this->idPerfil = $idPerfil; }
function getIdPerfil() { return $this->idPerfil; }

function setDescripcion($descripcion) { $this->descripcion = $descripcion; }
function getDescripcion() { return $this->descripcion; }
function setEstado($estado) { $this->estado = $estado; }
function getEstado() { return $this->estado; }

	
}
