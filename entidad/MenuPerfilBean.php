<?php

class MenuPerfilBean
{
public $idPerfil;
public $idMenu;
public $estado;

function setIdPerfil($idPerfil) { $this->idPerfil = $idPerfil; }
function getIdPerfil() { return $this->idPerfil; }
function setIdMenu($idMenu) { $this->idMenu = $idMenu; }
function getIdMenu() { return $this->idMenu; }
function setEstado($estado) { $this->estado = $estado; }
function getEstado() { return $this->estado; }

}
