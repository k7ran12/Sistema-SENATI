<?php 
	
	require_once("conexion_model.php");
	/**
	 * 
	 */
	class login_model extends conexion_model
	{
		private $con;
		private $cantidad_filas = 3;

		function __construct()
		{
			$this->con = parent::conectar();
		}

		public function catidad_de_datos_login($buscar){
			if ($buscar != "") {

				$consulta = "SELECT * FROM usuarios WHERE nick_usua = '$buscar'";

				$query = mysqli_query($this->con , $consulta);

				$columnas = mysqli_num_rows ($query);

				$pag = $columnas / $this->cantidad_filas;

				return ceil ($pag);
			}
			else{
				$consulta = "SELECT * FROM usuarios";

				$query = mysqli_query($this->con , $consulta);

				$columnas = mysqli_num_rows ($query);

				$pag = $columnas / $this->cantidad_filas;

				return ceil ($pag);
			}
		}


		public function ingresar($usuario, $pass){			
			$consulta = "SELECT * FROM usuarios WHERE nick_usua = '$usuario'";
			$query = mysqli_query($this->con , $consulta);

			$filas = mysqli_num_rows($query);

			$datos = mysqli_fetch_assoc($query);
			if ($filas >= 1) {
				//echo "Hay uno o mas usuario";
				if ($pass == $datos['password_usua']) {
					$dato = [$datos['nivel_usua'], $datos['nick_usua']];

					return $dato;
				}
				else{
					return false;
				}

			}
			else{
				return false;
			}
		}

		public function mostrar_usuarios($inicio_pag, $busqueda){
		$cantidad_datos = $this->cantidad_filas;

			$total_paginas = ($inicio_pag - 1) * $cantidad_datos;

			//$total_paginas;

			if ($busqueda != "") {				

				//$total_paginas = ($inicio_pag-1) * $cantidad_datos;

			$consulta = "SELECT * FROM usuarios WHERE nombres_usua = '$busqueda'";
			echo $consulta;
			$query = mysqli_query($this->con, $consulta);
			$i = 1;
			$array_usu = array();
			while ($datos = mysqli_fetch_assoc($query)) {
				$array['id_usua'] = $datos['id_usua'];
				$array['autoincrement'] = $i++;
				$array['nick_usua'] = $datos['nick_usua'];
				$array['password_usua'] = $datos['password_usua'];
				$array['nombres_usua'] = $datos['nombres_usua'];
				$array['apellidos_usua'] = $datos['apellidos_usua'];
				$array['nivel_usua'] = $datos['nivel_usua'];
				array_push($array_usu, $array);	
			}

			return $array_usu;
			}
			else{
				
				$consulta = "SELECT * FROM usuarios LIMIT $total_paginas , $cantidad_datos";
				
			$query = mysqli_query($this->con, $consulta);
			$i = 1;
			$array_usu = array();
			while ($datos = mysqli_fetch_assoc($query)) {
				$array['id_usua'] = $datos['id_usua'];
				$array['autoincrement'] = $i++;
				$array['nick_usua'] = $datos['nick_usua'];
				$array['password_usua'] = $datos['password_usua'];
				$array['nombres_usua'] = $datos['nombres_usua'];
				$array['apellidos_usua'] = $datos['apellidos_usua'];
				$array['nivel_usua'] = $datos['nivel_usua'];
				array_push($array_usu, $array);
			}

			return $array_usu;

			}


			//Codigo Aparte
		}

		public function agregar_usuarios($nick_usua, $password_usua, $nombres_usua, $apellidos_usua, $nivel_usua){
			$consulta = "INSERT INTO usuarios(nick_usua, password_usua, nombres_usua, apellidos_usua, nivel_usua) VALUES ('$nick_usua', '$password_usua', '$nombres_usua', '$apellidos_usua', '$nivel_usua')";
			$query = mysqli_query($this->con, $consulta);
			if ($query) {
				return true;
			}
			else{
				return false;
			}
		}

		public function editar_usuario($id_usua, $nick, $nombres, $apellidos, $nivel)
		{
			$consulta = "UPDATE `usuarios` SET `nick_usua` = '$nick', `nombres_usua` = '$nombres', `apellidos_usua` = '$apellidos', `nivel_usua` = '$nivel' WHERE `usuarios`.`id_usua` = '$id_usua';";

			$query = mysqli_query($this->con, $consulta);
			if ($query) {
				return true;
			}
			else{
				return false;
			}
			
		}
		

	}
	