<?php 
	if (empty($_SESSION['usuario'])) {
		header('Location: ../');
	}

	require_once("model/ubigeo_model.php");
	require_once("model/empresa_model.php");
	require_once("model/cfp_model.php");
	require_once("model/actividad_empresa_model.php");

	$empresa_model = new empresa_model();
	$cfp_model = new cfp_model();
	$ubicacion = new ubigeo_model();
	$actividad_empresa_model = new actividad_empresa_model();

	$datos_empresa = $empresa_model->mostrar_empresa();
	$ubi = $ubicacion->mostrar_ubigeo();
	$cfp = $cfp_model->mostrar_cfp();
	$ae = $actividad_empresa_model->mostrar_actividad_empresa();


 ?>

<center><h2>Empresa</h2></center>

<div style="float: left;">
	
     <button type="button" class="btn btn-success my-2 my-sm-0" data-toggle="modal" data-target=".agregar_empresa">add</button>      
    
</div>

<div style="float: right;">
	<form class="form-inline my-2 my-lg-0" action="empresa" method="POST">
      <input id="buscar" name="buscar" class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
      <button id="buscar_cfp" class="btn btn-outline-primary my-2 my-sm-0" type="submit">Buscar</button>
    </form>
</div><br><br><br>

<?php 
	if (!empty($_POST['buscar'])) {

		$buscar = $_POST['buscar'];

		$datos_empresa_buscar = $empresa_model->buscar_datos_empresa($buscar);

		if (!empty($datos_empresa_buscar)) {
			?>
			<div class="table-responsive">
			<table class="table table-hover">
					<tr>
						<th>RUC</th>
						<th>Razon Social</th>
						<th>Direccion</th>
						<th>Telefono</th>
						<th>Correo</th>
						<th>Representante</th>
						<th>DNI Representante</th>
						<th>Codigo</th>
						<th>Departamento</th>
						<th>Provincia</th>
						<th>Distrito</th>
						<th>Codigo Actividad</th>
						<th>Descripcion Actividad</th>
						<th>Codigo CFP</th>
						<th>Descripcion CFP</th>
						<th>Direccion CFP</th>
						<th>Codigo Ubicacion CFP</th>
						<th>Departamento Ubicacion CFP</th>
						<th>Provincia Ubicacion CFP</th>									
						<th>Distrito Ubicacion CFP</th>
						<th>Accion</th>
					</tr>
			<?php 
			foreach ($datos_empresa_buscar as $value) {
				?>				
					<tr>
						<td style="display: none;" class="datos_empresa_editar"><?php echo $value[0] ?></td>						
						<td class="datos_empresa_editar"><?php echo $value[1] ?></td>
						<td class="datos_empresa_editar"><?php echo $value[2] ?></td>
						<td class="datos_empresa_editar"><?php echo $value[3] ?></td>
						<td class="datos_empresa_editar"><?php echo $value[4] ?></td>
						<td class="datos_empresa_editar"><?php echo $value[5] ?></td>
						<td class="datos_empresa_editar"><?php echo $value[6] ?></td>
						<td class="datos_empresa_editar"><?php echo $value[7] ?></td>

						<td class="datos_empresa_editar"><?php echo $value[9] ?></td>
						<td class="datos_empresa_editar"><?php echo $value[10] ?></td>
						<td class="datos_empresa_editar"><?php echo $value[11] ?></td>
						<td class="datos_empresa_editar"><?php echo $value[12] ?></td>

						<td class="datos_empresa_editar"><?php echo $value[14] ?></td>
						<td class="datos_empresa_editar"><?php echo $value[15] ?></td>

						<td class="datos_empresa_editar"><?php echo $value[17] ?></td>
						<td class="datos_empresa_editar"><?php echo $value[18] ?></td>

						<td class="datos_empresa_editar"><?php echo $value[20] ?></td>
						<td class="datos_empresa_editar"><?php echo $value[21] ?></td>
						<td class="datos_empresa_editar"><?php echo $value[22] ?></td>		
						<td class="datos_empresa_editar"><?php echo $value[23] ?></td>	
						<td class="datos_empresa_editar"><?php echo $value[24] ?></td>	
																					
						<td style="display: none;" class="datos_empresa_editar"><?php echo $value[8] ?></td>
						<td style="display: none;" class="datos_empresa_editar"><?php echo $value[13] ?></td>
						<td style="display: none;" class="datos_empresa_editar"><?php echo $value[14] ?></td>	
						<td style="display: none;" class="datos_empresa_editar"><?php echo $value[16] ?></td>
						<td><button type="button" class="btn btn-primary editar_empresa" data-toggle="modal" data-target=".editar_empresa_modal">e</button></td>
					</tr>
				
				
				<?php 
			}
			?>
			</table>
			</div>
			<?php 
		}
		
		else{
			?>
			<div class="table-responsive">
			<table class="table table-hover">
					<tr>
						<th>RUC</th>
						<th>Razon Social</th>
						<th>Direccion</th>
						<th>Telefono</th>
						<th>Correo</th>
						<th>Representante</th>
						<th>DNI Representante</th>
						<th>Codigo</th>
						<th>Departamento</th>
						<th>Provincia</th>
						<th>Distrito</th>
						<th>Codigo Actividad</th>
						<th>Descripcion Actividad</th>
						<th>Codigo CFP</th>
						<th>Descripcion CFP</th>
						<th>Direccion CFP</th>
						<th>Codigo Ubicacion CFP</th>
						<th>Departamento Ubicacion CFP</th>
						<th>Provincia Ubicacion CFP</th>									
						<th>Distrito Ubicacion CFP</th>
						<th>Accion</th>
					</tr>
				<tr>
					<td class="alert alert-danger" role="alert" colspan="27"><center><h5>No hay datos</h5></center></td>
				</tr>
			</table>
			<div>
			<?php 
		}


	}
	else{

		//$datos_cfp = $cfp_model->mostrar_cfp();

		if (!empty($datos_empresa)) {
			?>
			<div class="table-responsive">
			<table class="table table-hover">
					<tr>
						<th>RUC</th>
						<th>Razon Social</th>
						<th>Direccion</th>
						<th>Telefono</th>
						<th>Correo</th>
						<th>Representante</th>
						<th>DNI Representante</th>
						<th>Codigo</th>
						<th>Departamento</th>
						<th>Provincia</th>
						<th>Distrito</th>
						<th>Codigo Actividad</th>
						<th>Descripcion Actividad</th>
						<th>Codigo CFP</th>
						<th>Descripcion CFP</th>
						<th>Direccion CFP</th>
						<th>Codigo Ubicacion CFP</th>
						<th>Departamento Ubicacion CFP</th>
						<th>Provincia Ubicacion CFP</th>									
						<th>Distrito Ubicacion CFP</th>
						<th>Accion</th>
					</tr>
			<?php 
			foreach ($datos_empresa as $value) {
				?>				
					<tr>
						<td style="display: none;" class="datos_empresa_editar"><?php echo $value[0] ?></td>						
						<td class="datos_empresa_editar"><?php echo $value[1] ?></td>
						<td class="datos_empresa_editar"><?php echo $value[2] ?></td>
						<td class="datos_empresa_editar"><?php echo $value[3] ?></td>
						<td class="datos_empresa_editar"><?php echo $value[4] ?></td>
						<td class="datos_empresa_editar"><?php echo $value[5] ?></td>
						<td class="datos_empresa_editar"><?php echo $value[6] ?></td>
						<td class="datos_empresa_editar"><?php echo $value[7] ?></td>

						<td class="datos_empresa_editar"><?php echo $value[9] ?></td>
						<td class="datos_empresa_editar"><?php echo $value[10] ?></td>
						<td class="datos_empresa_editar"><?php echo $value[11] ?></td>
						<td class="datos_empresa_editar"><?php echo $value[12] ?></td>

						<td class="datos_empresa_editar"><?php echo $value[14] ?></td>
						<td class="datos_empresa_editar"><?php echo $value[15] ?></td>
						<td class="datos_empresa_editar"><?php echo $value[17] ?></td>
						<td class="datos_empresa_editar"><?php echo $value[18] ?></td>
						<td class="datos_empresa_editar"><?php echo $value[20] ?></td>
						<td class="datos_empresa_editar"><?php echo $value[21] ?></td>
						<td class="datos_empresa_editar"><?php echo $value[22] ?></td>		
						<td class="datos_empresa_editar"><?php echo $value[23] ?></td>	
						<td class="datos_empresa_editar"><?php echo $value[24] ?></td>	
																					
						<td style="display: none;" class="datos_empresa_editar"><?php echo $value[8] ?></td>
						<td style="display: none;" class="datos_empresa_editar"><?php echo $value[13] ?></td>							
						<td style="display: none;" class="datos_empresa_editar"><?php echo $value[16] ?></td>
						<td><button type="button" class="btn btn-primary editar_empresa" data-toggle="modal" data-target=".editar_empresa_modal">e</button></td>
					</tr>
				
				<?php 
			}
			?>
			</table>
			</div>
			<?php 
		}
		else{
			?>
			<table class="table table-hover">
					<tr>
						<th>RUC</th>
						<th>Razon Social</th>
						<th>Direccion</th>
						<th>Telefono</th>
						<th>Correo</th>
						<th>Representante</th>
						<th>DNI Representante</th>
						<th>Codigo</th>
						<th>Departamento</th>
						<th>Provincia</th>
						<th>Distrito</th>
						<th>Codigo Actividad</th>
						<th>Descripcion Actividad</th>
						<th>Codigo CFP</th>
						<th>Descripcion CFP</th>
						<th>Direccion CFP</th>
						<th>Codigo Ubicacion CFP</th>
						<th>Departamento Ubicacion CFP</th>
						<th>Provincia Ubicacion CFP</th>									
						<th>Distrito Ubicacion CFP</th>
						<th>Accion</th>
					</tr>
				<tr>
					<td class="alert alert-danger" role="alert" colspan="21"><center><h5>No hay datos</h5></center></td>
				</tr>
			</table>
			<?php 
		}

	}
 ?>

