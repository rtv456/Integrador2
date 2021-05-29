<?php


include_once dirname( __DIR__ ) . '../entidad/EspecialidadBean.php';
include_once dirname( __DIR__ ) . '../modelo/EspecialidadDao.php';


include_once dirname( __DIR__ ) . '../entidad/MedicoBean.php';
include_once dirname( __DIR__ ) . '../controlador/MedicoControlador.php';
		

if(isset($_POST['id']))
	{
					$objespecialidadbean=new EspecialidadBean();
					 $objespecialidaddao = new EspecialidadDao();
					
					 $idSede = $_POST['id'];
					 
					 $objespecialidadbean->setIdSede($idSede);
					 
					$lista = $objespecialidaddao->ListarEspecialidadPorSede($objespecialidadbean);
			
					$html="";
					if($lista==null)
					{
						 echo "No hay registros";
					 }else
					 {
				
						$html.="<option selected='selected'>-Seleccione-</option>";
						  foreach ($lista as $val) {
						
							$html.="<option value='".$val['idEspecialidad']."'>".$val['descripcion']."</option>";
							
							}
							echo $html;
					 }
					
			
	}
	
	
if(isset($_POST['idEspecialidad']))
	{
					$objmedicobean=new MedicoBean();
					 $objmedicocontrolador = new MedicoControlador();
					 
					 $idEspecialidad = $_POST['idEspecialidad'];
					 
					 $objmedicobean->setIdEspecialidad($idEspecialidad);
					 
					 $lista = $objmedicocontrolador->ListarMedicosPorEspecialidad($objmedicobean);
					 
					$html="";
					if($lista==null)
					{
						 echo "No hay registros";
					 }else
					 {
							echo "<option selected='selected'>-Seleccione-</option>";
						  foreach ($lista as $val) {
							echo"<option value='".$val['idMedico']."'>".$val['nombre']."</option>";
							}
							echo $html;
					 }
					
			
	}
	

class EspecialidadControlador
{


	public function ListarEspecialidadPorSede(EspecialidadBean $objespecialidadbean)
    {
        try {


			$objespecialidaddao = new EspecialidadDao();
			$lista = $objespecialidaddao->ListarEspecialidadPorSede($objespecialidadbean);
            
			
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        return $lista;
    }

}


?>