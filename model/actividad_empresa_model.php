<?php 
	require_once("conexion_model.php");
	/**
	 * 
	 */
	class actividad_empresa_model extends conexion_model
	{
		private $con;
		private $cantidad_filas = 3;

		function __construct()
		{
			$this->con = parent::conectar();
		}

		public function catidad_de_datos_ae($buscar){
			if ($buscar != "") {

				$consulta = "SELECT * FROM actvidadempresa WHERE codigo_ae = '$buscar'";

				$query = mysqli_query($this->con , $consulta);

				$columnas = mysqli_num_rows ($query);

				$pag = $columnas / $this->cantidad_filas;

				return ceil ($pag);
			}
			else{
				$consulta = "SELECT * FROM actvidadempresa";

				$query = mysqli_query($this->con , $consulta);

				$columnas = mysqli_num_rows ($query);

				$pag = $columnas / $this->cantidad_filas;

				return ceil ($pag);
			}
		}


		public function mostrar_actividad_empresa($inicio_pag, $busqueda)
		{
			
			$cantidad_datos = $this->cantidad_filas;

			$total_paginas = ($inicio_pag - 1) * $cantidad_datos;

			if ($busqueda != "") {				

				$total_paginas = $inicio_pag * $cantidad_datos;

			$consulta = "SELECT * FROM actvidadempresa WHERE codigo_ae = '$busqueda'";
			$query = mysqli_query($this->con, $consulta);
			$array_actividad_empresa = array();
			while ($datos = mysqli_fetch_assoc($query)) {
				$array['id_ae'] = $datos['id_ae'];
				$array['codigo_ae'] = $datos['codigo_ae'];
				$array['descripcion_ae'] = $datos['descripcion_ae'];

				array_push($array_actividad_empresa, $array);	
			}

			return $array_actividad_empresa;
			}
			else{
				
				$consulta = "SELECT * FROM actvidadempresa LIMIT $total_paginas , $cantidad_datos";
			$query = mysqli_query($this->con, $consulta);
			$array_actividad_empresa = array();
			while ($datos = mysqli_fetch_assoc($query)) {
				$array['id_ae'] = $datos['id_ae'];
				$array['codigo_ae'] = $datos['codigo_ae'];
				$array['descripcion_ae'] = $datos['descripcion_ae'];							
				array_push($array_actividad_empresa, $array);
			}

			return $array_actividad_empresa;

			}


			//Codigo Aparte
			
		}

		public function mostrar_todo_ae()
		{
			$consulta = "SELECT * FROM actvidadempresa ORDER BY codigo_ae";

			$query = mysqli_query($this->con, $consulta);
			$array_actividad_empresa = array();

			while ($datos = mysqli_fetch_assoc($query)) 
			{
				$array['id_ae'] = $datos['id_ae'];
				$array['codigo_ae'] = $datos['codigo_ae'];
				$array['descripcion_ae'] = $datos['descripcion_ae'];							
				array_push($array_actividad_empresa, $array);
			}

			return $array_actividad_empresa;
		}	

		public function agregar_datos_actividad_empresa($codigo_actividad, $descripcion_actividad)
		{
			$consulta = "INSERT INTO actvidadempresa (codigo_ae, descripcion_ae) VALUES('$codigo_actividad', '$descripcion_actividad')";
			$query = mysqli_query($this->con, $consulta);
			if ($query) {
				return true;
			}
			else{
				return false;
			}
		}

		public function editar_datos_actividad_empresa($id_ae, $codigo_actividad_empresa_editar, $descripcion_actividad_empresa_editar)
		{
			$consulta = "UPDATE actvidadempresa
						SET codigo_ae = '$codigo_actividad_empresa_editar', descripcion_ae = '$descripcion_actividad_empresa_editar' WHERE id_ae = '$id_ae'";
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


	
