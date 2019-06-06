<?php 
	
	require_once("conexion_model.php");
	/**
	 * 
	 */
	class login_model extends conexion_model
	{
		private $con;

		function __construct()
		{
			$this->con = parent::conectar();
		}

		public function ingresar($usuario, $pass){			
			$consulta = "SELECT * FROM usuarios WHERE nick_usua = '$usuario'";
			$query = mysqli_query($this->con , $consulta);

			$filas = mysqli_num_rows($query);

			$datos = mysqli_fetch_assoc($query);
			if ($filas >= 1) {
				//echo "Hay uno o mas usuario";
				if ($pass == $datos['password_usua']) {
					return true;
				}
				else{
					return false;
				}

			}
			else{
				return false;
			}
		}

		public function mostrar_usuarios(){
			$consulta = "SELECT * FROM usuarios LIMIT 10";
			$query = mysqli_query($this->con, $consulta);
			$array_usu = array();
			$i = 1;
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
		

	}
	