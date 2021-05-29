<?php

class HorarioBean
{
public $idHorario;
public $idMedico;
public $fechaHoraInicio;
public $fechaHoraFin;
public $flgLunes;
public $flgMartes;
public $flgMiercoles;
public $flgJueves;
public $flgViernes;
public $flgSabado;
public $flgDomingo;
public $estado;
public $sede;
public $especialidad;
public $medico;

function setIdHorario($idHorario) { $this->idHorario = $idHorario; }
function getIdHorario() { return $this->idHorario; }
function setIdMedico($idMedico) { $this->idMedico = $idMedico; }
function getIdMedico() { return $this->idMedico; }
function setFechaHoraInicio($fechaHoraInicio) { $this->fechaHoraInicio = $fechaHoraInicio; }
function getFechaHoraInicio() { return $this->fechaHoraInicio; }
function setFechaHoraFin($fechaHoraFin) { $this->fechaHoraFin = $fechaHoraFin; }
function getFechaHoraFin() { return $this->fechaHoraFin; }
function setFlgLunes($flgLunes) { $this->flgLunes = $flgLunes; }
function getFlgLunes() { return $this->flgLunes; }
function setFlgMartes($flgMartes) { $this->flgMartes = $flgMartes; }
function getFlgMartes() { return $this->flgMartes; }
function setFlgMiercoles($flgMiercoles) { $this->flgMiercoles = $flgMiercoles; }
function getFlgMiercoles() { return $this->flgMiercoles; }
function setFlgJueves($flgJueves) { $this->flgJueves = $flgJueves; }
function getFlgJueves() { return $this->flgJueves; }
function setFlgViernes($flgViernes) { $this->flgViernes = $flgViernes; }
function getFlgViernes() { return $this->flgViernes; }
function setFlgSabado($flgSabado) { $this->flgSabado = $flgSabado; }
function getFlgSabado() { return $this->flgSabado; }
function setFlgDomingo($flgDomingo) { $this->flgDomingo = $flgDomingo; }
function getFlgDomingo() { return $this->flgDomingo; }
function setEstado($estado) { $this->estado = $estado; }
function getEstado() { return $this->estado; }
function setSede($sede) { $this->sede = $sede; }
function getSede() { return $this->sede; }
function setEspecialidad($especialidad) { $this->especialidad = $especialidad; }
function getEspecialidad() { return $this->especialidad; }
function setMedico($medico) { $this->medico = $medico; }
function getMedico() { return $this->medico; }



}
