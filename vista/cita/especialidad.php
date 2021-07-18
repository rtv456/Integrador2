<?php require_once '../master/header.php'; 
		include_once dirname( __DIR__ ) . '../../entidad/PersonaBean.php';
		include_once dirname( __DIR__ ) . '../../controlador/PersonaControlador.php';
		
		
			include_once dirname( __DIR__ ) . '../../entidad/SedeBean.php';
		include_once dirname( __DIR__ ) . '../../controlador/SedeControlador.php';
			
?>

 <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  
   <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  
  
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
                <h3 class="card-title">Listado de Especialidades</h3>
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
                          <th>Id</th>
						  <th class="hide_column">Id</th>
						  <th>Sede</th>
                          <th>Especialidad</th>
                          <th>Estado</th>
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
              <h4 class="modal-title">Especialidades</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
			
			<div class="form-group">
                    <label for="exampleInputEmail1">Sede</label>
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
				  
				  
		    <div class="form-group">
                    <label for="exampleInputEmail1">Descripcion</label>
                   <input type="hidden" id="crud">
									<input type="hidden" id="txtcode">
									<input type="text" class="form-control" id="txtdescripcion" placeholder="Nombre de la especialidad">
            </div>
				 
				 <div class="form-group">
                    <label for="exampleInputEmail1">Estado</label>
                   <select class="form-control" id="cboestado">
										<option value="1">Activo</option>
										<option value="2">Inactivo</option>
										<option value="0">Anulado</option>
									</select>
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


		
		
	<script type="text/javascript">
	
$(document).ready(function(){
	
	$('#datatable-responsive').DataTable();
	
			(function (){
				var close = window.swal.close;
				var previousWindowKeyDown = window.onkeydown;
				window.swal.close = function() {
					close();
					window.onkeydown = previousWindowKeyDown;
				};
			})();


			$('#table-especialidad').DataTable({
				
				"language": {
					  "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
					},
		
				
			"ajax": {
					"url": "especialidadController.php",
					"type": "POST",
					"data" : {
						method : "list_especialidad"
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
						}
					],
					
				columns: [
				
					{ "data": "idEspecialidad" },
					{ "data": "idSede" },
					{ "data": "sede" },
					{ "data": "descripcion" },
					{ "data": "txtestado" },
				{ "data": null, render : function(data,type,row){
					return "<button title='Edit' class='btn btn-edit btn-warning btn-sm'><i class='fa fa-pencil'></i> Editar</button>  <button title='Delete' class='btn btn-hapus  btn-danger btn-sm'><i class='fa fa-remove'></i> Borrar</button> ";
				} 		},
				]
			
			});
			

			$("#btn-save").click(function(){
				if($("#txtdescripcion").val().trim() == ''){
				
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
					  text: "Crear nuevo especialidad ?",
					  icon: 'warning',
					  showCancelButton: true,
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'Si, Quiero grabar!'
					}).then(result => {
						if (result.value) {
						  
						  add_especialidad($("#departamentos").val(),$("#txtdescripcion").val(),$("#cboestado").val());
						
						  
						} else {
						
						}
					  }
					);
										
					
				}else{
					
					
					Swal.fire({
					  title: 'Editar',
					  text: "Editar especialidad ?",
					  icon: 'warning',
					  showCancelButton: true,
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'Si, Quiero grabar!'
					}).then(result => {
						if (result.value) {
						  
						  edit_especialidad($("#txtcode").val(),$("#txtdescripcion").val(),$("#cboestado").val());
										  
						} else {
						}
					  }
					);
				}
			});

			$("#btn-add").click(function(){
				$("#modal-especialidad").modal("show");
				$("#txtdescripcion").val("");
				$('#departamentos').val("0");
				
				$("#crud").val("N");
			});
		});



		$(document).on("click",".btn-edit",function(){
			var current_row = $(this).parents('tr'); 
			if (current_row.hasClass('child')) { 
				current_row = current_row.prev(); 
			}
			var table = $('#table-especialidad').DataTable(); 
			var data = table.row( current_row).data();
			$("#txtdescripcion").val(data.descripcion);
			$("#txtcode").val(data.idEspecialidad);
			
			$("#departamentos").val(data.idSede);
		
			$("#cboestado").val(data.estado)
			
			$("#modal-especialidad").modal("show");
			setTimeout(function(){ 
				$("#txtdescripcion").focus()
			}, 1000);

			$("#crud").val("E");

		});

		$(document).on("click",".btn-hapus",function(){
			let current_row = $(this).parents('tr'); 
			if (current_row.hasClass('child')) { 
				current_row = current_row.prev(); 
			}
			let table = $('#table-especialidad').DataTable(); 
			let data = table.row( current_row).data();
			let idEspecialidad = data.idEspecialidad;
						
			
			Swal.fire({
					  title: 'Borrar',
					  text: "Borrar especialidad ?",
					  icon: 'warning',
					  showCancelButton: true,
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'Si, Quiero borrar!'
					}).then(result => {
						if (result.value) {
						  
						  delete_especialidad(idEspecialidad);
						  
						} else {
							
						}
					  }
					);
			
			
			
		});

		function add_especialidad(id,nm,ctr){
			let ajax = {
				method: "new_especialidad",
				idSede:id,
				descripcion : nm,
				estado:ctr

			}
			$.ajax({
				url: "especialidadController.php",
				type: "POST",
				data: ajax,
				success: function(data, textStatus, jqXHR)
				{					
					$resp = JSON.parse(data);
					
					if($resp['status'] == true){
						$("#txtdescripcion").val("");
						
						$("#txtcode").val("");
						$("#txtcode").focus();
						let xtable = $('#table-especialidad').DataTable(); 
						xtable.ajax.reload( null, false );
						
						Swal.fire(
						  'Success!',
						  'Especialidad guardado correctamente.',
						  'success'
						)
						
					}else{
						
						Swal.fire("Error al grabar la especialidad : "+$resp['message']);
					}
					
				},
				error: function (request, textStatus, errorThrown) {
					
					Swal.fire(request.responseJSON.message);
				}
			});
		}
		
		function edit_especialidad(id,nm,ctr){
			let ajax = {
				method: "edit_especialidad",
				idEspecialidad :  id,
				descripcion : nm,
				estado:ctr

			}
			$.ajax({
				url:  "especialidadController.php",
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
						  'Especialidad guardado correctamente.',
						  'success'
						)
						
						let xtable = $('#table-especialidad').DataTable(); 
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

		function delete_especialidad(id){
			
			
			console.log("aquiiiii deeltye"+id);
			
				let ajax = {
					method : "delete_especialidad",
					idEspecialidad : id,
				}
				$.ajax({
					url:"especialidadController.php",
					type: "POST",
					data: ajax,
					success: function(data, textStatus, jqXHR)
					{
						$resp = JSON.parse(data);
						if($resp['status'] == true){
						
							Swal.fire(
						  'Success!',
						  'Success save new especialidad.',
						  'success'
						)
							let xtable = $('#table-especialidad').DataTable(); 
							xtable.ajax.reload( null, false );
						}else{
						
							Swal.fire(
						  'Error!',
						 'No se pudo borrar la especialidad.',
						  'error'
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
