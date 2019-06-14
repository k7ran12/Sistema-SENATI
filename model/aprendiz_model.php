<?php 
	require_once("conexion_model.php");
	/**
	 * 
	 */
	class aprendiz_model extends conexion_model
	{
		private $con;

		function __construct()
		{
			$this->con = parent::conectar();
		}

		public function mostrar_aprendiz(){
			
				$consulta = "SELECT a.*, c.codigo_cfp, c.descripcion_cfp, c.direccion_cfp, c.id_ubi, ubigeo.cod_ubi as cod_cfp_ubigeo, ubigeo.departamento_ubi as departamento_cfp_ubigeo, ubigeo.provincia_ubi as provincia_cfp_ubigeo, ubigeo.distrito_ubi as distrito_cfp_ubigeo, u.cod_ubi as cod_ubi_aprendiz, u.departamento_ubi as departamento_ubi_aprendiz, u.provincia_ubi as provincia_ubi_aprendiz, u.distrito_ubi as distrito_ubi_aprendiz FROM aprendiz a INNER JOIN cfp c ON a.id_cfp = c.id_cfp INNER JOIN ubigeo u ON u.id_ubi = a.id_ubi INNER JOIN ubigeo ON ubigeo.id_ubi = c.id_ubi";

			$query = mysqli_query($this->con, $consulta);
			$array_aprendiz = array();
			while ($datos = mysqli_fetch_array($query, MYSQLI_NUM)) {
				$array[] = $datos[0];
				$array[] = $datos[1];
				$array[] = $datos[2];
				$array[] = $datos[3];
				$array[] = $datos[4];
				$array[] = $datos[5];
				$array[] = $datos[6];
				$array[] = $datos[7];
				$array[] = $datos[8];
				$array[] = $datos[9];
				$array[] = $datos[10];
				$array[] = $datos[11];
				$array[] = $datos[12];
				$array[] = $datos[13];
				$array[] = $datos[14];
				$array[] = $datos[15];
				$array[] = $datos[16];
				$array[] = $datos[17];
				$array[] = $datos[18];
				$array[] = $datos[19];
				$array[] = $datos[20];
				$array[] = $datos[21];
				$array[] = $datos[22];
				$array[] = $datos[23];
				$array[] = $datos[24];
				$array[] = $datos[25];
				$array[] = $datos[26];
				$array[] = $datos[27];
				$array[] = $datos[28];
				$array[] = $datos[29];
				array_push($array_aprendiz, $array);
			}

			return $array_aprendiz;
			}				
		
		public function buscar_datos_aprendi($buscar){

			$consulta = "SELECT a.*, c.codigo_cfp, c.descripcion_cfp, c.direccion_cfp, c.id_ubi, ubigeo.cod_ubi as cod_cfp_ubigeo, ubigeo.departamento_ubi as departamento_cfp_ubigeo, ubigeo.provincia_ubi as provincia_cfp_ubigeo, ubigeo.distrito_ubi as distrito_cfp_ubigeo, u.cod_ubi as cod_ubi_aprendiz, u.departamento_ubi as departamento_ubi_aprendiz, u.provincia_ubi as provincia_ubi_aprendiz, u.distrito_ubi as distrito_ubi_aprendiz FROM aprendiz a INNER JOIN cfp c ON a.id_cfp = c.id_cfp INNER JOIN ubigeo u ON u.id_ubi = a.id_ubi INNER JOIN ubigeo ON ubigeo.id_ubi = c.id_ubi WHERE a.id_ap = '$buscar'";

			$query = mysqli_query($this->con, $consulta);
			$array_aprendiz = array();
			while ($datos = mysqli_fetch_array($query, MYSQLI_NUM)) {
				$array[] = $datos[0];
				$array[] = $datos[1];
				$array[] = $datos[2];
				$array[] = $datos[3];
				$array[] = $datos[4];
				$array[] = $datos[5];
				$array[] = $datos[6];
				$array[] = $datos[7];
				$array[] = $datos[8];
				$array[] = $datos[9];
				$array[] = $datos[10];
				$array[] = $datos[11];
				$array[] = $datos[12];
				$array[] = $datos[13];
				$array[] = $datos[14];
				$array[] = $datos[15];
				$array[] = $datos[16];
				$array[] = $datos[17];
				$array[] = $datos[18];
				$array[] = $datos[19];
				$array[] = $datos[20];
				$array[] = $datos[21];
				$array[] = $datos[22];
				$array[] = $datos[23];
				$array[] = $datos[24];
				$array[] = $datos[25];
				$array[] = $datos[26];
				$array[] = $datos[27];
				$array[] = $datos[28];
				$array[] = $datos[29];
				array_push($array_aprendiz, $array);
			}

			return $array_aprendiz;
				
			
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


	
