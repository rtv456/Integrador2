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
		include_once dirname( __DIR__ ) . '../../controlador/PacienteControlador.php';
		
		
			
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

.modal .modal-dialog { 
        
        min-width:50%;
    }
<!--	
modal-examen
-->
</style>
  
  
  
  
   <section class="content-header">
      <div class="container-fluid">
	  
	  <?php 
	  $_SESSION["s_idPaciente"]=null;
								
					 $objusubean=new UsuariosBean();
					 $objpacientecontrolador = new PacienteControlador();
					 
					 $usuario = $_SESSION["s_usuario"];
					 
					 $objusubean->setUsuario($usuario);
					 
					 $lista = $objpacientecontrolador->ObtieneDatosPacientePorUsuario($objusubean);
					 
					if($lista==null)
					{
						 echo "No hay registros";
					 }else
					 {
						
						  foreach ($lista as $val) {
						
							//echo $val['idPaciente'];
							
							$_SESSION["s_idPaciente"] = $val['idPaciente'];
						
							}
					 }
					 				 
						
					?>
					
       
      </div><!-- /.container-fluid -->
    </section>
	
  
    <!-- Main content -->
    <section class="content">
			
		
	<!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Cargar Exámenes</h3>

          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Paciente</label>
				  <input type="hidden" id="htxtUsuario" value="<?php echo $_SESSION["s_usuario"]; ?>">
                <input type="text" class="form-control" id="b_paciente" placeholder="">
				  
				 				  
                </div>

              </div>
			   <div class="col-md-3">
                <div class="form-group">
                  <label>Documento</label>
                 
				 <input type="text" class="form-control" id="b_documento" placeholder="">
				  
                </div>

              </div>
			  
			  	<div class="col-md-3">
                <div class="form-group">
				  <label>Código Cita</label>
				  <input type="text" class="form-control" id="b_cita" placeholder="">
				
                </div>

              </div>
			  
			  
			  	<div class="col-md-3">
                <div class="form-group">
				
				<label>Fecha:</label>
				 <div class="input-group">
				  
				  <input type="text" class="form-control datetimepicker-input" id="fecha" name="fecha" autocomplete="off" data-toggle="datetimepicker" data-target="#fecha" />
				  <span class="input-group-btn">
					<button class="btn btn-default" id="btnBuscar" type="button">Buscar Examen</button>
				  </span>
				</div>
				
			

                </div>

              </div>
			  
            
            </div>
            <!-- /.row -->
			
			<div class="row">
			
			
			
			</div>
			
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
           
          </div>
        </div>
        <!-- /.card -->



