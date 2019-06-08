<?php 
	require_once("../model/carrera_model.php");

	$carrera_model = new carrera_model();

		/*===================================
		=            Agregar CARRERRA       =
		===================================*/
		
		if (!empty($_POST['accion']) && $_POST['accion'] == "agregar") 
		{			
			if (!empty($_POST['codigo_carrera']) && !empty($_POST['descripcion_carrera'])) {

				$codigo_carrera = $_POST['codigo_carrera'];
				$descripcion_carrera = $_POST['descripcion_carrera'];
				
				$agregar = $carrera_model->agregar_datos_carrera($codigo_carrera, $descripcion_carrera);
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
			if (!empty($_POST['id_carr']) && !empty($_POST['codigo_carrera_editar']) && !empty($_POST['descripcion_carrera_editar'])) 
			{
				//Importante el ID para editar
				$id_carr = $_POST['id_carr'];
				$codigo_carrera_editar = $_POST['codigo_carrera_editar'];
				$descripcion_carrera_editar = $_POST['descripcion_carrera_editar'];
				

				$editar = $carrera_model->editar_datos_carrera($id_carr, $codigo_carrera_editar, $descripcion_carrera_editar);

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
			
	
		

	
	