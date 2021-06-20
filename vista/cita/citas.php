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
            <h3 class="card-title">Agendar Cita</h3>

          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Sede</label>
				  
                  <select class="form-control select2bs4" name="departamentos" id="departamentos" style="width: 100%;">
                    <option selected="selected">-Seleccione-</option>
                    <?php 
					 $objsedecontrolador = new SedeControlador();
					 $lista = $objsedecontrolador->ListarSedes();
						foreach ($lista as $val) {
						?>
							<option value="<?php echo $val['idSede'] ?>"><?php echo $val['descripcion'] ?></option>
						<?php
							}
					?>
		          </select>
				  
				 				  
                </div>

              </div>
			   <div class="col-md-3">
                <div class="form-group">
                  <label>Especialidad</label>
                 
				  <select class="form-control select2bs4" name="provincias" id="provincias" style="width: 100%;">
				  </select>
				  
                </div>

              </div>
			  
			  	<div class="col-md-3">
                <div class="form-group">
				  <label>Médicos</label>
				  <select class="form-control select2bs4" name="distritos" id="distritos" style="width: 100%;"></select>
				
                </div>

              </div>
			  
			  
			  	<div class="col-md-3">
                <div class="form-group">
				
				<label>Fecha:</label>
				 <div class="input-group">
				  
				  <input type="text" class="form-control datetimepicker-input" id="fecha" name="fecha" autocomplete="off" data-toggle="datetimepicker" data-target="#fecha" />
				  <span class="input-group-btn">
					<button class="btn btn-default" id="btnBuscar" type="button">Buscar cita</button>
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
                <h3 class="card-title">Horarios disponibles</h3>
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
						
						<th class="hide_column">idHhorario</th>
						<th class="hide_column">idMedico</th>
						
                          <th>Sede</th>
                          <th>Especialidad</th>
                          <th>Médico</th>
						  <th>Fecha</th>
						  <th>Hora</th>
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
              <h4 class="modal-title">Confirmar Cita</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
			  
				  
		    <div class="form-group">
                    <label for="exampleInputEmail1">Sede</label>
                   <input type="hidden" id="crud">
									<input type="hidden" id="txtcode">
									<input type="hidden" id="hidHorario">
									<input type="text" class="form-control" id="txtSede" placeholder="Nombre de la especialidad">
            </div>
			
			<div class="form-group">
                    <label for="exampleInputEmail1">Especialidad</label>
                   <input type="hidden" id="crud">
									<input type="hidden" id="hidEspecialidad">
									<input type="text" class="form-control" id="txtEspecialidad" placeholder="Nombre de la especialidad">
            </div>
			<div class="form-group">
                    <label for="exampleInputEmail1">Médico</label>
                   <input type="hidden" id="crud">
									<input type="hidden" id="hidMedico">
									<input type="text" class="form-control" id="txtMedico" placeholder="Nombre de la especialidad">
            </div>
			
			<div class="form-group">
                    <label for="exampleInputEmail1">Paciente</label>
                   <input type="hidden" id="crud">
				
									<input type="hidden" id="hidPaciente" value="<?php echo $_SESSION["s_idPaciente"]; ?>">
									
									<input type="hidden" id="htxtUsuario" value="<?php echo $_SESSION["s_usuario"]; ?>">
									<input type="text" class="form-control" id="txtPaciente" value="<?php echo $_SESSION["s_nombre"]; ?>" placeholder="Nombre de la especialidad">
            </div>
			
			<div class="form-group">
                    <label for="exampleInputEmail1">Fecha / Hora</label>
                   <input type="hidden" id="crud">
									<input type="hidden" id="hfechaHora">
									<input type="text" class="form-control" id="txtFechaHora" placeholder="Nombre de la especialidad">
            </div>
			
			
				
			
			<!--				
				 <div class="form-group">
                    <label for="exampleInputEmail1">Estado</label>
                   <select class="form-control" id="cboestado">
										<option value="1">Activo</option>
										<option value="2">Inactivo</option>
										<option value="0">Anulado</option>
									</select>
            </div>
			-->
				 
					
			  
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary" id="btn-save">Generar Cita</button>
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
		
			
	/*		
$(function () {
    $('#reservationdate').datetimepicker({
       format: 'L'
    });
  })
  */
  
	
	
	
	$("#departamentos").change(function(){
		
		$("#distritos").find('option').remove();
		
	 		var parametros= "id="+$("#departamentos").val();
			
			console.log(parametros);
			
	 		$.ajax({
                data:  parametros,
                url:   '../../controlador/EspecialidadControlador.php',
                type:  'post',
                beforeSend: function () { },
                success:  function (response) {                	
                    $("#provincias").html(response);
					
					console.log(response);
                },
                error:function(){
                	alert("error")
                }
            });
	})

			$("#provincias").change(function(){
	 		var parametros= "idEspecialidad="+$("#provincias").val();
			
			console.log(parametros);
			
			
	 		$.ajax({
                data:  parametros,
                url:   '../../controlador/EspecialidadControlador.php',
                type:  'post',
                beforeSend: function () { },
                success:  function (response) {                	
                    $("#distritos").html(response);
					console.log(response);
                },
                error:function(){
                	alert("error")
                }
            });
		})       

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
				
				
				
				if($("#fecha").val() == ''){
			
					Swal.fire(
						  'Error!',
						  'Porfavor ingrese fecha.',
						  'error'
						)
					return;
				}
				
				
				 var date= $("#fecha").val();
				 var fecha = date.split("/").reverse().join("-");
				 
				 var idMedico=$("#distritos").val();
				
				console.log(fecha+idMedico);
				
				$('#table-especialidad').DataTable({
					
				destroy: true,
				searching: false,
				paging: false,
				"ordering": false,
				
				"language": {
					  "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
					},
				
				"ajax": {
					"url": "../../controlador/CitasControlador.php",
					"type": "POST",
					"data" : {
						method : "list_horario",
						fecha:fecha,
						idMedico:idMedico
						
					},
					error: function (request, textStatus, errorThrown) {
						
						console.log(request);
						//swal(request.responseJSON.message);
					}
				},
				
				"columnDefs": [
						{
							"targets": [ 0 ],
							"visible": false,
							"searchable": false
						},
						{
							"targets": [ 1 ],
							"visible": false,
							"searchable": false
						}
					],
				
				columns: [
					{ "data": "idHorario" },
					{ "data": "idMedico" },
					{ "data": "descSede" },
					{ "data": "descEspecialidad" },
					{ "data": "medico" },
					{ "data": "fechaHoraInicio" },
					{ "data": "fechaHora" },
					{ "data": null, render : function(data,type,row){
						//console.log(data);
						return "<button title='Edit' class='btn btn-edit btn-warning btn-sm'><i class='fa fa-pencil'></i> Selecionar</button>";
					} 		
					},
				]
			
			});
				
			});
			
			

			$("#btn-save").click(function(){
				if($("#txtSede").val() == ''){
					//swal("Please enter name");
					Swal.fire(
						  'Error!',
						  'Porfavor ingrese descripción.',
						  'error'
						)
					return;
				}
				


				if($("#crud").val() == 'N'){
					
					Swal.fire({
					  title: 'Nuevo',
					  text: "Crear nuevo Cita ?",
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
					  text: "Desea agendar su cita ?",
					  icon: 'warning',
					  showCancelButton: true,
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'Si, Quiero agendar!'
					}).then(result => {
						if (result.value) {
						  						  
						  if($("#hidPaciente").val() == ''){
					
							Swal.fire(
								  'Error!',
								  'Perfil no admitido para obtener cita.',
								  'error'
								)
							return;
						}
						
						
						
var cuerpo="Hola:"+$('#txtPaciente').val()+"<br><br> Su cita fue programada con éxito, de acuerdo al siguiente detalle:<br> <br> <table border='1' class=''><tr><td>Sede</td><td>"+$('#txtSede').val()+"</td></tr><tr><td>Especialidad</td><td>"+$('#txtEspecialidad').val()+"</td></tr><tr><td>Médico</td><td>"+$('#txtMedico').val()+"</td></tr><tr><td>Fecha/Hora</td><td>"+$('#txtFechaHora').val()+"</td></tr></table><br> Atentamente, <br><br><br><b>CLINICA LOS OLIVOS</b>";

				
						  generar_cita($("#hidHorario").val(),$("#hidMedico").val(),$("#hidPaciente").val(),$("#txtFechaHora").val(),$("#htxtUsuario").val(),
						  
						  cuerpo,
						  $("#htxtUsuario").val()
											  
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



		$(document).on("click",".btn-edit",function(){
			
			
			var paciente= $("#htxtPaciente").val();
			console.log(paciente);
			
			var current_row = $(this).parents('tr'); 
			if (current_row.hasClass('child')) { 
				current_row = current_row.prev(); 
			}
			var table = $('#table-especialidad').DataTable(); 
			var data = table.row( current_row).data();
			
			console.log(data);
			
			$("#hidHorario").val(data.idHorario);
		
		
			$("#hidMedico").val(data.idMedico);
			
			
			$("#txtSede").val(data.descSede);
			$("#txtEspecialidad").val(data.descEspecialidad);
			$("#txtMedico").val(data.medico);
		
			$("#txtFechaHora").val(data.fechaHoraInicio);
			
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


		
		function generar_cita(ih,im,ip,fe,us,cuer,cor){
			
			showLoadingScreen();
			$("#modal-especialidad").modal("hide");
			
				console.log("dentro");
						  console.log(ih);
						  console.log(im);
						  console.log(ip);
						  console.log(fe);
						  console.log(us);
						  
						  
			let ajax = {
				method: "agendar_cita",
				idHorario : ih,
				idMedico : im,
				idPaciente:ip,
				fechaHoraCita:fe,
				usuarioReg:us,
				cuerpo: cuer,
				correo: cor

			}
			$.ajax({
				url:  "../../controlador/CitasControlador.php",
				type: "POST",
				data: ajax,
				success: function(data, textStatus, jqXHR)
				{
					
					$.unblockUI();
					
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
							 
							  window.location.href = "miscitas.php";
											  
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
					
					$.unblockUI();
					
					
					Swal.fire(
						  'Error!',
						  'Ha ocurrido algún error.',
						  'error'
						)

				}
			});
		}


		
	</script>
	


		