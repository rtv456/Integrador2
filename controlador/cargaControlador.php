<?php

include_once dirname( __DIR__ ) . '../entidad/HistoriaClinicaBean.php';
include_once dirname( __DIR__ ) . '../modelo/HistoriaClinicaDao.php';

include_once dirname( __DIR__ ) . '../entidad/ExamenesHistoriaClinicaBean.php';
include_once dirname( __DIR__ ) . '../modelo/ExamenesHistoriaClinicaDao.php';



	
	
if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) )
{
	
			/*if ( 0 < $_FILES['file']['error'] ) {
				
			}
			else {
				move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $_FILES['file']['name']);
			}
			*/
			//$hola =  $_REQUEST['ID']; //this will display "value231"
			//var_dump($_FILES['file']);   //this will display the file object

			
			
			 $file = rand(1000,100000)."-".$_FILES['file']['name'];
			 $file_loc = $_FILES['file']['tmp_name'];
			 $file_size = $_FILES['file']['size'];
			 $file_type = $_FILES['file']['type'];
			 $folder="upload/";
			 
			 move_uploaded_file($file_loc,$folder.$file);
   
			
			$idExamenes = $_REQUEST['idExamenes'];;
			$idHistoria = $_REQUEST['idHistoria'];;
			$archivo = $file;
			$usuarioRegistra = $_REQUEST['usuarioRegistra'];;
			$estado = $_REQUEST['estado'];;
			//$otro = $_POST['otro'];
			
			
			//$form_data=$_POST['form_data'];
		
			//echo $valorimagen;

			$objdao = new ExamenesHistoriaClinicaDao();
			
			
			$new = $objdao->CargarExamenesHC($idExamenes,$idHistoria,$archivo,$usuarioRegistra,$estado);
			$retval['status'] = $new[0];
			$retval['message'] = $new[1];
			echo json_encode($retval);
	

}else{
	header("HTTP/1.1 401 Unauthorized");
    exit;
}


