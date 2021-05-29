<?php

class MedicoBean
{
public $idMedico;
public $idEspecialidad;
public $idPersona;
public $CMP;
public $minutosAtencion;
public $estado;

function setIdMedico($idMedico) { $this->idMedico = $idMedico; }
function getIdMedico() { return $this->idMedico; }
function setIdEspecialidad($idEspecialidad) { $this->idEspecialidad = $idEspecialidad; }
function getIdEspecialidad() { return $this->idEspecialidad; }
function setIdPersona($idPersona) { $this->idPersona = $idPersona; }
function getIdPersona() { return $this->idPersona; }
function setCMP($CMP) { $this->CMP = $CMP; }
function getCMP() { return $this->CMP; }
function setMinutosAtencion($minutosAtencion) { $this->minutosAtencion = $minutosAtencion; }
function getMinutosAtencion() { return $this->minutosAtencion; }
function setEstado($estado) { $this->estado = $estado; }
function getEstado() { return $this->estado; }
}