<!--==============================================
=            Modal Formulario Agregar            =
===============================================-->

<div class="modal fade agregar_empresa" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">      
	      <div class="modal-header">
	        <h5 style="text-align: center !important;" class="modal-title">Agregar Empresa</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form id="form_agregar_empresa">
			  <div class="form-group">
			    <label for="ruc">RUC</label>
			    <input type="text" class="form-control" id="ruc" name="ruc" aria-describedby="">			    
			  </div>
			  <div class="form-group">
			    <label for="razon_social">Razon Social</label>
			    <input type="text" class="form-control" id="razon_social" name="razon_social">
			  </div>
			  <div class="form-group">
			    <label for="direccion">Direccion</label>
			    <input type="text" class="form-control" id="direccion" name="direccion">
			  </div>
			  <div class="form-group">
			    <label for="telefono">Telefono</label>
			    <input type="text" class="form-control" id="telefono" name="telefono">
			  </div>
			  <div class="form-group">
			    <label for="correo">Correo</label>
			    <input type="text" class="form-control" id="correo" name="correo">
			  </div>
			  <div class="form-group">
			    <label for="representante">Representante</label>
			    <input type="text" class="form-control" id="representante" name="representante">
			  </div>
			  <div class="form-group">
			    <label for="dni_representante">DNI Representante</label>
			    <input type="text" class="form-control" id="dni_representante" name="dni_representante">
			  </div>
			  <div class="form-group">
			  	  <label>Ubicacion</label><br>		  	  
			  	  <select style="width: 100%;" class="custom-select" name="ubicacion_em" id="ubicacion_em">
			  	  	<?php 
			  	  	foreach ($ubi as $value) {
			  	   ?>				  	
				  	<option value="<?php echo $value['id_ubi'] ?>"><?php echo $value['departamento_ubi']." - ".$value['provincia_ubi']." - ".$value['distrito_ubi']; ?></option>				  	
				  	<?php } ?>
				  </select>
			  </div>
			  <div class="form-group">
			  	  <label>Actividad Empresa</label><br>		  	  
			  	  <select style="width: 100%;" class="custom-select" name="actividad_empresa" id="actividad_empresa">
			  	  	<?php 
			  	  	foreach ($ae as $value) {
			  	   ?>				  	
				  	<option value="<?php echo $value['id_ae'] ?>"><?php echo $value['descripcion_ae'] ?></option>				  	
				  	<?php } ?>
				  </select>
			  </div>			  
			  <div class="form-group">
			  	  <label>CFP</label>			  	  
			  	  <select class="custom-select" name="cfp" id="cfp">
			  	  	<?php 
			  	  	foreach ($cfp as $value) {
			  	   ?>				  	
				  	<option value="<?php echo $value['id_cfp'] ?>"><?php echo $value['descripcion_cfp'] ?></option>				  	
				  	<?php } ?>
				  </select>
			  </div>		  
	      	  </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
		        <button type="submit" class="btn btn-primary">Guardar</button>
		      </div>
	      </form>
    </div>
  </div>
