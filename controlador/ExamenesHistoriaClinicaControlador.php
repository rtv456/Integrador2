<?php

include_once dirname( __DIR__ ) . '../entidad/HistoriaClinicaBean.php';
include_once dirname( __DIR__ ) . '../modelo/HistoriaClinicaDao.php';

include_once dirname( __DIR__ ) . '../entidad/ExamenesHistoriaClinicaBean.php';
include_once dirname( __DIR__ ) . '../modelo/ExamenesHistoriaClinicaDao.php';



	
	
if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) )
{
				
			
			
	$method=$_POST['method'];
	
	

	if($method == 'lista_examenes'){
		
		
		$paciente = $_POST['paciente'];
		$documento = $_POST['documento'];
		$cita = $_POST['cita'];
		$fecha = $_POST['fecha'];
		
		
		
					
		$objdao = new ExamenesHistoriaClinicaDao();
	    $lista = $objdao->ListaExamenes($paciente, $documento, $cita, $fecha);
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
	

			
	if($method == 'cargar_archivo'){
				
		
		//no se usa

			$idExamenes = "1";
			$idHistoria = "2";
			$archivo = "";
			$usuarioRegistra = "";
			$estado = "1";
			$img = "1";
			
			

			$objdao = new ExamenesHistoriaClinicaDao();
			
			
			$new = $objdao->CargarExamenesHC($idExamenes,$idHistoria,$archivo,$usuarioRegistra,$estado);
			$retval['status'] = $new[0];
			$retval['message'] = $new[1];
			echo json_encode($retval);
		
		
	}
	
	//cargar examen archivo
	
	
	

}else{
	header("HTTP/1.1 401 Unauthorized");
    exit;
}


