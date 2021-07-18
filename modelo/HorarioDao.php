<?php
include_once dirname( __DIR__ ) . '../util/ConexionBD.php';
include_once dirname( __DIR__ ) . '../entidad/HorarioBean.php';


class HorarioDao
{
	
	
	public function ListarHorario()
	{
		
		try {
            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();
            $sql = "SELECT 
                    H.idHorario, 
                    S.idSede,
                    E.idEspecialidad,
                    M.idMedico,
					S.descripcion as sede, 
					E.descripcion as especialidad, 
					CONCAT(P.apePaterno,' ',P.ApeMaterno,' ',P.nombres)medico,
					DATE_FORMAT(H.fechaHoraInicio,'%d/%m/%Y %H:%i')fechaHoraInicio,
                    DATE_FORMAT(H.fechaHoraFin,'%d/%m/%Y %H:%i')fechaHoraFin,
					H.flgLunes,
					H.flgMartes,
					H.flgMiercoles,
					H.flgJueves,
					H.flgViernes,
					H.flgSabado,
					H.flgDomingo,
					H.estado,
					''message,
					''status
					FROM citas.horario H
					INNER JOIN medico M ON H.idMedico=M.idMedico
					INNER JOIN persona P ON P.idPersona=M.idPersona
					INNER JOIN especialidad E ON E.idEspecialidad=M.idEspecialidad
					INNER JOIN sede S ON S.idSede=E.idSede
					WHERE H.estado<>0";
            $result = mysqli_query($cnx, $sql);
            $Lista = array();
            while ($fila = mysqli_fetch_assoc($result)) {
                $Lista[] = array(
                    'idHorario' => $fila['idHorario'],
					'idSede' => $fila['idSede'],
					'idEspecialidad' => $fila['idEspecialidad'],
					'idMedico' => $fila['idMedico'],
                    'sede' => $fila['sede'],
                    'especialidad' => $fila['especialidad'],
					'medico' => $fila['medico'],
					'fechaHoraInicio' => $fila['fechaHoraInicio'],
					'fechaHoraFin' => $fila['fechaHoraFin'],
					'flgLunes' => $fila['flgLunes'],
					'flgMartes' => $fila['flgMartes'],
					'flgMiercoles' => $fila['flgMiercoles'],
					'flgJueves' => $fila['flgJueves'],
					'flgViernes' => $fila['flgViernes'],
					'flgSabado' => $fila['flgSabado'],
					'flgDomingo' => $fila['flgDomingo'],
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
	
	
    public function RegistrarHorario(HorarioBean $objhorariobean)
    {
		
		 try {

            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();
            $sql = " INSERT INTO `horario`(`idMedico`,`fechaHoraInicio`,`fechaHoraFin`,`flgLunes`,`flgMartes`,`flgMiercoles`,`flgJueves`,`flgViernes`,`flgSabado`,`flgDomingo`,`estado`)VALUES(?,?,?,?,?,?,?,?,?,?,1); ";

            $stmt = $cnx->prepare($sql);
            $stmt->bind_param('ssssssssss', $objhorariobean->idMedico,$objhorariobean->fechaHoraInicio,$objhorariobean->fechaHoraFin,$objhorariobean->flgLunes,$objhorariobean->flgMartes,$objhorariobean->flgMiercoles,$objhorariobean->flgJueves,$objhorariobean->flgViernes,$objhorariobean->flgSabado,	$objhorariobean->flgDomingo);
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
	
	
	public function ModificarHorario(HorarioBean $objhorariobean)
    {
		
		 try {

            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();
            $sql = " UPDATE horario SET 
						flgLunes = ?,
						flgMartes = ?,
						flgMiercoles = ?,
						flgJueves = ?,
						flgViernes = ?,
						flgSabado = ?,
						flgDomingo = ?
						WHERE idHorario = ? ";

            $stmt = $cnx->prepare($sql);
            $stmt->bind_param('ssssssss', 
			
			$objhorariobean->flgLunes,
					$objhorariobean->flgMartes,
					$objhorariobean->flgMiercoles,
					$objhorariobean->flgJueves,
					$objhorariobean->flgViernes,
					$objhorariobean->flgSabado,
					$objhorariobean->flgDomingo,
					$objhorariobean->idHorario
			
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
	
	
	public function BorrarHorario(HorarioBean $objhorariobean)
    {

		
		 try {

            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();
            $sql = " DELETE from horario WHERE idHorario = ? ";

            $stmt = $cnx->prepare($sql);
            $stmt->bind_param('i', $objhorariobean->idHorario);
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
	
	
}
