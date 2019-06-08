<?php 
	if (empty($_SESSION['usuario'])) {
		header('Location: ../');
	}

	require_once("model/ubigeo_model.php");
  require_once("model/actividad_empresa_model.php");

	$ubicacion = new ubigeo_model();
  $actividad_empresa_model = new actividad_empresa_model();

	$ubi = $ubicacion->mostrar_ubigeo();

 ?>

<center><h2>Actividad Empresa</h2></center>

<div style="float: left;">
	
     <button type="button" class="btn btn-success my-2 my-sm-0" data-toggle="modal" data-target=".agregar_cfp">add</button>      
    
</div>

<div style="float: right;">
	<form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
      <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Buscar</button>
    </form>
</div><br><br><br>


<?php 
  if (!empty($_POST['buscar'])) {

    $buscar = $_POST['buscar'];

    $datos_carrera = $actividad_empresa_model->mostrar_actividad_empresa($buscar);

    if (!empty($datos_carrera)) {
      ?>
      <table class="table table-hover">
          <tr>
            <th>Codigo Actividad</th>
            <th>Descripcion Actividad</th>            
            <th>Accion</th>           
          </tr>
      <?php 
      foreach ($datos_carrera as $value) {
        ?>        
          <tr>
            <td style="display: none;" class="datos_actividad_empresa_editar"><?php echo $value['id_ae'] ?></td>
            <td class="datos_actividad_empresa_editar"><?php echo $value['codigo_ae'] ?></td>
            <td class="datos_actividad_empresa_editar"><?php echo $value['descripcion_ae'] ?></td>
            <td><button type="button" class="btn btn-primary editar_actividad_empresa" data-toggle="modal" data-target=".editar_actividad_empresa_modal">e</button></td>
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
            <th>Codigo Actividad</th>
            <th>Descripcion Actividad</th>            
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

    $datos_carrera = $actividad_empresa_model->mostrar_actividad_empresa();

    if (!empty($datos_carrera)) {
      ?>
      <table class="table table-hover">
          <tr>
            <th>Codigo Actividad</th>
            <th>Descripcion Actividad</th>            
            <th>Accion</th>           
          </tr>
      <?php 
      foreach ($datos_carrera as $value) {
        ?>        
          <tr>
            <td style="display: none;" class="datos_actividad_empresa_editar"><?php echo $value['id_ae'] ?></td>
            <td class="datos_actividad_empresa_editar"><?php echo $value['codigo_ae'] ?></td>
            <td class="datos_actividad_empresa_editar"><?php echo $value['descripcion_ae'] ?></td>
            <td><button type="button" class="btn btn-primary editar_actividad_empresa" data-toggle="modal" data-target=".editar_actividad_empresa_modal">e</button></td>
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
            <th>Codigo Actividad</th>
            <th>Descripcion Actividad</th>            
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

<div class="modal fade agregar_cfp" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">      
	      <div class="modal-header">
	        <h5 style="text-align: center !important;" class="modal-title">Agregar Actividad Empresa</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form>
			  <div class="form-group">
			    <label for="codigo_cfp">Codigo Carrera</label>
			    <input type="text" class="form-control" id="codigo_cfp" name="codigo_cfp" aria-describedby="emailHelp">			    
			  </div>
			  <div class="form-group">
			    <label for="descripcion_cfp">Descripcion</label>
			    <input type="text" class="form-control" id="descripcion_cfp" name="descripcion_cfp">
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

<div class="modal fade editar_actividad_empresa_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
	        <h5 style="text-align: center !important;" class="modal-title">Editar Actividad</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form id="form_editar_actividad_empresa">
			  <div class="form-group">
			    <label for="codigo_actividad_empresa">Codigo Actividad</label>
			    <input type="text" class="form-control" id="codigo_actividad_empresa" name="codigo_actividad_empresa" aria-describedby="emailHelp">			    
			  </div>
			  <div class="form-group">
			    <label for="descripcion_actividad_empresa">Descripcion Actividad</label>
			    <input type="text" class="form-control" id="descripcion_actividad_empresa" name="descripcion_actividad_empresa">
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


