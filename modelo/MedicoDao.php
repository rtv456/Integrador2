<?php
include_once dirname( __DIR__ ) . '../util/ConexionBD.php';
include_once dirname( __DIR__ ) . '../entidad/MedicoBean.php';

class MedicoDao
{
	
	
	
	public function ListarMedicos()
	{
		
		try {
            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();
            $sql = "
					SELECT 
                    M.idMedico,
                    S.idSede,
                    E.idEspecialidad,
					S.descripcion as sede, 
					E.descripcion as especialidad, 
					P.idPersona,
					CONCAT(P.apePaterno,' ',P.ApeMaterno,' ',P.nombres)medico,
					M.CMP,
					 M.minutosAtencion,
					M.estado,
					''message,
					''status
					FROM medico M 
					INNER JOIN persona P ON P.idPersona=M.idPersona
					INNER JOIN especialidad E ON E.idEspecialidad=M.idEspecialidad
					INNER JOIN sede S ON S.idSede=E.idSede
					WHERE M.estado<>0";
            $result = mysqli_query($cnx, $sql);
            $Lista = array();
            while ($fila = mysqli_fetch_assoc($result)) {
                $Lista[] = array(
                    'idMedico' => $fila['idMedico'],
					'idSede' => $fila['idSede'],
					'idEspecialidad' => $fila['idEspecialidad'],
	                'sede' => $fila['sede'],
                    'especialidad' => $fila['especialidad'],
					'idPersona' => $fila['idPersona'],
					'medico' => $fila['medico'],
					'CMP' => $fila['CMP'],
					'minutosAtencion' => $fila['minutosAtencion'],
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
	
	
    public function RegistrarMedico(MedicoBean $objbean)
    {
		
		 try {

            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();
            $sql = " INSERT into `medico`(`idEspecialidad`,`idPersona`,`CMP`,`minutosAtencion`,`estado`)VALUES(?,?,?,?,1); ";

            $stmt = $cnx->prepare($sql);
            $stmt->bind_param('ssss', $objbean->idEspecialidad,$objbean->idPersona,$objbean->CMP,$objbean->minutosAtencion);
            $stmt->execute();

            $response = $stmt->get_result();


            if (mysqli_stmt_affected_rows($stmt) > 0) {
                
               $stat[0] = true;
				$stat[1] = "Success save";
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
	
	
	public function ModificarMedico(MedicoBean $objbean)
    {
		
		 try {

            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();
            $sql = " UPDATE medico SET 
						CMP = ?,
						minutosAtencion = ?
						WHERE idMedico = ? ";

            $stmt = $cnx->prepare($sql);
            $stmt->bind_param('sss',$objbean->CMP,$objbean->minutosAtencion,$objbean->idMedico);
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
	
	
	public function BorrarMedico(MedicoBean $objbean)
    {
	
		 try {

            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();
            $sql = " DELETE from medico WHERE idMedico = ? ";

            $stmt = $cnx->prepare($sql);
            $stmt->bind_param('i', $objbean->idMedico);
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
	
	
	public function ListarMedicosPorEspecialidad(MedicoBean $objmedicobean)
    {
        try {

            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();

            $sql = "
			SELECT M.idMedico, M.idEspecialidad, E.descripcion, M.CMP, M.minutosAtencion, CONCAT(apePaterno,' ',ApeMaterno,' ',nombres) nombre, M.estado, 'success'status 
			from medico M
			INNER JOIN persona P ON M.idPersona=P.idPersona
			INNER JOIN especialidad E ON E.idEspecialidad=M.idEspecialidad
			WHERE M.estado<>0 and M.idEspecialidad=?;";

            $stmt = $cnx->prepare($sql);

            $stmt->bind_param('s', $objmedicobean->idEspecialidad);

			
            $stmt->execute();
            $estado = 0;
            $response = $stmt->get_result();

            $LISTA = array();

            if (mysqli_num_rows($response) > 0) {

                while ($row = mysqli_fetch_array($response, MYSQLI_ASSOC)) {

                    $LISTA[] = array(

                        'idMedico' => $row['idMedico'],
                        'idEspecialidad' => $row['idEspecialidad'],
						'descripcion' => $row['descripcion'],
                        'CMP' => $row['CMP'],
                        'minutosAtencion' => $row['minutosAtencion'],
                        'nombre' => $row['nombre'],
                        'estado' => $row['estado'],
						'status' => $row['status']
						
                    );
                }
            } else {
                $LISTA[] = array('status' => 'failed');
            }
            $stmt->close();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        return $LISTA;
    }
	
		

}
