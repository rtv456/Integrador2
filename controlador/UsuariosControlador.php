<?php

session_start();

require_once '../entidad/UsuariosBean.php';
require_once '../modelo/UsuariosDao.php';
 
 

$_SESSION["error_login"]=null;
$op = $_GET['op'];
				
switch ($op) {
    case "1": {
			if (isset($_POST['usuario']))
            $usuario = $_POST['usuario'];
			if (isset($_POST['contrasena']))
            $contrasena = $_POST['contrasena'];
            $objusubean = new UsuariosBean();
            $objusudao = new UsuariosDao();
            $objusubean->setUsuario($usuario);
            $objusubean->setContrasena($contrasena);
		    $lista = $objusudao->ValidarLogin($objusubean);
			if($lista==null)
			{
				$_SESSION["login"] = "error";
				header("Location: ../index.php");
			}else{
				foreach ($lista as $val) {
					
					if($val['estado']=="failed")
					{
						$_SESSION["login"]="error";
						header("Location: ../index.php");
					}else
					{
						$_SESSION["s_usuario"] = $val['usuario'];
						$_SESSION["s_idPerfil"] = $val['idPerfil'];
						$_SESSION["s_idPersona"] = $val['idPersona'];
						$_SESSION["s_nombre"] = $val['nombre'];
						$_SESSION["s_perfil"] = $val['perfil'];
						$_SESSION["login"]="ok";
					}
					
					if($_SESSION["login"]!=null)
					{
						if($_SESSION["login"]=="ok")
						{
							header("Location: ../vista/inicio/inicio.php");
						}else
						{
							$_SESSION["login"]="error";
							header("Location: ../index.php");
						}
						
					}
				}
			
			 }
			
			

            break;
        }
       
    default: {
            break;
        }
}


if($_SERVER['REQUEST_METHOD'] == 'POST'){
			
				
   }



