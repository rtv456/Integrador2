<?php
session_start();

		// include_once dirname( __DIR__ ) . '/cita/entidad/UsuariosBean.php';
		// include_once dirname( __DIR__ ) . '/cita/controlador/UsuariosControlador.php';

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema Citas  | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="vista/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="vista/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vista/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="vista/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  
  
  
</head>
<body class="hold-transition login-page">
<div class="login-box">

<div class="text-center">
<h1>
CLÍNICA LOS OLIVOS
</h1>

  </div>
  <div class="login-logo">
    <a href="#"><b>Sistema</b>CITAS</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Ingrese sus datos para iniciar sesión</p>

     <form action="controlador/UsuariosControlador.php?op=1" method="POST">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="usuario" required placeholder="Correo">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="contrasena" required placeholder="Contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
				
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Iniciar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      
      <!-- /.social-auth-links -->

	<!--
      <p class="mb-1">
        <a href="recuperar-contrasena.php">Olvide mi contraseña</a>
      </p>
	  -->
      <p class="mb-0">
        <a href="registrarse.php" class="text-center">Registrarme</a>
      </p>
	  
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="vista/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="vista/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="vista/dist/js/adminlte.min.js"></script>

<!-- SweetAlert2 -->
<script src="vista/plugins/sweetalert2/sweetalert2.min.js"></script>




<?php
		
if(isset($_SESSION['login']))
{
		
	if($_SESSION["login"]!=null)
					{
	//echo $_SESSION["login"];
	
				 if($_SESSION["login"]=="ok")
				 {
				 header("Location: vista/inicio/inicio.php");
				 }
	
				if($_SESSION["login"]=="error")
				{
				echo "<script>
					   
							Swal.fire({
								 icon: 'error',
								 title: 'Error',
								 text: '¡Usuario o contraseña incorrecto!',
								 showConfirmButton: true,
								 confirmButtonText:'Aceptar ',
								 closeOnConfirm: false

								 })

							 </script>";
				}
				 
	}

				 
}				
				 
 ?>
				 
				 

<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.swalDefaultSuccess').click(function() {
      Toast.fire({
        icon: 'success',
        title: ''
      })
	  
	 
	  
    });
});

</script>

</body>
</html>
