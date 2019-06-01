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
	}
	