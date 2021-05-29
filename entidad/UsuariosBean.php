<?php

class UsuariosBean
{
public $idUsuario;
public $idPersona;
public $idPerfil;
public $usuario;
public $contrasena;
public $estado;

function setIdUsuario($idUsuario) { $this->idUsuario = $idUsuario; }
function getIdUsuario() { return $this->idUsuario; }
function setIdPersona($idPersona) { $this->idPersona = $idPersona; }
function getIdPersona() { return $this->idPersona; }
function setIdPerfil($idPerfil) { $this->idPerfil = $idPerfil; }
function getIdPerfil() { return $this->idPerfil; }
function setUsuario($usuario) { $this->usuario = $usuario; }
function getUsuario() { return $this->usuario; }
function setContrasena($contrasena) { $this->contrasena = $contrasena; }
function getContrasena() { return $this->contrasena; }
function setEstado($estado) { $this->estado = $estado; }
function getEstado() { return $this->estado; }

}
