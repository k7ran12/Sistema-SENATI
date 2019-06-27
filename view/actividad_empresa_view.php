<?php 

session_start();

	if (empty($_SESSION['usuario'])) {
		header('Location: ../');
	}

	require_once("../model/ubigeo_model.php");
  require_once("../model/actividad_empresa_model.php");

	$ubicacion = new ubigeo_model();
  $actividad_empresa_model = new actividad_empresa_model();

	$ubi = $ubicacion->mostrar_ubigeo();

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
      <center><h2>Actividad Empresa</h2></center>

<div style="float: left;">
  
     <button type="button" class="btn btn-success my-2 my-sm-0" data-toggle="modal" data-target=".agregar_actividad_empresa">Agregar</button>      
    
</div>

<div style="float: right;">
  <form class="form-inline my-2 my-lg-0" action="actividadEmpresa" method="POST">
      <input name="buscar" class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
      <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Buscar</button>
    </form>
</div><br><br><br>


<?php 
  if (!empty($_POST['buscar'])) {

    $buscar = $_POST['buscar'];

    $datos_carrera = $actividad_empresa_model->buscar_actividad_empresa($buscar);

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
            <td><button type="button" class="btn btn-primary editar_actividad_empresa" data-toggle="modal" data-target=".editar_actividad_empresa_modal">E</button></td>
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

    $datos_ae = $actividad_empresa_model->mostrar_actividad_empresa();

    if (!empty($datos_ae)) {
      ?>
      <table class="table table-hover">
          <tr>
            <th>Codigo Actividad</th>
            <th>Descripcion Actividad</th>            
            <th>Accion</th>           
          </tr>
      <?php 
      foreach ($datos_ae as $value) {
        ?>        
          <tr>
            <td style="display: none;" class="datos_actividad_empresa_editar"><?php echo $value['id_ae'] ?></td>
            <td class="datos_actividad_empresa_editar"><?php echo $value['codigo_ae'] ?></td>
            <td class="datos_actividad_empresa_editar"><?php echo $value['descripcion_ae'] ?></td>
            <td><button type="button" class="btn btn-primary editar_actividad_empresa" data-toggle="modal" data-target=".editar_actividad_empresa_modal">E</button></td>
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

<div class="modal fade agregar_actividad_empresa" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">      
        <div class="modal-header">
          <h5 style="text-align: center !important;" class="modal-title">Agregar Actividad Empresa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="form_agregar_actividad_empresa">
        <div class="form-group">
          <label for="codigo_actividad">Codigo Actividad</label>
          <input type="text" class="form-control" id="codigo_actividad" name="codigo_actividad" aria-describedby="emailHelp">         
        </div>
        <div class="form-group">
          <label for="descripcion_actividad">Descripcion Actividad</label>
          <input type="text" class="form-control" id="descripcion_actividad" name="descripcion_actividad">
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
            <input type="hidden" name="id_ae" id="id_ae">
        <div class="form-group">
          <label for="codigo_actividad_empresa_editar">Codigo Actividad</label>
          <input type="text" class="form-control" id="codigo_actividad_empresa_editar" name="codigo_actividad_empresa_editar" aria-describedby="emailHelp">         
        </div>
        <div class="form-group">
          <label for="descripcion_actividad_empresa_editar">Descripcion Actividad</label>
          <input type="text" class="form-control" id="descripcion_actividad_empresa_editar" name="descripcion_actividad_empresa_editar">
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


