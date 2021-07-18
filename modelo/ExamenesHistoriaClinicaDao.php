<?php
include_once dirname( __DIR__ ) . '../util/ConexionBD.php';
include_once dirname( __DIR__ ) . '../entidad/HistoriaClinicaBean.php';
include_once dirname( __DIR__ ) . '../entidad/ExamenesHistoriaClinicaBean.php';


class ExamenesHistoriaClinicaDao
{
	
	public function BuscarHistorial($paciente, $documento)
	{
		
		try {
            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();
            $sql = "SELECT 
						C.idCita,
						S.descripcion as descSede, 
						E.descripcion as descEspecialidad,
						CONCAT(PER.apePaterno,' ',PER.ApeMaterno,' ',PER.nombres)medico,
						CONCAT(PER2.apePaterno,' ',PER2.ApeMaterno,' ',PER2.nombres)paciente,
						DATE_FORMAT(C.fechaHoraCita,'%d/%m/%Y')fechaHoraCita,
						concat( DATE_FORMAT(C.fechaHoraCita,'%H:%i'),' - ',DATE_FORMAT(C.fechaHoraCita,'%H:%i'))fechaHora,
						ATE.idHistoria,
						'success'status
						FROM citas C
						INNER JOIN horario H ON H.idHorario=C.idHorario
						INNER JOIN medico M ON M.idMedico=H.idMedico
						INNER JOIN persona PER ON PER.idPersona=M.idPersona
						INNER JOIN especialidad E ON E.idEspecialidad=M.idEspecialidad
						INNER JOIN sede S ON S.idSede=E.idSede
						INNER JOIN paciente PAC ON PAC.idPaciente=C.idPaciente
						INNER JOIN persona PER2 ON PER2.idPersona=PAC.idPersona
						INNER JOIN historia_clinica ATE ON ATE.idCita=C.idCita
						WHERE C.estado<>0 
						AND CONCAT(PER2.apePaterno,' ',PER2.ApeMaterno,' ',PER2.nombres) LIKE '%$paciente%'
						AND PER2.documento LIKE '$documento%'";
            $result = mysqli_query($cnx, $sql);
            $Lista = array();
            while ($row = mysqli_fetch_assoc($result)) {
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
	
	
	public function ListaExamenes($paciente, $documento, $cita, $fecha)
	{
		
		try {
            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();
            $sql = "SELECT 
					EHC.idExamenes,
					EHC.idHistoria,
					E.descripcion as examen,
					C.idCita,
                    PER.documento,
					CONCAT(PER.apePaterno,' ',PER.ApeMaterno,' ',PER.nombres)paciente,
                    CONCAT(PER2.apePaterno,' ',PER2.ApeMaterno,' ',PER2.nombres)medico,
					coalesce(DATE_FORMAT(C.fechaHoraCita,'%d/%m/%Y'),H.fechaAtencion)fechaAtencion,
                    EHC.estado,
                    (CASE 
						WHEN EHC.estado='0' THEN 'Anulado'
                        WHEN EHC.estado='1' THEN 'Solicitado'
                        WHEN EHC.estado='2' THEN 'Cargado'
                    END)txtestado,
					EHC.archivo,
                    ''message,
					''status
					FROM examenes_historia_clinica EHC
					INNER JOIN examenes E ON E.idExamenes=EHC.idExamenes
                    INNER JOIN historia_clinica H ON H.idHistoria=EHC.idHistoria
                    INNER JOIN citas C ON C.idCita=H.idCita
                    INNER JOIN paciente PAC ON PAC.idPaciente=C.idPaciente
                    INNER JOIN persona PER ON PER.idPersona=PAC.idPersona
                    INNER JOIN medico MED ON MED.idMedico=C.idMedico
                    INNER JOIN persona PER2 ON PER2.idPersona=MED.idPersona
                    WHERE EHC.estado<>0 AND E.estado<>0 AND C.estado<>0
                    AND CONCAT(PER.apePaterno,' ',PER.ApeMaterno,' ',PER.nombres) LIKE '%$paciente%'
                    AND PER.documento LIKE '$documento%'
                    AND C.idCita LIKE '$cita%'
                    AND coalesce(DATE_FORMAT(C.fechaHoraCita,'%d/%m/%Y'),H.fechaAtencion) LIKE '$fecha%'";
            $result = mysqli_query($cnx, $sql);
            $Lista = array();
            while ($fila = mysqli_fetch_assoc($result)) {
                $Lista[] = array(
                    'idExamenes' => $fila['idExamenes'],
					'idHistoria' => $fila['idHistoria'],
					'examen' => $fila['examen'],
					'idCita' => $fila['idCita'],
					'documento' => $fila['documento'],
					'paciente' => $fila['paciente'],
					'medico' => $fila['medico'],
					'fechaAtencion' => $fila['fechaAtencion'],
					'estado' => $fila['estado'],
					'txtestado' => $fila['txtestado'],
					'archivo' => $fila['archivo'],
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
	
	
	
	
	public function ObtenerExamenesHC(HistoriaClinicaBean $obj)
	{
		
		try {
			
			$idCita=$obj->idHistoria;
			
            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();
            $sql = "SELECT
					E.idExamenes,
					E.idHistoria,
					E.estado
					FROM examenes_historia_clinica E
					WHERE E.estado<>0 AND E.idHistoria=$idHistoria";
            $result = mysqli_query($cnx, $sql);
            $Lista = array();
            while ($fila = mysqli_fetch_assoc($result)) {
                $Lista[] = array(
                     'idExamenes' => $fila['idExamenes'],
                    'idHistoria' => $fila['idHistoria'],
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
	
	
    public function RegistrarExamenesHC(ExamenesHistoriaClinicaBean $obj)
    {
		
		 try {

            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();
          	$sql = " INSERT INTO `examenes_historia_clinica`(`idExamenes`,`idHistoria`,`estado`)VALUES(?,?,1);";


            $stmt = $cnx->prepare($sql);
            $stmt->bind_param('ss', $obj->idExamenes, $obj->idHistoria);
            $stmt->execute();

            $response = $stmt->get_result();


            if (mysqli_stmt_affected_rows($stmt) > 0) {
                
                $stat[0] = true;
				$stat[1] = "Success";
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
	
	
	
	public function EliminarHC(ExamenesHistoriaClinicaBean $obj)
    {
		
		 try {

            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();
          	$sql = "delete from examenes_historia_clinica where idExamenes=? and idHistoria=?";


            $stmt = $cnx->prepare($sql);
            $stmt->bind_param('ss', $obj->idExamenes, $obj->idHistoria);
            $stmt->execute();

            $response = $stmt->get_result();


            if (mysqli_stmt_affected_rows($stmt) > 0) {
                
                $stat[0] = true;
				$stat[1] = "Success";
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
	



	public function CargarExamenesHC($idExamenes,$idHistoria,$archivo,$usuarioRegistra,$estado)
    {
		
		 try {

            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();
          	$sql = " UPDATE examenes_historia_clinica SET archivo=?, estado=?, usuarioRegistra=?, fechaRegistra=now()  WHERE idExamenes=? and idHistoria=?";


            $stmt = $cnx->prepare($sql);
            $stmt->bind_param('sssss', $archivo, $estado, $usuarioRegistra, $idExamenes, $idHistoria);
            $stmt->execute();

            $response = $stmt->get_result();


            if (mysqli_stmt_affected_rows($stmt) > 0) {
                
                $stat[0] = true;
				$stat[1] = "Success";
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
	
	
}