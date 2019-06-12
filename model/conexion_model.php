<?php 
	/**
	 * 
	 */
	class conexion_model
	{
		private $host = "localhost";
		private $user = "root";
		private $pass = "";
		private $bd = "sistemapva";

		public function conectar(){
			$con = mysqli_connect($this->host, $this->user, $this->pass, $this->bd);

			if (!$con) {		
					echo mysqli_connect_errno() . PHP_EOL;		    
				    exit;
				}
			mysqli_set_charset ( $con , 'utf8' );

			return $con;

			mysqli_close($con);
		}
	}