<?php 
	if (empty($_SESSION['usuario'])) {
		header('Location: ../');
	}

	require_once("model/ubigeo_model.php");
	require_once("model/aprendiz_model.php");
	require_once("model/cfp_model.php");

	$aprendiz_model = new aprendiz_model();
	$cfp_model = new cfp_model();
	$ubicacion = new ubigeo_model();
	
	$pagin = 1;
		

	$datos_aprendiz = $aprendiz_model->mostrar_aprendiz();
	$cantidad_de_datos = $aprendiz_model->catidad_de_datos();

	
	$cantidad_de_datos;

	$ubi = $ubicacion->mostrar_ubigeo();
	$cfp = $cfp_model->mostrar_cfp();


 ?>
 

<center><h2>Aprendiz</h2></center>

<input type="hidden" name="cantidad_de_datos" id="cantidad_de_datos" value="<?php echo $cantidad_de_datos ?>">

<div style="float: left;">
	
     <button type="button" class="btn btn-success my-2 my-sm-0" data-toggle="modal" data-target=".agregar_aprendiz">Agregar</button>      
    
</div>

<div style="float: right;">
	<form class="form-inline my-2 my-lg-0" action="aprendiz" method="POST">
      <input id="buscar" name="buscar" class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
      <button id="buscar_cfp" class="btn btn-outline-primary my-2 my-sm-0" type="submit">Buscar</button>
    </form>
</div><br><br><br>

