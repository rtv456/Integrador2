<?php require_once '../master/header.php'; 
		include_once dirname( __DIR__ ) . '../../entidad/PersonaBean.php';
		include_once dirname( __DIR__ ) . '../../controlador/PersonaControlador.php';
		
		
			include_once dirname( __DIR__ ) . '../../entidad/SedeBean.php';
		include_once dirname( __DIR__ ) . '../../controlador/SedeControlador.php';
		
		include_once dirname( __DIR__ ) . '../../entidad/MedicoBean.php';
		include_once dirname( __DIR__ ) . '../../controlador/MedicoControlador.php';
		
		include_once dirname( __DIR__ ) . '../../entidad/EspecialidadBean.php';
		include_once dirname( __DIR__ ) . '../../controlador/EspecialidadControlador.php';
		
		include_once dirname( __DIR__ ) . '../../entidad/UsuariosBean.php';
		include_once dirname( __DIR__ ) . '../../controlador/UsuarioControlador.php';
		
			
?>

 <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  
   <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  
  
  
  <!-- daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
    <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  
  
  
<style type="text/css">
.hide_column {
       display : none;
}
</style>

  
   <section class="content-header">
      <div class="container-fluid">
       
      </div><!-- /.container-fluid -->
    </section>
	
  
    <!-- Main content -->
    <section class="content">
		
	
	 <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Listado de Usuarios</h3>
              </div>
			  
              <!-- /.card-header -->
              <div class="card-body p-0">
			  
			  
	<div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
				
				
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
							
					
                    <table id="table-lista" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
				
					
                          <th>Id</th>
						  <th class="hide_column">Id</th>
						  <th class="hide_column">Id</th>
						  <th>Perfil</th>
                          <th>Persona</th>
                          <th>Usuario</th>
						  <th class="hide_column">Contraseña</th>
						
						  <th>Controles</th>
						  

                        </tr>
                      </thead>
                     
                    </table>
					
					
                  </div>
                </div>
              </div>
            </div>
                </div>
              </div>
			  

			  
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
			  <button type="button" id="btn-add" class="btn btn-info float-left"><i class="fas fa-plus"></i> Agregar</button>
			  				
			  
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
			
	
	 <div class="modal fade" id="modal-especialidad" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Detalle Usuario</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
			
			
	
			
			  <div class="form-group">
                    <label for="exampleInputEmail1">Perfil</label>
                  <select class="form-control select2bs4" name="departamentos" id="departamentos" style="width: 100%;">
                    <option selected="selected">-Seleccione-</option>
                    <?php 
					
					 $objcontrolador = new UsuarioControlador();
					 $lista = $objcontrolador->ListarPerfil();
						foreach ($lista as $val) {
						?>
							<option value="<?php echo $val['idPerfil'] ?>"><?php echo $val['descripcion'] ?></option>
						<?php
							}
					?>
		          </select>
            </div>
			
			
			
			 <div class="input-group input-group-sm">
			 <input type="hidden" id="hidPersona">
                  <input type="text" id="txtPersonaSeleccionada" class="form-control">
                  <span class="input-group-append">
                    <button type="button" id="buscarModalPersona" class="btn btn-info btn-flat">Seleccionar Persona</button>
                  </span>
                </div>
				
				  
		    <div class="form-group">
                    <label for="exampleInputEmail1">Usuario</label>
                   <input type="hidden" id="crud">
									<input type="hidden" id="txtcode">
									
									<input type="text" maxlength="60" class="form-control" id="txtUsuario" placeholder="">
									
            </div>
			<div class="form-group">
                    <label for="exampleInputEmail1">Contraseña</label>
                   <input type="hidden" id="crud">
									<input type="hidden" id="txtcode">
									
									<input type="password" maxlength="20" class="form-control" id="txtContrasena" placeholder="">
									
            </div>
			
			
			
			
				  
				
			
				 
			
				 
					
			  
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary" id="btn-save">Guardar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
	  
	  
	  
	  
	  <div class="modal fade" id="modal-persona" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Seleccionar Persona</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
			  
			 
				
            </div>
            <div class="modal-body">
			
						<div class="row">
 <div class="input-group input-group-sm">
                  <input type="text" id="txtBuscarPersona" class="form-control">
                  <span class="input-group-append">
                    <button type="button" id="buscarPersona" class="btn btn-info btn-flat">Buscar</button>
                  </span>
                </div>
				
				</div>
				<div class="row">
				
				
				<div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
				
				
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
							
					
                    <table id="table-lista-persona" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
						
				
					
                          <th>Id</th>
						  <th>Persona</th>
						
						  <th>Controles</th>
						  

                        </tr>
                      </thead>
                     
                    </table>
					
					
                  </div>
                </div>
              </div>
            </div>
                </div>
              </div>
			  
				  
				  </div>
		    
								
			  
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			  <!--
              <button type="button" class="btn btn-primary" id="btn-save">Guardar</button>
			  -->
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
	  
	
	
	  </section>
    <!-- /.content -->
	
		<?php require_once '../master/footer.php'; ?>
		
		
