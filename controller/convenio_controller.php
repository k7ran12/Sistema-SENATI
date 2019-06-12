<?php 
	require_once("../model/convenio_model.php");

	$convenio_model = new convenio_model();

		/*===================================
		=            Agregar CARRERRA       =
		===================================*/
		
		if (!empty($_POST['accion']) && $_POST['accion'] == "agregar") 
		{			
			if (!empty($_POST['descripcion_convenio'])) {
				
				$descripcion_convenio = $_POST['descripcion_convenio'];
				
				$agregar = $convenio_model->agregar_datos_convenio($descripcion_convenio);
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
			if (!empty($_POST['id_conv_editar']) && !empty($_POST['descripcion_convenio_editar'])) 
			{
				//Importante el ID para editar
				$id_conv_editar = $_POST['id_conv_editar'];				
				$descripcion_convenio_editar = $_POST['descripcion_convenio_editar'];
				

				$editar = $convenio_model->editar_datos_convenio($id_conv_editar, $descripcion_convenio_editar);

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
			
	
		

	
	