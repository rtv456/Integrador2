<?php

class ExamenesHistoriaClinicaBean
{
public $idExamenes;
public $idHistoria;
public $estado;

function setIdExamenes($idExamenes) { $this->idExamenes = $idExamenes; }
function getIdExamenes() { return $this->idExamenes; }
function setIdHistoria($idHistoria) { $this->idHistoria = $idHistoria; }
function getIdHistoria() { return $this->idHistoria; }
function setEstado($estado) { $this->estado = $estado; }
function getEstado() { return $this->estado; }

}

?>