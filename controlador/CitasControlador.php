<?php

include_once dirname( __DIR__ ) . '../entidad/CitasBean.php';
include_once dirname( __DIR__ ) . '../modelo/CitasDao.php';
include_once dirname( __DIR__ ) . '../util/EnviaMail.php';

include_once dirname( __DIR__ ) . '../entidad/HistoriaClinicaBean.php';
include_once dirname( __DIR__ ) . '../modelo/HistoriaClinicaDao.php';


if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) )
{
	$method=$_POST['method'];
	
	$retval = [];

	if($method == 'list_horario'){
			
		$fecha = $_POST['fecha'];
		$idMedico = $_POST['idMedico'];
		
		$objcitasbean = new CitasBean();
		
		$objcitasbean->setFechaHoraCita($fecha);
		$objcitasbean->setIdMedico($idMedico);
			
		$objcitasdao = new CitasDao();
	    $lista = $objcitasdao->BuscarCita($objcitasbean);
		$retval['status'] = $lista[0];
		$retval['message'] = $lista[1];
		$retval['data'] = $lista[2];
				
		echo json_encode($retval);
		
	}
	
	
	
	if($method == 'mis_citas_todo'){
			
		$idPerfil = $_POST['idPerfil'];
	    $idPersona = $_POST['idPersona'];
		
		
		$objcitasbean = new CitasBean();
		
		$objcitasbean->setIdHorario($idPerfil);
		$objcitasbean->setIdMedico($idPersona);
		
			
		$objcitasdao = new CitasDao();
	    $lista = $objcitasdao->ListarMisCitasTodo($objcitasbean);
		$retval['status'] = $lista[0];
		$retval['message'] = $lista[1];
		$retval['data'] = $lista[2];
				
		echo json_encode($retval);
		
	}
	
	
	if($method == 'mis_citas'){
			
		$idPerfil = $_POST['idPerfil'];
	    $idPersona = $_POST['idPersona'];
		$fecha = $_POST['fecha'];
		
		
		$objcitasbean = new CitasBean();
		
		$objcitasbean->setIdHorario($idPerfil);
		$objcitasbean->setIdMedico($idPersona);
		$objcitasbean->setFechaHoraCita($fecha);
		
			
		$objcitasdao = new CitasDao();
	    $lista = $objcitasdao->ListarMisCitas($objcitasbean);
		$retval['status'] = $lista[0];
		$retval['message'] = $lista[1];
		$retval['data'] = $lista[2];
				
		echo json_encode($retval);
		
	}
	
	
	
	if($method == 'agendar_cita'){
		
				$validaCantidad = $_POST['idPaciente'];
				$fecha = $_POST['fechaHoraCita'];
				
				
				$objbean = new CitasBean();
				$objdao = new CitasDao();
						
				$objbean->setIdPaciente($validaCantidad);
				$objbean->setFechaHoraCita($fecha);
					
		
					
				$lista = $objdao->ValidarCantidadCita($objbean);
				
				$retval['data'] = $lista[2];
				
				$data = $lista[2];
				
					$cantidad ="";
				
					foreach ($data as $val) {
						
							$cantidad = $val['cantidad'];
					}
					
					
					if ($cantidad > 3)
					{
						$retval['status'] = false;
						$retval['message'] = "No se puede generar mas de 4 citas por mes";
						$retval['data'] = [0];
				
					}else
					{
		
					$idHorario = $_POST['idHorario'];
					$idMedico = $_POST['idMedico'];
					$idPaciente = $_POST['idPaciente'];
					$fechaHoraCita = $_POST['fechaHoraCita'];
					$usuarioReg = $_POST['usuarioReg'];
					
					$cuerpo = $_POST['cuerpo'];
					$correo= $_POST['correo'];

					$objcitasbean = new CitasBean();
					$objcitasdao = new CitasDao();

					$objcitasbean->setIdHorario($idHorario);
					$objcitasbean->setIdMedico($idMedico);
					$objcitasbean->setIdPaciente($idPaciente);
					$objcitasbean->setFechaHoraCita($fechaHoraCita);
					$objcitasbean->setUsuarioReg($usuarioReg);
					
					
					$new = $objcitasdao->RegistrarCita($objcitasbean);
				
					$objenviamail = new EnviaMail();
					$enviar = $objenviamail->Envia($correo, "Programación de CITA", $cuerpo);
					
					$retval['status'] = $new[0];
					$retval['message'] = $new[1];
			
				}
			echo json_encode($retval);
			
				
			/*$idHorario = $_POST['idHorario'];
			$idMedico = $_POST['idMedico'];
			$idPaciente = $_POST['idPaciente'];
			$fechaHoraCita = $_POST['fechaHoraCita'];
			$usuarioReg = $_POST['usuarioReg'];
			
			$cuerpo = $_POST['cuerpo'];
			$correo= $_POST['correo'];

			$objcitasbean = new CitasBean();
			$objcitasdao = new CitasDao();

			$objcitasbean->setIdHorario($idHorario);
			$objcitasbean->setIdMedico($idMedico);
			$objcitasbean->setIdPaciente($idPaciente);
			$objcitasbean->setFechaHoraCita($fechaHoraCita);
			$objcitasbean->setUsuarioReg($usuarioReg);
			
			
			$new = $objcitasdao->RegistrarCita($objcitasbean);
		
			$objenviamail = new EnviaMail();
			$enviar = $objenviamail->Envia($correo, "Programación de CITA", $cuerpo);
			
			$retval['status'] = $new[0];
			$retval['message'] = $new[1];
			
			echo json_encode($retval);
			*/
		
		
	}
	
	
	
	if($method == 'delete_accion'){
			
			$idCita = $_POST['idCita'];
			
			//validar si existe hc
			
				
		
				$objbean = new HistoriaClinicaBean();
				
				$objbean->setIdCita($idCita);
					
				$objdao = new HistoriaClinicaDao();
				$lista = $objdao->ValidarHC($objbean);
				$retval['status'] = $lista[0];
				$retval['message'] = $lista[1];
				$retval['data'] = $lista[2];
				
				$data = $lista[2];
				
					$status ="";
				
					foreach ($data as $val) {
						
							$status = $val['status'];
					}
					
					
					if ($status=="success")
					{
						$retval['status'] = false;
						$retval['message'] = "error";
						$retval['data'] = [0];
				
					}else
					{
						//$idCita = $_POST['idCita'];
						$objcitasbean = new CitasBean();
						$objcitasdao = new CitasDao();

						$objcitasbean->setIdCita($idCita);
						
						$new = $objcitasdao->AnularCita($objcitasbean);
						$retval['status'] = $new[0];
						$retval['message'] = $new[1];
						$retval['data'] = [0];
					}
												
				echo json_encode($retval);
		
	}
	

}else{
	header("HTTP/1.1 401 Unauthorized");
    exit;
}


