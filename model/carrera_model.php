<?php 
	require_once("conexion_model.php");
	/**
	 * 
	 */
	class carrera_model extends conexion_model
	{
		private $con;
		private $cantidad_filas = 3;

		function __construct()
		{
			$this->con = parent::conectar();
		}

		public function catidad_de_datos_carrera($buscar){
			if ($buscar != "") {

				$consulta = "SELECT * FROM carrera WHERE codigo_carr = '$buscar'";

				$query = mysqli_query($this->con , $consulta);

				$columnas = mysqli_num_rows ($query);

				$pag = $columnas / $this->cantidad_filas;

				return ceil ($pag);
			}
			else{
				$consulta = "SELECT * FROM carrera";

				$query = mysqli_query($this->con , $consulta);

				$columnas = mysqli_num_rows ($query);

				$pag = $columnas / $this->cantidad_filas;

				return ceil ($pag);
			}
		}

		public function mostrar_carrera($inicio_pag, $busqueda)
		{
			
			$cantidad_datos = $this->cantidad_filas;

			$total_paginas = ($inicio_pag - 1) * $cantidad_datos;

			if ($busqueda != "") {				

				$total_paginas = $inicio_pag * $cantidad_datos;

			$consulta = "SELECT * FROM carrera WHERE codigo_carr = '$busqueda'";
			$query = mysqli_query($this->con, $consulta);
			$array_carrera = array();
			while ($datos = mysqli_fetch_assoc($query)) {
				$array['id_carr'] = $datos['id_carr'];
				$array['codigo_carr'] = $datos['codigo_carr'];
				$array['descripcion_carr'] = $datos['descripcion_carr'];							
				array_push($array_carrera, $array);
			}

			return $array_carrera;
			}
			else{
				
				$consulta = "SELECT * FROM carrera LIMIT $total_paginas , $cantidad_datos";
			$query = mysqli_query($this->con, $consulta);
			$array_carrera = array();
			while ($datos = mysqli_fetch_assoc($query)) {
				$array['id_carr'] = $datos['id_carr'];
				$array['codigo_carr'] = $datos['codigo_carr'];
				$array['descripcion_carr'] = $datos['descripcion_carr'];							
				array_push($array_carrera, $array);
			}

			return $array_carrera;

			}


			//Codigo Aparte
		}

		public function mostrar_todo_carrera()
		{
			$consulta = "SELECT * FROM carrera ";
			$query = mysqli_query($this->con, $consulta);
			$array_carrera = array();
			while ($datos = mysqli_fetch_assoc($query)) {
				$array['id_carr'] = $datos['id_carr'];
				$array['codigo_carr'] = $datos['codigo_carr'];
				$array['descripcion_carr'] = $datos['descripcion_carr'];							
				array_push($array_carrera, $array);
			}

			return $array_carrera;
		}				
				

		public function agregar_datos_carrera($codigo_carrera, $descripcion_carrera)
		{
			$consulta = "INSERT INTO carrera (codigo_carr, descripcion_carr) VALUES('$codigo_carrera', '$descripcion_carrera')";
			$query = mysqli_query($this->con, $consulta);
			if ($query) {
				return true;
			}
			else{
				return false;
			}
		}

		public function editar_datos_carrera($id_carr, $codigo_carrera_editar, $descripcion_carrera_editar)
		{
			$consulta = "UPDATE carrera
						SET codigo_carr = '$codigo_carrera_editar', descripcion_carr = '$descripcion_carrera_editar' WHERE id_carr = '$id_carr'";
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


	
