<?php


include_once dirname( __DIR__ ) . '../entidad/PersonaBean.php';
include_once dirname( __DIR__ ) . '../modelo/PersonaDao.php';

include_once dirname( __DIR__ ) . '../entidad/UsuariosBean.php';

include_once dirname( __DIR__ ) . '../util/EnviaMail.php';


if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) )
{
	$method=$_POST['method'];
	
	$retval = [];
	
	
	if($method == 'buscar_persona_usuario'){
			
		$nombres = $_POST['nombres'];
		
		$objdao = new PersonaDao();
	    $lista = $objdao->BuscarPersonaUsuario($nombres);
		
		$retval['status'] = $lista[0];
		$retval['message'] = $lista[1];
		$retval['data'] = $lista[2];
		
		echo json_encode($retval);
		
		
			
		}
		
		
		if($method == 'buscar_persona_paciente'){
			
		$nombres = $_POST['nombres'];
		
		$objdao = new PersonaDao();
	    $lista = $objdao->BuscarPersonaPaciente($nombres);
		
		$retval['status'] = $lista[0];
		$retval['message'] = $lista[1];
		$retval['data'] = $lista[2];
		
		echo json_encode($retval);
		
		
			
		}
		
		
		if($method == 'buscar_persona_medico'){
			
		$nombres = $_POST['nombres'];
		
		$objdao = new PersonaDao();
	    $lista = $objdao->BuscarPersonaMedico($nombres);
		
		$retval['status'] = $lista[0];
		$retval['message'] = $lista[1];
		$retval['data'] = $lista[2];
		
		echo json_encode($retval);
		
		
			
		}
	
	
		if($method == 'buscar_persona'){
			
		$nombres = $_POST['nombres'];
		
		$objdao = new PersonaDao();
	    $lista = $objdao->BuscarPersona($nombres);
		
		$retval['status'] = $lista[0];
		$retval['message'] = $lista[1];
		$retval['data'] = $lista[2];
		
		echo json_encode($retval);
		
		
			
		}
	
	if($method == 'generar_usuario'){
		
		
				
			$documento = $_POST['documento'];
			$apePaterno = $_POST['paterno'];
			$apeMaterno = $_POST['materno'];
			$nombres = $_POST['nombres'];
			$fechanacimiento = $_POST['fechanacimiento'];
			$sexo = $_POST['sexo'];
			$correo = $_POST['correo'];
			$contrasena = $_POST['contrasena'];
			$rcontrasena = $_POST['rcontrasena'];
			
			$cuerpo = $_POST['cuerpo'];

			if($contrasena!=$rcontrasena)
			{
				$retval['status'] = false;
				$retval['message'] = "Las contraseñas no coinciden";
			
				echo json_encode($retval);
			
			}else
			{
				
				$objpersonabean = new PersonaBean();
				$objusuariosbean = new UsuariosBean();
				$objpersonadao = new PersonaDao();

				$objpersonabean->setDocumento($documento);
				$objpersonabean->setApePaterno($apePaterno);
				$objpersonabean->setApeMaterno($apeMaterno);
				$objpersonabean->setNombres($nombres);
				$objpersonabean->setFechaNacimiento($fechanacimiento);
				$objpersonabean->setSexo($sexo);
				$objpersonabean->setCorreo($correo);
				$objusuariosbean->setContrasena($contrasena);
				
				
				
				
				$new = $objpersonadao->RegistrarPersonaUsuario($objpersonabean,$objusuariosbean);
				
				
				
				
				
					 
			
				$retval['status'] = $new[0];
				$retval['message'] = $new[1];
				$retval['data'] = $new[2];
				
				$data = $new[2];
				
				
				$status ="";
				
					foreach ($data as $val) {
						
							$status = $val['status'];
					}
					
					
					if ($status=="success")
					{
						$objenviamail = new EnviaMail();
						$enviar = $objenviamail->Envia($correo, "Registro de cuenta - Sistema Citas", $cuerpo);
				
					}
				
				
				
				if($retval['status']=="success")
				{
					$_SESSION["s_registro"]="ok";
									
				}
							
				echo json_encode($retval);
			
			}
		
		
	}
	
	
	if($method == 'lista'){
			
		$objdao = new PersonaDao();
	    $lista = $objdao->ListarPersonas();
		
		$retval['status'] = $lista[0];
		$retval['message'] = $lista[1];
		$retval['data'] = $lista[2];
		
		echo json_encode($retval);
		
	}
	
	if($method == 'nuevo'){
				
			$documento = $_POST['documento'];
			$apePaterno = $_POST['apePaterno'];
			$apeMaterno = $_POST['apeMaterno'];
			$nombres = $_POST['nombres'];
			$fechaNacimiento = $_POST['fechaNacimiento'];
			$sexo = $_POST['sexo'];
			$correo = $_POST['correo'];
			
			$objbean = new PersonaBean();
			$objdao = new PersonaDao();

			$objbean->setDocumento($documento);
			$objbean->setApePaterno($apePaterno);
			$objbean->setApeMaterno($apeMaterno);
			$objbean->setNombres($nombres);
			$objbean->setFechaNacimiento($fechaNacimiento);
			$objbean->setSexo($sexo);
			$objbean->setCorreo($correo);
			

			$new = $objdao->RegistrarPersona($objbean);
			$retval['status'] = $new[0];
			$retval['message'] = $new[1];
			echo json_encode($retval);
		
		
	}
	
	if($method == 'editar'){
		    $idPersona = $_POST['idPersona'];
			$documento = $_POST['documento'];
			$apePaterno = $_POST['apePaterno'];
			$apeMaterno = $_POST['apeMaterno'];
			$nombres = $_POST['nombres'];
			$fechaNacimiento = $_POST['fechaNacimiento'];
			$sexo = $_POST['sexo'];
			$correo = $_POST['correo'];
			

			$objbean = new PersonaBean();
			$objdao = new PersonaDao();

			$objbean->setIdPersona($idPersona);
			$objbean->setDocumento($documento);
			$objbean->setApePaterno($apePaterno);
			$objbean->setApeMaterno($apeMaterno);
			$objbean->setNombres($nombres);
			$objbean->setFechaNacimiento($fechaNacimiento);
			$objbean->setSexo($sexo);
			$objbean->setCorreo($correo);
			

			$new = $objdao->ModificarPersona($objbean);
			$retval['status'] = $new[0];
			$retval['message'] = $new[1];
			echo json_encode($retval);
	}
	
	if($method == 'borrar'){
			
		    $idPersona = $_POST['idPersona'];

			$objbean = new PersonaBean();
			$objdao = new PersonaDao();

			$objbean->setIdPersona($idPersona);
			
			$new = $objdao->BorrarPersona($objbean);
			$retval['status'] = $new[0];
			$retval['message'] = $new[1];
			echo json_encode($retval);
		
	}
	
	
	
}

class PersonaControlador
{

	public function ListarPersona()
    {
        try {

			$objpersonadao = new PersonaDao();
	
			$lista = $objpersonadao->ListarPersona();
            
			
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        return $lista;
    }



	public function ObtieneDatosPacientePorUsuario(UsuariosBean $objusubean)
    {
        try {

			$objusubean = new UsuariosBean();
            $objusudao = new UsuariosDao();
	
			$lista = $objusudao->ObtieneDatosPacientePorUsuario($objusubean);
            
			
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        return $lista;
    }





}

?>
 
