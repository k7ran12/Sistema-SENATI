<?php 
	require_once("conexion_model.php");
	/**
	 * 
	 */
	class carrera_model extends conexion_model
	{
		private $con;

		function __construct()
		{
			$this->con = parent::conectar();
		}

		public function mostrar_carrera()
		{
			
			$consulta = "SELECT * FROM carrera ORDER BY codigo_carr LIMIT 10";

			$query = mysqli_query($this->con, $consulta);
			$array_carrera = array();

			while ($datos = mysqli_fetch_assoc($query)) 
			{
				$array['id_carr'] = $datos['id_carr'];
				$array['codigo_carr'] = $datos['codigo_carr'];
				$array['descripcion_carr'] = $datos['descripcion_carr'];							
				array_push($array_carrera, $array);
			}

			return $array_carrera;
		}				
		
		public function buscar_datos_carrera($buscar){

			$consulta = "SELECT * FROM carrera WHERE codigo_carr = '$buscar'";

			$query = mysqli_query($this->con, $consulta);
			$array_carrera = array();
			while ($datos = mysqli_fetch_assoc($query)) 
			{
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


	
