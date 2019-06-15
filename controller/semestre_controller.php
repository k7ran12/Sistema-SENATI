<?php 
	require_once("../model/semestre_model.php");

	$semestre_model = new semestre_model();

		/*===================================
		=            Agregar CARRERRA       =
		===================================*/
		
		if (!empty($_POST['accion']) && $_POST['accion'] == "agregar") 
		{			
			if (!empty($_POST['codigo_semestre']) && !empty($_POST['descripcion_semestre'])) {

				$codigo_semestre = $_POST['codigo_semestre'];
				$descripcion_semestre = $_POST['descripcion_semestre'];
				
				$agregar = $semestre_model->agregar_datos_semestre($codigo_semestre, $descripcion_semestre);
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
			if (!empty($_POST['id_sem']) && !empty($_POST['editar_codigo_semestre']) && !empty($_POST['editar_descripcion_semestre'])) 
			{
				//Importante el ID para editar
				$id_sem = $_POST['id_sem'];
				$editar_codigo_semestre = $_POST['editar_codigo_semestre'];
				$editar_descripcion_semestre = $_POST['editar_descripcion_semestre'];
				

				$editar = $semestre_model->editar_datos_semestre($id_sem, $editar_codigo_semestre, $editar_descripcion_semestre);

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
			
	
		

	
	