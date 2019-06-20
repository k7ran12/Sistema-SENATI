<?php 
	require_once("conexion_model.php");
	/**
	 * 
	 */
	class vinculacion_model extends conexion_model
	{
		private $con;

		function __construct()
		{
			$this->con = parent::conectar();
		}

		public function mostrar_vinculacion(){
			
				$consulta = "SELECT v.id_vin, v.fechaini_prac_vin, v.fechafin_prac_vin, v.fechaini_sem_vin, v.fechafin_sem_vin, v.grupo_vin, a.*, e.*, c.*, cf.*, s.*, m.*, con.* FROM vinculacion v INNER JOIN aprendiz a ON v.id_ap = a.id_ap INNER JOIN empresa e ON e.id_emp = v.id_emp INNER JOIN carrera c ON c.id_carr = v.id_carr INNER JOIN cfp cf ON cf.id_cfp = v.id_cfp INNER JOIN semestre s ON s.id_sem = v.id_sem INNER JOIN monitor m ON m.id_mon = v.id_mon INNER JOIN convenio con ON con.id_conv = v.id_conv";

			$query = mysqli_query($this->con, $consulta);
			//$array_vinculacion = array();

			$array_vinculacion = mysqli_fetch_all ( $query );

			return $array_vinculacion;
			}				
		
		public function buscar_datos_empresa($buscar){

			$consulta = "SELECT e.`id_emp`, e.`ruc_emp`, e.`razonsocial_emp`, e.`direccion_emp`, e.`telefono_emp`, e.`correo_emp`, e.`representante_emp`, e.`dnirepresentante_emp`, u.*, ae.*, c.*, ubigeo.cod_ubi, ubigeo.departamento_ubi, ubigeo.provincia_ubi, ubigeo.distrito_ubi FROM empresa e INNER JOIN ubigeo u ON e.id_ubi = u.id_ubi INNER JOIN actvidadempresa ae ON ae.id_ae = e.id_ae INNER JOIN cfp c ON e.id_cfp = c.id_cfp INNER JOIN ubigeo ON ubigeo.id_ubi = c.id_ubi WHERE e.id_emp = '$buscar'";

			$query = mysqli_query($this->con, $consulta);
			$array_empresa = array();
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
				array_push($array_empresa, $array);
			}

			return $array_empresa;
				
			
		}

		public function agregar_datos_empresa($ruc, $razon_social, $direccion, $telefono, $correo, $representante, $dni_representante, $ubicacion_em, $actividad_empresa,$cfp )
		{
			$consulta = "INSERT INTO `empresa` (`id_emp`, `ruc_emp`, `razonsocial_emp`, `direccion_emp`, `telefono_emp`, `correo_emp`, `representante_emp`, `dnirepresentante_emp`, `id_ubi`, `id_ae`, `id_cfp`) VALUES (NULL, '$ruc', '$razon_social', '$direccion', '$telefono', '$correo', '$representante', '$dni_representante', '$ubicacion_em', '$actividad_empresa', '$cfp');";

			
			$query = mysqli_query($this->con, $consulta);
			if ($query) {
				return true;
			}
			else{
				return false;
			}
		}

		public function editar_datos_empresa($id_emp, $ruc, $razon_social, $direccion, $telefono, $correo, $representante, $dni_representante, $ubicacion_em, $actividad_empresa,$cfp )
		{
			$consulta = "UPDATE `empresa` SET `ruc_emp` = '$ruc', `razonsocial_emp` = '$razon_social', `direccion_emp` = '$direccion', `telefono_emp` = '$telefono', `correo_emp` = '$correo', `representante_emp` = '$representante', `dnirepresentante_emp` = '$dni_representante', `id_ubi` = '$ubicacion_em', `id_ae` = '$actividad_empresa', `id_cfp` = '$cfp' WHERE `empresa`.`id_emp` = '$id_emp';";

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


	