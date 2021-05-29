<?php

class PacienteBean
{

public $idPaciente;
public $idPersona;
public $HC;
public $estado;

function setIdPaciente($idPaciente) { $this->idPaciente = $idPaciente; }
function getIdPaciente() { return $this->idPaciente; }
function setIdPersona($idPersona) { $this->idPersona = $idPersona; }
function getIdPersona() { return $this->idPersona; }
function setHC($HC) { $this->HC = $HC; }
function getHC() { return $this->HC; }
function setEstado($estado) { $this->estado = $estado; }
function getEstado() { return $this->estado; }


}
