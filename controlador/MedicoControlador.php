<?php

include_once dirname( __DIR__ ) . '../entidad/MedicoBean.php';
include_once dirname( __DIR__ ) . '../modelo/MedicoDao.php';




if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) )
{
	$method=$_POST['method'];
	
	$retval = [];

	if($method == 'lista'){
			
		$objdao = new MedicoDao();
	    $lista = $objdao->ListarMedicos();
		
		$retval['status'] = $lista[0];
		$retval['message'] = $lista[1];
		$retval['data'] = $lista[2];
		
		echo json_encode($retval);
		
	}
	
	if($method == 'nuevo'){
				
		
			$idEspecialidad = $_POST['idEspecialidad'];
			$idPersona = $_POST['idPersona'];
			$CMP = $_POST['CMP'];
			$minutosAtencion = $_POST['minutosAtencion'];
			
			$objbean = new MedicoBean();
			$objdao = new MedicoDao();

			$objbean->setIdEspecialidad($idEspecialidad);
			$objbean->setIdPersona($idPersona);
			$objbean->setCMP($CMP);
			$objbean->setMinutosAtencion($minutosAtencion);
			
			
			$new = $objdao->RegistrarMedico($objbean);
			$retval['status'] = $new[0];
			$retval['message'] = $new[1];
			echo json_encode($retval);
		
		
	}
	
	if($method == 'editar'){
		    $idMedico = $_POST['idMedico'];
		
			$cmp = $_POST['cmp'];
			$minutosAtencion = $_POST['minutosAtencion'];
			
			$objbean = new MedicoBean();
			$objdao = new MedicoDao();

			$objbean->setIdMedico($idMedico);
			
			$objbean->setCMP($cmp);
			$objbean->setMinutosAtencion($minutosAtencion);
			

			$new = $objdao->ModificarMedico($objbean);
			$retval['status'] = $new[0];
			$retval['message'] = $new[1];
			echo json_encode($retval);
	}
	
	if($method == 'borrar'){
			
		    $idMedico = $_POST['idMedico'];

			$objbean = new MedicoBean();
			$objdao = new MedicoDao();

			$objbean->setIdMedico($idMedico);
			
			$new = $objdao->BorrarMedico($objbean);
			$retval['status'] = $new[0];
			$retval['message'] = $new[1];
			echo json_encode($retval);
		
	}
	
	
	
}




class MedicoControlador
{

	public function ListarMedicosPorEspecialidad(MedicoBean $objmedicobean)
    {
        try {


			$objmedicodao = new MedicoDao();
			$lista = $objmedicodao->ListarMedicosPorEspecialidad($objmedicobean);
            
			
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        return $lista;
    }

}
