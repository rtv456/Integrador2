<?php

class CitasBean
{
public $idCita;
public $idHorario;
public $idMedico;
public $idPaciente;
public $fechaHoraCita;
public $estado;
public $usuarioReg;
public $fechaReg;

function setIdCita($idCita) { $this->idCita = $idCita; }
function getIdCita() { return $this->idCita; }
function setIdHorario($idHorario) { $this->idHorario = $idHorario; }
function getIdHorario() { return $this->idHorario; }
function setIdMedico($idMedico) { $this->idMedico = $idMedico; }
function getIdMedico() { return $this->idMedico; }
function setIdPaciente($idPaciente) { $this->idPaciente = $idPaciente; }
function getIdPaciente() { return $this->idPaciente; }
function setFechaHoraCita($fechaHoraCita) { $this->fechaHoraCita = $fechaHoraCita; }
function getFechaHoraCita() { return $this->fechaHoraCita; }
function setEstado($estado) { $this->estado = $estado; }
function getEstado() { return $this->estado; }
function setUsuarioReg($usuarioReg) { $this->usuarioReg = $usuarioReg; }
function getUsuarioReg() { return $this->usuarioReg; }
function setFechaReg($fechaReg) { $this->fechaReg = $fechaReg; }
function getFechaReg() { return $this->fechaReg; }
}
