<?php

include_once dirname( __DIR__ ) . '../../entidad/EspecialidadBean.php';
include_once dirname( __DIR__ ) . '../../modelo/EspecialidadDao.php';



if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) )
{
	$method=$_POST['method'];
	
	$retval = [];

	if($method == 'list_especialidad'){
			
		$objespecialidaddao = new EspecialidadDao();
	    $lista = $objespecialidaddao->ListarEspecialidad();
		$retval['status'] = $lista[0];
		$retval['message'] = $lista[1];
		$retval['data'] = $lista[2];
		
		echo json_encode($retval);
		
	}
	
	if($method == 'new_especialidad'){
				
		
			$idSede = $_POST['idSede'];
			$descripcion = $_POST['descripcion'];
			$estado = $_POST['estado'];

			$objespecialidadbean = new EspecialidadBean();
			$objespecialidaddao = new EspecialidadDao();

			$objespecialidadbean->setIdSede($idSede);
			$objespecialidadbean->setDescripcion($descripcion);
			$objespecialidadbean->setEstado($estado);

			$new = $objespecialidaddao->RegistrarEspecialidad($objespecialidadbean);
			$retval['status'] = $new[0];
			$retval['message'] = $new[1];
			echo json_encode($retval);
		
		
	}
	
	if($method == 'edit_especialidad'){
		    $idEspecialidad = $_POST['idEspecialidad'];
			$descripcion = $_POST['descripcion'];
			$estado = $_POST['estado'];

			$objespecialidadbean = new EspecialidadBean();
			$objespecialidaddao = new EspecialidadDao();

			$objespecialidadbean->setIdEspecialidad($idEspecialidad);
			$objespecialidadbean->setDescripcion($descripcion);
			$objespecialidadbean->setEstado($estado);

			$new = $objespecialidaddao->ModificarEspecialidad($objespecialidadbean);
			$retval['status'] = $new[0];
			$retval['message'] = $new[1];
			echo json_encode($retval);
	}
	
	if($method == 'delete_especialidad'){
			
		    $idEspecialidad = $_POST['idEspecialidad'];

			$objespecialidadbean = new EspecialidadBean();
			$objespecialidaddao = new EspecialidadDao();

			$objespecialidadbean->setIdEspecialidad($idEspecialidad);
			
			$new = $objespecialidaddao->BorrarEspecialidad($objespecialidadbean);
			$retval['status'] = $new[0];
			$retval['message'] = $new[1];
			echo json_encode($retval);
		
	}
	

}else{
	header("HTTP/1.1 401 Unauthorized");
    exit;
}