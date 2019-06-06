<?php 
	require_once("conexion_model.php");
	/**
	 * 
	 */
	class ubigeo_model extends conexion_model
	{
		private $con;

		function __construct()
		{
			$this->con = parent::conectar();
		}

		public function mostrar_ubigeo(){
			$consulta = "SELECT * FROM ubigeo";
			$query = mysqli_query($this->con, $consulta);
			$array_ubi = array();
			while ($datos = mysqli_fetch_assoc($query)) {
				$array['id_ubi'] = $datos['id_ubi'];
				$array['departamento_ubi'] = $datos['departamento_ubi'];
				$array['provincia_ubi'] = $datos['provincia_ubi'];
				$array['distrito_ubi'] = $datos['distrito_ubi'];
				array_push($array_ubi, $array);
			}

			return $array_ubi;
		}

	}
	
