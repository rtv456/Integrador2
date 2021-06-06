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
                <h3 class="card-title">Listado de Horarios</h3>
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
						  <th class="hide_column">Id</th>
                          <th>Sede</th>
                          <th>Especialidad</th>
						  <th>Medico</th>
						  <th>Desde</th>
						  <th>Hasta</th>
						 
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
              <h4 class="modal-title">Detalle Horario</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
			
			
			<div class="row">
			<div class="col-lg-6 col-6">
			
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
                    <label for="exampleInputEmail1">Especialidad</label>
                  <select class="form-control select2bs4" name="provincias" id="provincias" style="width: 100%;">
				  </select>
            </div>
			
			
			
			<div class="form-group">
                    <label for="exampleInputEmail1">Médico</label>
                  <select class="form-control select2bs4" name="distritos" id="distritos" style="width: 100%;"></select>
				
            </div>
				  
		    <div class="form-group">
                    <label for="exampleInputEmail1">Desde</label>
                   <input type="hidden" id="crud">
									<input type="hidden" id="txtcode">
									
									 <input type="text" class="form-control datetimepicker-input" id="fecha" name="fecha" autocomplete="off" data-toggle="datetimepicker" data-target="#fecha" />
									 
									
            </div>
			<div class="form-group">
                    <label for="exampleInputEmail1">Hasta</label>
                   <input type="hidden" id="crud">
									<input type="hidden" id="txtcode">
									
									 <input type="text" class="form-control datetimepicker-input" id="fecha2" name="fecha2" autocomplete="off" data-toggle="datetimepicker" data-target="#fecha2" />
									 
									
            </div>
			
			
			
			</div>
			<div class="col-lg-6 col-6">
			
			
			<div class="row">
			

			</div>
			
			
			
			
			<div class="form-group">
                    <label for="exampleInputEmail1">Lunes</label>
                  <input type="checkbox" name="my-checkbox" id="cbxLunes" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
            </div>
			<div class="form-group">
                    <label for="exampleInputEmail1">Martes</label>
                  <input type="checkbox" name="my-checkbox2" id="cbxMartes" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
            </div>
			
			<div class="form-group">
                    <label for="exampleInputEmail1">Miercoles</label>
                  <input type="checkbox" name="my-checkbox3" id="cbxMiercoles" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
            </div>
			<div class="form-group">
                    <label for="exampleInputEmail1">Jueves</label>
                  <input type="checkbox" name="my-checkbox" id="cbxJueves" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
            </div>
			<div class="form-group">
                    <label for="exampleInputEmail1">Viernes</label>
                  <input type="checkbox" name="my-checkbox" id="cbxViernes" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
            </div>
			<div class="form-group">
                    <label for="exampleInputEmail1">Sábado</label>
                  <input type="checkbox" name="my-checkbox" id="cbxSabado" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
            </div>
			<div class="form-group">
                    <label for="exampleInputEmail1">Domingo</label>
                  <input type="checkbox" name="my-checkbox" id="cbxDomingo" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
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


  $(function () {
	          $('#fecha').datetimepicker({
				  
		           
		          });
				  
				  $('#fecha2').datetimepicker({
		    
		          });
				  
				  
		    });
	
	
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
	
	
	
	 $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });
	
	
	
	
