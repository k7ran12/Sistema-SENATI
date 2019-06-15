<?php 
	require_once("conexion_model.php");
	/**
	 * 
	 */
	class semestre_model extends conexion_model
	{
		private $con;

		function __construct()
		{
			$this->con = parent::conectar();
		}

		public function mostrar_semestre()
		{
			
			$consulta = "SELECT * FROM semestre ORDER BY codigo_sem";

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


	
