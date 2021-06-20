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
				
				
				columns: [
					{ "data": "idCita" },
					{ "data": "descSede" },
					{ "data": "descEspecialidad" },
					{ "data": "medico" },
					{ "data": "paciente" },
					{ "data": "fechaHoraCita" },
					{ "data": "fechaHora" },
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
				
				
				columns: [
					{ "data": "idCita" },
					{ "data": "descSede" },
					{ "data": "descEspecialidad" },
					{ "data": "medico" },
					{ "data": "paciente" },
					{ "data": "fechaHoraCita" },
					{ "data": "fechaHora" },
					{ "data": null, render : function(data,type,row){
						
						return "<button title='Delete' class='btn btn-hapus  btn-danger btn-sm'><i class='fa fa-remove'></i> Anular</button>";
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
		
			
		});
		
		
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