<?php session_start(); 
if($_SESSION["login"]!="ok")
{
	$_SESSION["login"]="error";
	header("Location: ../../salir.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema de citas</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Inicio</a>
      </li>
     
    </ul>

   

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     
	  <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <img src="../dist/img/user2.png" class="user-image img-circle elevation-2" alt="User Image">
          <span class="d-none d-md-inline">
		  
		  <?php echo $_SESSION["s_nombre"]; ?>
		  </span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-primary">
            <img src="../dist/img/user2.png" class="img-circle elevation-2" alt="User Image">

            <p>
              <?php echo $_SESSION["s_nombre"]; ?>
              <small>
			  <?php echo $_SESSION["s_perfil"]; ?>
			 
			  </small>
            </p>
          </li>
       
          <!-- Menu Footer-->
          <li class="user-footer">
           
            <a href="../../salir.php" class="btn btn-default btn-flat float-right">Cerrar Sesión</a>
			
          </li>
        </ul>
      </li>
     
    </ul>
  </nav>
  <!-- /.navbar -->


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="../dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Sistema CITAS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
		 
		 <?php
		
		
		include_once dirname( __DIR__ ) . '../../entidad/MenuBean.php';
		include_once dirname( __DIR__ ) . '../../controlador/MenuControlador.php';
				

			$usuario = $_SESSION["s_usuario"];
				
				
            $objmodulobean = new MenuBean();
            $objmodulocontrolador = new MenuControlador();
            $objmodulobean->setUsuario($usuario);
            
			

            $lista = $objmodulocontrolador->ListarModulo($objmodulobean);
			
			if($lista==null)
			{
				echo "Ha ocurrido algun error";
			
				
			}else{
			
				foreach ($lista as $val) {
				
				
				?>
				
			<li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="<?php echo $val['iconModulo']; ?>"></i>
              <p>
                <?php echo $val['modulo']; ?>
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
			
			<?php
			
			$usuario = $_SESSION["s_usuario"];
			$idModulo = $val['idModulo'];;
				
				
            $objmenubean = new MenuBean();
            $objmenucontrolador = new MenuControlador();
            $objmenubean->setUsuario($usuario);
			$objmenubean->setIdModulo($idModulo);
            		

            $menu = $objmenucontrolador->ListarMenu($objmenubean);
			
			if($menu==null)
			{
				echo "Ha ocurrido algun error";
			
				
			}else{
			
				foreach ($menu as $valor) {
				
				?>
				
				
				 <ul class="nav nav-treeview">
				  <li class="nav-item">
					<a href="<?php echo $valor['urlmenu']; ?>" class="nav-link">
					  <i class="far fa-circle nav-icon"></i>
					  <p><?php echo $valor['descripcion']; ?></p>
					</a>
				  </li>
				</ul>
			
			
				
				<?php
				}
			
				
				
			 }
			
			
			?>
			
           
			
			
			
          </li>
		  
			
			<?php				
				}
			
				
				
			 }
		 
		 
		 ?>
		  
		  
		  
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
  
  