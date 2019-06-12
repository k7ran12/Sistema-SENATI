<?php 
	require_once("../model/actividad_empresa_model.php");

	$actividad_empresa_model = new actividad_empresa_model();

		/*===================================
		=            Agregar CARRERRA       =
		===================================*/
		
		if (!empty($_POST['accion']) && $_POST['accion'] == "agregar") 
		{			
			if (!empty($_POST['codigo_actividad']) && !empty($_POST['descripcion_actividad'])) {

				$codigo_actividad = $_POST['codigo_actividad'];
				$descripcion_actividad = $_POST['descripcion_actividad'];
				
				$agregar = $actividad_empresa_model->agregar_datos_actividad_empresa($codigo_actividad, $descripcion_actividad);
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
			//echo "EDITAR";
			if (!empty($_POST['id_ae']) && !empty($_POST['codigo_actividad_empresa_editar']) && !empty($_POST['descripcion_actividad_empresa_editar'])) 
			{
				//Importante el ID para editar
				$id_ae = $_POST['id_ae'];
				$codigo_actividad_empresa_editar = $_POST['codigo_actividad_empresa_editar'];
				$descripcion_actividad_empresa_editar = $_POST['descripcion_actividad_empresa_editar'];
				

				$editar = $actividad_empresa_model->editar_datos_actividad_empresa($id_ae, $codigo_actividad_empresa_editar, $descripcion_actividad_empresa_editar);

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
			
	
		

	
	