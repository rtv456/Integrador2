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
  
  
  
  
  <!-- Bootstrap -->
   
    <!-- Datatables -->
    
	<!--
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
-->
  
  
  
  
  
  
<style type="text/css">


.hide_column {
       display : none;
}

.modal .modal-dialog { 
        
        min-width:70%;
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
            <h3 class="card-title">Historial del Paciente</h3>

          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                  <label>Paciente:</label>
				  <input type="hidden" id="htxtUsuario" value="<?php echo $_SESSION["s_usuario"]; ?>">
                <input type="text" class="form-control" id="b_paciente" placeholder="">
				  
				 				  
                </div>

              </div>
			  			  
			  	<div class="col-md-4">
                <div class="form-group">
				
				<label>Documento:</label>
				 <div class="input-group">
				   <input type="text" class="form-control" id="b_documento" placeholder="">
				  
				  <span class="input-group-btn">
					<button class="btn btn-default" id="btnBuscar" type="button">Buscar HC</button>
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
                <h3 class="card-title">Listado de Historias</h3>
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
						
					
						
						<th>idCita</th>
						 <th>Sede</th>
                          <th>Especialidad</th>
                          <th>Médico</th>
						  <th>Paciente</th>
						  <th>Fecha</th>
						  <th>Hora</th>
						  <th class="hide_column">Id</th>
						  <th>Acción</th>

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
			








					  
                         
	 <div class="modal fade" id="modal-especialidad" data-backdrop="static" style="overflow-y: scroll;" data-keyboard="false">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Registro de Historia Clínica</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
			
			
			<div class="form-group">
                    <label for="exampleInputEmail1">Paciente</label>
                   <input type="hidden" id="crud">
				   <input type="hidden" id="d_idHistoria">
				   <input type="hidden" id="d_idCita">
									
									<input type="text" class="form-control" id="d_txtpaciente" >
            </div>
			
			<div class="form-group">
                    <label for="exampleInputEmail1">Edad</label>
                   <input type="hidden" id="crud">
									
									<input type="text" class="form-control" id="d_edad" >
            </div>
			
			<div class="form-group">
                    <label for="exampleInputEmail1">Fecha</label>
                   <input type="hidden" id="crud">
									
									<input type="text" class="form-control" id="d_fecha" >
            </div>
			
			<div class="form-group">
                    <label for="exampleInputEmail1">Relato</label>
                 
				   <input type="hidden" id="txtcodeProducto">
				   
									
									
									<textarea class="form-control" rows="2" placeholder="" id="d_relato"  style="margin-top: 0px; margin-bottom: 0px; height: 108px;"></textarea>
			
            </div>
			
			
			
			
			<div class="form-group">
                    <label for="exampleInputEmail1">Indicaciones</label>
                  				
									
									<textarea class="form-control" rows="2" placeholder="" id="d_indicaciones"  style="margin-top: 0px; margin-bottom: 0px; height: 108px;"></textarea>
									
            </div>
			
			
			<div class="form-group">
                    <label for="exampleInputEmail1">Diagnóstico</label>
                    <input type="hidden" id="hidPersona">
                  <input type="text" id="d_txtcie10" class="form-control">
				  <input type="hidden" id="d_idcie10">
									
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
	  
	  
	  
	  
	 <div class="modal fade" id="modal-detalleexamenes" data-backdrop="static" style="overflow-y: scroll;" data-keyboard="false">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Exámenes</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
			
			
			<div class="form-group">
                    <label for="exampleInputEmail1">Paciente</label>
                   <input type="hidden" id="e_idHistoria">
									
									<input type="text" class="form-control" id="e_txtpaciente" >
            </div>
			
			
			
			
		    					
			  
            </div>
            <div class="modal-footer justify-content-between">
              
			  <!--
              <button type="button" class="btn btn-primary" id="btn-save-">Guardar</button>
			  -->
			   		  
            </div>
			
			 <div class="modal-body">
			 
			 
				<div class="row">
				
				
				<div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
				
				
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
							
					
                    <table id="table-lista-examen" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
						
				
						  <th>Id</th>
                          <th>Exámen</th>
						  <th class="hide_column">idHistoria</th>
						  <th class="hide_column">Estado</th>
						  <th class="hide_column">ar</th>
						  <th>Acción</th>
						  

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
				   <button type="button" id="btn-add" class="btn btn-info float-left"><i class="fas fa-plus"></i> Examenes</button>
			   	-->
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
              <h4 class="modal-title">Resultado</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
			  
			 
				
            </div>
            <div class="modal-body">
				<!--		
						<div class="form-group">
                    <label for="exampleInputEmail1">Archivo</label>
                   
									
									<input type="text" class="form-control" id="txtarchivo" >
            </div>
			-->
			
				<div class="row">
				
				
				<div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
				
				
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
							
							<embed id="visor"src="def.pdf" frameborder="0" width="100%" height="500px" class="embed-responsive embed-responsive-4by3">
												
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




<!-- jQuery -->
    
    <!-- Datatables -->
  
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
	
	<!--
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
	-->
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
	
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <!--
	<script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
	-->
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>










<script>


  $(function () {
	          $('#fecha').datetimepicker({
		              format: 'L'
		          });
		    });
		    

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
			
									
			$('#parametro').show(); 

			$("#btnBuscar").click(function(){
				
				
				if(($("#b_paciente").val().trim() == '') & ($("#b_documento").val().trim() == '')){
			
					Swal.fire(
						  'Error!',
						  'Porfavor ingrese al menos un dato.',
						  'error'
						)
					return;
				}
				
				
				var paciente = $("#b_paciente").val();
				var documento = $("#b_documento").val();
						
								
				//console.log(fecha+idPersona);
					
					$('#table-especialidad').DataTable({
					
				destroy: true,
				searching: false,
				paging: false,
				"ordering": false,
				
				"language": {
					  "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
					},
				
				"ajax": {
					"url": "../../controlador/HistoriaClinicaControlador.php",
					"type": "POST",
					"data" : {
						method : "buscar_historial",
						paciente: paciente,
						documento: documento
						
						
					},
					error: function (request, textStatus, errorThrown) {
						
						console.log(request);
						
					}
				},
				
				"columnDefs": [
						{
							"targets": [ 7 ],
							"visible": false,
							"searchable": false
						}
					],
				
				columns: [
					{ "data": "idCita" },
					{ "data": "descSede" },
					{ "data": "descEspecialidad" },
					{ "data": "medico" },
					{ "data": "paciente" },
					{ "data": "fechaHoraCita" },
					{ "data": "fechaHora" },
					{ "data": "idHistoria" },
					
					{ "data": null, render : function(data,type,row){
						
						return "<button title='Edit' class='btn btn-atender  btn-warning btn-sm'><i class='fa fa-pencil'></i> Ver Consulta</button>  <button title='Edit' class='btn btn-examen  btn-success btn-sm'><i class='fa fa-pencil'></i> Ver Exámenes</button>";
					} 		
					},
				],
				
				dom: "Blfrtip",
                buttons: [
                    
                    {
                        extend: "excel",
                        className: "btn-sm"
                    },
                    {
                        extend: "pdfHtml5",
                        className: "btn-sm"
                    },
                    {
                        extend: "print",
                        className: "btn-sm"
                    },
                ],
                responsive: true
			
			});
			
				
			});
			
			
			
			
			$(document).on("click",".btn-hapus",function(){
			let current_row = $(this).parents('tr'); 
			if (current_row.hasClass('child')) { 
				current_row = current_row.prev(); 
			}
			let table = $('#table-especialidad').DataTable(); 
			let data = table.row( current_row).data();
			let idCita = data.idCita;
						
						console.log(idCita);
			
			Swal.fire({
					  title: 'Borrar',
					  text: "Anular cita ?",
					  icon: 'warning',
					  showCancelButton: true,
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'Si, Quiero borrar!'
					}).then(result => {
						if (result.value) {
						  
						  delete_accion(idCita);
						  
						} else {
							
						}
					  }
					);
			
			
			
		});
		
		
		
		
		
		
		
		

		$(document).on("click",".btn-atender",function(){
			
			var current_row = $(this).parents('tr'); 
			if (current_row.hasClass('child')) { 
				current_row = current_row.prev(); 
			}
			
			console.log("aqui examen");
			
			let table = $('#table-especialidad').DataTable(); 
			let data = table.row( current_row).data();
			
			console.log(data.idCita);
			
			var idCita=data.idCita;
			let ajax = {
					method : "obtiene_hc",
					idCita : idCita,
				}
				$.ajax({
					url:"../../controlador/HistoriaClinicaControlador.php",
					type: "POST",
					data: ajax,
					success: function(data, textStatus, jqXHR)
					{
						console.log("Aquiiiiiiiiiiiiii");
						console.log(data);
						
						var respuesta = JSON.parse(data);
						for (var i=0; i< respuesta['data'].length; i++)
						{
							var row = respuesta['data'][i];
							
							
							$("#d_idCita").val(row.idCita);
							$("#d_idHistoria").val(row.idHistoria);
							$("#d_txtpaciente").val(row.paciente);
							$("#d_edad").val(row.edad);
							$("#d_fecha").val(row.fechaAtencion);
							$("#d_relato").val(row.relato);
							$("#d_indicaciones").val(row.indicaciones);
							$("#d_txtcie10").val(row.diagnostico);
							$("#d_idcie10").val(row.idDiagnostico);
							
						}
						
						
					},
					error: function (request, textStatus, errorThrown) {
		
					console.log("errorrrrrrrr");
					
						Swal.fire(
						  'Error!',
						  'Ha ocurrido algún error.',
						  'error'
						)
						
					}
				});
				
				
		
			$("#modal-especialidad").modal("show");
			
				
			
			

		});
					
		
		
		$(document).on("click",".btn-examen",function(){
			
			var current_row = $(this).parents('tr'); 
			if (current_row.hasClass('child')) { 
				current_row = current_row.prev(); 
			}
			
			console.log("aqui examen");
			
			let table = $('#table-especialidad').DataTable(); 
			let data = table.row( current_row).data();
			
			console.log(data.idHistoria);
			
			if(data.idHistoria == null){
			
					Swal.fire(
						  'Error!',
						  'Primeramente debe generar la historia clínica.',
						  'error'
						)
					return;
				}
			
			$("#e_txtpaciente").val(data.paciente);
			$("#e_idHistoria").val(data.idHistoria);
			
			console.log(data.idHistoria);
			
			
			$("#modal-detalleexamenes").modal("show");
			
			
			var idHistoria=data.idHistoria;
			
							
				$('#table-lista-examen').DataTable({
					destroy: true,
					searching: false,
					paging: false,
				
				"language": {
					  "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
					},
				
				"ajax": {
					"url": "../../controlador/HistoriaClinicaControlador.php",
					"type": "POST",
					"data" : {
						method : "buscar_examen_historial",
						idHistoria:idHistoria
					},
					error: function (request, textStatus, errorThrown) {
					
						console.log(request);
					}
				},
						
					"columnDefs": [
						{
							"targets": [ 2 ],
							"visible": false,
							"searchable": false
						},
						{
							"targets": [ 3 ],
							"visible": false,
							"searchable": false
						},
						{
							"targets": [ 4 ],
							"visible": false,
							"searchable": false
						}
					],
						
				columns: [
				
					{ "data": "idExamenes" },
					{ "data": "examen" },
					{ "data": "idHistoria" },
					{ "data": "estado" },
					{ "data": "archivo" },
				
				{ "data": null, render : function(data,type,row){
					return "<button title='Edit' class='btn btn-abrirExamen btn-success btn-sm'><i class='fa fa-pencil'></i> Ver Resultado</button>";
				} 		},
				]
			
			});
			

		});
		
			
		
		//buscar examenes
		
		
		$(document).on("click",".btn-abrirExamen",function(){
			
			var current_row = $(this).parents('tr'); 
			if (current_row.hasClass('child')) { 
				current_row = current_row.prev(); 
			}
			var table = $('#table-lista-examen').DataTable(); 
			var data = table.row( current_row).data();
			
			
			$("#txtarchivo").val(data.archivo);
			
			document.getElementById("visor").src = "../../controlador/upload/"+data.archivo;
			
			
			console.log(data);
			
					
			$("#modal-examen").modal("show");
			

		});
		
					
			
		});
		
		
		//grabar examen
		
		
		
		$("#buscarModalCie10").click(function(){
			
				$("#modal-cie10").modal("show");
				
		});
		

		
	</script>