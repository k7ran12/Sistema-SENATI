<?php 
	require_once("conexion_model.php");
	/**
	 * 
	 */
	class empresa_model extends conexion_model
	{
		private $con;
		private $cantidad_filas = 3;

		function __construct()
		{
			$this->con = parent::conectar();
		}

		public function catidad_de_datos_empresa($buscar){
			if ($buscar != "") {

				$consulta = "SELECT e.`id_emp`, e.`ruc_emp`, e.`razonsocial_emp`, e.`direccion_emp`, e.`telefono_emp`, e.`correo_emp`, e.`representante_emp`, e.`dnirepresentante_emp`, u.*, ae.*, c.*, ubigeo.cod_ubi, ubigeo.departamento_ubi, ubigeo.provincia_ubi, ubigeo.distrito_ubi FROM empresa e INNER JOIN ubigeo u ON e.id_ubi = u.id_ubi INNER JOIN actvidadempresa ae ON ae.id_ae = e.id_ae INNER JOIN cfp c ON e.id_cfp = c.id_cfp INNER JOIN ubigeo ON ubigeo.id_ubi = c.id_ubi WHERE e.ruc_emp = '$buscar'";

				$query = mysqli_query($this->con , $consulta);

				$columnas = mysqli_num_rows ($query);

				$pag = $columnas / $this->cantidad_filas;

				return ceil ($pag);
			}
			else{
				$consulta = "SELECT e.`id_emp`, e.`ruc_emp`, e.`razonsocial_emp`, e.`direccion_emp`, e.`telefono_emp`, e.`correo_emp`, e.`representante_emp`, e.`dnirepresentante_emp`, u.*, ae.*, c.*, ubigeo.cod_ubi, ubigeo.departamento_ubi, ubigeo.provincia_ubi, ubigeo.distrito_ubi FROM empresa e INNER JOIN ubigeo u ON e.id_ubi = u.id_ubi INNER JOIN actvidadempresa ae ON ae.id_ae = e.id_ae INNER JOIN cfp c ON e.id_cfp = c.id_cfp INNER JOIN ubigeo ON ubigeo.id_ubi = c.id_ubi";

				$query = mysqli_query($this->con , $consulta);

				$columnas = mysqli_num_rows ($query);

				$pag = $columnas / $this->cantidad_filas;

				return ceil ($pag);
			}
		}


		public function mostrar_empresa($inicio_pag, $busqueda){
			
				$cantidad_datos = $this->cantidad_filas;

			$total_paginas = ($inicio_pag - 1) * $cantidad_datos;

			if ($busqueda != "") {				

				//$total_paginas = $inicio_pag * $cantidad_datos;

			$consulta = "SELECT e.`id_emp`, e.`ruc_emp`, e.`razonsocial_emp`, e.`direccion_emp`, e.`telefono_emp`, e.`correo_emp`, e.`representante_emp`, e.`dnirepresentante_emp`, u.*, ae.*, c.*, ubigeo.cod_ubi, ubigeo.departamento_ubi, ubigeo.provincia_ubi, ubigeo.distrito_ubi FROM empresa e INNER JOIN ubigeo u ON e.id_ubi = u.id_ubi INNER JOIN actvidadempresa ae ON ae.id_ae = e.id_ae INNER JOIN cfp c ON e.id_cfp = c.id_cfp INNER JOIN ubigeo ON ubigeo.id_ubi = c.id_ubi WHERE e.ruc_emp = '$busqueda'";

			$query = mysqli_query($this->con, $consulta);
			$array_empresa = array();
			$i = 1;
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

				$array['incrementador'] = $i++;
				
				array_push($array_empresa, $array);

			}

			return $array_empresa;
			}
			else{
				
				$consulta = "SELECT e.`id_emp`, e.`ruc_emp`, e.`razonsocial_emp`, e.`direccion_emp`, e.`telefono_emp`, e.`correo_emp`, e.`representante_emp`, e.`dnirepresentante_emp`, u.*, ae.*, c.*, ubigeo.cod_ubi, ubigeo.departamento_ubi, ubigeo.provincia_ubi, ubigeo.distrito_ubi FROM empresa e INNER JOIN ubigeo u ON e.id_ubi = u.id_ubi INNER JOIN actvidadempresa ae ON ae.id_ae = e.id_ae INNER JOIN cfp c ON e.id_cfp = c.id_cfp INNER JOIN ubigeo ON ubigeo.id_ubi = c.id_ubi LIMIT $total_paginas , $cantidad_datos";
			$i = 1;
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

				$array['incrementador'] = $i++;
				
				array_push($array_empresa, $array);
			}

			return $array_empresa;

			}

			}	

			public function mostrar_todo_empresa()
			{
				$consulta = "SELECT e.`id_emp`, e.`ruc_emp`, e.`razonsocial_emp`, e.`direccion_emp`, e.`telefono_emp`, e.`correo_emp`, e.`representante_emp`, e.`dnirepresentante_emp`, u.*, ae.*, c.*, ubigeo.cod_ubi, ubigeo.departamento_ubi, ubigeo.provincia_ubi, ubigeo.distrito_ubi FROM empresa e INNER JOIN ubigeo u ON e.id_ubi = u.id_ubi INNER JOIN actvidadempresa ae ON ae.id_ae = e.id_ae INNER JOIN cfp c ON e.id_cfp = c.id_cfp INNER JOIN ubigeo ON ubigeo.id_ubi = c.id_ubi";
			$i = 1;
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

				$array['incrementador'] = $i++;
				
				array_push($array_empresa, $array);
			}

			return $array_empresa;
			}			
			

		public function agregar_datos_empresa($ruc, $razon_social, $direccion, $telefono, $correo, $representante, $dni_representante, $ubicacion_em, $actividad_empresa,$cfp )
		{
			$consulta = "INSERT INTO `empresa` (`id_emp`, `ruc_emp`, `razonsocial_emp`, `direccion_emp`, `telefono_emp`, `correo_emp`, `representante_emp`, `dnirepresentante_emp`, `id_ubi`, `id_ae`, `id_cfp`) VALUES (NULL, '$ruc', '$razon_social', '$direccion', '$telefono', '$correo', '$representante', '$dni_representante', '$ubicacion_em', '$actividad_empresa', '$cfp');";

			
			$query = mysqli_query($this->con, $consulta);
			if ($query) {
				return true;
			}
			else{
				return false;
			}
		}

		public function editar_datos_empresa($id_emp, $ruc, $razon_social, $direccion, $telefono, $correo, $representante, $dni_representante, $ubicacion_em, $actividad_empresa,$cfp )
		{
			$consulta = "UPDATE `empresa` SET `ruc_emp` = '$ruc', `razonsocial_emp` = '$razon_social', `direccion_emp` = '$direccion', `telefono_emp` = '$telefono', `correo_emp` = '$correo', `representante_emp` = '$representante', `dnirepresentante_emp` = '$dni_representante', `id_ubi` = '$ubicacion_em', `id_ae` = '$actividad_empresa', `id_cfp` = '$cfp' WHERE `empresa`.`id_emp` = '$id_emp';";

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


	
