<?php 
	if (empty($_SESSION['usuario'])) {
		header('Location: ../');
	}

	require_once("model/ubigeo_model.php");
  require_once("model/carrera_model.php");

	$ubicacion = new ubigeo_model();
  $carrera = new carrera_model();

	$ubi = $ubicacion->mostrar_ubigeo();
  //$carr = $carrera->mostrar_carrera();

 ?>

<center><h2>Carrera</h2></center>

<div style="float: left;">
	
     <button type="button" class="btn btn-success my-2 my-sm-0" data-toggle="modal" data-target=".agregar_carrera">add</button>      
    
</div>

<div style="float: right;">
	<form class="form-inline my-2 my-lg-0" action="carrera" method="POST">
      <input name="buscar" class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
      <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Buscar</button>
    </form>
</div><br><br><br>


<?php 
  if (!empty($_POST['buscar'])) {

    $buscar = $_POST['buscar'];

    $datos_carrera = $carrera->buscar_datos_carrera($buscar);

    if (!empty($datos_carrera)) {
      ?>
      <table class="table table-hover">
          <tr>
            <th>Codigo CARRERA</th>
            <th>Descripcion CARRERA</th>            
            <th>Accion</th>           
          </tr>
      <?php 
      foreach ($datos_carrera as $value) {
        ?>        
          <tr>
            <td style="display: none;" class="datos_carrera_editar"><?php echo $value['id_carr'] ?></td>
            <td class="datos_carrera_editar"><?php echo $value['codigo_carr'] ?></td>
            <td class="datos_carrera_editar"><?php echo $value['descripcion_carr'] ?></td>
            <td><button type="button" class="btn btn-primary editar_carrera" data-toggle="modal" data-target=".editar_carrera_modal">e</button></td>
          </tr>
        
        <?php 
      }
      ?>
      </table>
      <?php 
    }
    
    else{
      ?>
      <table class="table table-hover">
         <tr>
            <th>Codigo CARRERA</th>
            <th>Descripcion CARRERA</th>            
            <th>Accion</th>           
          </tr>
        <tr>
          <td class="alert alert-danger" role="alert" colspan="3"><center><h5>No hay datos</h5></center></td>
        </tr>
      </table>
      <?php 
    }


  }
  else{

    $datos_carrera = $carrera->mostrar_carrera();

    if (!empty($datos_carrera)) {
      ?>
      <table class="table table-hover">
          <tr>
            <th>Codigo CARRERA</th>
            <th>Descripcion CARRERA</th>            
            <th>Accion</th>           
          </tr>
      <?php 
      foreach ($datos_carrera as $value) {
        ?>        
          <tr>
            <td style="display: none;" class="datos_carrera_editar"><?php echo $value['id_carr'] ?></td>
            <td class="datos_carrera_editar"><?php echo $value['codigo_carr'] ?></td>
            <td class="datos_carrera_editar"><?php echo $value['descripcion_carr'] ?></td>
            <td><button type="button" class="btn btn-primary editar_carrera" data-toggle="modal" data-target=".editar_carrera_modal">e</button></td>
          </tr>
        
        <?php 
      }
      ?>
      </table>
      <?php 
    }
    else{
      ?>
      <table class="table table-hover">
          <tr>
            <th>Codigo CARRERA</th>
            <th>Descripcion CARRERA</th>            
            <th>Accion</th>           
          </tr>
        <tr>
          <td class="alert alert-danger" role="alert" colspan="3"><center><h5>No hay datos</h5></center></td>
        </tr>
      </table>
      <?php 
    }

  }
 ?>


<!--==============================================
=            Modal Formulario Agregar            =
===============================================-->

<div class="modal fade agregar_carrera" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">      
	      <div class="modal-header">
	        <h5 style="text-align: center !important;" class="modal-title">Agregar Carrera</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form id="form_agregar_carrera">
			  <div class="form-group">
			    <label for="codigo_carrera">Codigo Carrera</label>
			    <input type="text" class="form-control" id="codigo_carrera" name="codigo_carrera" aria-describedby="emailHelp">			    
			  </div>
			  <div class="form-group">
			    <label for="descripcion_carrera">Descripcion</label>
			    <input type="text" class="form-control" id="descripcion_carrera" name="descripcion_carrera">
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

<div class="modal fade editar_carrera_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
	        <h5 style="text-align: center !important;" class="modal-title">Editar CARRERA</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form id="form_editar_carrera">
            <input type="hidden" name="id_carr" id="id_carr">
			  <div class="form-group">
			    <label for="codigo_carrera_editar">Codigo CARRERA</label>
			    <input type="text" class="form-control" id="codigo_carrera_editar" name="codigo_carrera_editar" aria-describedby="emailHelp">			    
			  </div>
			  <div class="form-group">
			    <label for="descripcion_carrera_editar">Descripcion CARRERA</label>
			    <input type="text" class="form-control" id="descripcion_carrera_editar" name="descripcion_carrera_editar">
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


