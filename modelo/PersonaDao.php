<?php
include_once dirname( __DIR__ ) . '../util/ConexionBD.php';
include_once dirname( __DIR__ ) . '../entidad/PersonaBean.php';
include_once dirname( __DIR__ ) . '../entidad/UsuariosBean.php';

class PersonaDao
{
	
	
	public function BuscarPersona($nombres)
	{

		try {
		
	
		 $cn = new ConexionBD();
         $cnx = $cn->getConexionCursor();
				
				
		if ($cnx->multi_query("
				SELECT 
					PE.idPersona,
					CONCAT(PE.apePaterno,' ',PE.ApeMaterno,' ',PE.nombres)nombres,
					''message,
					''status					
				FROM persona PE
				WHERE PE.estado<>0
                AND CONCAT(PE.apePaterno,' ',PE.ApeMaterno,' ',PE.nombres) LIKE '%$nombres%'")) 
			{
			
			$Lista = array();
			
			if ($result = $cnx->store_result()) {
			 
			 
			 while ($row = $result->fetch_assoc()) {
				 
			 		 $Lista[] = array(

                        'idPersona' => $row['idPersona'],
                        'nombres' => $row['nombres'],
						'message' => $row['message'],
						'status' => $row['status']
						
						
                    );	 
			 }
			 
				$stat[0] = true;
				$stat[1] = "Lista";
				$stat[2] = $Lista;
				
			$result->close();
		 }else
		 {
				$stat[0] = false;
				$stat[1] = "No hay usuario";
				$stat[2] = [];
		 }
		 		
							
		}
	
        } catch (Exception $exc) {
			
			$stat[0] = false;
			$stat[1] = $exc->getTraceAsString();
			$stat[2] = [];
			return $stat;
        }
		
        return $stat;
		
	}
	
	
	public function ListarPersonas()
	{
		
		try {
            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();
            $sql = "SELECT 
					PE.idPersona,
					PE.documento,
					PE.apePaterno,
					PE.apeMaterno,
					PE.nombres,
					PE.fechaNacimiento,
					PE.sexo,
					PE.correo,
					PE.estado,
					''message,
					''status					
				FROM persona PE
				WHERE PE.estado<>0";
            $result = mysqli_query($cnx, $sql);
            $Lista = array();
            while ($fila = mysqli_fetch_assoc($result)) {
                $Lista[] = array(
                     'idPersona' => $fila['idPersona'],
                    'documento' => $fila['documento'],
                    'apePaterno' => $fila['apePaterno'],
                    'apeMaterno' => $fila['apeMaterno'],
					'nombres' => $fila['nombres'],
					'fechaNacimiento' => $fila['fechaNacimiento'],
					'sexo' => $fila['sexo'],
					'correo' => $fila['correo'],
					'estado' => $fila['estado'],
					'message' => $fila['message'],
					'status' => $fila['status']
                );
            }
						
			$stat[0] = true;
			$stat[1] = "Lista";
			$stat[2] = $Lista;
			
			
        } catch (Exception $exc) {
           
			$stat[0] = false;
			$stat[1] = $ex->getTraceAsString();
			$stat[2] = [];
			return $stat;
        }
        return $stat;
		
	}
	
	
	public function RegistrarPersona(PersonaBean $objpersonabean)
    {
	
		
		 try {

            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();
          
			$sql = "call sp_generaPersona('INS',?,?,?,?,?,?,?,0);";
			
			
            $stmt = $cnx->prepare($sql);
            $stmt->bind_param('sssssss', $objpersonabean->documento,$objpersonabean->apePaterno,$objpersonabean->apeMaterno,$objpersonabean->nombres,$objpersonabean->fechaNacimiento,$objpersonabean->sexo,$objpersonabean->correo);
            $stmt->execute();

            $response = $stmt->get_result();


            if (mysqli_stmt_affected_rows($stmt) > 0) {
                
               $stat[0] = true;
				$stat[1] = "Success save especialidad";
				return $stat;
            } else {
                $stat[0] = false;
				$stat[1] = "Ha ocurrido algún error";
				return $stat;
            }
			
        } catch (Exception $exc) {
			$stat[0] = false;
			$stat[1] = $exc->getTraceAsString();
			return $stat;
        }
     
    }
	
	
	public function ModificarPersona(PersonaBean $objpersonabean)
    {
		
		 try {

            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();
           
						
						$sql = "call sp_generaPersona('MOD',?,?,?,?,?,?,?,?);";
						
						

            $stmt = $cnx->prepare($sql);
            $stmt->bind_param('ssssssss', 
			
			$objpersonabean->documento,$objpersonabean->apePaterno,$objpersonabean->apeMaterno,$objpersonabean->nombres,$objpersonabean->fechaNacimiento,$objpersonabean->sexo,$objpersonabean->correo,$objpersonabean->idPersona
			
			);
            $stmt->execute();

            $response = $stmt->get_result();


            if (mysqli_stmt_affected_rows($stmt) > 0) {
                
               $stat[0] = true;
				$stat[1] = "Success update";
				return $stat;
            } else {
                $stat[0] = false;
				$stat[1] = "Ha ocurrido algún";
				return $stat;
            }
			
        } catch (Exception $exc) {
			$stat[0] = false;
			$stat[1] = $exc->getTraceAsString();
			return $stat;
        }
		     
    }
	
	
	public function BorrarPersona(PersonaBean $objpersonabean)
    {

		
		 try {

            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();
            $sql = " DELETE from persona WHERE idPersona = ? ";

            $stmt = $cnx->prepare($sql);
            $stmt->bind_param('i', $objpersonabean->idPersona);
            $stmt->execute();

            $response = $stmt->get_result();


            if (mysqli_stmt_affected_rows($stmt) > 0) {
                
                $stat[0] = true;
				$stat[1] = "Success delete";
				return $stat;
            } else {
                $stat[0] = false;
				$stat[1] = "Ha ocurrido algún error";
				return $stat;
            }
			
        } catch (Exception $exc) {
			$stat[0] = false;
			$stat[1] = $exc->getTraceAsString();
			return $stat;
        }
		
		 
     
    }
	
	
	
	
    public function ListarPersona()
    {
        try {
            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();
            $sql = "
				SELECT 
					PE.idPersona,
					PE.documento,
					PE.apePaterno,
					PE.apeMaterno,
					PE.nombres,
					PE.fechaNacimiento,
					PE.sexo,
					PE.correo,
					PE.estado 
				FROM persona PE
				WHERE PE.estado<>0";
            $result = mysqli_query($cnx, $sql);
            $Lista = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $Lista[] = array(
                    'idPersona' => $row['idPersona'],
                    'documento' => $row['documento'],
                    'apePaterno' => $row['apePaterno'],
                    'apeMaterno' => $row['apeMaterno'],
					'nombres' => $row['nombres'],
					'fechaNacimiento' => $row['fechaNacimiento'],
					'sexo' => $row['sexo'],
					'correo' => $row['correo'],
					'estado' => $row['estado']
             
                );
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
			
        return $Lista;
    }
	
	
	
	public function RegistrarPersonaUsuario(PersonaBean $objpersonabean, UsuariosBean $objeusuariobean)
	{

		try {
		
	
		 $cn = new ConexionBD();
         $cnx = $cn->getConexionCursor();
		
			$p_documento=$objpersonabean->documento;
			$p_apePaterno=$objpersonabean->apePaterno;
			$p_apeMaterno=$objpersonabean->apeMaterno;
			$p_nombres=$objpersonabean->nombres;
			$p_fechaNacimiento=$objpersonabean->fechaNacimiento;
			$p_sexo=$objpersonabean->sexo;
			$p_correo=$objpersonabean->correo;
			$p_contrasena=$objeusuariobean->contrasena;
		
				
		if ($cnx->multi_query("call sp_generaUsuario('$p_documento','$p_apePaterno','$p_apeMaterno','$p_nombres',NOW(),'$p_sexo','$p_correo','$p_contrasena');")) 
			{
			
			$Lista = array();
			
			if ($result = $cnx->store_result()) {
			 
			 
			 while ($row = $result->fetch_assoc()) {
				 

			 		 $Lista[] = array(

                        'idUsuario' => $row['idUsuario'],
                        'idPersona' => $row['idPersona'],
						'idPerfil' => $row['idPerfil'],
                        'usuario' => $row['usuario'],
						'contrasena' => $row['contrasena'],
						'message' => $row['message'],
						'status' => $row['status']
						
                    );	 
			 }
			 
				$stat[0] = true;
				$stat[1] = "Lista usuario";
				$stat[2] = $Lista;
				
			$result->close();
		 }else
		 {
				$stat[0] = false;
				$stat[1] = "No se pudo registrar";
				$stat[2] = [];
		 }
		 		
							
		}
	
        } catch (Exception $exc) {
			
			$stat[0] = false;
			$stat[1] = $exc->getTraceAsString();
			$stat[2] = [];
			return $stat;
        }
		

        return $stat;
		
		
		
	}
	
	

				

}
