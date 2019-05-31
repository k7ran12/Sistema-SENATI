<?php 
	if (empty($_SESSION['usuario'])) {
		header('Location: ../');
	}
 ?>
<h1>Hola</h1>