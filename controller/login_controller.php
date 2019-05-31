<?php 
session_start();
	require_once("../model/login_model.php");

	$login_model = new login_model();	

	if (!empty($_POST['accion']) && $_POST['accion'] == "ingresar") {
		//echo "Se llama a ingresar";
		if (!empty($_POST['usuario']) && !empty($_POST['password'])) {
			//echo "validado";
			$usuario = $_POST['usuario'];
			$pass = $_POST['password'];
			$respuesta = $login_model->ingresar($usuario, $pass);

			if ($respuesta == true) {
				$_SESSION['usuario'] = $usuario;
				//Tipo de usuario
				//$_SESSION['tipo_usuario'] = $row['id_tipo'];
			}
			else{
				echo "incorrecto";
			}
		}
		else{
			echo "invalidado";
		}
	}
	else if (!empty($_POST['accion']) && $_POST['accion'] == "registrar") {
		echo "Se llama a registrar";
	}
	else{
		echo "No cumple las condiciones";
	}
