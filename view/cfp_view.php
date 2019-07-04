<?php 

session_start();



//echo $_SESSION["carro"];

	$sub_navbar = $_SERVER["REQUEST_URI"]."cfp";

	if (empty($_SESSION['usuario'])) {
		header('Location: ../');
	}

	require_once("../model/ubigeo_model.php");
	require_once("../model/cfp_model.php");

	$cfp_model = new cfp_model();
	$ubicacion = new ubigeo_model();

	//$datos_cfp = $cfp_model->mostrar_cfp();
	$ubi = $ubicacion->mostrar_ubigeo();	

	

	if(!$_GET){
		header('Location:cfp_view.php?pagina=1');
	}

	//Verificar si hay un post con datos para la busqueda		

	//Datos Pagina


  if (isset($_POST['buscar'])) {
    $busqueda = $_POST['buscar'];
    $_SESSION["buscar"] = $busqueda;

  }
  

  $datos_cfp = $cfp_model->mostrar_cfp($_GET['pagina'], $_SESSION["buscar"]);

  $cantidad_de_datos = count($datos_cfp);

  $cantidad_de_datos = $cfp_model->catidad_de_datos_cfp($_SESSION["buscar"]);

  $cantidad_de_datos;

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
		<center><h2>CFP</h2></center>

<div style="float: left;">
	
     <button type="button" class="btn btn-success my-2 my-sm-0" data-toggle="modal" data-target=".agregar_cfp">Agregar</button>      
    
</div>

<div style="float: right;">
	<form class="form-inline my-2 my-lg-0" action="cfp_view.php" method="POST">
      <input id="buscar" name="buscar" class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
      <button id="buscar_cfp" class="btn btn-outline-primary my-2 my-sm-0" type="submit">Buscar</button>
    </form>
</div><br><br><br>

<?php 	


		

		if (!empty($datos_cfp)) {
			?>
			<table class="table table-hover">
					<tr>
						<th>Codigo CFP</th>
						<th>Descripcion CFP</th>
						<th>Direccion CFP</th>
						<th>Departamento Ubicacion</th>
						<th>Provincia Ubicacion</th>
						<th>Distrito Ubicacion</th>
						<th>Accion</th>						
					</tr>
			<?php 
			foreach ($datos_cfp as $value) {
				?>				
					<tr>
						<td style="display: none;" class="datos_cfp_editar"><?php echo $value['id_cfp'] ?></td>
						<td style="display: none;" class="datos_cfp_editar"><?php echo $value['id_ubi'] ?></td>
						<td class="datos_cfp_editar"><?php echo $value['codigo_cfp'] ?></td>
						<td class="datos_cfp_editar"><?php echo $value['descripcion_cfp'] ?></td>
						<td class="datos_cfp_editar"><?php echo $value['direccion_cfp'] ?></td>
						<td class="datos_cfp_editar"><?php echo $value['departamento_ubi'] ?></td>
						<td class="datos_cfp_editar"><?php echo $value['provincia_ubi'] ?></td>
						<td class="datos_cfp_editar"><?php echo $value['distrito_ubi'] ?></td>
						<td><button type="button" class="btn btn-primary editar_cfp" data-toggle="modal" data-target=".editar_cfp_modal">E</button></td>
					</tr>
				
				<?php 
			}
			?>
			</table>

			<!-- Paginacion  -->

      <ul class="pagination" style="float: left;">
        
        <li class="page-item <?php echo $_GET['pagina']<= 1? 'disabled' : '' ?>"><a id="a_pagina" href="cfp_view.php?pagina=<?php echo $_GET['pagina'] - 1 ?>" class="page-link a_pagina">Anterior</a></li>
      </ul>

      <nav aria-label="Page navigation example" style="width: 84%;float: left;">
        <div class="table-responsive">
          <ul class="pagination">                      
            <?php for ($i=0; $i < $cantidad_de_datos; $i++) { 

             ?>            
            <li class="page-item <?php echo $_GET['pagina'] == $i + 1  ? 'active' : '' ?>"><a class="page-link" href="cfp_view.php?pagina=<?php echo $i + 1 ?>" value="<?php echo $i + 1; ?>"><?php echo $i + 1; ?></a></li>
            
            <?php } ?>                   
        </ul>
        </div>
      </nav> 

      <ul class="pagination" style="float: right;">
        <li class="page-item <?php echo $_GET['pagina']>=$cantidad_de_datos? 'disabled' : '' ?>"><a id="s_pagina" href="cfp_view.php?pagina=<?php echo $_GET['pagina'] + 1 ?>" class="page-link s_pagina">Siguiente</a></li>
      </ul>

      <!-- Fin Paginacion -->


			<?php 
		}
		else{
			?>
			<table class="table table-hover">
					<tr>
						<th>Codigo CFP</th>
						<th>Descripcion CFP</th>
						<th>Direccion CFP</th>
						<th>Departamento Ubicacion</th>
						<th>Provincia Ubicacion</th>
						<th>Distrito Ubicacion</th>
						<th>Accion</th>						
					</tr>
				<tr>
					<td class="alert alert-danger" role="alert" colspan="7"><center><h5>No hay datos</h5></center></td>
				</tr>
			</table>
			<?php 
		}

	
 ?>

