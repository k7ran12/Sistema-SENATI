<?php 
	require_once("conexion_model.php");
	/**
	 * 
	 */
	class cfp_model extends conexion_model
	{
		private $con;
		private $cantidad_filas = 10;

		function __construct()
		{
			$this->con = parent::conectar();
		}

		public function catidad_de_datos_cfp($buscar){
			if ($buscar != "") {

				$consulta = "SELECT c.id_cfp, c.codigo_cfp, c.descripcion_cfp, c.direccion_cfp, c.id_ubi , u.departamento_ubi, u.provincia_ubi, u.distrito_ubi FROM cfp c INNER JOIN ubigeo u ON u.id_ubi = c.id_ubi WHERE c.codigo_cfp = '$buscar'";

				$query = mysqli_query($this->con , $consulta);

				$columnas = mysqli_num_rows ($query);

				$pag = $columnas / 10;

				return ceil ($pag);
			}
			else{
				$consulta = "SELECT * FROM cfp";

				$query = mysqli_query($this->con , $consulta);

				$columnas = mysqli_num_rows ($query);

				//echo $columnas;

				if ($columnas < $this->cantidad_filas) {
					return 0;
				}
				else{
					//echo "Menor";				

					$pag = $columnas / 10;

					return ceil ($pag);
				}

				
			}
		}

		public function mostrar_cfp(){
			
				$consulta = "SELECT c.id_cfp, c.codigo_cfp, c.descripcion_cfp, c.direccion_cfp, c.id_ubi , u.departamento_ubi, u.provincia_ubi, u.distrito_ubi FROM cfp c INNER JOIN ubigeo u ON u.id_ubi = c.id_ubi  ORDER BY u.departamento_ubi LIMIT 10";

			$query = mysqli_query($this->con, $consulta);
			$array_cfp = array();
			while ($datos = mysqli_fetch_assoc($query)) {
				$array['id_cfp'] = $datos['id_cfp'];
				$array['id_ubi'] = $datos['id_ubi'];
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

			$consulta = "SELECT c.id_cfp, c.codigo_cfp, c.descripcion_cfp, c.direccion_cfp, c.id_ubi , u.departamento_ubi, u.provincia_ubi, u.distrito_ubi FROM cfp c INNER JOIN ubigeo u ON u.id_ubi = c.id_ubi WHERE c.codigo_cfp = '$buscar'";

			$query = mysqli_query($this->con, $consulta);
			$array_cfp = array();
			while ($datos = mysqli_fetch_assoc($query)) {
				$array['id_cfp'] = $datos['id_cfp'];
				$array['id_ubi'] = $datos['id_ubi'];
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

		public function agregar_datos_cfp($codigo_cfp, $descripcion_cfp, $direccion_cfp, $id_ubi)
		{
			$consulta = "INSERT INTO cfp(codigo_cfp, descripcion_cfp, direccion_cfp, id_ubi) VALUES('$codigo_cfp', '$descripcion_cfp', '$direccion_cfp', '$id_ubi')";
			$query = mysqli_query($this->con, $consulta);
			if ($query) {
				return true;
			}
			else{
				return false;
			}
		}

		public function editar_datos_cfp($id_cfp, $id_ubi, $codigo_cfp_editar, $descripcion_cfp_editar, $direccion_cfp_editar, $ubicacion_cfp_editar)
		{
			$consulta = "UPDATE cfp
						SET codigo_cfp = '$codigo_cfp_editar', descripcion_cfp = '$descripcion_cfp_editar',
						descripcion_cfp = '$descripcion_cfp_editar', direccion_cfp = '$direccion_cfp_editar',
						id_ubi = '$ubicacion_cfp_editar'
						WHERE id_cfp = '$id_cfp'";
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


	
