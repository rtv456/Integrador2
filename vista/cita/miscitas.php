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
        <div class="card card-default" id="parametro">
          <div class="card-header">
            <h3 class="card-title">Buscar por Fecha</h3>

          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
			  
			  	<div class="col-md-3">
                <div class="form-group">
				
				<label>Fecha:</label>
				 <div class="input-group">
				  
				  				  
				  <input type="hidden" id="hidPerfil" value="<?php echo $_SESSION["s_idPerfil"]; ?>">
				  <input type="hidden" id="hidPersona" value="<?php echo $_SESSION["s_idPersona"]; ?>">
				  
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
                <h3 class="card-title">Listado de mis Citas</h3>
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
			
			
			
			 <div class="input-group input-group-sm">
			 <input type="hidden" id="hidPersona">
                  <input type="text" id="d_txtcie10" class="form-control">
				  <input type="hidden" id="d_idcie10">
                  <span class="input-group-append">
                    <button type="button" id="buscarModalCie10" class="btn btn-info btn-flat">Seleccionar Diagnóstico</button>
                  </span>
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
	  
	  
	  
	  
	 <div class="modal fade" id="modal-detalleexamenes" data-backdrop="static" style="overflow-y: scroll;" data-keyboard="false">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Registro de Exámes</h4>
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
			  	  
				  
				   <button type="button" id="btn-add" class="btn btn-info float-left"><i class="fas fa-plus"></i> Examenes</button>
			   	
            </div>
			
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
	  
	  
	  
	  
	  <div class="modal fade" id="modal-cie10" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Seleccionar CIE 10</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
			  
			 
				
            </div>
            <div class="modal-body">
			
			
			<div class="input-group input-group-sm">
			 <input type="hidden" id="hidPersona">
                  <input type="text" id="txtcie10buscar" class="form-control">
                  <span class="input-group-append">
                    <button type="button" id="buscarcie10" class="btn btn-info btn-flat">Buscar</button>
                  </span>
                </div>
			
			
				<!--
			   <div class="row">
				<div class="input-group input-group-sm">
                  <input type="text" id="txtBuscarPersona" class="form-control">
                  <span class="input-group-append">
                    <button type="button" id="buscarPersona" class="btn btn-info btn-flat">Buscar</button>
                  </span>
                </div>
				</div>
				-->
				
				<div class="row">
				
				
				<div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
				
				
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
							
					
                    <table id="table-lista-cie10" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
						
				
					
                          <th>Id</th>
						  <th>Descripción</th>
						
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
             
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
	  
	  
	  
	  <div class="modal fade" id="modal-examenes" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Seleccionar Exámenes</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
			  
			 
				
            </div>
            <div class="modal-body">
			
			
			<div class="input-group input-group-sm">
			 <input type="hidden" id="hidPersona">
                  <input type="text" id="txtexamenbuscar" class="form-control">
                  <span class="input-group-append">
                    <button type="button" id="buscarexamen" class="btn btn-info btn-flat">Buscar</button>
                  </span>
                </div>
			
				<div class="row">
				
				
				<div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
				
				
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
							
					
                    <table id="table-lista-examenes" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
						
				
					
                          <th>Id</th>
						  <th>Descripción</th>
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
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
	  
	  





	  
	
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
			
			
					
					 
					
					var validaPerfil=$("#hidPerfil").val();
					
					console.log(validaPerfil);
					
					if(validaPerfil==3)
					{
										
				 $('#parametro').hide();
				 
				 var idPerfil=$("#hidPerfil").val();
				 var idPersona=$("#hidPersona").val();
				
								
					
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
						method : "mis_citas_todo",
						idPerfil:idPerfil,
						idPersona:idPersona
						
						
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
						
						return "<button title='Delete' class='btn btn-hapus  btn-danger btn-sm'><i class='fa fa-remove'></i> Anular</button>";
					} 		
					},
				],
				
				dom: "Blfrtip",
                buttons: [
                    
                  
                ],
                responsive: true
			
			});
						
						
					}else
					{
											
			$('#parametro').show(); 

			$("#btnBuscar").click(function(){
				
				
				if($("#fecha").val().trim() == ''){
			
					Swal.fire(
						  'Error!',
						  'Porfavor ingrese fecha.',
						  'error'
						)
					return;
				}
				
				
				 var date= $("#fecha").val();
				 var fecha = date.split("/").reverse().join("-");
				 
				 var idPerfil=$("#hidPerfil").val();
				 var idPersona=$("#hidPersona").val();
				
				
				
				console.log(fecha+idPersona);
				
					
					
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
						method : "mis_citas",
						idPerfil:idPerfil,
						idPersona:idPersona,
						fecha:fecha
						
						
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
						
						return "<button title='Edit' class='btn btn-atender  btn-warning btn-sm'><i class='fa fa-pencil'></i> Atención</button>  <button title='Edit' class='btn btn-examen  btn-success btn-sm'><i class='fa fa-pencil'></i> Exámenes</button>  <button title='Delete' class='btn btn-hapus  btn-danger btn-sm'><i class='fa fa-remove'></i> Anular</button>";
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
			
			
			}
			
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
						
						
						/*if($resp['status'] == true){
		
							Swal.fire(
						  'Success!',
						  'Success al borrar.',
						  'success'
						)
							let xtable = $('#table-especialidad').DataTable(); 
							xtable.ajax.reload( null, false );
							
						}else{
				
				console.log("elseeeeeeeeeee");
							Swal.fire(
						  'Success!',
						 'No se pudo borrar.',
						  'success'
						)
						}*/
						
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
				
				
			
			
			/*var current_row = $(this).parents('tr'); 
			if (current_row.hasClass('child')) { 
				current_row = current_row.prev(); 
			}
			*/
			/*var table = $('#table-lista-').DataTable(); 
			var data = table.row( current_row).data();
			
			//$("#txtcode").val(data.idProducto);
			//$("#cbocategoria").val(data.idCategoria);
			
			$("#txtcodeProducto").val(data.idProducto);
			
			$("#txtproducto").val(data.descripcion);
			$("#txtproductoSele").val(data.descripcion);
			
			
			$('#txtproducto').prop('disabled', 'disabled');
			$('#txtproductoSele').prop('disabled', 'disabled');
			
			console.log(data.idProducto);
			*/
		
			$("#modal-especialidad").modal("show");
			
			
			
			//$("#buscarPersona").click(function(){
			
				
				//var idProducto= data.idProducto;
				
				/*
				$('#table-lista-persona-').DataTable({
					destroy: true,
					searching: false,
					paging: false,
				
				"language": {
					  "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
					},
				
				"ajax": {
					"url": "../../controlador/ProductosControlador.php",
					"type": "POST",
					"data" : {
						method : "buscar_catalogo",
						idProducto:idProducto
					},
					error: function (request, textStatus, errorThrown) {
					
						console.log(request);
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
						},
						{
							"targets": [ 5 ],
							"visible": false,
							"searchable": false
						}
					],
						
				columns: [
				
					{ "data": "idProducto" },
					{ "data": "idComercio" },
					{ "data": "txtcomercio" },
					{ "data": "precio" },
					{ "data": "stock" },
					{ "data": "estado" },
					{ "data": "txtestado" },
			
				{ "data": null, render : function(data,type,row){
					return "<button title='Edit' class='btn btn-edit btn-warning btn-sm'><i class='fa fa-pencil'></i> Editar</button>";
				} 		},
				]
			
			});
			*/
				
		//});
		
			/*
			setTimeout(function(){ 
				$("#txtnombrecomercial").focus()
			}, 1000);*/

			
			
			
			
			
			
			
			

			$("#btn-save").click(function(){
				if($("#d_relato").val() == ''){
			
					Swal.fire(
						  'Error!',
						  'Porfavor ingrese relato.',
						  'error'
						)
					return;
				}
				
				if($("#d_idcie10").val() == ''){
			
					Swal.fire(
						  'Error!',
						  'Porfavor seleccione diagnóstico.',
						  'error'
						)
					return;
				}
				
				console.log($("#d_idHistoria").val());

				if($("#d_idHistoria").val() == ''){
					
					Swal.fire({
					  title: 'Nuevo',
					  text: "Generar Historia ?",
					  icon: 'warning',
					  showCancelButton: true,
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'Si, Quiero generar!'
					}).then(result => {
						if (result.value) {
																					
						 	console.log($("#d_idcie10").val());
							console.log($("#d_idCita").val());
							console.log($("#d_fecha").val());
							console.log($("#d_edad").val());
							console.log($("#d_relato").val());
							console.log($("#d_indicaciones").val());
							
						  add_accion(
							$("#d_idcie10").val(),
							$("#d_idCita").val(),
							$("#d_fecha").val(),
							$("#d_edad").val(),
							$("#d_relato").val(),
							$("#d_indicaciones").val()
						  
						  );
						  
						 
						  
						} else {
					
						}
					  }
					);
										
					
				}else{
					
					
					Swal.fire({
					  title: 'Editar',
					  text: "Editar historia ?",
					  icon: 'warning',
					  showCancelButton: true,
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'Si, Quiero editar!'
					}).then(result => {
						if (result.value) {
											
							console.log($("#d_idHistoria").val());	
							console.log($("#d_idcie10").val());
							console.log($("#d_relato").val());
							console.log($("#d_indicaciones").val());
							
						  edit_accion(
							$("#d_idHistoria").val(),
							$("#d_idcie10").val(),
							$("#d_relato").val(),
							$("#d_indicaciones").val()
						  );
										  
						} else {
						}
					  }
					);
				}
			});

			
			
			
			
			

		});
		
		
		$("#btn-add").click(function(){
				$("#modal-examenes").modal("show");
				
				$('#table-lista-examenes').dataTable().fnClearTable();
				
				//$("#txtcode").val("");
			
			//$('#departamentos').val("0");
			
			$('#cbocomercio').prop('disabled', false);
			
			//$("#hidPersona").val("");
			//$("#txtUbicacionSeleccionada").val("");
			
			//$("#cbocategoria").val("");
			
			$('#cbocomercio').val("0");
			
			$("#txtprecio").val("");
			$("#txtstock").val("");
			$("#cboestado").val("1");
							
			//$("#txtdescripcion").val("");
										
				//$("#crud").val("N");
				
				console.log($("#txtcodeProducto").val());
				
				//console.log($("#crud").val());
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
			
			/*console.log("Aqui ver idhistoria");
			console.log(data.idHistoria);
			*/
			
			
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
						method : "obtiene_examen",
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
						}
					],
						
				columns: [
				
					{ "data": "idExamenes" },
					{ "data": "examen" },
					{ "data": "idHistoria" },
					{ "data": "estado" },
				
				{ "data": null, render : function(data,type,row){
					return "<button title='Delete' class='btn btn-quitar-examen  btn-danger btn-sm'><i class='fa fa-remove'></i> Quitar</button>";
				} 		},
				]
			
			});
			

		});
		
		
		
		
		
		
			$("#buscarcie10").click(function(){
			
				
				var nombreBuscar= $("#txtcie10buscar").val();
				
				console.log(nombreBuscar);
				
				$('#table-lista-cie10').DataTable({
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
						method : "buscar_cie10",
						nombres:nombreBuscar
					},
					error: function (request, textStatus, errorThrown) {
					
						console.log(request);
					}
				},
								
				columns: [
				
					{ "data": "idDiagnostico" },
					{ "data": "descripcion" },
				{ "data": null, render : function(data,type,row){
					return "<button title='Delete' class='btn btn-seleccion-cie10  btn-danger btn-sm'><i class='fa fa-remove'></i> Seleccionar</button> ";
				} 		},
				]
			
			});
			
				
		});
		
		
		
		//buscar examenes
		
		
		
			$("#buscarexamen").click(function(){
			
				
				var nombreBuscar= $("#txtexamenbuscar").val();
				
				console.log(nombreBuscar);
				
				$('#table-lista-examenes').DataTable({
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
						method : "buscar_examen",
						nombres:nombreBuscar
					},
					error: function (request, textStatus, errorThrown) {
					
						console.log(request);
					}
				},
								
				columns: [
				
					{ "data": "idExamenes" },
					{ "data": "descripcion" },
				{ "data": null, render : function(data,type,row){
					return "<button title='Delete' class='btn btn-seleccion-examen  btn-danger btn-sm'><i class='fa fa-remove'></i> Seleccionar</button> ";
				} 		},
				]
			
			});
			
				
		});
		
		
		
		$(document).on("click",".btn-quitar-examen",function(){
			let current_row = $(this).parents('tr'); 
			if (current_row.hasClass('child')) { 
				current_row = current_row.prev(); 
			}
			let table = $('#table-lista-examen').DataTable(); 
			let data = table.row( current_row).data();
			var idExamenes = data.idExamenes;
			var idHistoria = data.idHistoria;
				
			console.log(idExamenes);				
			console.log(idHistoria);				
			
			Swal.fire({
					  title: 'Borrar',
					  text: "Quitar exámen ?",
					  icon: 'warning',
					  showCancelButton: true,
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'Si, Quiero quitar!'
					}).then(result => {
						if (result.value) {
						  
						   borrar_examenes(
						  idExamenes,
						  idHistoria,
						  );
						  
						} else {
							
						}
					  }
					);
			
			
			
		});
		
			
		});
		
		
		$(document).on("click",".btn-seleccion-cie10",function(){
			
			let current_row = $(this).parents('tr'); 
			if (current_row.hasClass('child')) { 
				current_row = current_row.prev(); 
			}
			let table = $('#table-lista-cie10').DataTable(); 
			let data = table.row( current_row).data();
			let idEspecialidad = data.idUsuario;
						
			
			Swal.fire({
					  title: 'Seleccionar',
					  text: "Seleccionar el diagnóstico ?",
					  icon: 'warning',
					  showCancelButton: true,
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'Si, Quiero Seleccionar!'
					}).then(result => {
						if (result.value) {
						  
						  
						  
						  $("#d_idcie10").val(data.idDiagnostico);
						  $("#d_txtcie10").val(data.descripcion);
						  $("#modal-cie10").modal("hide");
						  
						  
						} else {
							
						}
					  }
					);
			
			
			
		});
		
		//grabar examen
		
		
		$(document).on("click",".btn-seleccion-examen",function(){
			
			if($("#e_idHistoria").val() == ''){
			
					Swal.fire(
						  'Error!',
						  'Porfavor genere la historia clinica.',
						  'error'
						)
					return;
				}
				
			
			
			let current_row = $(this).parents('tr'); 
			if (current_row.hasClass('child')) { 
				current_row = current_row.prev(); 
			}
			let table = $('#table-lista-examenes').DataTable(); 
			let data = table.row( current_row).data();
			
			var idExamenes = data.idExamenes;
			
						
			
			Swal.fire({
					  title: 'Seleccionar',
					  text: "Generar exámen ?",
					  icon: 'warning',
					  showCancelButton: true,
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'Si, Quiero generar!'
					}).then(result => {
						if (result.value) {
						  
						  
						  
						  /*$("#d_idcie10").val(data.idDiagnostico);
						  $("#d_txtcie10").val(data.descripcion);
						  $("#modal-cie10").modal("hide");
						  */
						  add_examenes(
						  idExamenes,
						  $("#e_idHistoria").val(),
						  );
						  
						} else {
							
						}
					  }
					);
			
			
			
		});
		
		
		
		$("#buscarModalCie10").click(function(){
			
			$('#table-lista-cie10').dataTable().fnClearTable();
			
				$("#modal-cie10").modal("show");
				
		});
		
		function add_examenes(par1,par2){
			let ajax = {
				method: "nuevo_examen",
				
					idExamenes: par1,
					idHistoria: par2

			}
			$.ajax({
				url: "../../controlador/HistoriaClinicaControlador.php",
				type: "POST",
				data: ajax,
				success: function(data, textStatus, jqXHR)
				{					
					$resp = JSON.parse(data);
					
					if($resp['status'] == true){
						
						$("#modal-examenes").modal("hide");
						
						let xtable = $('#table-lista-examen').DataTable(); 
						xtable.ajax.reload( null, false );
						
						
						Swal.fire(
						  'Success!',
						  'Examen guardado correctamente.',
						  'success'
						)
						
					}else{
						
						Swal.fire("Error al grabar : "+$resp['message']);
					}
					
				},
				error: function (request, textStatus, errorThrown) {
					
					Swal.fire(request.responseJSON.message);
				}
			});
		}
		
		function borrar_examenes(par1,par2){
			let ajax = {
				method: "borrar_examen",
				
					idExamenes: par1,
					idHistoria: par2

			}
			$.ajax({
				url: "../../controlador/HistoriaClinicaControlador.php",
				type: "POST",
				data: ajax,
				success: function(data, textStatus, jqXHR)
				{					
					$resp = JSON.parse(data);
					
					if($resp['status'] == true){
						
						$("#modal-examenes").modal("hide");
						
						let xtable = $('#table-lista-examen').DataTable(); 
						xtable.ajax.reload( null, false );
						
						
						Swal.fire(
						  'Success!',
						  'Examen borrado correctamente.',
						  'success'
						)
						
					}else{
						
						Swal.fire("Error al grabar : "+$resp['message']);
					}
					
				},
				error: function (request, textStatus, errorThrown) {
					
					Swal.fire(request.responseJSON.message);
				}
			});
		}
		
		
		function add_accion(par1,par2,par3,par4,par5,par6){
			let ajax = {
				method: "nueva_historia",
				
					idDiagnostico: par1,
					idCita: par2,
					fechaAtencion: par3,
					edad: par4,
					relato: par5,
					indicaciones: par6

			}
			$.ajax({
				url: "../../controlador/HistoriaClinicaControlador.php",
				type: "POST",
				data: ajax,
				success: function(data, textStatus, jqXHR)
				{					
					$resp = JSON.parse(data);
					
					if($resp['status'] == true){
						
						$("#modal-especialidad").modal("hide");
						
						let xtable = $('#table-especialidad').DataTable(); 
						xtable.ajax.reload( null, false );
						
						
						Swal.fire(
						  'Success!',
						  'Historia guardado correctamente.',
						  'success'
						)
						
					}else{
						
						Swal.fire("Error al grabar : "+$resp['message']);
					}
					
				},
				error: function (request, textStatus, errorThrown) {
					
					Swal.fire(request.responseJSON.message);
				}
			});
		}
		
		function edit_accion(par1, par2, par3, par4){
			let ajax = {
				method: "editar_historia",
				idHistoria:par1,
				idDiagnostico: par2,
				relato: par3,
				indicaciones: par4

			}
			$.ajax({
				url:  "../../controlador/HistoriaClinicaControlador.php",
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
						  'Historia modificado correctamente.',
						  'success'
						)
						
						let xtable = $('#table-lista').DataTable(); 
						xtable.ajax.reload( null, false );
					}else{
						
						Swal.fire(
						  'Advertencia!',
						  'No se pudo guardar la historia, porque no hubo cambios.',
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
			
			console.log(id);
			
				let ajax = {
					method : "delete_accion",
					idCita : id,
				}
				$.ajax({
					url:"../../controlador/CitasControlador.php",
					type: "POST",
					data: ajax,
					success: function(data, textStatus, jqXHR)
					{
						$resp = JSON.parse(data);
						console.log($resp);
						if($resp['status'] == true){
		
							Swal.fire(
						  'Success!',
						  'Anulado correctamente.',
						  'success'
						)
							let xtable = $('#table-especialidad').DataTable(); 
							xtable.ajax.reload( null, false );
							
						}else{
				
				console.log("elseeeeeeeeeee");
							Swal.fire(
						  'Error!',
						 'La cita ya no puede ser anulada.',
						  'error'
						)
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
		}


		
	</script>