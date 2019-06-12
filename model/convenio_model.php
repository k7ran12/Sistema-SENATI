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

		public function mostrar_convenio()
		{
			
			$consulta = "SELECT * FROM convenio ORDER BY id_conv LIMIT 10";

			$query = mysqli_query($this->con, $consulta);
			$array_carrera = array();

			while ($datos = mysqli_fetch_assoc($query)) 
			{
				$array['id_conv'] = $datos['id_conv'];				
				$array['desc_conv'] = $datos['desc_conv'];							
				array_push($array_carrera, $array);
			}

			return $array_carrera;
		}				
		
		public function buscar_datos_convenio($buscar){

			$consulta = "SELECT * FROM convenio WHERE id_conv = '$buscar'";

			$query = mysqli_query($this->con, $consulta);
			$array_carrera = array();
			while ($datos = mysqli_fetch_assoc($query)) 
			{
				$array['id_conv'] = $datos['id_conv'];				
				$array['des_conv'] = $datos['des_conv'];							
				array_push($array_carrera, $array);
			}

			return $array_carrera;
			
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


	
