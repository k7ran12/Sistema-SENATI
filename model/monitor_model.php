<?php 
	require_once("conexion_model.php");
	/**
	 * 
	 */
	class monitor_model extends conexion_model
	{
		private $con;
		private $cantidad_filas = 3;

		function __construct()
		{
			$this->con = parent::conectar();
		}

		public function catidad_de_datos_empresa($buscar){
			if ($buscar != "") {

				$consulta = "SELECT * FROM monitor WHERE dni_mon = '$buscar'";

				$query = mysqli_query($this->con , $consulta);

				$columnas = mysqli_num_rows ($query);

				$pag = $columnas / $this->cantidad_filas;

				return ceil ($pag);
			}
			else{
				$consulta = "SELECT * FROM monitor";

				$query = mysqli_query($this->con , $consulta);

				$columnas = mysqli_num_rows ($query);

				$pag = $columnas / $this->cantidad_filas;

				return ceil ($pag);
			}
		}

		public function mostrar_monitor($inicio_pag, $busqueda)
		{
			$cantidad_datos = $this->cantidad_filas;

			$total_paginas = ($inicio_pag - 1) * $cantidad_datos;

			if ($busqueda != "") {				

				$total_paginas = $inicio_pag * $cantidad_datos;

			$consulta = "SELECT * FROM monitor WHERE dni_mon = '$busqueda'";
			$query = mysqli_query($this->con, $consulta);
			$array_monitor = array();
			while ($datos = mysqli_fetch_assoc($query)) {
				$array['id_mon'] = $datos['id_mon'];
				$array['apellidos_mon'] = $datos['apellidos_mon'];
				$array['nombres_mon'] = $datos['nombres_mon'];							
				$array['dni_mon'] = $datos['dni_mon'];	
				$array['telefono_mon'] = $datos['telefono_mon'];	
				$array['cargo_mon'] = $datos['cargo_mon'];
				$array['correo_mon'] = $datos['correo_mon'];
				array_push($array_monitor, $array);
			}

			return $array_monitor;
			}
			else{
				
				$consulta = "SELECT * FROM monitor LIMIT $total_paginas , $cantidad_datos";
			$query = mysqli_query($this->con, $consulta);
			$array_monitor = array();
			while ($datos = mysqli_fetch_assoc($query)) {
				$array['id_mon'] = $datos['id_mon'];
				$array['apellidos_mon'] = $datos['apellidos_mon'];
				$array['nombres_mon'] = $datos['nombres_mon'];							
				$array['dni_mon'] = $datos['dni_mon'];	
				$array['telefono_mon'] = $datos['telefono_mon'];	
				$array['cargo_mon'] = $datos['cargo_mon'];
				$array['correo_mon'] = $datos['correo_mon'];
				array_push($array_monitor, $array);
			}

			return $array_monitor;

			}


			//Codigo Aparte		
		}

		public function mostrar_todo_monitor()
		{
			$consulta = "SELECT * FROM monitor";
			$query = mysqli_query($this->con, $consulta);
			$array_monitor = array();
			while ($datos = mysqli_fetch_assoc($query)) {
				$array['id_mon'] = $datos['id_mon'];
				$array['apellidos_mon'] = $datos['apellidos_mon'];
				$array['nombres_mon'] = $datos['nombres_mon'];							
				$array['dni_mon'] = $datos['dni_mon'];	
				$array['telefono_mon'] = $datos['telefono_mon'];	
				$array['cargo_mon'] = $datos['cargo_mon'];
				$array['correo_mon'] = $datos['correo_mon'];
				array_push($array_monitor, $array);
			}

			return $array_monitor;
		}			

		public function agregar_datos_monitor($apellidos, $nombres, $dni, $telefono, $cargo, $correo)
		{
			$consulta = "INSERT INTO monitor VALUES(NULL, '$apellidos', '$nombres', '$dni', '$telefono', '$cargo', '$correo')";
			$query = mysqli_query($this->con, $consulta);
			if ($query) {
				return true;
			}
			else{
				return false;
			}
		}

		public function editar_datos_monitor($id_mon, $apellidos, $nombres, $dni, $telefono, $cargo, $correo)
		{
			$consulta = "UPDATE `monitor` SET `apellidos_mon` = '$apellidos', `nombres_mon` = '$nombres', `dni_mon` = '$dni', `telefono_mon` = '$telefono', `cargo_mon` = '$cargo', `correo_mon` = '$correo' WHERE `monitor`.`id_mon` = '$id_mon';";

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


	
