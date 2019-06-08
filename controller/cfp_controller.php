<?php 
	require_once("../model/cfp_model.php");

	$cfp_model = new cfp_model();

	/*===================================
	=            Mostrar CFP            =
	===================================*/

	if (!empty($_POST['buscar'])) {

		$buscar = $_POST['buscar'];

		$datos_cfp = $cfp_model->buscar_datos_cfp($buscar);

		if (!empty($datos_cfp)) {
			?>
			<table class="table table-hover">
					<tr>
						<th>Codigo CFP</th>
						<th>Descripcion CFP</th>
						<th>Direccion CFP</th>
						<th>Departamento Ubicacion</th>
						<th>Provincia Ubicacion</th>
						<th>Distrito Ubicacion</th>						
					</tr>
			<?php 
			foreach ($datos_cfp as $value) {
				?>				
					<tr>
						<td><?php echo $value['codigo_cfp'] ?></td>
						<td><?php echo $value['descripcion_cfp'] ?></td>
						<td><?php echo $value['direccion_cfp'] ?></td>
						<td><?php echo $value['departamento_ubi'] ?></td>
						<td><?php echo $value['provincia_ubi'] ?></td>
						<td><?php echo $value['distrito_ubi'] ?></td>
					</tr>
				
				<?php 
			}
			?>
			</table>
			<?php 
		}
		
		else{
			?>
			<table>
				<tr>
					<td colspan="6">No hay datos</td>
				</tr>
			</table>
			<?php 
		}


	}
	else{

		$datos_cfp = $cfp_model->mostrar_cfp();

		if (!empty($datos_cfp)) {
			?>
			<table class="table table-hover">
					<tr>
						<th>Codigo CFP</th>
						<th>Descripcion CFP</th>
						<th>Direccion CFP</th>
						<th>Departamento Ubicacion</th>
						<th>Provincia Ubicacion</th>
						<th>Distrito Ubicacion</th>						
					</tr>
			<?php 
			foreach ($datos_cfp as $value) {
				?>				
					<tr>
						<td><?php echo $value['codigo_cfp'] ?></td>
						<td><?php echo $value['descripcion_cfp'] ?></td>
						<td><?php echo $value['direccion_cfp'] ?></td>
						<td><?php echo $value['departamento_ubi'] ?></td>
						<td><?php echo $value['provincia_ubi'] ?></td>
						<td><?php echo $value['distrito_ubi'] ?></td>
					</tr>
				
				<?php 
			}
			?>
			</table>
			<?php 
		}
		else{
			?>
			<table>
				<tr>
					<td colspan="6">No hay datos</td>
				</tr>
			</table>
			<?php 
		}

	}
	
		//$buscar = !empty($_POST['buscar']);
		//$cfp_model->mostrar_cfp($codigo_cfp); 

		
		
	
	/*=====  End of Mostrar CFP  ======*/

	/*=========================================
	=            Agregar Datos CFP            =
	=========================================*/
	
	if (!empty($_POST['accion']) && $_POST['accion'] == "agregar") {
		# code...
	}
	
	/*=====  End of Agregar Datos CFP  ======*/
	
	
	
	
		

	
	