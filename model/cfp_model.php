<?php 
	require_once("conexion_model.php");
	/**
	 * 
	 */
	class cfp_model extends conexion_model
	{
		private $con;

		function __construct()
		{
			$this->con = parent::conectar();
		}

		public function mostrar_cfp(){
			
				$consulta = "SELECT c.id_cfp, c.codigo_cfp, c.descripcion_cfp, c.direccion_cfp, u.departamento_ubi, u.provincia_ubi, u.distrito_ubi FROM cfp c INNER JOIN ubigeo u ON u.id_ubi = c.id_ubi  ORDER BY u.departamento_ubi LIMIT 10";

			$query = mysqli_query($this->con, $consulta);
			$array_cfp = array();
			while ($datos = mysqli_fetch_assoc($query)) {
				$array['id_cfp'] = $datos['id_cfp'];
				$array['codigo_cfp'] = $datos['codigo_cfp'];
				$array['descripcion_cfp'] = $datos['descripcion_cfp'];
				$array['direccion_cfp'] = $datos['direccion_cfp'];
				$array['departamento_ubi'] = $datos['departamento_ubi'];
				$array['provincia_ubi'] = $datos['provincia_ubi'];
				$array['distrito_ubi'] = $datos['distrito_ubi'];
				array_push($array_cfp, $array);
			}

			return $array_cfp;
			}				
		
		public function buscar_datos_cfp($buscar){

			$consulta = "SELECT c.id_cfp, c.codigo_cfp, c.descripcion_cfp, c.direccion_cfp, u.departamento_ubi, u.provincia_ubi, u.distrito_ubi FROM cfp c INNER JOIN ubigeo u ON u.id_ubi = c.id_ubi WHERE c.codigo_cfp = '$buscar'";

			$query = mysqli_query($this->con, $consulta);
			$array_cfp = array();
			while ($datos = mysqli_fetch_assoc($query)) {
				$array['id_cfp'] = $datos['id_cfp'];
				$array['codigo_cfp'] = $datos['codigo_cfp'];
				$array['descripcion_cfp'] = $datos['descripcion_cfp'];
				$array['direccion_cfp'] = $datos['direccion_cfp'];
				$array['departamento_ubi'] = $datos['departamento_ubi'];
				$array['provincia_ubi'] = $datos['provincia_ubi'];
				$array['distrito_ubi'] = $datos['distrito_ubi'];
				array_push($array_cfp, $array);
			}

			return $array_cfp;
			
		}
		

	}


	
