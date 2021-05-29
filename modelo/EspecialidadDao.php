<?php

include_once dirname( __DIR__ ) . '../util/ConexionBD.php';
include_once dirname( __DIR__ ) . '../entidad/MenuBean.php';

class EspecialidadDao
{
    public function ObtenerEspecialidades()
    {

        try {
            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();
            $sql = "SELECT idEspecialidad, descripcion, estado FROM `especialidad` E where estado<>0";
            $result = mysqli_query($cnx, $sql);
            $Lista = array();
            while ($fila = mysqli_fetch_assoc($result)) {
                $Lista[] = array(
                    'idEspecialidad' => $fila['idEspecialidad'],
		            'descripcion' => $fila['descripcion'],
                    'estado' => $fila['estado']
                );
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $Lista;
    }
	
	public function ListarEspecialidad()
	{
		
		try {
            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();
            $sql = "SELECT E.idEspecialidad, E.idSede, S.descripcion as sede, E.descripcion, E.estado, (CASE WHEN E.estado=0 then 'Anulado' WHEN E.estado=2 then 'Inactivo' WHEN E.estado=1 then 'Activo' end)txtestado 
FROM especialidad E INNER JOIN sede S ON S.idSede=E.idSede
WHERE E.estado<>0";
            $result = mysqli_query($cnx, $sql);
            $Lista = array();
            while ($fila = mysqli_fetch_assoc($result)) {
                $Lista[] = array(
                    'idEspecialidad' => $fila['idEspecialidad'],
					'idSede' => $fila['idSede'],
					'sede' => $fila['sede'],
                    'descripcion' => $fila['descripcion'],
                    'estado' => $fila['estado'],
					'txtestado' => $fila['txtestado']
                );
            }
						
			$stat[0] = true;
			$stat[1] = "List customer";
			$stat[2] = $Lista;
			
			
        } catch (Exception $exc) {
           
			$stat[0] = false;
			$stat[1] = $ex->getTraceAsString();
			$stat[2] = [];
			return $stat;
        }
        return $stat;
		
	}
	
	
	public function ListarEspecialidadPorSede(EspecialidadBean $objespecialidadbean)
    {
        try {

            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();

            $sql = "SELECT idEspecialidad, idSede, descripcion, estado, 'success'status FROM especialidad WHERE estado<>0 and idSede=?;";

            $stmt = $cnx->prepare($sql);

            $stmt->bind_param('s', $objespecialidadbean->idSede);

			
            $stmt->execute();
            $estado = 0;
            $response = $stmt->get_result();

            $LISTA = array();

            if (mysqli_num_rows($response) > 0) {

                while ($row = mysqli_fetch_array($response, MYSQLI_ASSOC)) {

                    $LISTA[] = array(

                       'idEspecialidad' => $row['idEspecialidad'],
                        'idSede' => $row['idSede'],
						'descripcion' => $row['descripcion'],
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
	
	
	
    public function RegistrarEspecialidad(EspecialidadBean $objespecialidadbean)
    {

		
		 try {

            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();
            $sql = " INSERT INTO `especialidad`(`idSede`,`descripcion`,`estado`)VALUES(?,?,?); ";

			
            $stmt = $cnx->prepare($sql);
            $stmt->bind_param('sss', $objespecialidadbean->idSede,$objespecialidadbean->descripcion, $objespecialidadbean->estado);
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
	
	
	public function ModificarEspecialidad(EspecialidadBean $objespecialidadbean)
    {

		
		 try {

            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();
            $sql = " UPDATE especialidad SET descripcion = ?,estado=? WHERE idEspecialidad = ? ";

            $stmt = $cnx->prepare($sql);
            $stmt->bind_param('ssi', $objespecialidadbean->descripcion, $objespecialidadbean->estado,$objespecialidadbean->idEspecialidad);
            $stmt->execute();

            $response = $stmt->get_result();


            if (mysqli_stmt_affected_rows($stmt) > 0) {
                
               $stat[0] = true;
				$stat[1] = "Success update especialidad";
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
	
	
	public function BorrarEspecialidad(EspecialidadBean $objespecialidadbean)
    {

		
		 try {

            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();
            $sql = " DELETE from especialidad WHERE idEspecialidad = ? ";

            $stmt = $cnx->prepare($sql);
            $stmt->bind_param('i', $objespecialidadbean->idEspecialidad);
            $stmt->execute();

            $response = $stmt->get_result();


            if (mysqli_stmt_affected_rows($stmt) > 0) {
                
                $stat[0] = true;
				$stat[1] = "Success delete especialidad";
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
