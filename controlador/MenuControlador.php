<?php

include_once dirname( __DIR__ ) . '../entidad/MenuBean.php';
include_once dirname( __DIR__ ) . '../modelo/MenuDao.php';



class MenuControlador
{

	public function ListarModulo(MenuBean $objmenubean)
    {
        try {

			$objmenudao = new MenuDao();
	
			$lista = $objmenudao->ListarModulo($objmenubean);
            
			
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        return $lista;
    }


	public function ListarMenu(MenuBean $objmenubean)
    {
        try {

			$objmenudao = new MenuDao();
	
			$lista = $objmenudao->ListarMenu($objmenubean);
            
			
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        return $lista;
    }



}



				
