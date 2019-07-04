<?php 
session_start();

$sub_navbar = $_SERVER["REQUEST_URI"]."usuario";

	if (empty($_SESSION['usuario'])) {
		header('Location: ../');
	}

	if(!$_GET){
		header('Location:usuario_view.php?pagina=1');
	}

	require_once("../model/login_model.php");
	$usuarios = new login_model();
	//$usu = $usuarios->mostrar_usuarios();

	//Datos Pagina



  if (isset($_POST['buscar'])) {
    $busqueda = $_POST['buscar'];
    $_SESSION["buscar"] = $busqueda;

  }
  

  $usu = $usuarios->mostrar_usuarios($_GET['pagina'], $_SESSION["buscar"]);

  $cantidad_de_datos = count($usu);

  //echo $cantidad_de_datos;

  $cantida = $usuarios->catidad_de_datos_login($_SESSION["buscar"]);

  //echo $cantida;


 ?>

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
		<center><h2>Usuarios</h2></center>

<div style="float: left;">
	
     <button type="button" class="btn btn-success my-2 my-sm-0" data-toggle="modal" data-target=".agregar_usuario">Agregar</button>      
    
</div>

<div style="float: right;">
	<form class="form-inline my-2 my-lg-0" method="POST">
      <input class="form-control mr-sm-2" type="search" name="buscar" placeholder="Buscar" aria-label="Search">
      <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Buscar</button>
    </form>
</div><br><br><br>

<div>

<?php if($usu != ""){ ?>
<table class="table table-hover">
  <thead>
    <tr>    
      <th scope="col">Nro</th>  
      <th scope="col">Nick</th>      
      <th scope="col">Nombres</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Nivel</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
  	<?php foreach ($usu as $value_usu) {  		
  	 ?>
    <tr>
      <th><?php echo $value_usu['autoincrement'] ?></th>
      <td style="display: none;" class="datos_usuario_editar"><?php echo $value_usu['id_usua'] ?></td>
      <td class="datos_usuario_editar"><?php echo $value_usu['nick_usua'] ?></td>      
      <td class="datos_usuario_editar"><?php echo $value_usu['nombres_usua'] ?></td>
      <td class="datos_usuario_editar"><?php echo $value_usu['apellidos_usua'] ?></td>
      <td class="datos_usuario_editar"><?php echo $value_usu['nivel_usua'] ?></td>      
      <td><button type="button" class="btn btn-primary editar_usuario" data-toggle="modal" data-target=".editar_usuario_modal">E</button></td>
    </tr>
    <?php } ?>    
  </tbody>
</table>

<!-- Paginacion  -->

      <ul class="pagination" style="float: left;">
        
        <li class="page-item <?php echo $_GET['pagina']<= 1? 'disabled' : '' ?>"><a id="a_pagina" href="usuario_view.php?pagina=<?php echo $_GET['pagina'] - 1 ?>" class="page-link a_pagina">Anterior</a></li>
      </ul>

      <nav aria-label="Page navigation example" style="width: 84%;float: left;">
        <div class="table-responsive">
          <ul class="pagination">                      
            <?php for ($i=0; $i < $cantida; $i++) { 

             ?>            
            <li class="page-item <?php echo $_GET['pagina'] == $i + 1  ? 'active' : '' ?>"><a class="page-link" href="usuario_view.php?pagina=<?php echo $i + 1 ?>" value="<?php echo $i + 1; ?>"><?php echo $i + 1; ?></a></li>
            
            <?php } ?>                   
        </ul>
        </div>
      </nav> 

      <ul class="pagination" style="float: right;">
        <li class="page-item <?php echo $_GET['pagina']>=$cantida? 'disabled' : '' ?>"><a id="s_pagina" href="usuario_view.php?pagina=<?php echo $_GET['pagina'] + 1 ?>" class="page-link s_pagina">Siguiente</a></li>
      </ul>

      <!-- Fin Paginacion -->

<?php } else{?>



	<table class="table table-hover">
  <thead>
    <tr>    
      <th scope="col">Nro</th>  
      <th scope="col">Nick</th>      
      <th scope="col">Nombres</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Nivel</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
  	<td class="alert alert-danger" role="alert" colspan="6"><center><h5>No hay datos</h5></center></td>  
  </tbody>
</table>

<?php } ?>




<!--==============================================
=            Modal Formulario Agregar            =
===============================================-->

<div class="modal fade agregar_usuario" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">      
	      <div class="modal-header">
	        <h5 style="text-align: center !important;" class="modal-title">Agregar Usuario</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form id="form_agregar_usuario">
			  <div class="form-group">
			    <label for="nick">Nick</label>
			    <input type="text" class="form-control" id="nick" name="nick" aria-describedby="emailHelp">			    
			  </div>
			  <div class="form-group">
			    <label for="password">Password</label>
			    <input type="text" class="form-control" id="password" name="password">
			  </div>
			  <div class="form-group">
			    <label for="nombres">Nombre</label>
			    <input type="text" class="form-control" id="nombres" name="nombres">
			  </div>
			  <div class="form-group">
			    <label for="apellidos">Apellidos</label>
			    <input type="text" class="form-control" id="apellidos" name="apellidos">
			  </div>
			  <div class="form-group">
			  	  <label>Nivel</label>			  	  
			  	  <select class="custom-select" name="nivel">			  	  					  	
				  	<option value="Admin">Admin</option>				  					  	
				  	<option value="Especialista">Especialista</option>
				  	<option value="Usuario">Usuario</option>
				  </select>
			  </div>
			  
	      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
		        <button type="submit" class="btn btn-primary">Guardar</button>
		      </div>
	      </form>
    </div>
  </div>
</div>

<!--====  End of Modal Formulario Agregar  ====-->

<!--=============================================
=            Modal Formulario Editar            =
==============================================-->

<div class="modal fade editar_usuario_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
	        <h5 style="text-align: center !important;" class="modal-title">Editar Usuario</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form id="form_editar_usuario">
	        	<input type="hidden" name="id_usua" id="id_usua">
			  <div class="form-group">
			    <label for="editar_nick">Nick</label>
			    <input type="text" class="form-control" id="editar_nick" name="editar_nick" aria-describedby="emailHelp">			    
			  </div>
			  <div class="form-group">
			    <label for="editar_password">Password</label>
			    <input type="text" class="form-control" id="editar_password" name="editar_password">
			  </div>
			  <div class="form-group">
			    <label for="editar_nombres">Nombres</label>
			    <input type="text" class="form-control" id="editar_nombres" name="editar_nombres">
			  </div>
			  <div class="form-group">
			    <label for="editar_apellidos">Apellidos</label>
			    <input type="text" class="form-control" id="editar_apellidos" name="editar_apellidos">
			  </div>
			  <div class="form-group">
			  	  <label>Nivel de Usuario</label>			  	  
			  	  <select class="custom-select" name="editar_nivel" id="editar_nivel">
				  	<option value="Admin">Admin</option>		  	
				  	<option value="Especialista">Especialista</option>
				  	<option value="Usuario">Usuario</option>
				  </select>
			  </div>
	      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
		        <button type="submit" class="btn btn-primary">Guardar</button>
		      </div>
	      </form>
    </div>
  </div>
</div>

<!--====  End of Modal Formulario Editar  ====-->
	</div>

</body>
</html>


