<?php 
	require_once("conexion_model.php");
	/**
	 * 
	 */
	class semestre_model extends conexion_model
	{
		private $con;
		private $cantidad_filas = 3;

		function __construct()
		{
			$this->con = parent::conectar();
		}

		public function catidad_de_datos_semestre($buscar){
			if ($buscar != "") {

				$consulta = "SELECT * FROM semestre WHERE codigo_sem = '$buscar'";

				$query = mysqli_query($this->con , $consulta);

				$columnas = mysqli_num_rows ($query);

				$pag = $columnas / $this->cantidad_filas;

				return ceil ($pag);
			}
			else{
				$consulta = "SELECT * FROM semestre";

				$query = mysqli_query($this->con , $consulta);

				$columnas = mysqli_num_rows ($query);

				$pag = $columnas / $this->cantidad_filas;

				return ceil ($pag);
			}
		}


		public function mostrar_semestre($inicio_pag, $busqueda)
		{
			
			$cantidad_datos = $this->cantidad_filas;

			$total_paginas = ($inicio_pag - 1) * $cantidad_datos;

			if ($busqueda != "") {				

				$total_paginas = $inicio_pag * $cantidad_datos;

			$consulta = "SELECT * FROM semestre  WHERE codigo_sem = '$busqueda'";
			$query = mysqli_query($this->con, $consulta);
			$array_semestre = array();
			while ($datos = mysqli_fetch_assoc($query)) {
				$array['id_sem'] = $datos['id_sem'];
				$array['codigo_sem'] = $datos['codigo_sem'];
				$array['descripcion_sem'] = $datos['descripcion_sem'];							
				array_push($array_semestre, $array);	
			}

			return $array_semestre;
			}
			else{
				
				$consulta = "SELECT * FROM semestre  LIMIT $total_paginas , $cantidad_datos";
			$query = mysqli_query($this->con, $consulta);
			$array_semestre = array();
			while ($datos = mysqli_fetch_assoc($query)) {
				$array['id_sem'] = $datos['id_sem'];
				$array['codigo_sem'] = $datos['codigo_sem'];
				$array['descripcion_sem'] = $datos['descripcion_sem'];							
				array_push($array_semestre, $array);
			}

			return $array_semestre;

			}


			//Codigo Aparte
		}

		public function mostrar_todo_semestre()
		{
			$consulta = "SELECT * FROM semestre";
			$query = mysqli_query($this->con, $consulta);
			$array_semestre = array();
			while ($datos = mysqli_fetch_assoc($query)) {
				$array['id_sem'] = $datos['id_sem'];
				$array['codigo_sem'] = $datos['codigo_sem'];
				$array['descripcion_sem'] = $datos['descripcion_sem'];							
				array_push($array_semestre, $array);
			}

			return $array_semestre;
		}				
		
		public function buscar_datos_semestre($buscar){

			$consulta = "SELECT * FROM semestre WHERE codigo_sem = '$buscar'";

			$query = mysqli_query($this->con, $consulta);
			$array_semestre = array();
			while ($datos = mysqli_fetch_assoc($query)) 
			{
				$array['id_sem'] = $datos['id_sem'];
				$array['codigo_sem'] = $datos['codigo_sem'];
				$array['descripcion_sem'] = $datos['descripcion_sem'];							
				array_push($array_semestre, $array);
			}

			return $array_semestre;
			
		}

		public function agregar_datos_semestre($codigo_semestre, $descripcion_semestre)
		{
			$consulta = "INSERT INTO semestre (codigo_sem, descripcion_sem) VALUES('$codigo_semestre', '$descripcion_semestre')";
			$query = mysqli_query($this->con, $consulta);
			if ($query) {
				return true;
			}
			else{
				return false;
			}
		}

		public function editar_datos_semestre($id_sem, $editar_codigo_semestre, $editar_descripcion_semestre)
		{
			$consulta = "UPDATE semestre
						SET codigo_sem = '$editar_codigo_semestre', descripcion_sem = '$editar_descripcion_semestre' WHERE id_sem = '$id_sem'";
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


	
