<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<?php require_once("head.php") ?>
	<title></title>
</head>
<body>

	<?php 
       
        require_once("navbar_view.php"); 
        require_once("subnavbar_view.php");
      
      
      ?>
	
	<div class="container">
		
		<?php 
	if (empty($_SESSION['usuario'])) {
		header('Location: login_view.php');
	}
 ?>

<img src="../assets/img/descarga.jpg" style="width: 70%;">
<img src="../assets/img/senati-web.jpg" height="411" width="328">

<!--====  End of Modal Editar  ====-->


	</div>

</body>
</html>