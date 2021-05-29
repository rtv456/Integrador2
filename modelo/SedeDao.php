<?php

include_once dirname( __DIR__ ) . '../util/ConexionBD.php';
include_once dirname( __DIR__ ) . '../entidad/SedeBean.php';

class SedeDao
{
    public function ListarSedes()
    {

        try {
            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();
            $sql = "SELECT idSede, descripcion, estado from sede WHERE Estado<>0";
            $result = mysqli_query($cnx, $sql);
            $Lista = array();
            while ($fila = mysqli_fetch_assoc($result)) {
                $Lista[] = array(
                    'idSede' => $fila['idSede'],
                    'descripcion' => $fila['descripcion'],
                    'estado' => $fila['estado']
                );
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $Lista;
    }
		
	
}
