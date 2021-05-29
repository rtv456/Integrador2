<?php

include_once dirname( __DIR__ ) . '../util/ConexionBD.php';
include_once dirname( __DIR__ ) . '../entidad/UsuariosBean.php';


class UsuarioDao
{
	

public function ListarPerfil()
    {

        try {
            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();
            $sql = "SELECT 
					P.idPerfil, 
					P.descripcion 
					FROM perfil P WHERE P.estado<>0";
            $result = mysqli_query($cnx, $sql);
            $Lista = array();
            while ($fila = mysqli_fetch_assoc($result)) {
                $Lista[] = array(
                    'idPerfil' => $fila['idPerfil'],
                    'descripcion' => $fila['descripcion']
                );
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $Lista;
    }
	

	public function ListarUsuarios()
	{
		
		try {
            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();
            $sql = "
					SELECT
					U.idUsuario,
					U.idPersona,
					U.idPerfil,
					PER.descripcion as perfil,
					CONCAT(P.apePaterno,' ',P.ApeMaterno,' ',P.nombres)persona,
					U.usuario,
					U.contrasena,
					U.estado,
					''message,
					''status
					FROM usuarios U
					INNER JOIN persona P ON P.idPersona=U.idPersona
					INNER JOIN perfil PER ON PER.idPerfil=U.idPerfil
					WHERE U.estado<>0";
            $result = mysqli_query($cnx, $sql);
            $Lista = array();
            while ($fila = mysqli_fetch_assoc($result)) {
                $Lista[] = array(
                    'idUsuario' => $fila['idUsuario'],
					'idPersona' => $fila['idPersona'],
					'idPerfil' => $fila['idPerfil'],
	                'perfil' => $fila['perfil'],
					'persona' => $fila['persona'],
					'usuario' => $fila['usuario'],
					'contrasena' => $fila['contrasena'],
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
	
	
    public function RegistrarUsuario(UsuariosBean $objbean)
    {
		
		 try {

            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();
            $sql = " INSERT into `usuarios`(`idPersona`,`idPerfil`,`usuario`,`contrasena`,`estado`)VALUES(?,?,?,?,1); ";

            $stmt = $cnx->prepare($sql);
            $stmt->bind_param('ssss', $objbean->idPersona,$objbean->idPerfil,$objbean->usuario,$objbean->contrasena);
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
	
	
	public function ModificarUsuario(UsuariosBean $objbean)
    {
		
		 try {

            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();
            $sql = " UPDATE usuarios SET 
						contrasena = ?
						WHERE idUsuario = ? ";

            $stmt = $cnx->prepare($sql);
            $stmt->bind_param('ss', $objbean->contrasena, $objbean->idUsuario);
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
	
	
	public function BorrarUsuario(UsuariosBean $objbean)
    {
	
		 try {

            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();
            $sql = " DELETE from usuarios WHERE idUsuario = ? ";

            $stmt = $cnx->prepare($sql);
            $stmt->bind_param('i', $objbean->idUsuario);
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
	
	
	
	
	
	
		
public function ObtieneDatosPacientePorUsuario(UsuariosBean $objusubean)
    {
        try {

            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();

            $sql = "
					SELECT PAC.idPaciente, 'success'status FROM usuarios U
					INNER JOIN perfil P ON P.idPerfil=U.idPerfil
					INNER JOIN menu_perfil MP ON MP.idPerfil=P.idPerfil AND MP.idPerfil=U.idPerfil
					INNER JOIN menu M ON M.idMenu=MP.idMenu
					INNER JOIN persona PE ON PE.idPersona=U.idPersona
                    INNER JOIN paciente PAC ON PAC.idPersona=PE.idPersona
					WHERE U.estado<>0 AND MP.estado<>0 AND P.estado<>0 AND M.estado<>0
					AND U.usuario=?;";

            $stmt = $cnx->prepare($sql);

            $stmt->bind_param('s', $objusubean->usuario);

            $stmt->execute();
            $estado = 0;
            $response = $stmt->get_result();

            $LISTA = array();

            if (mysqli_num_rows($response) > 0) {

                while ($row = mysqli_fetch_array($response, MYSQLI_ASSOC)) {

                    $LISTA[] = array(

                        'idPaciente' => $row['idPaciente'],
						'status' => $row['status'],
						
                    );
                }
            } else {
                $LISTA[] = array('status' => 'failed','idPaciente' => '');
            }
            $stmt->close();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        return $LISTA;
    }	
}
