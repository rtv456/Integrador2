<?php

include_once dirname( __DIR__ ) . '../entidad/SedeBean.php';
include_once dirname( __DIR__ ) . '../modelo/SedeDao.php';


class SedeControlador
{

	public function ListarSedes()
    {
        try {

			$objsededao = new SedeDao();
	
			$lista = $objsededao->ListarSedes();
            
			
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        return $lista;
    }

}

