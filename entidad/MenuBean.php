<?php

class MenuBean
{
public $idMenu;
public $idModulo;
public $descripcion;
public $estado;

public $usuario;


function setUsuario($usuario) { $this->usuario = $usuario; }
function getUsuario() { return $this->usuario; }

function setIdMenu($idMenu) { $this->idMenu = $idMenu; }
function getIdMenu() { return $this->idMenu; }
function setIdModulo($idModulo) { $this->idModulo = $idModulo; }
function getIdModulo() { return $this->idModulo; }
function setDescripcion($descripcion) { $this->descripcion = $descripcion; }
function getDescripcion() { return $this->descripcion; }
function setEstado($estado) { $this->estado = $estado; }
function getEstado() { return $this->estado; }





}