<!-- SweetAlert2 -->
<script src="../plugins/sweetalert2/sweetalert2.min.js"></script>


		<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>


<!-- SweetAlert2 -->
<script src="../plugins/sweetalert2/sweetalert2.min.js"></script>




<script src="../plugins/moment/moment.min.js"></script>

<script src="../plugins/moment/locale/es.js"></script>

<!-- date-range-picker -->
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>


<!-- Bootstrap Switch -->
<script src="../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>


		
	
<script>

</script>
	
		
		
		
	<script type="text/javascript">
	
	
	
$(document).ready(function(){
	

			(function (){
				var close = window.swal.close;
				var previousWindowKeyDown = window.onkeydown;
				window.swal.close = function() {
					close();
					window.onkeydown = previousWindowKeyDown;
				};
			})();

			$('#table-lista').DataTable({
				
				"language": {
					  "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
					},
		
				
			"ajax": {
					"url": "../../controlador/UsuarioControlador.php",
					"type": "POST",
					"data" : {
						method : "lista"
					},
					error: function (request, textStatus, errorThrown) {
						
						console.log(request);
					}
				},
				
				"columnDefs": [
						{
							"targets": [ 1 ],
							"visible": false,
							"searchable": false
						},
						{
							"targets": [ 2 ],
							"visible": false,
							"searchable": false
						},
						{
							"targets": [ 6 ],
							"visible": false,
							"searchable": false
						}
					],
				
				columns: [
				
					{ "data": "idUsuario" },
					{ "data": "idPersona" },
					{ "data": "idPerfil" },
					{ "data": "perfil" },
					{ "data": "persona" },
					{ "data": "usuario" },
					{ "data": "contrasena" },
				{ "data": null, render : function(data,type,row){
					return "<button title='Edit' class='btn btn-edit btn-warning btn-sm'><i class='fa fa-pencil'></i> Editar</button>  <button title='Delete' class='btn btn-hapus  btn-danger btn-sm'><i class='fa fa-remove'></i> Anular</button> ";
				} 		},
				]
			
			});
			

			$("#btn-save").click(function(){
				
				/*if($("#txtdescripcion").val() == ''){
			
					Swal.fire(
						  'Error!',
						  'Porfavor ingrese descripción.',
						  'error'
						)
					return;
				}*/
				
				
				
								if(
								(
								$("#departamentos").val() == ''  ||
								$("#txtPersonaSeleccionada").val() == ''  ||
								$("#txtUsuario").val().trim() == ''  ||
								$("#txtContrasena").val().trim() == ''
								)
							  ){
								Swal.fire(
									  'Error!',
									  'Porfavor, complete los campos.',
									  'error'
									)
								return;
							}
							


				if($("#crud").val() == 'N'){
					
					Swal.fire({
					  title: 'Nuevo',
					  text: "Crear nuevo usuario ?",
					  icon: 'warning',
					  showCancelButton: true,
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'Si, Quiero grabar!'
					}).then(result => {
						if (result.value) {
											
											
						 	
						  add_accion(
						  $("#hidPersona").val(),
						    $("#departamentos").val(),
							$("#txtUsuario").val(),
							$("#txtContrasena").val()
						  
						  );
						  
						 
						  
						} else {
					
						}
					  }
					);
										
					
				}else{
					
					
					Swal.fire({
					  title: 'Editar',
					  text: "Editar Usuario ?",
					  icon: 'warning',
					  showCancelButton: true,
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'Si, Quiero grabar!'
					}).then(result => {
						if (result.value) {
							
							
						  
						  edit_accion(
						  
						  $("#txtcode").val(),
						   $("#txtContrasena").val()
						  );
										  
						} else {
						}
					  }
					);
				}
			});

			$("#btn-add").click(function(){
				$("#modal-especialidad").modal("show");
				
				
				$("#txtcode").val("");
			
			$('#departamentos').val("0");
			
			
			
			$("#buscarModalPersona").removeAttr('disabled');
			$("#txtUsuario").removeAttr('disabled');
			
			$("#hidPersona").val("");
			$("#txtPersonaSeleccionada").val("");
			
			$("#txtUsuario").val("");
			$("#txtContrasena").val("");
										
				$("#crud").val("N");
				
				console.log($("#crud").val());
			});
			
			
			
			
			
			$("#buscarPersona").click(function(){
			
				
				var nombreBuscar= $("#txtBuscarPersona").val();
				
				console.log(nombreBuscar);
				
				$('#table-lista-persona').DataTable({
					destroy: true,
    searching: false,
	paging: false,
				
				"language": {
					  "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
					},
				
				"ajax": {
					"url": "../../controlador/PersonaControlador.php",
					"type": "POST",
					"data" : {
						method : "buscar_persona_usuario",
						nombres:nombreBuscar
					},
					error: function (request, textStatus, errorThrown) {
					
						console.log(request);
					}
				},
								
				columns: [
				
					{ "data": "idPersona" },
					{ "data": "nombres" },
				{ "data": null, render : function(data,type,row){
					return "<button title='Delete' class='btn btn-seleccion  btn-danger btn-sm'><i class='fa fa-remove'></i> Seleccionar</button> ";
				} 		},
				]
			
			});
			
				
		});
		
			
		});






		$(document).on("click",".btn-edit",function(){
			var current_row = $(this).parents('tr'); 
			if (current_row.hasClass('child')) { 
				current_row = current_row.prev(); 
			}
			var table = $('#table-lista').DataTable(); 
			var data = table.row( current_row).data();
			
			$("#txtcode").val(data.idUsuario);
			
							
			
			
			$("#hidPersona").val(data.idPersona);
			$("#txtPersonaSeleccionada").val(data.persona);
			
						    $("#departamentos").val(data.idPerfil);
							$("#txtUsuario").val(data.usuario);
							$("#txtContrasena").val(data.contrasena);
							
							$("#txtUsuario").attr('disabled','disabled'); 
							$("#buscarModalPersona").attr('disabled','disabled'); 
							
							
		
			$("#modal-especialidad").modal("show");
			
			setTimeout(function(){ 
				$("#txtUsuario").focus()
			}, 1000);

			$("#crud").val("E");

		});

		$(document).on("click",".btn-hapus",function(){
			
			let current_row = $(this).parents('tr'); 
			if (current_row.hasClass('child')) { 
				current_row = current_row.prev(); 
			}
			let table = $('#table-lista').DataTable(); 
			let data = table.row( current_row).data();
			let idEspecialidad = data.idUsuario;
						
			
			Swal.fire({
					  title: 'Borrar',
					  text: "Borrar usuario?",
					  icon: 'warning',
					  showCancelButton: true,
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'Si, Quiero borrar!'
					}).then(result => {
						if (result.value) {
						  
						  delete_accion(idEspecialidad);
						  
						} else {
							
						}
					  }
					);
			
			
			
		});
		
		
		$(document).on("click",".btn-seleccion",function(){
			
			let current_row = $(this).parents('tr'); 
			if (current_row.hasClass('child')) { 
				current_row = current_row.prev(); 
			}
			let table = $('#table-lista-persona').DataTable(); 
			let data = table.row( current_row).data();
			let idEspecialidad = data.idUsuario;
						
			
			Swal.fire({
					  title: 'Seleccionar',
					  text: "Seleccionar a la persona ?",
					  icon: 'warning',
					  showCancelButton: true,
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'Si, Quiero Seleccionar!'
					}).then(result => {
						if (result.value) {
						  
						  
						  
						  $("#hidPersona").val(data.idPersona);
						  $("#txtPersonaSeleccionada").val(data.nombres);
						  $("#modal-persona").modal("hide");
						  
						  
						} else {
							
						}
					  }
					);
			
			
			
		});
		
		
		
		$("#buscarModalPersona").click(function(){
			
						
						/*var table = $('#table-lista-persona').DataTable();
						table.clear();*/
						
						//$('#table-lista-persona').dataTable().clear();
						$('#table-lista-persona').dataTable().fnClearTable();
						
						
				$("#modal-persona").modal("show");
				
				
				
		});
						

		function add_accion(par1,par2,par3,par4){
			let ajax = {
				method: "nuevo",
				
					idPersona: par1,
					idPerfil: par2,
					usuario: par3,
					contrasena: par4

			}
			$.ajax({
				url: "../../controlador/UsuarioControlador.php",
				type: "POST",
				data: ajax,
				success: function(data, textStatus, jqXHR)
				{	
					console.log(data);
					
					$resp = JSON.parse(data);
					
					if($resp['status'] == true){
						$("#fecha").val("");
						
						$("#txtcode").val("");
						$("#txtcode").focus();
						let xtable = $('#table-lista').DataTable(); 
						xtable.ajax.reload( null, false );
						
						$("#modal-especialidad").modal("hide");
						
						Swal.fire(
						  'Success!',
						  'Usuario guardado correctamente.',
						  'success'
						)
						
					}else{
						
						Swal.fire($resp['message']);
						/*Swal.fire(
						  'Info!',
						  $resp['message'],
						  'info'
						)*/
					}
					
				},
				error: function (request, textStatus, errorThrown) {
					
					Swal.fire(request.responseJSON.message);
				}
			});
		}
		
		function edit_accion(id, par1){
			let ajax = {
				method: "editar",
				idUsuario:id,
				contrasena: par1

			}
			$.ajax({
				url:  "../../controlador/UsuarioControlador.php",
				type: "POST",
				data: ajax,
				success: function(data, textStatus, jqXHR)
				{
					$resp = JSON.parse(data);
					
					console.log($resp);

					if($resp['status'] == true){
						$("#modal-especialidad").modal("hide");
						
						Swal.fire(
						  'Success!',
						  'Usuario modificado correctamente.',
						  'success'
						)
						
						let xtable = $('#table-lista').DataTable(); 
						xtable.ajax.reload( null, false );
					}else{
						
						Swal.fire(
						  'Advertencia!',
						  'No se pudo guardar el usuario, porque no hubo cambios.',
						  'warning'
						)
					}
				},
				error: function (request, textStatus, errorThrown) {
					
					
					Swal.fire(
						  'Error!',
						  'Ha ocurrido algún error.',
						  'error'
						)

				}
			});
		}

		function delete_accion(id){
			
			
			console.log("aquiiiii deeltye"+id);
			
				let ajax = {
					method : "borrar",
					idUsuario : id,
				}
				$.ajax({
					url:"../../controlador/UsuarioControlador.php",
					type: "POST",
					data: ajax,
					success: function(data, textStatus, jqXHR)
					{
						$resp = JSON.parse(data);
						if($resp['status'] == true){
						
							Swal.fire(
						  'Success!',
						  'Usuario borrado correctamente.',
						  'success'
						)
							let xtable = $('#table-lista').DataTable(); 
							xtable.ajax.reload( null, false );
						}else{
							
							Swal.fire(
						  'Success!',
						 'No se pudo borrar el usuario.',
						  'success'
						)
						}
						
					},
					error: function (request, textStatus, errorThrown) {
						
						Swal.fire(
						  'Error!',
						  'Ha ocurrido algún error.',
						  'error'
						)
					}
				});
		}

		
	</script>