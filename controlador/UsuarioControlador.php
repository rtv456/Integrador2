<?php

include_once dirname( __DIR__ ) . '../entidad/UsuariosBean.php';
include_once dirname( __DIR__ ) . '../modelo/UsuarioDAO.php';



class UsuarioControlador
{
	
	public function ListarPerfil()
    {
        try {

			$objdao = new UsuarioDAO();
			$lista = $objdao->ListarPerfil();
            
			
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        return $lista;
    }

}



if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) )
{
	$method=$_POST['method'];
	
	$retval = [];
	

	if($method == 'lista'){
			
		$objdao = new UsuarioDAO();
	    $lista = $objdao->ListarUsuarios();
		
		$retval['status'] = $lista[0];
		$retval['message'] = $lista[1];
		$retval['data'] = $lista[2];
		
		echo json_encode($retval);
		
	}
	
	if($method == 'nuevo'){
				
		
			$idPersona = $_POST['idPersona'];
			$idPerfil = $_POST['idPerfil'];
			$usuario = $_POST['usuario'];
			$contrasena = $_POST['contrasena'];
			
			$objbean = new UsuariosBean();
			$objdao = new UsuarioDAO();

			$objbean->setIdPersona($idPersona);
			$objbean->setIdPerfil($idPerfil);
			$objbean->setUsuario($usuario);
			$objbean->setContrasena($contrasena);
									
			
			$new = $objdao->RegistrarUsuario($objbean);
			$retval['status'] = $new[0];
			$retval['message'] = $new[1];
			echo json_encode($retval);
		
		
	}
	
	if($method == 'editar'){
		    $idUsuario = $_POST['idUsuario'];
		
			$contrasena = $_POST['contrasena'];
			
			$objbean = new UsuariosBean();
			$objdao = new UsuarioDAO();

			$objbean->setIdUsuario($idUsuario);
			$objbean->setContrasena($contrasena);
			
			$new = $objdao->ModificarUsuario($objbean);
			$retval['status'] = $new[0];
			$retval['message'] = $new[1];
			echo json_encode($retval);
	}
	
	if($method == 'borrar'){
			
		    $idUsuario = $_POST['idUsuario'];

			$objbean = new UsuariosBean();
			$objdao = new UsuarioDAO();

			$objbean->setIdUsuario($idUsuario);
			
			$new = $objdao->BorrarUsuario($objbean);
			$retval['status'] = $new[0];
			$retval['message'] = $new[1];
			echo json_encode($retval);
		
	}
	
	
	
}




