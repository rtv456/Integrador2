<?php

class PersonaBean
{
public $idPersona;
public $documento;
public $apePaterno;
public $apeMaterno;
public $nombres;
public $fechaNacimiento;
public $sexo;
public $correo;
public $estado;
public $usuarioReg;
public $fechaReg;

function setIdPersona($idPersona) { $this->idPersona = $idPersona; }
function getIdPersona() { return $this->idPersona; }
function setDocumento($documento) { $this->documento = $documento; }
function getDocumento() { return $this->documento; }
function setApePaterno($apePaterno) { $this->apePaterno = $apePaterno; }
function getApePaterno() { return $this->apePaterno; }
function setApeMaterno($apeMaterno) { $this->apeMaterno = $apeMaterno; }
function getApeMaterno() { return $this->apeMaterno; }
function setNombres($nombres) { $this->nombres = $nombres; }
function getNombres() { return $this->nombres; }
function setFechaNacimiento($fechaNacimiento) { $this->fechaNacimiento = $fechaNacimiento; }
function getFechaNacimiento() { return $this->fechaNacimiento; }
function setSexo($sexo) { $this->sexo = $sexo; }
function getSexo() { return $this->sexo; }
function setCorreo($correo) { $this->correo = $correo; }
function getCorreo() { return $this->correo; }
function setEstado($estado) { $this->estado = $estado; }
function getEstado() { return $this->estado; }
function setUsuarioReg($usuarioReg) { $this->usuarioReg = $usuarioReg; }
function getUsuarioReg() { return $this->usuarioReg; }
function setFechaReg($fechaReg) { $this->fechaReg = $fechaReg; }
function getFechaReg() { return $this->fechaReg; }

}