</div>

<!--====  End of Modal Formulario Agregar  ====-->

<!--=============================================
=            Modal Formulario Editar            =
==============================================-->

<div class="modal fade editar_empresa_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
	        <h5 style="text-align: center !important;" class="modal-title">Editar Aprendiz</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	       <form id="form_agregar_empresa">
			  <div class="form-group">
			    <label for="editar_ruc">RUC</label>
			    <input type="text" class="form-control" id="editar_ruc" name="editar_ruc" aria-describedby="">			    
			  </div>
			  <div class="form-group">
			    <label for="editar_razon_social">Razon Social</label>
			    <input type="text" class="form-control" id="editar_razon_social" name="editar_razon_social">
			  </div>
			  <div class="form-group">
			    <label for="editar_direccion">Direccion</label>
			    <input type="text" class="form-control" id="editar_direccion" name="editar_direccion">
			  </div>
			  <div class="form-group">
			    <label for="editar_telefono">Telefono</label>
			    <input type="text" class="form-control" id="editar_telefono" name="editar_telefono">
			  </div>
			  <div class="form-group">
			    <label for="editar_correo">Correo</label>
			    <input type="text" class="form-control" id="editar_correo" name="editar_correo">
			  </div>
			  <div class="form-group">
			    <label for="editar_representante">Representante</label>
			    <input type="text" class="form-control" id="editar_representante" name="editar_representante">
			  </div>
			  <div class="form-group">
			    <label for="editar_dni_representante">DNI Representante</label>
			    <input type="text" class="form-control" id="editar_dni_representante" name="editar_dni_representante">
			  </div>
			  <div class="form-group">
			  	  <label>Ubicacion</label><br>		  	  
			  	  <select style="width: 100%;" class="custom-select" name="editar_ubicacion_em" id="editar_ubicacion_em">
			  	  	<?php 
			  	  	foreach ($ubi as $value) {
			  	   ?>				  	
				  	<option value="<?php echo $value['id_ubi'] ?>"><?php echo $value['departamento_ubi']." - ".$value['provincia_ubi']." - ".$value['distrito_ubi']; ?></option>				  	
				  	<?php } ?>
				  </select>
			  </div>
			  <div class="form-group">
			  	  <label>Actividad Empresa</label><br>		  	  
			  	  <select style="width: 100%;" class="custom-select" name="editar_actividad_empresa" id="editar_actividad_empresa">
			  	  	<?php 
			  	  	foreach ($ae as $value) {
			  	   ?>				  	
				  	<option value="<?php echo $value['id_ae'] ?>"><?php echo $value['descripcion_ae'] ?></option>				  	
				  	<?php } ?>
				  </select>
			  </div>			  
			  <div class="form-group">
			  	  <label>CFP</label>			  	  
			  	  <select class="custom-select" name="editar_cfp" id="editar_cfp">
			  	  	<?php 
			  	  	foreach ($cfp as $value) {
			  	   ?>				  	
				  	<option value="<?php echo $value['id_cfp'] ?>"><?php echo $value['descripcion_cfp'] ?></option>				  	
				  	<?php } ?>
				  </select>
			  </div>		  
	      	  </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
		        <button type="submit" class="btn btn-primary">Guardar</button>
		      </div>
	      </form>
    </div>
  </div>
</div>

<!--====  End of Modal Formulario Editar  ====-->


