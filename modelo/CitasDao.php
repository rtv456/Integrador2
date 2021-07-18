<?php
include_once dirname( __DIR__ ) . '../util/ConexionBD.php';
include_once dirname( __DIR__ ) . '../entidad/CitasBean.php';


class CitasDao
{
	
	
	public function ValidarCantidadCita(CitasBean $obj)
	//public function ValidarCantidadCita($idPaciente,$fecha)
	{
		
		try {
			
			$idPaciente=$obj->idPaciente;
			$fecha=$obj->fechaHoraCita;
			
			
            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();
            $sql = "SELECT
					COUNT(*)cantidad
			FROM citas C
			WHERE C.estado<>0 
            AND C.idPaciente=$idPaciente 
			AND date_format(C.fechaHoraCita, '%Y%m')=date_format('$fecha', '%Y%m');";
            $result = mysqli_query($cnx, $sql);
            $Lista = array();
            while ($fila = mysqli_fetch_assoc($result)) {
                $Lista[] = array(
                    'cantidad' => $fila['cantidad']
                );
            }
						
			$stat[0] = true;
			$stat[1] = "Lista";
			$stat[2] = $Lista;
			
			
        } catch (Exception $exc) {
           
			$stat[0] = false;
			$stat[1] = $ex->getTraceAsString();
			$stat[2] = ['error'];
			return $stat;
        }
        return $stat;
		
	}
	
	
	public function BuscarCita(CitasBean $objcitasbean)
	{

		try {
	
		 $cn = new ConexionBD();
         $cnx = $cn->getConexionCursor();
		
			$fecha=$objcitasbean->fechaHoraCita;
			$idMedico=$objcitasbean->idMedico;
				
		if ($cnx->multi_query("call sp_generaHorario('$fecha','$idMedico');")) {
			
			$Lista = array();
			
		 if ($result = $cnx->store_result()) {
			 
			 
			 while ($row = $result->fetch_assoc()) {
				 
			 		 $Lista[] = array(

                        'idHorario' => $row['idHorario'],
                        'idMedico' => $row['idMedico'],
						'descSede' => $row['descSede'],
                        'descEspecialidad' => $row['descEspecialidad'],
						'medico' => $row['medico'],
						'fechaHoraInicio' => $row['fechaHoraInicio'],
						'fechaHora' => $row['fechaHora'],
						'status' => $row['status']
						
                    );	 
			 }
			 
				$stat[0] = true;
				$stat[1] = "Lista horario";
				$stat[2] = $Lista;
				
			$result->close();
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
	
		
	public function ListarMisCitas(CitasBean $objcitasbean)
	{

		try {
	
		 $cn = new ConexionBD();
         $cnx = $cn->getConexionCursor();
		
		
			$idHorario=$objcitasbean->idHorario;//idPerfil
			$idMedico=$objcitasbean->idMedico;
			$fecha=$objcitasbean->fechaHoraCita;
			
				
		if ($cnx->multi_query("call sp_listCita('$idHorario','$idMedico','$fecha');")) {
			
			$Lista = array();
			
		 if ($result = $cnx->store_result()) {
			 
			 
			 while ($row = $result->fetch_assoc()) {
				 
			 		 $Lista[] = array(

                        'idCita' => $row['idCita'],
                        'descSede' => $row['descSede'],
						'descEspecialidad' => $row['descEspecialidad'],
                        'medico' => $row['medico'],
						'paciente' => $row['paciente'],
						'fechaHoraCita' => $row['fechaHoraCita'],
						'fechaHora' => $row['fechaHora'],
						'idHistoria' => $row['idHistoria'],
						'status' => $row['status']
						
                    );	 
			 }
			 
				$stat[0] = true;
				$stat[1] = "Lista horario";
				$stat[2] = $Lista;
				
			$result->close();
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
	
	
	
	public function ListarMisCitasTodo(CitasBean $objcitasbean)
	{

		try {
	
		 $cn = new ConexionBD();
         $cnx = $cn->getConexionCursor();
		
		
			$idHorario=$objcitasbean->idHorario;//idPerfil
			$idMedico=$objcitasbean->idMedico;
			
				
		if ($cnx->multi_query("call sp_listCitaTodo('$idHorario','$idMedico');")) {
			
			$Lista = array();
			
		 if ($result = $cnx->store_result()) {
			 
			 
			 while ($row = $result->fetch_assoc()) {
				 
			 		 $Lista[] = array(

                        'idCita' => $row['idCita'],
                        'descSede' => $row['descSede'],
						'descEspecialidad' => $row['descEspecialidad'],
                        'medico' => $row['medico'],
						'paciente' => $row['paciente'],
						'fechaHoraCita' => $row['fechaHoraCita'],
						'fechaHora' => $row['fechaHora'],
						'idHistoria' => $row['idHistoria'],
						'status' => $row['status']
						
                    );	 
			 }
			 
				$stat[0] = true;
				$stat[1] = "Lista horario";
				$stat[2] = $Lista;
				
			$result->close();
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
	
	
	public function AnularCita(CitasBean $objcitasbean)
    {

		
		 try {

            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();
            //$sql = " UPDATE citas set estado=0 WHERE idCita = ? ";
			//$sql = " DELETE from citas WHERE idCita = ? ";
			$sql = "UPDATE citas SET estado = '0' WHERE idCita = ? ";
            $stmt = $cnx->prepare($sql);
            $stmt->bind_param('i', $objcitasbean->idCita);
            $stmt->execute();

            $response = $stmt->get_result();


            if (mysqli_stmt_affected_rows($stmt) > 0) {
                
                $stat[0] = true;
				$stat[1] = "Anulado correctamente";
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
	
	
    public function RegistrarCita(CitasBean $objcitasbean)
    {
		
		 try {

            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();
          	$sql = " INSERT INTO `citas`(`idHorario`,`idMedico`,`idPaciente`,`fechaHoraCita`,`usuarioReg`,`estado`)VALUES(?,?,?,?,?,1);";


            $stmt = $cnx->prepare($sql);
            $stmt->bind_param('sssss', $objcitasbean->idHorario, $objcitasbean->idMedico, $objcitasbean->idPaciente,$objcitasbean->fechaHoraCita, $objcitasbean->usuarioReg);
            $stmt->execute();

            $response = $stmt->get_result();


            if (mysqli_stmt_affected_rows($stmt) > 0) {
                
                $stat[0] = true;
				$stat[1] = "Success save citas";
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
	
	
	
	public function BuscarCita_old(CitasBean $objcitasbean)
	{
		

		 try {

            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();
			$sql = "call pro_prueba3(?,?);";

            $stmt = $cnx->prepare($sql);

			$stmt->bind_param('ss', $objcitasbean->fechaHoraCita, $objcitasbean->idMedico);
					
            $stmt->execute();
     
            $response = $stmt->get_result();

            $Lista = array();

            if (mysqli_num_rows($response) > 0) {

                while ($row = mysqli_fetch_array($response, MYSQLI_ASSOC)) {

                    $Lista[] = array(

                       'idHorario' => $row['idHorario'],
                        'idMedico' => $row['idMedico'],
						'descSede' => $row['descSede'],
                        'descEspecialidad' => $row['descEspecialidad'],
						'medico' => $row['medico'],
						'fechaHoraInicio' => $row['fechaHoraInicio'],
						'fechaHora' => $row['fechaHora'],
						'status' => $row['status']
						
                    );
                }
				$stat[0] = true;
				$stat[1] = "List horario";
				$stat[2] = $Lista;
			
            } else {
				$stat[0] = true;
				$stat[1] = "vacio horario";
				$stat[2] = [];
            }
            $stmt->close();
        } catch (Exception $exc) {
			$stat[0] = false;
			$stat[1] = $exc->getTraceAsString();
			$stat[2] = [];
			return $stat;
        }

        return $stat;
		
	}
	
}
