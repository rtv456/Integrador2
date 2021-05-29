<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema Citas  | Registrarse</title>
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
  
   <!-- SweetAlert2 -->
  <link rel="stylesheet" href="vista/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  
  
  
  
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="index.php"><b>Sistema</b>Citas</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Registrar nuevo paciente</p>
<!--
      <form action="index.html" method="post">
	  -->
	  
	  
	  <div class="" id="registro">
	  <div class="input-group mb-3">
	  <input type="hidden" id="crud">
			<!--
          <input type="number" class="form-control" id="documento" maxlength="4" placeholder="N° Documento">
		  -->
		  
		  <input type="number" class="form-control" id="documento" placeholder="N° Documento" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==11) return false;" />
		  
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
		<div class="input-group mb-3">
          <input type="text" class="form-control" id="paterno" maxlength="50" required placeholder="Ap. Paterno">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
		
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="materno" maxlength="50" required placeholder="Ap. Materno">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
		
		<div class="input-group mb-3">
          <input type="text" class="form-control" id="nombres" maxlength="50" required placeholder="Nombres">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
		
		<div class="input-group mb-3">
          <input type="text" class="form-control" id="fechanacimiento" required placeholder="Fecha Nacimiento" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
		
		<div class="input-group mb-3">
          <select class="form-control" required id="sexo">
										<option value="">-Seleccione-</option>
										<option value="M">Masculino</option>
										<option value="F">Femenino</option>
									</select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
		
        <div class="input-group mb-3">
          <input type="email" class="form-control" maxlength="50" autocomplete="off" required id="correo" placeholder="Correo">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" maxlength="20" required id="contrasena" placeholder="Contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" maxlength="20" required id="rcontrasena" placeholder="Repite Contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
		
						  
		
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <!--
			  <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
			  -->
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="button" id="btn-save" class="btn btn-primary btn-block">Grabar</button>
          </div>
          <!-- /.col -->
        </div>
		
		</div>
		
		
	<!--	
      </form>
-->
	<!--
      <a href="login.html" class="text-center">I already have a membership</a>
	  -->
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="vista/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="vista/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="vista/dist/js/adminlte.min.js"></script>


<!-- SweetAlert2 -->
<script src="vista/plugins/sweetalert2/sweetalert2.min.js"></script>

<!-- jquery-validation -->
<script src="vista/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="vista/plugins/jquery-validation/additional-methods.min.js"></script>


<!-- Select2 -->
<script src="vista/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="vista/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="vista/plugins/moment/moment.min.js"></script>
<script src="vista/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>



    <script src="http://malsup.github.io/jquery.blockUI.js" type="text/javascript"></script>


<script>
  $(function () {
	  
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()
   

  })
</script>



<script type="text/javascript">


