<?php 
	require_once("../model/vinculacion_model.php");

	$vinculacion_model = new vinculacion_model();

	/*===================================
		=            Agregar CFP            =
		===================================*/
		
		if (!empty($_POST['accion']) && $_POST['accion'] == "agregar") 
		{			
			if (!empty($_POST['aprendiz']) && !empty($_POST['empresa']) 
				&& !empty($_POST['carrera']) && !empty($_POST['cfp']) 
				&& !empty($_POST['semestre']) && !empty($_POST['fechaini_prac']) 
				&& !empty($_POST['fechafin_prac']) && !empty($_POST['fechaini_sem']) 
				&& !empty($_POST['fechafin_sem']) 
				&& !empty($_POST['monitor']) 
				&& !empty($_POST['convenio']) && !empty($_POST['grupo'])) {
				
				$aprendiz = $_POST['aprendiz'];
				$empresa = $_POST['empresa'];
				$carrera = $_POST['carrera'];
				$cfp = $_POST['cfp'];
				$semestre = $_POST['semestre'];
				$fechaini_prac = $_POST['fechaini_prac'];
				$fechafin_prac = $_POST['fechafin_prac'];
				$fechaini_sem = $_POST['fechaini_sem'];
				$fechafin_sem = $_POST['fechafin_sem'];
				$monitor = $_POST['monitor'];
				$convenio = $_POST['convenio'];				
				$grupo = $_POST['grupo'];
				

				$agregar = $vinculacion_model->agregar_datos_vinculacion($aprendiz, $empresa, $carrera, $cfp, $semestre, $fechaini_prac, $fechafin_prac, $fechaini_sem, $fechafin_sem, $monitor, $convenio, $grupo);

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
			
			if (!empty($_POST['id_ap']) && !empty($_POST['editar_dni_ap']) && !empty($_POST['editar_nombre_ap']) 
				&& !empty($_POST['editar_apellidos_ap']) && !empty($_POST['editar_telefono_ap']) 
				&& !empty($_POST['editar_correo']) && !empty($_POST['editar_referencia_lugar_ap']) 
				&& !empty($_POST['editar_ubicacion_ap']) && !empty($_POST['editar_dni_apoderado_ap']) 
				&& !empty($_POST['editar_nombre_ape_ap']) 
				&& !empty($_POST['editar_telefono_apoderado_ap']) 
				&& !empty($_POST['editar_id_codigo_senati_ap']) && !empty($_POST['editar_direccion_zonal_ap']) 
				&& !empty($_POST['editar_cfp']) && !empty($_POST['editar_bloque_ap']) 
				&& !empty($_POST['editar_programa_ap']) && !empty($_POST['editar_sexo_ap'])) {

				$id_ap = $_POST['id_ap'];
			
				$dni_ap = $_POST['editar_dni_ap'];
				$nombre_ap = $_POST['editar_nombre_ap'];
				$apellido_ap = $_POST['editar_apellidos_ap'];
				$telefono_ap = $_POST['editar_telefono_ap'];
				$correo = $_POST['editar_correo'];
				$referencia_lugar_ap = $_POST['editar_referencia_lugar_ap'];
				$ubicacion_ap = $_POST['editar_ubicacion_ap'];
				$dni_apoderado_ap = $_POST['editar_dni_apoderado_ap'];
				$nombre_ape_ap = $_POST['editar_nombre_ape_ap'];
				$telefono_apoderado_ap = $_POST['editar_telefono_apoderado_ap'];
				$id_codigo_senati_ap = $_POST['editar_id_codigo_senati_ap'];
				$direccion_zonal_ap = $_POST['editar_direccion_zonal_ap'];
				$cfp = $_POST['editar_cfp'];
				$bloque_ap = $_POST['editar_bloque_ap'];
				$programa_ap = $_POST['editar_programa_ap'];
				$direccion_ap = $_POST['editar_direccion_ap'];
				$sexo_ap = $_POST['editar_sexo_ap'];

				$editar = $aprendiz_model->editar_datos_aprendiz($id_ap, $dni_ap, $nombre_ap, $telefono_ap, $correo, $referencia_lugar_ap, $ubicacion_ap, $dni_apoderado_ap, $nombre_ape_ap, $telefono_apoderado_ap, $id_codigo_senati_ap, $direccion_zonal_ap, $cfp, $bloque_ap, $programa_ap, $direccion_ap, $sexo_ap, $apellido_ap);

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
			
	
		

	
	