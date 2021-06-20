<?php require_once '../master/header.php'; 
		include_once dirname( __DIR__ ) . '../../entidad/PersonaBean.php';
		include_once dirname( __DIR__ ) . '../../controlador/PersonaControlador.php';
		
		
			include_once dirname( __DIR__ ) . '../../entidad/SedeBean.php';
		include_once dirname( __DIR__ ) . '../../controlador/SedeControlador.php';
		
		include_once dirname( __DIR__ ) . '../../entidad/MedicoBean.php';
		include_once dirname( __DIR__ ) . '../../controlador/MedicoControlador.php';
		
		include_once dirname( __DIR__ ) . '../../entidad/EspecialidadBean.php';
		include_once dirname( __DIR__ ) . '../../controlador/EspecialidadControlador.php';
		
			
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
  
  

  
   <section class="content-header">
      <div class="container-fluid">
       
      </div><!-- /.container-fluid -->
    </section>
	
  
    <!-- Main content -->
    <section class="content">
		
	
	 <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Listado de Personas</h3>
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
                          <th>Documento</th>
                          <th>Apellido Paterno</th>
                          <th>Apellido Materno</th>
                          <th>Nombres</th>
                          <th>Fecha Nac.</th>
                          <th>Sexo</th>
                          <th>Correo</th>
						
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
              <h4 class="modal-title">Registro de Personas</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
			
			
			<div class="row">
			<div class="col-lg-6 col-6">
			
			 
			
			<div class="form-group">
			<input type="hidden" id="txtcode">
			<input type="hidden" id="crud">
									
                    <label for="exampleInputEmail1">Documento</label>
                 <input type="number" class="form-control" id="documento" maxlength="11"  required placeholder="N° Documento">
            </div>
			
			
			<div class="form-group">
                    <label for="exampleInputEmail1">Apellido Paterno</label>
                  <input type="text" class="form-control" id="paterno" required placeholder="Ap. Paterno">
            </div>
			
			<div class="form-group">
                    <label for="exampleInputEmail1">Apellido Materno</label>
                  <input type="text" class="form-control" id="materno" required placeholder="Ap. Materno">
            </div>
			
			<div class="form-group">
                    <label for="exampleInputEmail1">Nombres</label>
                  <input type="text" class="form-control" id="nombres" required placeholder="Nombres">
            </div>
						
			</div>
			<div class="col-lg-6 col-6">
						
			
			<div class="form-group">
                    <label for="exampleInputEmail1">Fecha Nacimiento</label>
                   <input type="date" class="form-control" id="fechanacimiento" required placeholder="Fecha Nacimiento" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
            </div>
			
			<div class="form-group">
                    <label for="exampleInputEmail1">Sexo</label>
					 <select class="form-control" required id="sexo">
										<option value="">-Seleccione-</option>
										<option value="M">Masculino</option>
										<option value="F">Femenino</option>
									</select>
                  
            </div>
			
			<div class="form-group">
                    <label for="exampleInputEmail1">Correo</label>
                   <input type="email" class="form-control" autocomplete="off" required id="correo" placeholder="Correo">
            </div>
				
			
			</div>
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
					"url": "../../controlador/PersonaControlador.php",
					"type": "POST",
					"data" : {
						method : "lista"
					},
					error: function (request, textStatus, errorThrown) {
						swal(request.responseJSON.message);
						
					}
				},
				
				
				columns: [
				
					{ "data": "idPersona" },
					{ "data": "documento" },
					{ "data": "apePaterno" },
					{ "data": "apeMaterno" },
					{ "data": "nombres" },
					{ "data": "fechaNacimiento" },
					{ "data": "sexo" },
					{ "data": "correo" },
				{ "data": null, render : function(data,type,row){
					return "<button title='Edit' class='btn btn-edit btn-warning btn-sm'><i class='fa fa-pencil'></i> Editar</button>  <button title='Delete' class='btn btn-hapus  btn-danger btn-sm'><i class='fa fa-remove'></i> Anular</button> ";
				} 		},
				]
			
			});
			



			$("#btn-save").click(function(){
				if($("#txtdescripcion").val() == ''){
			
					Swal.fire(
						  'Error!',
						  'Porfavor ingrese documento.',
						  'error'
						)
					return;
				}
				

				if($("#crud").val() == 'N'){
										
					Swal.fire({
					  title: 'Nuevo',
					  text: "Crear nueva persona ?",
					  icon: 'warning',
					  showCancelButton: true,
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'Si, Quiero grabar!'
					}).then(result => {
						if (result.value) {
						  
						  var date= $("#fechanacimiento").val();
							var fecha = date.split("/").reverse().join("-");
							
														
						  add_accion(
						    $("#documento").val(),
									$("#paterno").val(),
									$("#materno").val(),
									$("#nombres").val(),
									fecha,
									$("#sexo").val(),
									$("#correo").val()
						  
						  );
						  
						 
						  
						} else {
					
						}
					  }
					);
										
					
				}else{
					
					
					console.log("editarrrrrrrrrrrr");
					
					Swal.fire({
					  title: 'Editar',
					  text: "Editar persona ?",
					  icon: 'warning',
					  showCancelButton: true,
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'Si, Quiero grabar!'
					}).then(result => {
						if (result.value) {
							
							
							 var date= $("#fechanacimiento").val();
							var fecha = date.split("/").reverse().join("-");
						  
						  edit_accion(
						  
						  $("#txtcode").val(),
						      $("#documento").val(),
									$("#paterno").val(),
									$("#materno").val(),
									$("#nombres").val(),
									fecha,
									$("#sexo").val(),
									$("#correo").val()
						  
						  
						  
						  );
										  
						} else {
						}
					  }
					);
				}
			});
			
				$("#btn-add").click(function(){
					
					console.log("clci en nuevoooo");
					
				$("#modal-especialidad").modal("show");
								
				$("#txtcode").val("");
						
						
				$("#crud").val("N");
				
				console.log($("#crud").val());
				
			});
		});



		$(document).on("click",".btn-edit",function(){
			var current_row = $(this).parents('tr'); 
			if (current_row.hasClass('child')) { 
				current_row = current_row.prev(); 
			}
			var table = $('#table-lista').DataTable(); 
			var data = table.row( current_row).data();
			
			$("#txtcode").val(data.idPersona);
									
									$("#documento").val(data.documento);
									$("#paterno").val(data.apePaterno);
									$("#materno").val(data.apeMaterno);
									$("#nombres").val(data.nombres);
									$("#fechanacimiento").val(data.fechaNacimiento);
									$("#sexo").val(data.sexo);
									$("#correo").val(data.correo);
									
						
			$("#modal-especialidad").modal("show");
			
			setTimeout(function(){ 
				$("#documento").focus()
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
			let idEspecialidad = data.idPersona;
						
			
			Swal.fire({
					  title: 'Borrar',
					  text: "Borrar registro ?",
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
		

		function add_accion(par2,par3,par4,par5,par6,par7,par8){
			let ajax = {
				method: "nuevo",
					
					documento:par2,
					apePaterno:par3,
					apeMaterno:par4,
					nombres:par5,
					fechaNacimiento:par6,
					sexo:par7,
					correo:par8

			}
			$.ajax({
				url: "../../controlador/PersonaControlador.php",
				type: "POST",
				data: ajax,
				success: function(data, textStatus, jqXHR)
				{					
					$resp = JSON.parse(data);
					
					if($resp['status'] == true){
						
						$("#txtcode").val("");
						$("#txtcode").focus();
						let xtable = $('#table-lista').DataTable(); 
						xtable.ajax.reload( null, false );
						
						$("#modal-especialidad").modal("hide");
						
						Swal.fire(
						  'Success!',
						  'Persona guardado correctamente.',
						  'success'
						)
						
					}else{
						
						Swal.fire("Error al grabar la persona : "+$resp['message']);
					}
					
				},
				error: function (request, textStatus, errorThrown) {
					
					Swal.fire(request.responseJSON.message);
				}
			});
		}
		
		function edit_accion(par1,par2,par3,par4,par5,par6,par7,par8){
			let ajax = {
				method: "editar",
				idPersona:par1,
					documento:par2,
					apePaterno:par3,
					apeMaterno:par4,
					nombres:par5,
					fechaNacimiento:par6,
					sexo:par7,
					correo:par8

			}
			$.ajax({
				url:  "../../controlador/PersonaControlador.php",
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
						  'Persona modificado correctamente.',
						  'success'
						)
						
						let xtable = $('#table-lista').DataTable(); 
						xtable.ajax.reload( null, false );
					}else{
						
						Swal.fire(
						  'Advertencia!',
						  'No se pudo guardar la especialidad, porque no hubo cambios.',
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
					idPersona : id,
				}
				$.ajax({
					url:"../../controlador/PersonaControlador.php",
					type: "POST",
					data: ajax,
					success: function(data, textStatus, jqXHR)
					{
						$resp = JSON.parse(data);
						if($resp['status'] == true){
							
							Swal.fire(
						  'Success!',
						  'Persona borrado correctamente.',
						  'success'
						)
							let xtable = $('#table-lista').DataTable(); 
							xtable.ajax.reload( null, false );
						}else{
							
							Swal.fire(
						  'Success!',
						 'No se pudo borrar la persona.',
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
