<?php 
	require_once("conexion_model.php");
	/**
	 * 
	 */
	class empresa_model extends conexion_model
	{
		private $con;

		function __construct()
		{
			$this->con = parent::conectar();
		}

		public function mostrar_empresa(){
			
				$consulta = "SELECT e.`id_emp`, e.`ruc_emp`, e.`razonsocial_emp`, e.`direccion_emp`, e.`telefono_emp`, e.`correo_emp`, e.`representante_emp`, e.`dnirepresentante_emp`, u.*, ae.*, c.*, ubigeo.cod_ubi, ubigeo.departamento_ubi, ubigeo.provincia_ubi, ubigeo.distrito_ubi FROM empresa e INNER JOIN ubigeo u ON e.id_ubi = u.id_ubi INNER JOIN actvidadempresa ae ON ae.id_ae = e.id_ae INNER JOIN cfp c ON e.id_cfp = c.id_cfp INNER JOIN ubigeo ON ubigeo.id_ubi = c.id_ubi";

			$query = mysqli_query($this->con, $consulta);
			$array_empresa = array();
			while ($datos = mysqli_fetch_array($query, MYSQLI_NUM)) {
				$array[0] = $datos[0];
				$array[1] = $datos[1];
				$array[2] = $datos[2];
				$array[3] = $datos[3];
				$array[4] = $datos[4];
				$array[5] = $datos[5];
				$array[6] = $datos[6];
				$array[7] = $datos[7];
				$array[8] = $datos[8];
				$array[9] = $datos[9];
				$array[10] = $datos[10];
				$array[11] = $datos[11];
				$array[12] = $datos[12];
				$array[13] = $datos[13];
				$array[14] = $datos[14];
				$array[15] = $datos[15];
				$array[16] = $datos[16];
				$array[17] = $datos[17];
				$array[18] = $datos[18];
				$array[19] = $datos[19];
				$array[20] = $datos[20];
				$array[21] = $datos[21];
				$array[22] = $datos[22];
				$array[23] = $datos[23];
				$array[24] = $datos[24];
				
				array_push($array_empresa, $array);
			}

			return $array_empresa;
			}				
		
		public function buscar_datos_empresa($buscar){

			$consulta = "SELECT e.`id_emp`, e.`ruc_emp`, e.`razonsocial_emp`, e.`direccion_emp`, e.`telefono_emp`, e.`correo_emp`, e.`representante_emp`, e.`dnirepresentante_emp`, u.*, ae.*, c.*, ubigeo.cod_ubi, ubigeo.departamento_ubi, ubigeo.provincia_ubi, ubigeo.distrito_ubi FROM empresa e INNER JOIN ubigeo u ON e.id_ubi = u.id_ubi INNER JOIN actvidadempresa ae ON ae.id_ae = e.id_ae INNER JOIN cfp c ON e.id_cfp = c.id_cfp INNER JOIN ubigeo ON ubigeo.id_ubi = c.id_ubi WHERE e.id_emp = '$buscar'";

			$query = mysqli_query($this->con, $consulta);
			$array_empresa = array();
			while ($datos = mysqli_fetch_array($query, MYSQLI_NUM)) {
				$array[] = $datos[0];
				$array[] = $datos[1];
				$array[] = $datos[2];
				$array[] = $datos[3];
				$array[] = $datos[4];
				$array[] = $datos[5];
				$array[] = $datos[6];
				$array[] = $datos[7];
				$array[] = $datos[8];
				$array[] = $datos[9];
				$array[] = $datos[10];
				$array[] = $datos[11];
				$array[] = $datos[12];
				$array[] = $datos[13];
				$array[] = $datos[14];
				$array[] = $datos[15];
				$array[] = $datos[16];
				$array[] = $datos[17];
				$array[] = $datos[18];
				$array[] = $datos[19];
				$array[] = $datos[20];
				$array[] = $datos[21];
				$array[] = $datos[22];
				$array[] = $datos[23];
				$array[] = $datos[24];				
				array_push($array_empresa, $array);
			}

			return $array_empresa;
				
			
		}

		public function agregar_datos_aprendiz($dni_ap, $nombre_ap, $telefono_ap, $correo, $referencia_lugar_ap, $ubicacion_ap, $dni_apoderado_ap, $nombre_ape_ap, $telefono_apoderado_ap, $id_codigo_senati_ap, $direccion_zonal_ap, $cfp, $bloque_ap, $programa_ap, $direccion_ap, $sexo_ap, $apellido_ap)
		{
			$consulta = "INSERT INTO `aprendiz` (`id_ap`, `dni_ap`, `nombres_ap`, `apellidos_ap`, `telefono_ap`, `correo_ap`, `direccion_ap`, `referencia_lugar_ap`, `id_ubi`, `dni_apoderado_ap`, `nomape_apoderado_ap`, `telefono_apoderado_ap`, `id_senati_ap`, `direccion_zonal_ap`, `id_cfp`, `bloque_ap`, `programa_ap`, `sexo_ap`) VALUES (NULL, '$dni_ap', '$nombre_ap', '$apellido_ap', '$telefono_ap', '$correo', '$direccion_ap', '$referencia_lugar_ap', '$ubicacion_ap', '$dni_apoderado_ap', '$nombre_ape_ap', '$telefono_apoderado_ap', '$id_codigo_senati_ap', '$direccion_zonal_ap', '$cfp', '$bloque_ap', '$programa_ap', '$sexo_ap');";

			
			$query = mysqli_query($this->con, $consulta);
			if ($query) {
				return true;
			}
			else{
				return false;
			}
		}

		public function editar_datos_aprendiz($id_ap, $dni_ap, $nombre_ap, $telefono_ap, $correo, $referencia_lugar_ap, $ubicacion_ap, $dni_apoderado_ap, $nombre_ape_ap, $telefono_apoderado_ap, $id_codigo_senati_ap, $direccion_zonal_ap, $cfp, $bloque_ap, $programa_ap, $direccion_ap, $sexo_ap, $apellido_ap)
		{
			$consulta = "UPDATE `aprendiz` SET `dni_ap` = '$dni_ap', `nombres_ap` = '$nombre_ap', `apellidos_ap` = '$apellido_ap', `telefono_ap` = '$telefono_ap', `correo_ap` = '$correo', `direccion_ap` = '$direccion_ap', `referencia_lugar_ap` = '$referencia_lugar_ap', `id_ubi` = '$ubicacion_ap', `dni_apoderado_ap` = '$dni_apoderado_ap', `nomape_apoderado_ap` = '$nombre_ape_ap', `telefono_apoderado_ap` = '$telefono_apoderado_ap', `id_senati_ap` = '$id_codigo_senati_ap', `direccion_zonal_ap` = '$direccion_zonal_ap', `id_cfp` = '$cfp', `bloque_ap` = '$bloque_ap', `programa_ap` = '$programa_ap', `sexo_ap` = '$sexo_ap' WHERE `aprendiz`.`id_ap` = '$id_ap';";

			$query = mysqli_query($this->con, $consulta);

			if ($query) 
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		

	}


	
