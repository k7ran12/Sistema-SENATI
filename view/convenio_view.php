<?php 
	if (empty($_SESSION['usuario'])) {
		header('Location: ../');
	}

	require_once("model/ubigeo_model.php");
  require_once("model/convenio_model.php");

	$ubicacion = new ubigeo_model();
	$ubi = $ubicacion->mostrar_ubigeo();

  $conv = new convenio_model();

 ?>

<center><h2>Convenio</h2></center>

<div style="float: left;">
	
     <button type="button" class="btn btn-success my-2 my-sm-0" data-toggle="modal" data-target=".agregar_convenio">add</button>      
    
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

    $datos_convenio = $conv->buscar_datos_convenio($buscar);

    if (!empty($datos_convenio)) {
      ?>
      <table class="table table-hover">
          <tr>            
            <th>Descripcion Convenio</th>            
            <th>Accion</th>           
          </tr>
      <?php 
      foreach ($datos_convenio as $value) {
        ?>        
          <tr>
            <td style="display: none;" class="datos_convenio_editar"><?php echo $value['id_conv'] ?></td>           
            <td class="datos_convenio_editar"><?php echo $value['desc_conv'] ?></td>
            <td><button type="button" class="btn btn-primary editar_convenio" data-toggle="modal" data-target=".editar_convenio_modal">e</button></td>
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
            <th>Descripcion Convenio</th>            
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

    $datos_convenio = $conv->mostrar_convenio();

    if (!empty($datos_convenio)) {
      ?>
      <table class="table table-hover">
          <tr>            
            <th>Descripcion Convenio</th>            
            <th>Accion</th>           
          </tr>
      <?php 
      foreach ($datos_convenio as $value) {
        ?>        
          <tr>
            <td style="display: none;" class="datos_convenio_editar"><?php echo $value['id_conv'] ?></td>            
            <td class="datos_convenio_editar"><?php echo $value['desc_conv'] ?></td>
            <td><button type="button" class="btn btn-primary editar_convenio" data-toggle="modal" data-target=".editar_convenio_modal">e</button></td>
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
            <th>Descripcion Convenio</th>            
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

<div class="modal fade agregar_convenio" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">      
	      <div class="modal-header">
	        <h5 style="text-align: center !important;" class="modal-title">Convenio</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form id="form_agregar_convenio">			  
			  <div class="form-group">
			    <label for="descripcion_convenio">Descripcion</label>
			    <input type="text" class="form-control" id="descripcion_convenio" name="descripcion_convenio">
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

<div class="modal fade editar_convenio_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
	        <h5 style="text-align: center !important;" class="modal-title">Editar Convenio</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form id="form_editar_convenio">
          <input type="hidden" name="id_conv_editar" id="id_conv_editar">			  
			  <div class="form-group">
			    <label for="descripcion_convenio_editar">Descripcion Convenio</label>
			    <input value="Descripcion" type="text" class="form-control" id="descripcion_convenio_editar" name="descripcion_convenio_editar">
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


