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
			if (!empty($_POST['nick']) && !empty($_POST['password']) && !empty($_POST['nombres']) && !empty($_POST['apellidos']) && !empty($_POST['nivel'])) {
				$nick = $_POST['nick'];
				$password = $_POST['password'];
				$nombres = $_POST['nombres'];
				$apellidos = $_POST['apellidos'];
				$nivel = $_POST['nivel'];				

				$respuesta = $login_model->agregar_usuarios($nick, $password, $nombres, $apellidos, $nivel);
				if ($respuesta == true) {
					echo "agregado";
				}
				else{
					echo "incorrecto";
				}
			}
			else{
				echo "invalidado";
			}		
		
	}
	elseif(!empty($_POST['accion']) && $_POST['accion'] == "editar"){

		if (!empty($_POST['editar_nick']) && !empty($_POST['editar_nombres']) && !empty($_POST['editar_apellidos']) && !empty($_POST['editar_nivel']) && !empty($_POST['id_usua'])) {

				$nick = $_POST['editar_nick'];
				$id_usua = $_POST['id_usua'];
				$nombres = $_POST['editar_nombres'];
				$apellidos = $_POST['editar_apellidos'];
				$nivel = $_POST['editar_nivel'];				

				$respuesta = $login_model->editar_usuario($id_usua, $nick, $nombres, $apellidos, $nivel);
				if ($respuesta == true) 
				{
					echo "editado";
				}
				else
				{
					echo "incorrecto";
				}
			}

			else{
				echo "invalidado";
			}
	}

	else{
		echo "No cumple las condiciones";
	}
