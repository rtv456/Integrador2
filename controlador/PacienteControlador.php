<?php

include_once dirname( __DIR__ ) . '../entidad/UsuariosBean.php';
include_once dirname( __DIR__ ) . '../entidad/PacienteBean.php';
include_once dirname( __DIR__ ) . '../modelo/PacienteDao.php';


if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) )
{
	$method=$_POST['method'];
	
	$retval = [];

	if($method == 'lista'){
			
		$objdao = new PacienteDao();
	    $lista = $objdao->ListarPacientes();
		
		$retval['status'] = $lista[0];
		$retval['message'] = $lista[1];
		$retval['data'] = $lista[2];
		
		echo json_encode($retval);
		
	}
	
	if($method == 'nuevo'){
				
		
			$idPersona = $_POST['idPersona'];
			$HC = $_POST['HC'];
			
			$objbean = new PacienteBean();
			$objdao = new PacienteDao();

			$objbean->setIdPersona($idPersona);
			$objbean->setHC($HC);
						
			
			$new = $objdao->RegistrarPaciente($objbean);
			$retval['status'] = $new[0];
			$retval['message'] = $new[1];
			echo json_encode($retval);
		
		
	}
	
	if($method == 'editar'){
		    $idPaciente = $_POST['idPaciente'];
			$HC = $_POST['HC'];
			
			$objbean = new PacienteBean();
			$objdao = new PacienteDao();

			$objbean->setIdPaciente($idPaciente);	
			$objbean->setHC($HC);
			
			$new = $objdao->ModificarPaciente($objbean);
			$retval['status'] = $new[0];
			$retval['message'] = $new[1];
			echo json_encode($retval);
	}
	
	if($method == 'borrar'){
			
		    $idPaciente = $_POST['idPaciente'];

			$objbean = new PacienteBean();
			$objdao = new PacienteDao();

			$objbean->setIdPaciente($idPaciente);	
			
			$new = $objdao->BorrarPaciente($objbean);
			$retval['status'] = $new[0];
			$retval['message'] = $new[1];
			echo json_encode($retval);
		
	}
	
	
	
}



class PacienteControlador
{

	public function ObtieneDatosPacientePorUsuario(UsuariosBean $objusubean)
    {
        try {

		
            $objpacientedao = new PacienteDao();
	
			$lista = $objpacientedao->ObtieneDatosPacientePorUsuario($objusubean);
            
			
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        return $lista;
    }



}