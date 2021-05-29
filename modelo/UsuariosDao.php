<?php

require_once '../util/ConexionBD.php';
require_once '../entidad/UsuariosBean.php';

class UsuariosDao
{
    public function ListarUsuarios()
    {
        try {
            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();
            $sql = "
SELECT distinct u.idUsuario, U.usuario, u.idPerfil, u.idPersona, CONCAT(PE.apePaterno,' ',PE.ApeMaterno,' ',PE.nombres) nombre FROM usuarios U
INNER JOIN perfil P ON P.idPerfil=U.idPerfil
INNER JOIN menu_perfil MP ON MP.idPerfil=P.idPerfil AND MP.idPerfil=U.idPerfil
INNER JOIN menu M ON M.idMenu=MP.idMenu
INNER JOIN persona PE ON PE.idPersona=U.idPersona
WHERE U.estado<>0 AND MP.estado<>0 AND P.estado<>0 AND M.estado<>0";
            $result = mysqli_query($cnx, $sql);
            $Lista = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $Lista[] = array(
                    'idUsuario' => $row['idUsuario'],
                    'idPersona' => $row['idPersona'],
                    'idPerfil' => $row['idPerfil'],
                    'usuario' => $row['usuario'],
					'nombre' => $row['nombre']
             
                );
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
			
        return $Lista;
    }

    public function ValidarLogin(UsuariosBean $objusubean)
    {
        try {

            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();

            $sql = "
					SELECT distinct U.usuario, u.idPerfil, u.idPersona, CONCAT(PE.apePaterno,' ',PE.ApeMaterno,' ',PE.nombres)nombre, P.descripcion as perfil FROM usuarios U
					INNER JOIN perfil P ON P.idPerfil=U.idPerfil
					INNER JOIN menu_perfil MP ON MP.idPerfil=P.idPerfil AND MP.idPerfil=U.idPerfil
					INNER JOIN menu M ON M.idMenu=MP.idMenu
					INNER JOIN persona PE ON PE.idPersona=U.idPersona
					WHERE U.estado<>0 AND MP.estado<>0 AND P.estado<>0 AND M.estado<>0
					AND U.usuario=? and U.contrasena=?;";

            $stmt = $cnx->prepare($sql);

            $stmt->bind_param('ss', $objusubean->usuario, $objusubean->contrasena);

            $stmt->execute();
            $estado = 0;
            $response = $stmt->get_result();

            $LISTA = array();

            if (mysqli_num_rows($response) > 0) {

                while ($row = mysqli_fetch_array($response, MYSQLI_ASSOC)) {

                    $LISTA[] = array(

                        'usuario' => $row['usuario'],
						'idPerfil' => $row['idPerfil'],
						'idPersona' => $row['idPersona'],
                        'nombre' => $row['nombre'],
						'perfil' => $row['perfil']
                    );
                }
            } else {
                $LISTA[] = array('estado' => 'failed');
            }
            $stmt->close();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        return $LISTA;
    }
}
