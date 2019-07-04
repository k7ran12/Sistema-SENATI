<?php 
	require_once("conexion_model.php");
	/**
	 * 
	 */
	class ubigeo_model extends conexion_model
	{
		private $con;
		private $cantidad_filas = 3;

		function __construct()
		{
			$this->con = parent::conectar();
		}

		public function catidad_de_datos_ubigeo($buscar){
			if ($buscar != "") {

				$consulta = "SELECT * FROM ubigeo WHERE departamento_ubi = '$buscar'";

				$query = mysqli_query($this->con , $consulta);

				$columnas = mysqli_num_rows ($query);

				$pag = $columnas / $this->cantidad_filas;

				return ceil ($pag);
			}
			else{
				$consulta = "SELECT * FROM ubigeo";

				$query = mysqli_query($this->con , $consulta);

				$columnas = mysqli_num_rows ($query);

				$pag = $columnas / $this->cantidad_filas;

				return ceil ($pag);
			}
		}

		public function mostrar_ubigeo(){

				$consulta = "SELECT * FROM ubigeo";
			$query = mysqli_query($this->con, $consulta);
			$array_ubi = array();
			while ($datos = mysqli_fetch_assoc($query)) {
				$array['id_ubi'] = $datos['id_ubi'];
				$array['cod_ubi'] = $datos['cod_ubi'];
				$array['departamento_ubi'] = $datos['departamento_ubi'];
				$array['provincia_ubi'] = $datos['provincia_ubi'];
				$array['distrito_ubi'] = $datos['distrito_ubi'];
				array_push($array_ubi, $array);
			}

			return $array_ubi;

			
			
		}

		public function mostrar_ubigeo_b($inicio_pag, $busqueda){

			$cantidad_datos = $this->cantidad_filas;

			$total_paginas = ($inicio_pag - 1) * $cantidad_datos;

			if ($busqueda != "") {				

				//$total_paginas = $inicio_pag * $cantidad_datos;

			$consulta = "SELECT * FROM ubigeo WHERE departamento_ubi = '$busqueda' LIMIT $total_paginas , $cantidad_datos";
			

			
			$query = mysqli_query($this->con, $consulta);
			$array_ubi = array();
			while ($datos = mysqli_fetch_assoc($query)) {
				$array['id_ubi'] = $datos['id_ubi'];
				$array['cod_ubi'] = $datos['cod_ubi'];
				$array['departamento_ubi'] = $datos['departamento_ubi'];
				$array['provincia_ubi'] = $datos['provincia_ubi'];
				$array['distrito_ubi'] = $datos['distrito_ubi'];
				array_push($array_ubi, $array);

			}

			return $array_ubi;
			}
			else{
				
				$consulta = "SELECT * FROM ubigeo LIMIT $total_paginas , $cantidad_datos";
			$query = mysqli_query($this->con, $consulta);
			$array_ubi = array();
			while ($datos = mysqli_fetch_assoc($query)) {
				$array['id_ubi'] = $datos['id_ubi'];
				$array['cod_ubi'] = $datos['cod_ubi'];
				$array['departamento_ubi'] = $datos['departamento_ubi'];
				$array['provincia_ubi'] = $datos['provincia_ubi'];
				$array['distrito_ubi'] = $datos['distrito_ubi'];
				array_push($array_ubi, $array);
			}

			return $array_ubi;

			}
			
		}

		

	}

	
	
