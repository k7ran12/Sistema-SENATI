<?php 
	require_once("../model/cfp_model.php");

	$cfp_model = new cfp_model();

	/*===================================
		=            Agregar CFP            =
		===================================*/
		
		if (!empty($_POST['accion']) && $_POST['accion'] == "agregar") 
		{			
			if (!empty($_POST['codigo_cfp']) && !empty($_POST['descripcion_cfp']) && !empty($_POST['direccion_cfp']) && !empty($_POST['ubicacion'])) {
				$codigo_cfp = $_POST['codigo_cfp'];
				$descripcion_cfp = $_POST['descripcion_cfp'];
				$direccion_cfp = $_POST['direccion_cfp'];
				$ubicacion = $_POST['ubicacion'];
				$agregar = $cfp_model->agregar_datos_cfp($codigo_cfp, $descripcion_cfp, $direccion_cfp, $ubicacion);
				if ($agregar == true) 
					{
						echo "agregado";
					}
				else
					{
						echo "incorrecto";
					}
				
			}
			else{
				echo "invalidado";
			}
		}

		else if (!empty($_POST['accion']) && $_POST['accion'] == "editar") 
		{
			
			if (!empty($_POST['id_cfp']) && !empty($_POST['id_ubi']) && !empty($_POST['codigo_cfp_editar']) && !empty($_POST['descripcion_cfp_editar']) && !empty($_POST['direccion_cfp_editar']) && !empty($_POST['ubicacion_cfp_editar'])) {
				//Importante el ID para editar
				$id_cfp = $_POST['id_cfp'];
				$id_ubi = $_POST['id_ubi'];
				$codigo_cfp_editar = $_POST['codigo_cfp_editar'];
				$descripcion_cfp_editar = $_POST['descripcion_cfp_editar'];
				$direccion_cfp_editar = $_POST['direccion_cfp_editar'];
				$ubicacion_cfp_editar = $_POST['ubicacion_cfp_editar'];

				$editar = $cfp_model->editar_datos_cfp($id_cfp, $id_ubi, $codigo_cfp_editar, $descripcion_cfp_editar, $direccion_cfp_editar, $ubicacion_cfp_editar);

				if ($editar == true) 
				{
					echo "editado";
				}
				else
				{
					echo "incorrecto";
				}
			}
			else{
				echo "invalidado";
			}
		}
		
		/*=====  End of Agregar CFP  ======*/
			
	
		

	
	