document.getElementById('documento').setAttribute('maxlength',8);

	
	
				function IsEmail(email) {
						var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
						return regex.test(email);
					}
					

			$("#btn-save").click(function(){
									  
				   if (IsEmail($("#correo").val())) {
					   						
					}else{
						
					Swal.fire(
						  'Error!',
						  'El correo ingresado no es válido.',
						  'error'
						)
					return;
					
					
					}
									  
				
				if(
					(
					$("#documento").val() == ''  ||
					$("#paterno").val() == ''  ||
					$("#materno").val() == ''  ||
					$("#fechanacimiento").val() == ''  ||
					$("#sexo").val() == ''  ||
					$("#correo").val() == ''  ||
					$("#contrasena").val() == ''  ||
					$("#rcontrasena").val() == '' 
					)
				
				  ){
			
					Swal.fire(
						  'Error!',
						  'Porfavor, complete los campos.',
						  'error'
						)
					return;
				}
				
					
					Swal.fire({
					  title: 'Guardar',
					  text: "Está seguro de registrarse ?",
					  icon: 'warning',
					  showCancelButton: true,
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'Si, Quiero registrarme!'
					}).then(result => {
						if (result.value) {
						  						  
						  if($("#hidPaciente").val() == ''){
					
							Swal.fire(
								  'Error!',
								  'Perfil .',
								  'error'
								)
							return;
						}
						
						var cuerpo = "Hola: "+$('#nombres').val()+"<br><br> Tu cuenta ha sido generado con éxito, de acuerdo al siguiente detalle:<br> <br> <table border='1' class=''><tr><td>Usuario: </td><td>"+$('#correo').val()+"</td></tr><tr><td>Contraseña: </td><td>"+$('#rcontrasena').val()+"</td></tr></table><br> Atentamente, <br><br><br><b>CLINICA LOS OLIVOS</b>";
						
				
						  accion_registro(
									$("#documento").val(),
									$("#paterno").val(),
									$("#materno").val(),
									$("#nombres").val(),
									$("#fechanacimiento").val(),
									$("#sexo").val(),
									$("#correo").val(),
									$("#contrasena").val(),
									$("#rcontrasena").val(),
									cuerpo
									);
						  
						  
										  
						} else {
						}
					  }
					);
				
			});
			
			
		function showLoadingScreen()
		{
			//include block.js for using this
			$.blockUI({ 
				message: 'Procesando... espere',
				css: { 
					border: 'none',
					width: '300px', 
					height: '50px',
					padding: '15px',
					backgroundColor: '#000', 
					'-webkit-border-radius': '10px', 
					'-moz-border-radius': '10px', 
					opacity: .5, 
					color: '#fff',
					theme: true,
					baseZ: 2000
				}       
			}); 
		}
			
			
		function accion_registro(doc,pat,mat,nom,fec,sex,cor,con,rco, cuer){
						
showLoadingScreen();

			let ajax = {
				method: "generar_usuario",
						
									documento:doc,
									paterno:pat,
									materno:mat,
									nombres:nom,
									fechanacimiento:fec,
									sexo:sex,
									correo:cor,
									contrasena:con,
									rcontrasena:rco,
									cuerpo:cuer

			}
			$.ajax({
				url:  "controlador/PersonaControlador.php",
				type: "POST",
				data: ajax,
				success: function(response, textStatus, jqXHR)
				{
					$.unblockUI();
					
					console.log(response);
					
					var resp = JSON.parse(response);
					
					console.log(resp);
					
					if(resp['status'] == true){
				     
					var status = "";
					var message = "";
					
					for (var i=0; i< resp['data'].length; i++)
					{
						var row = resp['data'][i];
						status = (row.status);
						message = (row.message);
					}
													
					console.log(status);	
					console.log(message);

					if(status == 'success'){
						
						$("#registro").hide();
						
						
					  Swal.fire({
					  title: 'Correcto',
					  text: message,
					  icon: 'success',
					  showCancelButton: false,
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'Aceptar'
					}).then(result => {
						if (result.value) {
						 
						  window.location.href = "index.php";
										  
						} else {
							
						}
					  }
					);
						
					}else
					{
						$("#registro").show();
						
						Swal.fire(
						  'Error!',
						  message,
						  'error'
							)
						
					}
						
					}else
					{
						
						Swal.fire(
						  'Error!',
						  resp['message'],
						  'error'
						)
						
					}

					/*if(resp['status'] == true){
						
					$("#registro").hide();
						
						
					  Swal.fire({
					  title: 'Success',
					  text: "Ud se ha registrado correctamente, le hemos enviado correo con los datos de ingreso.",
					  icon: 'success',
					  showCancelButton: false,
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'Aceptar'
					}).then(result => {
						if (result.value) {
						 
						  window.location.href = "index.php";
										  
						} else {
							
						}
					  }
					);
			
					}else{
					
						console.log($resp['message']);
						$("#registro").show();
								Swal.fire(
						  'Advertencia!',
						  $resp['message'],
						  'warning'
						)
					}*/
				},
				error: function (request, textStatus, errorThrown) {
					
					$.unblockUI();
					
					//swal("Error ", request.responseJSON.message, "error");
					
					console.log("erorrrrrrrrrrrrrrrrr");
					
					if(request['status'] == "error"){
							
							Swal.fire(
									  'Advertencia!',
									  'La contraseña no coencide.',
									  'error'
									 )
						 return;
						 
						}
					
					Swal.fire(
						  'Error!',
						  'Ha ocurrido algún error.',
						  'error'
						)

				}
			});
		}
		
		</script>
		
		




</body>
</html>