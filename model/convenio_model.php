<?php 
	require_once("conexion_model.php");
	/**
	 * 
	 */
	class convenio_model extends conexion_model
	{
		private $con;

		function __construct()
		{
			$this->con = parent::conectar();
		}

		public function catidad_de_datos_ae($buscar){
			if ($buscar != "") {

				$consulta = "SELECT * FROM convenio WHERE desc_conv = '$buscar'";

				$query = mysqli_query($this->con , $consulta);

				$columnas = mysqli_num_rows ($query);

				$pag = $columnas / 10;

				return ceil ($pag);
			}
			else{
				$consulta = "SELECT * FROM convenio";

				$query = mysqli_query($this->con , $consulta);

				$columnas = mysqli_num_rows ($query);

				$pag = $columnas / 10;

				return ceil ($pag);
			}
		}

		public function mostrar_convenio($inicio_pag, $busqueda)
		{
			
			$cantidad_datos = 10;

			$total_paginas = $inicio_pag * $cantidad_datos;

			if ($busqueda != "") {				

				$total_paginas = $inicio_pag * $cantidad_datos;

			$consulta = "SELECT * FROM convenio WHERE desc_conv = '$busqueda'";
			$query = mysqli_query($this->con, $consulta);
			$array_carrera = array();
			while ($datos = mysqli_fetch_assoc($query)) {
				$array['id_conv'] = $datos['id_conv'];				
				$array['desc_conv'] = $datos['desc_conv'];							
				array_push($array_carrera, $array);	
			}

			return $array_carrera;
			}
			else{
				
				$consulta = "SELECT * FROM convenio LIMIT $total_paginas , $cantidad_datos";
			$query = mysqli_query($this->con, $consulta);
			$array_carrera = array();
			while ($datos = mysqli_fetch_assoc($query)) {
				$array['id_conv'] = $datos['id_conv'];				
				$array['desc_conv'] = $datos['desc_conv'];							
				array_push($array_carrera, $array);
			}

			return $array_carrera;

			}


			//Codigo Aparte
		}				
		

		public function agregar_datos_convenio($descripcion_convenio)
		{
			$consulta = "INSERT INTO convenio (desc_conv) VALUES('$descripcion_convenio')";
			$query = mysqli_query($this->con, $consulta);
			if ($query) {
				return true;
			}
			else{
				return false;
			}
		}

		public function editar_datos_convenio($id_conv_editar, $descripcion_convenio_editar)
		{
			$consulta = "UPDATE convenio
						SET desc_conv = '$descripcion_convenio_editar' WHERE id_conv = '$id_conv_editar'";
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


	