<?php 
	if (!empty($_POST['buscar'])) {

		$buscar = $_POST['buscar'];

		$datos_aprendiz_buscar = $aprendiz_model->buscar_datos_aprendi($buscar);

		if (!empty($datos_aprendiz_buscar)) {
			?>
			<div class="table-responsive">
			<table class="table table-hover">
					<tr>
						<th>DNI</th>
						<th>Nombres</th>
						<th>Apellidos</th>
						<th>Telefono</th>						
						<th>Id SENATI</th>
						<th>CFP Descripcion</th>
						<th>Bloque</th>			
						<th>Accion</th>						
					</tr>
			<?php 
			foreach ($datos_aprendiz_buscar as $value) {
				?>				
					<tr>
						<td style="display: none;" class="datos_aprendiz_editar"><?php echo $value[0] ?></td>
						<td class="datos_aprendiz_editar"><?php echo $value[1] ?></td>
						<td class="datos_aprendiz_editar"><?php echo $value[2] ?></td>
						<td class="datos_aprendiz_editar"><?php echo $value[3] ?></td>
						<td class="datos_aprendiz_editar"><?php echo $value[4] ?></td>
						<td class="datos_aprendiz_editar"><?php echo $value[12] ?></td>
						<!-- 
						
						
						<td class="datos_aprendiz_editar"><?php echo $value[6] ?></td>						
						<td class="datos_aprendiz_editar"><?php echo $value[7] ?></td>
						<td class="datos_aprendiz_editar"><?php echo $value[9] ?></td>
						<td class="datos_aprendiz_editar"><?php echo $value[10] ?></td>
						<td class="datos_aprendiz_editar"><?php echo $value[11] ?></td>
						 -->
						<!-- 
						<td class="datos_aprendiz_editar"><?php echo $value[12] ?></td>
						<td class="datos_aprendiz_editar"><?php echo $value[13] ?></td>
						<td class="datos_aprendiz_editar"><?php echo $value[15] ?></td>
						<td class="datos_aprendiz_editar"><?php echo $value[16] ?></td>
						<td class="datos_aprendiz_editar"><?php echo $value[17] ?></td>
						 -->
						
						
						<td class="datos_aprendiz_editar"><?php echo $value[19] ?></td>
						<td class="datos_aprendiz_editar"><?php echo $value[8] ?></td>
						<!-- 
							<td class="datos_aprendiz_editar"><?php echo $value[22] ?></td>
						<td class="datos_aprendiz_editar"><?php echo $value[23] ?></td>
						<td class="datos_aprendiz_editar"><?php echo $value[24] ?></td>
						<td class="datos_aprendiz_editar"><?php echo $value[25] ?></td>
						<td class="datos_aprendiz_editar"><?php echo $value[26] ?></td>
						<td class="datos_aprendiz_editar"><?php echo $value[27] ?></td>
						<td class="datos_aprendiz_editar"><?php echo $value[28] ?></td>
						<td class="datos_aprendiz_editar"><?php echo $value[29] ?></td>
						 -->
																			
						<td><button type="button" class="btn btn-primary editar_aprendiz" data-toggle="modal" data-target=".editar_aprendiz_modal">E</button></td>
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
						<th>DNI</th>
						<th>Nombres</th>
						<th>Apellidos</th>
						<th>Telefono</th>						
						<th>Id SENATI</th>
						<th>CFP Descripcion</th>
						<th>Bloque</th>			
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

		if (!empty($datos_aprendiz)) {
			?>
			<div class="table-responsive">
			<table class="table table-hover">
					<tr>
						<th>DNI</th>
						<th>Nombres</th>
						<th>Apellidos</th>
						<th>Telefono</th>						
						<th>Id SENATI</th>
						<th>CFP Descripcion</th>
						<th>Bloque</th>			
						<th>Accion</th>						
					</tr>
			<?php 
			foreach ($datos_aprendiz as $value) {
				?>				
					<tr>
						<td style="display: none;" class="datos_aprendiz_editar"><?php echo $value[0] ?></td>
						<td class="datos_aprendiz_editar"><?php echo $value[1] ?></td>
						<td class="datos_aprendiz_editar"><?php echo $value[2] ?></td>
						<td class="datos_aprendiz_editar"><?php echo $value[3] ?></td>
						<td class="datos_aprendiz_editar"><?php echo $value[4] ?></td>
						<td class="datos_aprendiz_editar"><?php echo $value[12] ?></td>
						<!-- 
						
						
						<td class="datos_aprendiz_editar"><?php echo $value[6] ?></td>						
						<td class="datos_aprendiz_editar"><?php echo $value[7] ?></td>
						<td class="datos_aprendiz_editar"><?php echo $value[9] ?></td>
						<td class="datos_aprendiz_editar"><?php echo $value[10] ?></td>
						<td class="datos_aprendiz_editar"><?php echo $value[11] ?></td>
						 -->
						<!-- 
						<td class="datos_aprendiz_editar"><?php echo $value[12] ?></td>
						<td class="datos_aprendiz_editar"><?php echo $value[13] ?></td>
						<td class="datos_aprendiz_editar"><?php echo $value[15] ?></td>
						<td class="datos_aprendiz_editar"><?php echo $value[16] ?></td>
						<td class="datos_aprendiz_editar"><?php echo $value[17] ?></td>
						 -->
						
						
						<td class="datos_aprendiz_editar"><?php echo $value[19] ?></td>
						<td class="datos_aprendiz_editar"><?php echo $value[15] ?></td>
						<!-- 
							<td class="datos_aprendiz_editar"><?php echo $value[22] ?></td>
						<td class="datos_aprendiz_editar"><?php echo $value[23] ?></td>
						<td class="datos_aprendiz_editar"><?php echo $value[24] ?></td>
						<td class="datos_aprendiz_editar"><?php echo $value[25] ?></td>
						<td class="datos_aprendiz_editar"><?php echo $value[26] ?></td>
						<td class="datos_aprendiz_editar"><?php echo $value[27] ?></td>
						<td class="datos_aprendiz_editar"><?php echo $value[28] ?></td>
						<td class="datos_aprendiz_editar"><?php echo $value[29] ?></td>
						 -->
																			
						<td><button type="button" class="btn btn-primary editar_aprendiz" data-toggle="modal" data-target=".editar_aprendiz_modal">E</button></td>
					</tr>
				
				<?php 
			}
			?>
			</table>
			</div>			

			<ul class="pagination" style="float: left;">
				<li class="page-item"><button id="a_pagina" class="page-link a_pagina">Anterior</button></li>
			</ul>

			<nav aria-label="Page navigation example" style="width: 84%;float: left;">
				<div class="table-responsive">
				  <ul class="pagination">							  	     
				    <?php for ($i=1; $i < $cantidad_de_datos; $i++) { 

				     ?>				     
				    <li class="page-item"><button class="page-link pagina" value="<?php echo $i; ?>"><?php echo $i; ?></button></li>
				    
				    <?php } ?>				    		   
			 	</ul>
			  </div>
			</nav>	

			<ul class="pagination" style="float: right;">
				<li class="page-item"><button id="s_pagina" class="page-link s_pagina">Siguiente</button></li>
			</ul>		
			<?php 
		}
		else{
			?>
			<table class="table table-hover">
					<tr>
						<th>DNI</th>
						<th>Nombres</th>
						<th>Apellidos</th>
						<th>Telefono</th>						
						<th>Id SENATI</th>
						<th>CFP Descripcion</th>
						<th>Bloque</th>			
						<th>Accion</th>						
					</tr>
				<tr>
					<td class="alert alert-danger" role="alert" colspan="7"><center><h5>No hay datos</h5></center></td>
				</tr>
			</table>
			<?php 
		}

	}
 ?>

<!--==============================================
=            Modal Formulario Agregar            =
===============================================-->

<div class="modal fade agregar_aprendiz" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">      
	      <div class="modal-header">
	        <h5 style="text-align: center !important;" class="modal-title">Agregar Aprendiz</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form id="form_agregar_aprendiz">
			  <div class="form-group">
			    <label for="dni_ap">DNI Aprendiz</label>
			    <input type="text" class="form-control" id="dni_ap" name="dni_ap" aria-describedby="">			    
			  </div>
			  <div class="form-group">
			    <label for="nombre_ap">Nombre Aprendiz</label>
			    <input type="text" class="form-control" id="nombre_ap" name="nombre_ap">
			  </div>
			  <div class="form-group">
			    <label for="apellido_ap">Apellido Aprendiz</label>
			    <input type="text" class="form-control" id="apellido_ap" name="apellido_ap">
			  </div>
			  <div class="form-group">
			    <label for="telefono_ap">Telefono Aprendiz</label>
			    <input type="text" class="form-control" id="telefono_ap" name="telefono_ap">
			  </div>
			  <div class="form-group">
			    <label for="correo">Correo Aprendiz</label>
			    <input type="text" class="form-control" id="correo" name="correo">
			  </div>
			  <div class="form-group">
			    <label for="direccion_ap">Direccion Aprendiz</label>
			    <input type="text" class="form-control" id="direccion_ap" name="direccion_ap">
			  </div>
			  <div class="form-group">
			    <label for="referencia_lugar_ap">Referencia Lugar Aprendiz</label>
			    <input type="text" class="form-control" id="referencia_lugar_ap" name="referencia_lugar_ap">
			  </div>
			  <div class="form-group">
			  	  <label>Ubicacion</label><br>		  	  
			  	  <select style="width: 100%;" class="custom-select" name="ubicacion_ap" id="ubicacion_ap">
			  	  	<?php 
			  	  	foreach ($ubi as $value) {
			  	   ?>				  	
				  	<option value="<?php echo $value['id_ubi'] ?>"><?php echo $value['departamento_ubi']." - ".$value['provincia_ubi']." - ".$value['distrito_ubi']; ?></option>				  	
				  	<?php } ?>
				  </select>
			  </div>
			  <div class="form-group">
			    <label for="dni_apoderado_ap">DNI Apoderado</label>
			    <input type="text" class="form-control" id="dni_apoderado_ap" name="dni_apoderado_ap">
			  </div>
			  <div class="form-group">
			    <label for="nombre_ape_ap">Nombre Apellido Apoderado</label>
			    <input type="text" class="form-control" id="nombre_ape_ap" name="nombre_ape_ap">
			  </div>
			  <div class="form-group">
			    <label for="telefono_apoderado_ap">Telefono Apoderado</label>
			    <input type="text" class="form-control" id="telefono_apoderado_ap" name="telefono_apoderado_ap">
			  </div>
			  <div class="form-group">
			    <label for="id_codigo_senati_ap">Id Codigo SENATI</label>
			    <input type="text" class="form-control" id="id_codigo_senati_ap" name="id_codigo_senati_ap">
			  </div>
			  <div class="form-group">
			    <label for="direccion_zonal_ap">Direccion Zonal</label>
			    <input type="text" class="form-control" id="direccion_zonal_ap" name="direccion_zonal_ap">
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
			  <div class="form-group">
			    <label for="bloque_ap">Bloque</label>
			    <input type="text" class="form-control" id="bloque_ap" name="bloque_ap">
			  </div>
			  <div class="form-group">
			    <label for="programa_ap">Programa</label>
			    <input type="text" class="form-control" id="programa_ap" name="programa_ap">
			  </div>
			  <label>Sexo</label>
			 <div class="custom-control custom-radio">
				  <input value="M" type="radio" id="customRadio1" name="sexo_ap" class="custom-control-input">
				  <label class="custom-control-label" for="customRadio1">M</label>
				</div>
				<div class="custom-control custom-radio">
				  <input value="F" type="radio" id="customRadio2" name="sexo_ap" class="custom-control-input">
				  <label class="custom-control-label" for="customRadio2">F</label>
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

<div class="modal fade editar_aprendiz_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
	        <h5 style="text-align: center !important;" class="modal-title">Editar Aprendiz</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form id="form_editar_aprendiz">
	        	<input type="hidden" name="id_ap" id="id_ap">
			  <div class="form-group">
			    <label for="editar_dni_ap">DNI Aprendiz</label>
			    <input type="text" class="form-control" id="editar_dni_ap" name="editar_dni_ap" aria-describedby="">			    
			  </div>
			  <div class="form-group">
			    <label for="editar_nombre_ap">Nombre Aprendiz</label>
			    <input type="text" class="form-control" id="editar_nombre_ap" name="editar_nombre_ap">
			  </div>
			  <div class="form-group">
			    <label for="editar_apellidos_ap">Apellido Aprendiz</label>
			    <input type="text" class="form-control" id="editar_apellidos_ap" name="editar_apellidos_ap">
			  </div>
			  <div class="form-group">
			    <label for="editar_telefono_ap">Telefono Aprendiz</label>
			    <input type="text" class="form-control" id="editar_telefono_ap" name="editar_telefono_ap">
			  </div>
			  <div class="form-group">
			    <label for="editar_correo">Correo Aprendiz</label>
			    <input type="text" class="form-control" id="editar_correo" name="editar_correo">
			  </div>
			  <div class="form-group">
			    <label for="editar_direccion_ap">Direccion</label>
			    <input type="text" class="form-control" id="editar_direccion_ap" name="editar_direccion_ap">
			  </div>
			  <div class="form-group">
			    <label for="editar_referencia_lugar_ap">Referencia Lugar Aprendiz</label>
			    <input type="text" class="form-control" id="editar_referencia_lugar_ap" name="editar_referencia_lugar_ap">
			  </div>			  
			  <div class="form-group">
			  	  <label>Ubicacion</label><br>		  	  
			  	  <select style="width: 100%;" class="custom-select" name="editar_ubicacion_ap" id="editar_ubicacion_ap">
			  	  	<?php 
			  	  	foreach ($ubi as $value) {
			  	   ?>				  	
				  	<option value="<?php echo $value['id_ubi'] ?>"><?php echo $value['departamento_ubi']." - ".$value['provincia_ubi']." - ".$value['distrito_ubi']; ?></option>				  	
				  	<?php } ?>
				  </select>
			  </div>
			  <div class="form-group">
			    <label for="editar_dni_apoderado_ap">DNI Apoderado</label>
			    <input type="text" class="form-control" id="editar_dni_apoderado_ap" name="editar_dni_apoderado_ap">
			  </div>
			  <div class="form-group">
			    <label for="editar_nombre_ape_ap">Nombre Apellido Apoderado</label>
			    <input type="text" class="form-control" id="editar_nombre_ape_ap" name="editar_nombre_ape_ap">
			  </div>
			  <div class="form-group">
			    <label for="editar_telefono_apoderado_ap">Telefono Apoderado</label>
			    <input type="text" class="form-control" id="editar_telefono_apoderado_ap" name="editar_telefono_apoderado_ap">
			  </div>
			  <div class="form-group">
			    <label for="editar_id_codigo_senati_ap">Id Codigo SENATI</label>
			    <input type="text" class="form-control" id="editar_id_codigo_senati_ap" name="editar_id_codigo_senati_ap">
			  </div>
			  <div class="form-group">
			    <label for="editar_direccion_zonal_ap">Direccion Zonal</label>
			    <input type="text" class="form-control" id="editar_direccion_zonal_ap" name="editar_direccion_zonal_ap">
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
			  <div class="form-group">
			    <label for="editar_bloque_ap">Bloque</label>
			    <input type="text" class="form-control" id="editar_bloque_ap" name="editar_bloque_ap">
			  </div>
			  <div class="form-group">
			    <label for="editar_programa_ap">Programa</label>
			    <input type="text" class="form-control" id="editar_programa_ap" name="editar_programa_ap">
			  </div>
			  <label for="sexo_ap">Sexo</label>
			 <div class="custom-control custom-radio">
				  <input value="M" type="radio" id="radio1" name="editar_sexo_ap" class="custom-control-input">
				  <label class="custom-control-label" for="radio1">M</label>
				</div>
				<div class="custom-control custom-radio">
				  <input value="F" type="radio" id="radio2" name="editar_sexo_ap" class="custom-control-input">
				  <label class="custom-control-label" for="radio2">F</label>
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


