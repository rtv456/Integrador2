<?php

include_once dirname( __DIR__ ) . '../util/ConexionBD.php';
include_once dirname( __DIR__ ) . '../entidad/MenuBean.php';

class MenuDao
{
	
	
	public function ListarModulo(MenuBean $objmenubean)
    {
        try {

            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();

            $sql = "
					SELECT distinct M.idModulo, 
					 MO.descripcion modulo,
					 MO.iconModulo,
					 'success'status	
					 FROM usuarios U
					INNER JOIN perfil P ON P.idPerfil=U.idPerfil
					INNER JOIN menu_perfil MP ON MP.idPerfil=P.idPerfil AND MP.idPerfil=U.idPerfil
					INNER JOIN menu M ON M.idMenu=MP.idMenu
                    INNER JOIN modulo MO ON MO.idModulo=M.idModulo
					WHERE  U.estado<>0 AND MP.estado<>0 AND P.estado<>0 AND M.estado<>0
					AND U.usuario=?;";

            $stmt = $cnx->prepare($sql);

            $stmt->bind_param('s', $objmenubean->usuario);

            $stmt->execute();
            $estado = 0;
            $response = $stmt->get_result();

            $LISTA = array();

            if (mysqli_num_rows($response) > 0) {

                while ($row = mysqli_fetch_array($response, MYSQLI_ASSOC)) {

                    $LISTA[] = array(

                        'idModulo' => $row['idModulo'],
						'modulo' => $row['modulo'],
						'iconModulo' => $row['iconModulo']
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
	
	
	public function ListarMenu(MenuBean $objmenubean)
    {
        try {

            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();

            $sql = "
					
			SELECT M.idMenu, M.descripcion, M.urlmenu, 'success'status FROM usuarios U
			INNER JOIN perfil P ON P.idPerfil=U.idPerfil
			INNER JOIN menu_perfil MP ON MP.idPerfil=P.idPerfil AND MP.idPerfil=U.idPerfil
			INNER JOIN menu M ON M.idMenu=MP.idMenu
			WHERE U.estado<>0 AND MP.estado<>0 AND P.estado<>0 AND M.estado<>0
			AND U.usuario=?
			AND M.idModulo=?;";

            $stmt = $cnx->prepare($sql);

            $stmt->bind_param('ss', $objmenubean->usuario, $objmenubean->idModulo);

			
            $stmt->execute();
            $estado = 0;
            $response = $stmt->get_result();

            $LISTA = array();

            if (mysqli_num_rows($response) > 0) {

                while ($row = mysqli_fetch_array($response, MYSQLI_ASSOC)) {

                    $LISTA[] = array(

                        'idMenu' => $row['idMenu'],
						'descripcion' => $row['descripcion'],
						'urlmenu' => $row['urlmenu']
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
