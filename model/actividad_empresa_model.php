<?php 
	require_once("conexion_model.php");
	/**
	 * 
	 */
	class actividad_empresa_model extends conexion_model
	{
		private $con;

		function __construct()
		{
			$this->con = parent::conectar();
		}

		public function mostrar_actividad_empresa()
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
		
		public function buscar_actividad_empresa($buscar){

			$consulta = "SELECT * FROM actvidadempresa WHERE codigo_ae = '$buscar'";

			$query = mysqli_query($this->con, $consulta);
			$array_carrera = array();
			while ($datos = mysqli_fetch_assoc($query)) 
			{
				$array['id_ae'] = $datos['id_ae'];
				$array['codigo_ae'] = $datos['codigo_ae'];
				$array['descripcion_ae'] = $datos['descripcion_ae'];							
				array_push($array_carrera, $array);
			}

			return $array_carrera;
			
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


	
