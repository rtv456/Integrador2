<?php

include_once dirname( __DIR__ ) . '../entidad/HorarioBean.php';
include_once dirname( __DIR__ ) . '../modelo/HorarioDao.php';



if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) )
{
	$method=$_POST['method'];
	
	$retval = [];

	if($method == 'lista'){
			
		$objdao = new HorarioDao();
	    $lista = $objdao->ListarHorario();
		
		$retval['status'] = $lista[0];
		$retval['message'] = $lista[1];
		$retval['data'] = $lista[2];
		
		echo json_encode($retval);
		
	}
	
	if($method == 'nuevo'){
				
		
			$idMedico = $_POST['idMedico'];
			$fechaHoraInicio = $_POST['fechaHoraInicio'];
			$fechaHoraFin = $_POST['fechaHoraFin'];
			$flgLunes = $_POST['flgLunes'];
			$flgMartes = $_POST['flgMartes'];
			$flgMiercoles = $_POST['flgMiercoles'];
			$flgJueves = $_POST['flgJueves'];
			$flgViernes = $_POST['flgViernes'];
			$flgSabado = $_POST['flgSabado'];
			$flgDomingo = $_POST['flgDomingo'];

			$objbean = new HorarioBean();
			$objdao = new HorarioDao();

			$objbean->setIdMedico($idMedico);
			$objbean->setFechaHoraInicio($fechaHoraInicio);
			$objbean->setFechaHoraFin($fechaHoraFin);
			$objbean->setFlgLunes($flgLunes);
			$objbean->setFlgMartes($flgMartes);
			$objbean->setFlgMiercoles($flgMiercoles);
			$objbean->setFlgJueves($flgJueves);
			$objbean->setFlgViernes($flgViernes);
			$objbean->setFlgSabado($flgSabado);
			$objbean->setFlgDomingo($flgDomingo);


			$new = $objdao->RegistrarHorario($objbean);
			$retval['status'] = $new[0];
			$retval['message'] = $new[1];
			echo json_encode($retval);
		
		
	}
	
	if($method == 'editar'){
		    $idHorario = $_POST['idHorario'];
			
			$flgLunes = $_POST['flgLunes'];
			$flgMartes = $_POST['flgMartes'];
			$flgMiercoles = $_POST['flgMiercoles'];
			$flgJueves = $_POST['flgJueves'];
			$flgViernes = $_POST['flgViernes'];
			$flgSabado = $_POST['flgSabado'];
			$flgDomingo = $_POST['flgDomingo'];

			$objbean = new HorarioBean();
			$objdao = new HorarioDao();

			$objbean->setIdHorario($idHorario);
			
			$objbean->setFlgLunes($flgLunes);
			$objbean->setFlgMartes($flgMartes);
			$objbean->setFlgMiercoles($flgMiercoles);
			$objbean->setFlgJueves($flgJueves);
			$objbean->setFlgViernes($flgViernes);
			$objbean->setFlgSabado($flgSabado);
			$objbean->setFlgDomingo($flgDomingo);
			

			$new = $objdao->ModificarHorario($objbean);
			$retval['status'] = $new[0];
			$retval['message'] = $new[1];
			echo json_encode($retval);
	}
	
	if($method == 'borrar'){
			
		    $idHorario = $_POST['idHorario'];

			$objbean = new HorarioBean();
			$objdao = new HorarioDao();

			$objbean->setIdHorario($idHorario);
			
			$new = $objdao->BorrarHorario($objbean);
			$retval['status'] = $new[0];
			$retval['message'] = $new[1];
			echo json_encode($retval);
		
	}
	

}else{
	header("HTTP/1.1 401 Unauthorized");
    exit;
}

