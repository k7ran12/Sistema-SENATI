<?php 
	require_once("../model/aprendiz_model.php");

	$aprendiz_model = new aprendiz_model();

	/*===================================
		=            Agregar CFP            =
		===================================*/
		
		if (!empty($_POST['accion']) && $_POST['accion'] == "agregar") 
		{			
			if (!empty($_POST['dni_ap']) && !empty($_POST['nombre_ap']) 
				&& !empty($_POST['telefono_ap']) && !empty($_POST['correo']) 
				&& !empty($_POST['referencia_lugar_ap']) && !empty($_POST['ubicacion_ap']) 
				&& !empty($_POST['dni_apoderado_ap']) && !empty($_POST['nombre_ape_ap']) 
				&& !empty($_POST['telefono_apoderado_ap']) 
				&& !empty($_POST['id_codigo_senati_ap']) 
				&& !empty($_POST['direccion_zonal_ap']) && !empty($_POST['cfp']) 
				&& !empty($_POST['bloque_ap']) && !empty($_POST['programa_ap']) 
				&& !empty($_POST['direccion_ap'])) {
				
				$dni_ap = $_POST['dni_ap'];
				$nombre_ap = $_POST['nombre_ap'];
				$apellido_ap = $_POST['apellido_ap'];
				$telefono_ap = $_POST['telefono_ap'];
				$correo = $_POST['correo'];
				$referencia_lugar_ap = $_POST['referencia_lugar_ap'];
				$ubicacion_ap = $_POST['ubicacion_ap'];
				$dni_apoderado_ap = $_POST['dni_apoderado_ap'];
				$nombre_ape_ap = $_POST['nombre_ape_ap'];
				$telefono_apoderado_ap = $_POST['telefono_apoderado_ap'];
				$id_codigo_senati_ap = $_POST['id_codigo_senati_ap'];
				$direccion_zonal_ap = $_POST['direccion_zonal_ap'];
				$cfp = $_POST['cfp'];
				$bloque_ap = $_POST['bloque_ap'];
				$programa_ap = $_POST['programa_ap'];
				$direccion_ap = $_POST['direccion_ap'];
				$sexo_ap = $_POST['sexo_ap'];
				

				$agregar = $aprendiz_model->agregar_datos_aprendiz($dni_ap, $nombre_ap, $telefono_ap, $correo, $referencia_lugar_ap, $ubicacion_ap, $dni_apoderado_ap, $nombre_ape_ap, $telefono_apoderado_ap, $id_codigo_senati_ap, $direccion_zonal_ap, $cfp, $bloque_ap, $programa_ap, $direccion_ap, $sexo_ap, $apellido_ap);

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
			
	
		

	
	