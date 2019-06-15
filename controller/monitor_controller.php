<?php 
	require_once("../model/monitor_model.php");

	$monitor_model = new monitor_model();

		/*===================================
		=            Agregar CARRERRA       =
		===================================*/
		
		if (!empty($_POST['accion']) && $_POST['accion'] == "agregar") 
		{			
			if (!empty($_POST['apellidos']) && !empty($_POST['nombres']) && !empty($_POST['dni']) && !empty($_POST['telefono']) && !empty($_POST['cargo']) && !empty($_POST['correo'])) {

				$apellidos = $_POST['apellidos'];
				$nombres = $_POST['nombres'];
				$dni = $_POST['dni'];
				$telefono = $_POST['telefono'];
				$cargo = $_POST['cargo'];
				$correo = $_POST['correo'];
				
				$agregar = $monitor_model->agregar_datos_monitor($apellidos, $nombres, $dni, $telefono, $cargo, $correo);
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
			if (!empty($_POST['id_mon']) && !empty($_POST['editar_apellidos']) && !empty($_POST['editar_nombres']) && !empty($_POST['editar_dni']) && !empty($_POST['editar_telefono']) && !empty($_POST['editar_cargo']) && !empty($_POST['editar_correo'])) 
			{
				//Importante el ID para editar
				$id_mon = $_POST['id_mon'];
				
				$apellidos = $_POST['editar_apellidos'];
				$nombres = $_POST['editar_nombres'];
				$dni = $_POST['editar_dni'];
				$telefono = $_POST['editar_telefono'];
				$cargo = $_POST['editar_cargo'];
				$correo = $_POST['editar_correo'];
				

				$editar = $monitor_model->editar_datos_monitor($id_mon, $apellidos, $nombres, $dni, $telefono, $cargo, $correo);

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
				echo "invalidados";
			}
		}
		
		/*=====  End of Agregar CFP  ======*/
			
	
		

	
	