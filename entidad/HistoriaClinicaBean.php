<?php

class HistoriaClinicaBean
{
public $idHistoria;
public $idDiagnostico;
public $idCita;
public $fechaAtencion;
public $edad;
public $relato;
public $indicaciones;
public $estado;

function setIdHistoria($idHistoria) { $this->idHistoria = $idHistoria; }
function getIdHistoria() { return $this->idHistoria; }
function setIdDiagnostico($idDiagnostico) { $this->idDiagnostico = $idDiagnostico; }
function getIdDiagnostico() { return $this->idDiagnostico; }
function setIdCita($idCita) { $this->idCita = $idCita; }
function getIdCita() { return $this->idCita; }
function setFechaAtencion($fechaAtencion) { $this->fechaAtencion = $fechaAtencion; }
function getFechaAtencion() { return $this->fechaAtencion; }
function setEdad($edad) { $this->edad = $edad; }
function getEdad() { return $this->edad; }
function setRelato($relato) { $this->relato = $relato; }
function getRelato() { return $this->relato; }
function setIndicaciones($indicaciones) { $this->indicaciones = $indicaciones; }
function getIndicaciones() { return $this->indicaciones; }
function setEstado($estado) { $this->estado = $estado; }
function getEstado() { return $this->estado; }

}
?>