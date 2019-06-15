<?php 
	require_once("../model/empresa_model.php");

	$empresa_model = new empresa_model();

	/*===================================
		=            Agregar CFP            =
		===================================*/
		
		if (!empty($_POST['accion']) && $_POST['accion'] == "agregar") 
		{			
			if (!empty($_POST['ruc']) && !empty($_POST['razon_social']) 
				&& !empty($_POST['direccion']) && !empty($_POST['telefono']) 
				&& !empty($_POST['correo']) && !empty($_POST['representante']) 
				&& !empty($_POST['dni_representante']) && !empty($_POST['ubicacion_em']) 
				&& !empty($_POST['actividad_empresa']) 
				&& !empty($_POST['cfp']) 
				) {
				
				$ruc = $_POST['ruc'];
				$razon_social = $_POST['razon_social'];
				$direccion = $_POST['direccion'];
				$telefono = $_POST['telefono'];
				$correo = $_POST['correo'];
				$representante = $_POST['representante'];
				$dni_representante = $_POST['dni_representante'];
				$ubicacion_em = $_POST['ubicacion_em'];
				$actividad_empresa = $_POST['actividad_empresa'];
				$cfp = $_POST['cfp'];				
				

				$agregar = $empresa_model->agregar_datos_empresa($ruc, $razon_social, $direccion, $telefono, $correo, $representante, $dni_representante, $ubicacion_em, $actividad_empresa,$cfp );

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
			
			if (!empty($_POST['editar_ruc']) && !empty($_POST['editar_razon_social']) 
				&& !empty($_POST['editar_direccion']) && !empty($_POST['editar_telefono']) 
				&& !empty($_POST['editar_correo']) && !empty($_POST['editar_representante']) 
				&& !empty($_POST['editar_dni_representante']) && !empty($_POST['editar_ubicacion_em']) 
				&& !empty($_POST['editar_actividad_empresa']) 
				&& !empty($_POST['editar_cfp']) && !empty($_POST['id_emp'])) {

				$id_emp = $_POST['id_emp'];
			
				$ruc = $_POST['editar_ruc'];
				$razon_social = $_POST['editar_razon_social'];
				$direccion = $_POST['editar_direccion'];
				$telefono = $_POST['editar_telefono'];
				$correo = $_POST['editar_correo'];
				$representante = $_POST['editar_representante'];
				$dni_representante = $_POST['editar_dni_representante'];
				$ubicacion_em = $_POST['editar_ubicacion_em'];
				$actividad_empresa = $_POST['editar_actividad_empresa'];
				$cfp = $_POST['editar_cfp'];

				$editar = $empresa_model->editar_datos_empresa($id_emp, $ruc, $razon_social, $direccion, $telefono, $correo, $representante, $dni_representante, $ubicacion_em, $actividad_empresa,$cfp );

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
			
	
		

	
	