<!--==============================================
=            Modal Formulario Agregar            =
===============================================-->

<div class="modal fade agregar_cfp" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">      
	      <div class="modal-header">
	        <h5 style="text-align: center !important;" class="modal-title">Agregar CFP</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form id="from_agregar_cfp">
			  <div class="form-group">
			    <label for="codigo_cfp">Codigo CFP</label>
			    <input type="text" class="form-control" id="codigo_cfp" name="codigo_cfp" aria-describedby="">			    
			  </div>
			  <div class="form-group">
			    <label for="descripcion_cfp">Descripcion</label>
			    <input type="text" class="form-control" id="descripcion_cfp" name="descripcion_cfp">
			  </div>
			  <div class="form-group">
			    <label for="direccion_cfp">Direccion</label>
			    <input type="text" class="form-control" id="direccion_cfp" name="direccion_cfp">
			  </div>
			  <div class="form-group">
			  	  <label>Ubicacion</label>			  	  
			  	  <select class="custom-select" name="ubicacion">
			  	  	<?php 
			  	  	foreach ($ubi as $value) {
			  	   ?>				  	
				  	<option value="<?php echo $value['id_ubi'] ?>"><?php echo $value['departamento_ubi']." - ".$value['provincia_ubi']." - ".$value['distrito_ubi']; ?></option>				  	
				  	<?php } ?>
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

<div class="modal fade editar_cfp_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
	        <h5 style="text-align: center !important;" class="modal-title">Editar CFP</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form id="form_editar_cfp">
	        	<input type="hidden" name="id_cfp" id="id_cfp">
	        	<input type="hidden" name="id_ubi" id="id_ubi">
			  <div class="form-group">
			    <label for="codigo_cfp_editar">Codigo CFP</label>
			    <input type="text" class="form-control" id="codigo_cfp_editar" name="codigo_cfp_editar" aria-describedby="emailHelp">			    
			  </div>
			  <div class="form-group">
			    <label for="descripcion_cfp_editar">Descripcion</label>
			    <input type="text" class="form-control" id="descripcion_cfp_editar" name="descripcion_cfp_editar">
			  </div>
			  <div class="form-group">
			    <label for="direccion_cfp_editar">Direccion</label>
			    <input type="text" class="form-control" id="direccion_cfp_editar" name="direccion_cfp_editar">
			  </div>
			  <div class="form-group">
			  	  <label>Ubicacion</label>			  	  
			  	  <select class="custom-select" name="ubicacion_cfp_editar" id="ubicacion_cfp_editar">
			  	  	<?php 
			  	  	foreach ($ubi as $value) {
			  	   ?>				  	
				  	<option value="<?php echo $value['id_ubi'] ?>"><?php echo $value['departamento_ubi']." - ".$value['provincia_ubi']." - ".$value['distrito_ubi']; ?></option>				  	
				  	<?php } ?>
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