<!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Exámenes</h3>
              </div>
			  
              <!-- /.card-header -->
              <div class="card-body p-0">
			  
			  
	<div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
				
				
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
							
					
                    <table id="table-especialidad" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
						
                          <th>idExamenes</th>
                          <th>Examen</th>
                          <th>Cita</th>
						  <th>Documento</th>
						  <th>Paciente</th>
						  <th>Médico</th>
						  <th>Fecha Ate.</th>
						  <th>Estado</th>
						  <th class="hide_column">Estado</th>
						  <th class="hide_column">idH</th>
						  <th class="hide_column">ar</th>
						  <th></th>

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
             
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
			



	 <div class="modal fade" id="modal-especialidad" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Archivo</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
			  
				  
		    <div class="form-group">
                    <label for="exampleInputEmail1">Examen</label>
                   <input type="hidden" id="crud">
									
									<input type="hidden" id="d_idExamenes">
									<input type="hidden" id="d_idHistoria">
									<input type="text" class="form-control" id="c_examen" placeholder="">
            </div>
			
			
			  <div class="form-group">
                    <label for="exampleInputFile">Archivo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="c_archivo">
                        <label class="custom-file-label" for="exampleInputFile">Seleccionar Archivo</label>
                      </div>
                     
                    </div>
                  </div>
				  
						
			
						
				<div class="form-group">
                    <label for="exampleInputEmail1">Estado</label>
                   <select class="form-control" id="cboestado">
										<option value="1">Solicitado</option>
										<option value="2">Cargado</option>
										<option value="0">Anulado</option>
									</select>
            </div>
			
				 
					
			  
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary" id="btn-save">Cargar Archivo</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
	  
	  
	  
	  
	  
	  <div class="modal fade" id="modal-examen" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Examén</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
			  
			 
				
            </div>
            <div class="modal-body">
			
			<!--
			<div class="form-group">
                    <label for="exampleInputEmail1">Archivo</label>
                   <input type="hidden" id="crud">
									
									<input type="hidden" id="ruta">
									
									<input type="text" class="form-control" id="txtarchivo" placeholder="">
            </div>
			-->
			
				<div class="row">
				
				
				<div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
				
				
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
							
							<embed id="visor"src="asdas.pdf" frameborder="0" width="100%" height="400px" class="embed-responsive embed-responsive-4by3">
							
							
							<!--
							<embed src="1.pdf"
                               frameborder="0" width="100%" height="400px">

							<iframe src="1.pdf"></iframe>
							asdsa
							
							<iframe src="../../controlador/upload/1.pdf" frameborder="0" width="100%" height="100px">

							</iframe>
							-->
							
							<!--
							<embed src="../../controlador/upload/1.pdf" frameborder="0" width="100%" height="400px">
							
							
							<iframe src="C:\xampp\htdocs\cita\controlador\1.pdf" width="600" height="780" style="position: absolute;top: 66px;bottom: 0px;right: 0px;width: 100%;border: none;margin: 0;padding: 0;overflow: hidden;z-index: 3;height: 100%;"></iframe>
							-->


					
					
					
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


    <script src="http://malsup.github.io/jquery.blockUI.js" type="text/javascript"></script>
	
	
<script>


  $(function () {
	          $('#fecha').datetimepicker({
		              format: 'L'
		          });
		    });
		
			       

</script>





	<script type="text/javascript">
	
