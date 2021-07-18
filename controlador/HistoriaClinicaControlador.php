<?php

include_once dirname( __DIR__ ) . '../entidad/HistoriaClinicaBean.php';
include_once dirname( __DIR__ ) . '../modelo/HistoriaClinicaDao.php';

include_once dirname( __DIR__ ) . '../entidad/ExamenesHistoriaClinicaBean.php';
include_once dirname( __DIR__ ) . '../modelo/ExamenesHistoriaClinicaDao.php';


if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) )
{
	$method=$_POST['method'];
	
	//$retval = [];

	if($method == 'obtiene_hc'){
		
		$idCita = $_POST['idCita'];
		
		$objbean = new HistoriaClinicaBean();
		
		$objbean->setIdCita($idCita);
			
		$objdao = new HistoriaClinicaDao();
	    $lista = $objdao->ObtenerHC($objbean);
		$retval['status'] = $lista[0];
		$retval['message'] = $lista[1];
		$retval['data'] = $lista[2];
				
		echo json_encode($retval);
		
	}
	
	if($method == 'buscar_cie10'){
		
		$nombres = $_POST['nombres'];
				
			
		$objdao = new HistoriaClinicaDao();
		
	    $lista = $objdao->BuscarCie10($nombres);
		$retval['status'] = $lista[0];
		$retval['message'] = $lista[1];
		$retval['data'] = $lista[2];
				
		echo json_encode($retval);
		
	}
	
	
	if($method == 'buscar_examen'){
		
		$nombres = $_POST['nombres'];
				
			
		$objdao = new HistoriaClinicaDao();
		
	    $lista = $objdao->BuscarExamen($nombres);
		$retval['status'] = $lista[0];
		$retval['message'] = $lista[1];
		$retval['data'] = $lista[2];
				
		echo json_encode($retval);
		
	}
	
	
	if($method == 'obtiene_examen'){
			
		$idHistoria = $_POST['idHistoria'];
			
		$objdao = new HistoriaClinicaDao();
	    $lista = $objdao->ObtieneExamen($idHistoria);
		
		$retval['status'] = $lista[0];
		$retval['message'] = $lista[1];
		$retval['data'] = $lista[2];
		
		echo json_encode($retval);
		
	}
	
	
	
	if($method == 'nueva_historia'){
				
		
			$idDiagnostico = $_POST['idDiagnostico'];
			$idCita = $_POST['idCita'];
			$fechaAtencion = $_POST['fechaAtencion'];
			$edad = $_POST['edad'];
			$relato = $_POST['relato'];
			$indicaciones = $_POST['indicaciones'];
			
			
			
			$objbean = new HistoriaClinicaBean();
			$objdao = new HistoriaClinicaDao();

			$objbean->setIdDiagnostico($idDiagnostico);
			$objbean->setIdCita($idCita);
			$objbean->setFechaAtencion($fechaAtencion);
			$objbean->setEdad($edad);
			$objbean->setRelato($relato);
			$objbean->setIndicaciones($indicaciones);
			
			
			$new = $objdao->RegistrarHC($objbean);
			$retval['status'] = $new[0];
			$retval['message'] = $new[1];
			echo json_encode($retval);
		
		
	}
	
	if($method == 'editar_historia'){
		    
			$idHistoria = $_POST['idHistoria'];
			$idDiagnostico = $_POST['idDiagnostico'];
			$relato = $_POST['relato'];
			$indicaciones = $_POST['indicaciones'];
					
			
			$objbean = new HistoriaClinicaBean();
			$objdao = new HistoriaClinicaDao();


			$objbean->setIdHistoria($idHistoria);
			$objbean->setIdDiagnostico($idDiagnostico);
			$objbean->setRelato($relato);
			$objbean->setIndicaciones($indicaciones);
			

			$new = $objdao->ModificarHC($objbean);
			$retval['status'] = $new[0];
			$retval['message'] = $new[1];
			echo json_encode($retval);
	}
	
	
	//examenes
	
	if($method == 'nuevo_examen'){
				
		
			$idExamenes = $_POST['idExamenes'];
			$idHistoria = $_POST['idHistoria'];
						
			
			$objbean = new ExamenesHistoriaClinicaBean();
			$objdao = new ExamenesHistoriaClinicaDao();

			$objbean->setIdExamenes($idExamenes);
			$objbean->setIdHistoria($idHistoria);
			
			
			$new = $objdao->RegistrarExamenesHC($objbean);
			$retval['status'] = $new[0];
			$retval['message'] = $new[1];
			echo json_encode($retval);
		
		
	}
	
	
	if($method == 'borrar_examen'){
			
		    $idExamenes = $_POST['idExamenes'];
			$idHistoria = $_POST['idHistoria'];
						
			
			$objbean = new ExamenesHistoriaClinicaBean();
			$objdao = new ExamenesHistoriaClinicaDao();

			$objbean->setIdExamenes($idExamenes);
			$objbean->setIdHistoria($idHistoria);
			
			$new = $objdao->EliminarHC($objbean);
			$retval['status'] = $new[0];
			$retval['message'] = $new[1];
			echo json_encode($retval);
		
	}
	
	
	//Reporte
	
	if($method == 'buscar_historial'){
		
		$paciente = $_POST['paciente'];
		$documento = $_POST['documento'];
				
					
		$objdao = new ExamenesHistoriaClinicaDao();
	    $lista = $objdao->BuscarHistorial($paciente, $documento);
		$retval['status'] = $lista[0];
		$retval['message'] = $lista[1];
		$retval['data'] = $lista[2];
				
		echo json_encode($retval);
		
		
	}
	
	
	
	if($method == 'buscar_examen_historial'){
			
		$idHistoria = $_POST['idHistoria'];
			
		$objdao = new HistoriaClinicaDao();
	    $lista = $objdao->BuscarExamenHistorial($idHistoria);
		
		$retval['status'] = $lista[0];
		$retval['message'] = $lista[1];
		$retval['data'] = $lista[2];
		
		echo json_encode($retval);
		
	}
	
	
	
	
	
	
	/*if($method == 'mis_citas_todo'){
			
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
			
			echo json_encode($retval);
		
		
	}
	
	
	
	if($method == 'delete_accion'){
			
		    $idCita = $_POST['idCita'];
		
			$objcitasbean = new CitasBean();
			$objcitasdao = new CitasDao();

			$objcitasbean->setIdCita($idCita);
			
			$new = $objcitasdao->AnularCita($objcitasbean);
			$retval['status'] = $new[0];
			$retval['message'] = $new[1];
			echo json_encode($retval);
		
	}*/
	

}else{
	header("HTTP/1.1 401 Unauthorized");
    exit;
}


