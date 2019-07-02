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


		public function catidad_de_datos_vinculacion($buscar){
			if ($buscar != "") {

				$consulta = "SELECT * FROM vinculacion v INNER JOIN aprendiz a ON v.id_ap = a.id_ap INNER JOIN empresa e ON e.id_emp = v.id_emp INNER JOIN carrera c ON c.id_carr = v.id_carr INNER JOIN cfp cf ON cf.id_cfp = v.id_cfp INNER JOIN semestre s ON s.id_sem = v.id_sem INNER JOIN monitor m ON m.id_mon = v.id_mon INNER JOIN convenio con ON con.id_conv = v.id_conv WHERE a.id_senati_ap = '$buscar' OR a.dni_ap = '$buscar'";

				$query = mysqli_query($this->con , $consulta);

				$columnas = mysqli_num_rows ($query);

				$pag = $columnas / 10;

				return ceil ($pag);
			}
			else{
				$consulta = "SELECT * FROM vinculacion v INNER JOIN aprendiz a ON v.id_ap = a.id_ap INNER JOIN empresa e ON e.id_emp = v.id_emp INNER JOIN carrera c ON c.id_carr = v.id_carr INNER JOIN cfp cf ON cf.id_cfp = v.id_cfp INNER JOIN semestre s ON s.id_sem = v.id_sem INNER JOIN monitor m ON m.id_mon = v.id_mon INNER JOIN convenio con ON con.id_conv = v.id_conv";

				$query = mysqli_query($this->con , $consulta);

				$columnas = mysqli_num_rows ($query);

				$pag = $columnas / 10;

				return ceil ($pag);
			}
		}


		public function mostrar_vinculacion($inicio_pag, $busqueda){

			$cantidad_datos = 10;

			$total_paginas = $inicio_pag * $cantidad_datos;

			if ($busqueda != "") {				

				$total_paginas = $inicio_pag * $cantidad_datos;

			$consulta = "SELECT * FROM vinculacion v INNER JOIN aprendiz a ON v.id_ap = a.id_ap INNER JOIN empresa e ON e.id_emp = v.id_emp INNER JOIN carrera c ON c.id_carr = v.id_carr INNER JOIN cfp cf ON cf.id_cfp = v.id_cfp INNER JOIN semestre s ON s.id_sem = v.id_sem INNER JOIN monitor m ON m.id_mon = v.id_mon INNER JOIN convenio con ON con.id_conv = v.id_conv WHERE a.id_senati_ap = '$busqueda' OR a.dni_ap = '$busqueda'";
			$query = mysqli_query($this->con, $consulta);
			$array_vinculacion = array();
			while ($datos = mysqli_fetch_assoc($query)) {
				$array['id_vin'] = $datos['id_vin'];
				$array['dni_ap'] = $datos['dni_ap'];
				$array['nombres_ap'] = $datos['nombres_ap'];
				$array['apellidos_ap'] = $datos['apellidos_ap'];
				$array['telefono_ap'] = $datos['telefono_ap'];
				$array['id_senati_ap'] = $datos['id_senati_ap'];
				$array['ruc_emp'] = $datos['ruc_emp'];
				$array['razonsocial_emp'] = $datos['razonsocial_emp'];
				$array['id_ap'] = $datos['id_ap'];
				$array['id_emp'] = $datos['id_emp'];
				$array['id_carr'] = $datos['id_carr'];
				$array['id_cfp'] = $datos['id_cfp'];
				$array['id_sem'] = $datos['id_sem'];
				$array['fechaini_prac_vin'] = $datos['fechaini_prac_vin'];
				$array['fechafin_prac_vin'] = $datos['fechafin_prac_vin'];
				$array['fechaini_sem_vin'] = $datos['fechaini_sem_vin'];
				$array['fechafin_sem_vin'] = $datos['fechafin_sem_vin'];
				$array['id_mon'] = $datos['id_mon'];
				$array['id_conv'] = $datos['id_conv'];
				$array['grupo_vin'] = $datos['grupo_vin'];				

				array_push($array_vinculacion, $array);

			}

			return $array_vinculacion;
			}
			else{
				
				$consulta = "SELECT * FROM vinculacion v INNER JOIN aprendiz a ON v.id_ap = a.id_ap INNER JOIN empresa e ON e.id_emp = v.id_emp INNER JOIN carrera c ON c.id_carr = v.id_carr INNER JOIN cfp cf ON cf.id_cfp = v.id_cfp INNER JOIN semestre s ON s.id_sem = v.id_sem INNER JOIN monitor m ON m.id_mon = v.id_mon INNER JOIN convenio con ON con.id_conv = v.id_conv LIMIT $total_paginas , $cantidad_datos";
			$query = mysqli_query($this->con, $consulta);
			$array_vinculacion = array();
			while ($datos = mysqli_fetch_assoc($query)) {
				$array['id_vin'] = $datos['id_vin'];
				$array['dni_ap'] = $datos['dni_ap'];
				$array['nombres_ap'] = $datos['nombres_ap'];
				$array['apellidos_ap'] = $datos['apellidos_ap'];
				$array['telefono_ap'] = $datos['telefono_ap'];
				$array['id_senati_ap'] = $datos['id_senati_ap'];
				$array['ruc_emp'] = $datos['ruc_emp'];
				$array['razonsocial_emp'] = $datos['razonsocial_emp'];
				$array['id_ap'] = $datos['id_ap'];
				$array['id_emp'] = $datos['id_emp'];
				$array['id_carr'] = $datos['id_carr'];
				$array['id_cfp'] = $datos['id_cfp'];
				$array['id_sem'] = $datos['id_sem'];
				$array['fechaini_prac_vin'] = $datos['fechaini_prac_vin'];
				$array['fechafin_prac_vin'] = $datos['fechafin_prac_vin'];
				$array['fechaini_sem_vin'] = $datos['fechaini_sem_vin'];
				$array['fechafin_sem_vin'] = $datos['fechafin_sem_vin'];
				$array['id_mon'] = $datos['id_mon'];
				$array['id_conv'] = $datos['id_conv'];
				$array['grupo_vin'] = $datos['grupo_vin'];				

				array_push($array_vinculacion, $array);
			}

			return $array_vinculacion;

			}

			}			
		
		

		public function agregar_datos_vinculacion($aprendiz, $empresa, $carrera, $cfp, $semestre, $fechaini_prac, $fechafin_prac, $fechaini_sem, $fechafin_sem, $monitor, $convenio, $grupo)
		{
			$consulta = "INSERT INTO vinculacion (`id_vin`, `id_ap`, `id_emp`, `id_carr`, `id_cfp`, `id_sem`, `fechaini_prac_vin`, `fechafin_prac_vin`, `fechaini_sem_vin`, `fechafin_sem_vin`, `id_mon`, `id_conv`, `grupo_vin`) VALUES (NULL, '$aprendiz', '$empresa', '$carrera', '$cfp', '$semestre', '$fechaini_prac', '$fechafin_prac', '$fechaini_sem', '$fechafin_sem', '$monitor', '$convenio', '$grupo');";

			
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


	