$(document).ready(function(){
	
	$('#datatable-responsive').DataTable();
	
			// function to repair keyboard tab in modal dialog adminlte
			(function (){
				var close = window.swal.close;
				var previousWindowKeyDown = window.onkeydown;
				window.swal.close = function() {
					close();
					window.onkeydown = previousWindowKeyDown;
				};
			})();

			$("#btnBuscar").click(function(){
				
				
				/*
				if($("#fecha").val() == ''){
			
					Swal.fire(
						  'Error!',
						  'Porfavor ingrese fecha.',
						  'error'
						)
					return;
				}*/
				
				
				if(
								(
								$("#b_paciente").val().trim() == ''  &&
								$("#b_documento").val().trim() == ''  &&
								$("#b_cita").val().trim() == ''  &&
								$("#fecha").val().trim() == ''
								)
							  ){
								Swal.fire(
									  'Error!',
									  'Porfavor, al menos ingrese un parametro de búsqueda.',
									  'error'
									)
								return;
							}
				
				
				 var date= $("#fecha").val();
				 //var fecha = date.split("/").reverse().join("-");
				 
						var paciente = $("#b_paciente").val();
						var documento = $("#b_documento").val();
						var cita = $("#b_cita").val();
						var fecha = $("#fecha").val();
				
				//console.log(fecha+idMedico);
				
				$('#table-especialidad').DataTable({
					
				destroy: true,
				searching: false,
				paging: false,
				"ordering": false,
				
				"language": {
					  "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
					},
				
				"ajax": {
					"url": "../../controlador/ExamenesHistoriaClinicaControlador.php",
					"type": "POST",
					"data" : {
						method : "lista_examenes",
						paciente: paciente,
						documento: documento,
						cita:cita,
						fecha:fecha
						
					},
					error: function (request, textStatus, errorThrown) {
						
						console.log(request);
						//swal(request.responseJSON.message);
					}
				},
				
				"columnDefs": [
						{
							"targets": [ 8 ],
							"visible": false,
							"searchable": false
						},
						{
							"targets": [ 9 ],
							"visible": false,
							"searchable": false
						},
						{
							"targets": [ 10 ],
							"visible": false,
							"searchable": false
						}
					],
				
				columns: [
					{ "data": "idExamenes" },
					{ "data": "examen" },
					{ "data": "idCita" },
					{ "data": "documento" },
					{ "data": "paciente" },
					{ "data": "medico" },
					{ "data": "fechaAtencion" },
					{ "data": "txtestado" },
					{ "data": "estado" },
					{ "data": "idHistoria" },
					{ "data": "archivo" },
					{ "data": null, render : function(data,type,row){
						//console.log(data);
						return "<button title='Edit' class='btn btn-edit btn-warning btn-sm'><i class='fa fa-pencil'></i> Cargar Examen</button> <button title='Edit' class='btn btn-abrirExamen btn-success btn-sm'><i class='fa fa-pencil'></i> Resultado</button>";
					} 		
					},
				]
			
			});
				
			});
			
			

			$("#btn-save").click(function(){
				if($("#txtSede").val() == ''){
					
					Swal.fire(
						  'Error!',
						  'Porfavor seleccione archivo.',
						  'error'
						)
					return;
				}
				


				if($("#crud").val() == 'N'){
					
					Swal.fire({
					  title: 'Nuevo',
					  text: "Crear nuevo archivo ?",
					  icon: 'warning',
					  showCancelButton: true,
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'Si, Quiero grabar!'
					}).then(result => {
						if (result.value) {
						  
						  add_especialidad($("#txtdescripcion").val(),$("#cboestado").val());
						  //console.log("entro");
						  
						} else {
						  //console.log("no entro");
						}
					  }
					);
										
					
				}else{
					
					
					Swal.fire({
					  title: 'Guardar',
					  text: "Desea cargar el archivo?",
					  icon: 'warning',
					  showCancelButton: true,
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'Si, Quiero cargar!'
					}).then(result => {
						if (result.value) {
						  		
							var archivo ="hola file archivo";
								
							if($("#c_archivo").val() == ''){
					
							Swal.fire(
								  'Error!',
								  'Seleccione archivo.',
								  'error'
								)
							return;
							}
						
						
						
						generar_cita(
							$("#d_idExamenes").val(),
							$("#d_idHistoria").val(),
							archivo,
							$("#htxtUsuario").val(),
							$("#cboestado").val()
							);
										  
						} else {
						}
					  }
					);
				}
			});
			

			$("#btn-add").click(function(){
				$("#modal-especialidad").modal("show");
				$("#txtSede").val("");
				
				$("#crud").val("N");
			});
		});

		
		
		$(document).on("click",".btn-abrirExamen",function(){
			
			var current_row = $(this).parents('tr'); 
			if (current_row.hasClass('child')) { 
				current_row = current_row.prev(); 
			}
			var table = $('#table-especialidad').DataTable(); 
			var data = table.row( current_row).data();
			
			//var mivisor = document.getElementById("visor").src;
			
			//mivisor.src = "../../controlador/upload/1.pdf";
			
			document.getElementById("visor").src = "../../controlador/upload/"+data.archivo;
			
			//src="../../controlador/upload/1.pdf"
			console.log(data);
				
				//$("#txtarchivo").val(data.archivo);
				
									
			/*$("#d_idExamenes").val(data.idExamenes);
			$("#d_idHistoria").val(data.idHistoria);
			$("#c_examen").val(data.idExamenes);
			$("#cboestado").val(data.estado);*/
					
			$("#modal-examen").modal("show");
			/*setTimeout(function(){ 
				$("#txtdescripcion").focus()
			}, 1000*/

			//$("#crud").val("E");

		});
		

		$(document).on("click",".btn-edit",function(){
			
			
			/*var paciente= $("#htxtPaciente").val();
			console.log(paciente);*/
			
			var current_row = $(this).parents('tr'); 
			if (current_row.hasClass('child')) { 
				current_row = current_row.prev(); 
			}
			var table = $('#table-especialidad').DataTable(); 
			var data = table.row( current_row).data();
			
			console.log(data);
			
									
									
			$("#d_idExamenes").val(data.idExamenes);
			$("#d_idHistoria").val(data.idHistoria);
			$("#c_examen").val(data.idExamenes);
			$("#cboestado").val(data.estado);
			
			/*$("#hidHorario").val(data.idHorario);
		
		
			$("#hidMedico").val(data.idMedico);
			
			
			$("#txtSede").val(data.descSede);
			$("#txtEspecialidad").val(data.descEspecialidad);
			$("#txtMedico").val(data.medico);
		
			$("#txtFechaHora").val(data.fechaHoraInicio);
			*/
			
			$("#modal-especialidad").modal("show");
			setTimeout(function(){ 
				$("#txtdescripcion").focus()
			}, 1000);

			$("#crud").val("E");

		});
		
		
		function showLoadingScreen()
		{
		
			$.blockUI({ 
				message: 'Generando cita... espere',
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


		
		function generar_cita(par1,par2,par3,par4,par5){
			
				//var formData = new FormData($("#YOUR_FORM_ID")[0]);
			
				var file_data = $('#c_archivo').prop('files')[0];   
				var form_data = new FormData();                  
				form_data.append('file', file_data);
				form_data.append("idExamenes", par1);
				form_data.append("idHistoria", par2);
				form_data.append("usuarioRegistra", par4);
				form_data.append("estado", par5);
							
				//alert(form_data);
				console.log(form_data);	
								
				$.ajax({
					url: '../../controlador/cargaControlador.php', // <-- point to server-side PHP script 
					dataType: 'text',  // <-- what to expect back from the PHP script, if anything
					cache: false,
					contentType: false,
					processData: false,
					data: form_data,                         
					type: 'post',
					success: function(php_script_response){
					
					$("#modal-especialidad").modal("hide");
											
						let xtable = $('#table-especialidad').DataTable(); 
						xtable.ajax.reload( null, false );
						
						
					  Swal.fire({
					  title: 'Correcto',
					  text: "Examen guardado correctamente.",
					  icon: 'success',
					  showCancelButton: false,
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'Aceptar'
						}).then(result => {
							if (result.value) {
							 											  
							} else {
								
							}
						  }
						);
						
					}
					,
					error: function (request, textStatus, errorThrown) {
						
						Swal.fire(
							  'Error!',
							  'Ha ocurrido algún error.',
							  'error'
							)

					}
				 });
			
			
	
			
			/*$("#modal-especialidad").modal("hide");
			
				console.log("dentro");
						  console.log(par1);
						  console.log(par2);
						  console.log(par3);
						  console.log(par4);
						  console.log(par5);
						  
						  console.log("Inicia Carga...");
						 //var image =  $("#c_archivo").val();
					
						 
						 //var file_data = $(this).prop('c_archivo')[0];   
						 //var form_data = new FormData();
						 
						 //form_data.append('file', file_data); 
						 
						 //console.log(form_data);
						 //console.log(image);
						 
						 
						var file_data = $('#c_archivo').prop('files')[0];   
						var form_data = new FormData();                  
						form_data.append('file', file_data);
						console.log(form_data);	
						
						  console.log("Fin Carga...");
						  
						  
			let ajax = {
				idExamenes:par1,
				idHistoria:par2,
				archivo:par3,
				usuarioRegistra:par4,
				estado:par5

			}
			
			console.log(ajax);
			
			$.ajax({
				url:  "../../controlador/cargaControlador.php",
				type: "POST",
				data: ajax,
				success: function(data, textStatus, jqXHR)
				{
					
					$resp = JSON.parse(data);
					
					console.log($resp);

					if($resp['status'] == true){
						$("#modal-especialidad").modal("hide");
											
						let xtable = $('#table-especialidad').DataTable(); 
						xtable.ajax.reload( null, false );
						
						
					  Swal.fire({
					  title: 'Correcto',
					  text: "Cita guardado correctamente.",
					  icon: 'success',
					  showCancelButton: false,
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'Aceptar'
						}).then(result => {
							if (result.value) {
							 											  
							} else {
								
							}
						  }
						);
						
						
					}else{
						
						Swal.fire(
						  'Advertencia!',
						  'No se pudo guardar la cita, porque no hubo cambios.',
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
			});*/
			
			
		}


		
	</script>
	