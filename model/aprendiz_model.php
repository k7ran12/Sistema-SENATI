<?php 
	require_once("conexion_model.php");
	/**
	 * 
	 */
	class aprendiz_model extends conexion_model
	{
		private $con;
		private $cantidad_filas = 250;

		function __construct()
		{
			$this->con = parent::conectar();
		}

		public function catidad_de_datos($buscar){
			
			if ($buscar != "") {

				$consulta = "SELECT a.*, c.codigo_cfp, c.descripcion_cfp, c.direccion_cfp, c.id_ubi, ubigeo.cod_ubi as cod_cfp_ubigeo, ubigeo.departamento_ubi as departamento_cfp_ubigeo, ubigeo.provincia_ubi as provincia_cfp_ubigeo, ubigeo.distrito_ubi as distrito_cfp_ubigeo, u.cod_ubi as cod_ubi_aprendiz, u.departamento_ubi as departamento_ubi_aprendiz, u.provincia_ubi as provincia_ubi_aprendiz, u.distrito_ubi as distrito_ubi_aprendiz FROM aprendiz a INNER JOIN cfp c ON a.id_cfp = c.id_cfp INNER JOIN ubigeo u ON u.id_ubi = a.id_ubi INNER JOIN ubigeo ON ubigeo.id_ubi = c.id_ubi WHERE direccion_zonal_ap = '$buscar'";

				//echo $consulta;

				$query = mysqli_query($this->con , $consulta);

				$columnas = mysqli_num_rows ($query);

				$pag = $columnas / $this->cantidad_filas;

				//echo $pag."<br>";

				return ceil ($pag);
			}
			else{
				$consulta = "SELECT a.*, c.codigo_cfp, c.descripcion_cfp, c.direccion_cfp, c.id_ubi, ubigeo.cod_ubi as cod_cfp_ubigeo, ubigeo.departamento_ubi as departamento_cfp_ubigeo, ubigeo.provincia_ubi as provincia_cfp_ubigeo, ubigeo.distrito_ubi as distrito_cfp_ubigeo, u.cod_ubi as cod_ubi_aprendiz, u.departamento_ubi as departamento_ubi_aprendiz, u.provincia_ubi as provincia_ubi_aprendiz, u.distrito_ubi as distrito_ubi_aprendiz FROM aprendiz a INNER JOIN cfp c ON a.id_cfp = c.id_cfp INNER JOIN ubigeo u ON u.id_ubi = a.id_ubi INNER JOIN ubigeo ON ubigeo.id_ubi = c.id_ubi";

				
				$query = mysqli_query($this->con , $consulta);

				$columnas = mysqli_num_rows ($query);

				$pag = $columnas / $this->cantidad_filas;

				//echo $pag."<br>";

				return ceil ($pag);
			}

		}

		public function select_aprendiz(){
			$consulta = "SELECT id_ap, nombres_ap, apellidos_ap FROM aprendiz LIMIT 50";

			$query = mysqli_query($this->con, $consulta);

			//$array_aprendiz = mysqli_fetch_all ( $query );

			$array_aprendiz = array();
			while ($datos = mysqli_fetch_array($query, MYSQLI_NUM)) {
				$array[0] = $datos[0];
				$array[1] = $datos[1];
				$array[2] = $datos[2];
				array_push($array_aprendiz, $array);
			}

			return $array_aprendiz;

		}

		public function mostrar_aprendiz($inicio_pag, $busqueda){

			$cantidad_datos = $this->cantidad_filas;

			$total_paginas = ($inicio_pag - 1) * $cantidad_datos;

			if ($busqueda != "") {				

				//$total_paginas = $inicio_pag * $cantidad_datos;

			$consulta = "SELECT a.*, c.codigo_cfp, c.descripcion_cfp, c.direccion_cfp, c.id_ubi, ubigeo.cod_ubi as cod_cfp_ubigeo, ubigeo.departamento_ubi as departamento_cfp_ubigeo, ubigeo.provincia_ubi as provincia_cfp_ubigeo, ubigeo.distrito_ubi as distrito_cfp_ubigeo, u.cod_ubi as cod_ubi_aprendiz, u.departamento_ubi as departamento_ubi_aprendiz, u.provincia_ubi as provincia_ubi_aprendiz, u.distrito_ubi as distrito_ubi_aprendiz FROM aprendiz a INNER JOIN cfp c ON a.id_cfp = c.id_cfp INNER JOIN ubigeo u ON u.id_ubi = a.id_ubi INNER JOIN ubigeo ON ubigeo.id_ubi = c.id_ubi WHERE direccion_zonal_ap = '$busqueda' LIMIT $total_paginas , $cantidad_datos";
			

			
			$query = mysqli_query($this->con, $consulta);
			$array_aprendiz = array();
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
				$array[25] = $datos[25];
				$array[26] = $datos[26];
				$array[27] = $datos[27];
				$array[28] = $datos[28];
				$array[29] = $datos[29];
				array_push($array_aprendiz, $array);

			}

			return $array_aprendiz;
			}
			else{
				
				$consulta = "SELECT a.*, c.codigo_cfp, c.descripcion_cfp, c.direccion_cfp, c.id_ubi, ubigeo.cod_ubi as cod_cfp_ubigeo, ubigeo.departamento_ubi as departamento_cfp_ubigeo, ubigeo.provincia_ubi as provincia_cfp_ubigeo, ubigeo.distrito_ubi as distrito_cfp_ubigeo, u.cod_ubi as cod_ubi_aprendiz, u.departamento_ubi as departamento_ubi_aprendiz, u.provincia_ubi as provincia_ubi_aprendiz, u.distrito_ubi as distrito_ubi_aprendiz FROM aprendiz a INNER JOIN cfp c ON a.id_cfp = c.id_cfp INNER JOIN ubigeo u ON u.id_ubi = a.id_ubi INNER JOIN ubigeo ON ubigeo.id_ubi = c.id_ubi LIMIT $total_paginas , $cantidad_datos";
			$query = mysqli_query($this->con, $consulta);
			$array_aprendiz = array();
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
				$array[25] = $datos[25];
				$array[26] = $datos[26];
				$array[27] = $datos[27];
				$array[28] = $datos[28];
				$array[29] = $datos[29];
				array_push($array_aprendiz, $array);
			}

			return $array_aprendiz;

			}

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


	
