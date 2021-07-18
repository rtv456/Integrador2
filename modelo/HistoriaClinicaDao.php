<?php
include_once dirname( __DIR__ ) . '../util/ConexionBD.php';
include_once dirname( __DIR__ ) . '../entidad/HistoriaClinicaBean.php';


class HistoriaClinicaDao
{
	
	
	
	public function BuscarExamenHistorial($idHistoria)
	{
		
		try {
            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();
            $sql = "SELECT 
					EHC.idExamenes,
					E.descripcion as examen,
					EHC.idHistoria,
					EHC.estado,
					EHC.archivo,
					''message,
					''status
					FROM examenes_historia_clinica EHC
					INNER JOIN examenes E ON E.idExamenes=EHC.idExamenes AND EHC.idHistoria=$idHistoria";
            $result = mysqli_query($cnx, $sql);
            $Lista = array();
            while ($fila = mysqli_fetch_assoc($result)) {
                $Lista[] = array(
                    'idExamenes' => $fila['idExamenes'],
					'examen' => $fila['examen'],
					'idHistoria' => $fila['idHistoria'],
					'archivo' => $fila['archivo'],
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
	
	public function ObtieneExamen($idHistoria)
	{
		
		try {
            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();
            $sql = "SELECT 
					EHC.idExamenes,
					E.descripcion as examen,
					EHC.idHistoria,
					EHC.estado,
					''message,
					''status
					FROM examenes_historia_clinica EHC
					INNER JOIN examenes E ON E.idExamenes=EHC.idExamenes AND EHC.idHistoria=$idHistoria";
            $result = mysqli_query($cnx, $sql);
            $Lista = array();
            while ($fila = mysqli_fetch_assoc($result)) {
                $Lista[] = array(
                    'idExamenes' => $fila['idExamenes'],
					'examen' => $fila['examen'],
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
	
	
	public function BuscarExamen($nombres)
	{

		try {
		
	
		 $cn = new ConexionBD();
         $cnx = $cn->getConexionCursor();
				
				
		if ($cnx->multi_query("
				SELECT 
					E.idExamenes, 
					E.tipoExamen, 
					E.descripcion,
					''message,
					''status
				FROM examenes E WHERE E.estado<>0
				AND e.descripcion LIKE '%$nombres%'")) 
			{
			
			$Lista = array();
			
			if ($result = $cnx->store_result()) {
			 
			 
			 while ($row = $result->fetch_assoc()) {
				 
			 		 $Lista[] = array(

                        'idExamenes' => $row['idExamenes'],
                        'tipoExamen' => $row['tipoExamen'],
						'descripcion' => $row['descripcion'],
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
	
	
	public function BuscarCie10($nombres)
	{

		try {
		
	
		 $cn = new ConexionBD();
         $cnx = $cn->getConexionCursor();
				
				
		if ($cnx->multi_query("
				
			SELECT 
					D.idDiagnostico,
					D.codcie,
                    D.descripcion,
					''message,
					''status					
				FROM diagnostico D
				WHERE D.estado<>0
                AND CONCAT(D.codcie,' ',D.descripcion) LIKE '%$nombres%'")) 
			{
			
			$Lista = array();
			
			if ($result = $cnx->store_result()) {
			 
			 
			 while ($row = $result->fetch_assoc()) {
				 
			 		 $Lista[] = array(

                        'idDiagnostico' => $row['idDiagnostico'],
                        'codcie' => $row['codcie'],
						'descripcion' => $row['descripcion'],
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
	
	
	
	public function ValidarHC(HistoriaClinicaBean $obj)
	{
		
		try {
			
			$idCita=$obj->idCita;
			
            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();
            $sql = "SELECT
					H.idHistoria,
					''message,
					'success'status
			FROM citas C INNER JOIN historia_clinica H  ON H.idCita=C.idCita
			WHERE H.estado<>0 AND C.idCita=$idCita";
            $result = mysqli_query($cnx, $sql);
            $Lista = array();
            while ($fila = mysqli_fetch_assoc($result)) {
                $Lista[] = array(
                    'idHistoria' => $fila['idHistoria'],
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
			$stat[2] = ['error'];
			return $stat;
        }
        return $stat;
		
	}
	
	
	
	public function ObtenerHC(HistoriaClinicaBean $obj)
	{
		
		try {
			
			$idCita=$obj->idCita;
			
            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();
            $sql = "SELECT
					H.idHistoria,
					H.idDiagnostico,
                    D.descripcion as diagnostico,
					C.idCita,
                    CONCAT(PER.apePaterno,' ',PER.ApeMaterno,' ',PER.nombres)paciente,
					coalesce(DATE_FORMAT(C.fechaHoraCita,'%d/%m/%Y'),H.fechaAtencion)fechaAtencion,
					coalesce(TIMESTAMPDIFF(YEAR,PER.fechaNacimiento,CURDATE()),H.edad)edad ,
					H.relato,
					H.indicaciones,
					H.estado,
					''message,
					''status
			FROM citas C LEFT JOIN historia_clinica H  ON H.idCita=C.idCita
			INNER JOIN paciente PAC ON PAC.idPaciente=C.idPaciente
			INNER JOIN persona PER ON PER.idPersona=PAC.idPersona
			LEFT JOIN diagnostico D ON D.idDiagnostico=H.idDiagnostico
			WHERE (H.estado<>0 OR  H.estado IS NULL) AND C.idCita=$idCita";
            $result = mysqli_query($cnx, $sql);
            $Lista = array();
            while ($fila = mysqli_fetch_assoc($result)) {
                $Lista[] = array(
                    'idHistoria' => $fila['idHistoria'],
                    'idDiagnostico' => $fila['idDiagnostico'],
					'diagnostico' => $fila['diagnostico'],
                    'idCita' => $fila['idCita'],
					'paciente' => $fila['paciente'],
                    'fechaAtencion' => $fila['fechaAtencion'],
					'edad' => $fila['edad'],
					'relato' => $fila['relato'],
					'indicaciones' => $fila['indicaciones'],
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
			$stat[2] = ['error'];
			return $stat;
        }
        return $stat;
		
	}
	
	
    public function RegistrarHC(HistoriaClinicaBean $obj)
    {
		
		 try {

            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();
          	$sql = " INSERT INTO `historia_clinica`(`idDiagnostico`,`idCita`,`fechaAtencion`,`edad`,`relato`,`indicaciones`,`estado`)VALUES(?,?,?,?,?,?,1);";


            $stmt = $cnx->prepare($sql);
            $stmt->bind_param('ssssss', $obj->idDiagnostico, $obj->idCita, $obj->fechaAtencion,$obj->edad, $obj->relato, $obj->indicaciones);
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
	
	
	
	public function ModificarHC(HistoriaClinicaBean $obj)
    {
		
		 try {

            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();
          	$sql = "UPDATE historia_clinica SET idDiagnostico=?, relato=?, indicaciones=? where idHistoria=?";


            $stmt = $cnx->prepare($sql);
            $stmt->bind_param('ssss', $obj->idDiagnostico, $obj->relato, $obj->indicaciones, $obj->idHistoria);
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