$(document).ready(function(){
	
	
	$('#label-toggle-switch').on('click', function(e, data) {
    $('.label-toggle-switch').bootstrapSwitch('toggleState');
});
$('.label-toggle-switch').on('switchChange', function (e, data) {
    alert(data.value);
});



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
					"url": "../../controlador/HorarioControlador.php",
					"type": "POST",
					"data" : {
						method : "lista"
					},
					error: function (request, textStatus, errorThrown) {
						swal(request.responseJSON.message);
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
							"targets": [ 3 ],
							"visible": false,
							"searchable": false
						}
					],
				
				columns: [
				
					{ "data": "idHorario" },
					{ "data": "idSede" },
					{ "data": "idEspecialidad" },
					{ "data": "idMedico" },
					{ "data": "sede" },
					{ "data": "especialidad" },
					{ "data": "medico" },
					{ "data": "fechaHoraInicio" },
					{ "data": "fechaHoraFin" },
				{ "data": null, render : function(data,type,row){
					return "<button title='Edit' class='btn btn-edit btn-warning btn-sm'><i class='fa fa-pencil'></i> Editar</button>  <button title='Delete' class='btn btn-hapus  btn-danger btn-sm'><i class='fa fa-remove'></i> Anular</button> ";
				} 		},
				]
			
			});
			

			$("#btn-save").click(function(){
				if($("#txtdescripcion").val() == ''){
			
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
					  text: "Crear nuevo horario ?",
					  icon: 'warning',
					  showCancelButton: true,
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'Si, Quiero grabar!'
					}).then(result => {
						if (result.value) {
						  
						  var date= $("#fecha").val();
							var fecha = date.split("/").reverse().join("-");
							var date2= $("#fecha2").val();
							var fecha2 = date2.split("/").reverse().join("-");
							
							var fecha1= $("#fecha").val();
							var fecha2= $("#fecha2").val();
							var fechaInicio = moment(fecha1, 'DD/MM/YYYY HH:mm').format("YYYY-MM-DD HH:mm");
							var fechaFin = moment(fecha2, 'DD/MM/YYYY HH:mm').format("YYYY-MM-DD HH:mm");
							
							console.log(fechaInicio);
							console.log(fechaFin);
							
							var l_cbxLunes="";
							var l_cbxMartes="";
							var l_cbxMiercoles="";
							var l_cbxJueves="";
							var l_cbxViernes="";
							var l_cbxSabado="";
							var l_cbxDomingo="";
							
							/*
							console.log();
							console.log($('#cbxMartes').prop('checked'));
							console.log($('#cbxMiercoles').prop('checked'));
							*/
							
							if($('#cbxLunes').prop('checked')==true){l_cbxLunes="1";}else{l_cbxLunes="0";}
							if($('#cbxMartes').prop('checked')==true){l_cbxMartes="1";}else{l_cbxMartes="0";}
							if($('#cbxMiercoles').prop('checked')==true){l_cbxMiercoles="1";}else{l_cbxMiercoles="0";}
							if($('#cbxJueves').prop('checked')==true){l_cbxJueves="1";}else{l_cbxJueves="0";}
							if($('#cbxViernes').prop('checked')==true){l_cbxViernes="1";}else{l_cbxViernes="0";}
							if($('#cbxSabado').prop('checked')==true){l_cbxSabado="1";}else{l_cbxSabado="0";}
							if($('#cbxDomingo').prop('checked')==true){l_cbxDomingo="1";}else{l_cbxDomingo="0";}
							
							
						  add_accion(
						    $("#distritos").val(),
						    fechaInicio,
							fechaFin,
							l_cbxLunes,
							l_cbxMartes,
							l_cbxMiercoles,
							l_cbxJueves,
							l_cbxViernes,
							l_cbxSabado,
							l_cbxDomingo
						  
						  );
						  
						 
						  
						} else {
					
						}
					  }
					);
										
					
				}else{
					
					
					Swal.fire({
					  title: 'Editar',
					  text: "Editar horario ?",
					  icon: 'warning',
					  showCancelButton: true,
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'Si, Quiero grabar!'
					}).then(result => {
						if (result.value) {
							
							var l_cbxLunes="";
							var l_cbxMartes="";
							var l_cbxMiercoles="";
							var l_cbxJueves="";
							var l_cbxViernes="";
							var l_cbxSabado="";
							var l_cbxDomingo="";
						
							if($('#cbxLunes').prop('checked')==true){l_cbxLunes="1";}else{l_cbxLunes="0";}
							if($('#cbxMartes').prop('checked')==true){l_cbxMartes="1";}else{l_cbxMartes="0";}
							if($('#cbxMiercoles').prop('checked')==true){l_cbxMiercoles="1";}else{l_cbxMiercoles="0";}
							if($('#cbxJueves').prop('checked')==true){l_cbxJueves="1";}else{l_cbxJueves="0";}
							if($('#cbxViernes').prop('checked')==true){l_cbxViernes="1";}else{l_cbxViernes="0";}
							if($('#cbxSabado').prop('checked')==true){l_cbxSabado="1";}else{l_cbxSabado="0";}
							if($('#cbxDomingo').prop('checked')==true){l_cbxDomingo="1";}else{l_cbxDomingo="0";}
							
						  
						  edit_accion(
						  
						  $("#txtcode").val(),
						     l_cbxLunes,
							l_cbxMartes,
							l_cbxMiercoles,
							l_cbxJueves,
							l_cbxViernes,
							l_cbxSabado,
							l_cbxDomingo
						  
						  
						  
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
			
			$("#provincias").find('option').remove();
			$("#distritos").find('option').remove();
			
			$("#fecha").val("");
			$("#fecha2").val("");
			
			$("#cbxLunes").prop('checked', false).change();
			$("#cbxMartes").prop('checked', false).change();
			$("#cbxMiercoles").prop('checked', false).change();
			$("#cbxJueves").prop('checked', false).change();
			$("#cbxViernes").prop('checked', false).change();
			$("#cbxSabado").prop('checked', false).change();
			$("#cbxDomingo").prop('checked', false).change();
			
								
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
			
			$("#txtcode").val(data.idHorario);
			
			
			$("#fecha").val(data.fechaHoraInicio);
			$("#fecha2").val(data.fechaHoraFin);
			$("#cbxLunes").val(data.flgLunes);
			$("#cbxMartes").val(data.flgMartes);
			$("#cbxMiercoles").val(data.flgMiercoles);
			$("#cbxJueves").val(data.flgJueves);
			$("#cbxViernes").val(data.flgViernes);
			$("#cbxSabado").val(data.flgSabado);
			$("#cbxDomingo").val(data.flgDomingo);
			
			
						console.log(data.flgLunes);
						console.log(data.flgMartes);
						console.log(data.flgMiercoles);
						console.log(data.flgJueves);
						console.log(data.flgViernes);
						console.log(data.flgSabado);
						console.log(data.flgDomingo);
						
			if(data.flgLunes=="1"){$('#cbxLunes').prop('checked', true).change();}else{$('#cbxLunes').prop('checked', false).change();}
			if(data.flgMartes=="1"){$('#cbxMartes').prop('checked', true).change();}else{$('#cbxMartes').prop('checked', false).change();}
			if(data.flgMiercoles=="1"){$('#cbxMiercoles').prop('checked', true).change();}else{$('#cbxMiercoles').prop('checked', false).change();}
			if(data.flgJueves=="1"){$('#cbxJueves').prop('checked', true).change();}else{$('#cbxJueves').prop('checked', false).change();}
			if(data.flgViernes=="1"){$('#cbxViernes').prop('checked', true).change();}else{$('#cbxViernes').prop('checked', false).change();}
			if(data.flgSabado=="1"){$('#cbxSabado').prop('checked', true).change();}else{$('#cbxSabado').prop('checked', false).change();}
			if(data.flgDomingo=="1"){$('#cbxDomingo').prop('checked', true).change();}else{$('#cbxDomingo').prop('checked', false).change();}
						
			
			llenaEspecialidad("1",data.idEspecialidad);
			llenaMedicos("1", data.idMedico);
			
			$('#departamentos').val(data.idSede);
			$('#provincias  option[value=""]').prop("selected", true);
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
			let table = $('#table-lista').DataTable(); 
			let data = table.row( current_row).data();
			let idEspecialidad = data.idHorario;
						
			
			Swal.fire({
					  title: 'Borrar',
					  text: "Borrar horario ?",
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
		
		
		
		
		function llenaEspecialidad(id, idActual){
			
			var parametros= "id="+"1";
			
		console.log(parametros);
		console.log("entro a espe==> "+parametros);
		
		$.ajax({
                data:  parametros,
                url:   '../../controlador/EspecialidadControlador.php',
                type:  'post',
                beforeSend: function () { },
                success:  function (response) {
                					
                    $("#provincias").html(response);
					
					$('#provincias').val(idActual);
					
					console.log(response);
                },
                error:function(){
                	alert("error")
                }
            });
			
			
			
		}
		
		
		function llenaMedicos(idEspecialidad, idActual){
			
			var parametros= "idEspecialidad="+"1";
			
			console.log(parametros);
		
		$.ajax({
                data:  parametros,
                url:   '../../controlador/EspecialidadControlador.php',
                type:  'post',
                beforeSend: function () { },
                success:  function (response) {                	
                    $("#distritos").html(response);
					$('#distritos').val(idActual);
					console.log(response);
                },
                error:function(){
                	alert("error")
                }
            });
			
		}
				

		function add_accion(par1,par2,par3,par4,par5,par6,par7,par8,par9,par10){
			let ajax = {
				method: "nuevo",
					idMedico: par1,
					fechaHoraInicio: par2,
					fechaHoraFin: par3,
					flgLunes: par4,
					flgMartes: par5,
					flgMiercoles: par6,
					flgJueves: par7,
					flgViernes: par8,
					flgSabado: par9,
					flgDomingo: par10

			}
			$.ajax({
				url: "../../controlador/HorarioControlador.php",
				type: "POST",
				data: ajax,
				success: function(data, textStatus, jqXHR)
				{					
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
						  'Horario guardado correctamente.',
						  'success'
						)
						
					}else{
						
						Swal.fire("Error al grabar el horario : "+$resp['message']);
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
				idHorario:par1,
				flgLunes: par2,
					flgMartes: par3,
					flgMiercoles: par4,
					flgJueves: par5,
					flgViernes: par6,
					flgSabado: par7,
					flgDomingo: par8

			}
			$.ajax({
				url:  "../../controlador/HorarioControlador.php",
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
						  'Horario modificado correctamente.',
						  'success'
						)
						
						let xtable = $('#table-lista').DataTable(); 
						xtable.ajax.reload( null, false );
					}else{
						
						
						Swal.fire(
						  'Advertencia!',
						  'No se pudo guardar el horario, porque no hubo cambios.',
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
					idHorario : id,
				}
				$.ajax({
					url:"../../controlador/HorarioControlador.php",
					type: "POST",
					data: ajax,
					success: function(data, textStatus, jqXHR)
					{
						$resp = JSON.parse(data);
						if($resp['status'] == true){
						
							Swal.fire(
						  'Success!',
						  'Horario borrado correctamente.',
						  'success'
						)
							let xtable = $('#table-lista').DataTable(); 
							xtable.ajax.reload( null, false );
						}else{
							
							Swal.fire(
						  'Success!',
						 'No se pudo borrar el horario.',
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

