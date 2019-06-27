<?php 
session_start();
	if (empty($_SESSION['usuario'])) {
		header('Location: ../');
	}

	
  require_once("../model/semestre_model.php");

  $semestre_model = new semestre_model();

  $semestre = $semestre_model->mostrar_semestre();

	

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
    
    <center><h2>Semestre</h2></center>

<div style="float: left;">
  
     <button type="button" class="btn btn-success my-2 my-sm-0" data-toggle="modal" data-target=".agregar_semestre">Agregar</button>      
    
</div>

<div style="float: right;">
  <form class="form-inline my-2 my-lg-0" action="semestre" method="POST">
      <input name="buscar" class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
      <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Buscar</button>
    </form>
</div><br><br><br>


<?php 
  if (!empty($_POST['buscar'])) {

    $buscar = $_POST['buscar'];

    $datos_semestre = $semestre_model->buscar_datos_semestre($buscar);

    if (!empty($datos_semestre)) {
      ?>
      <table class="table table-hover">
          <tr>
            <th>Codigo Semestre</th>
            <th>Descripcion Semestre</th>            
            <th>Accion</th>           
          </tr>
      <?php 
      foreach ($datos_semestre as $value) {
        ?>        
          <tr>
            <td style="display: none;" class="datos_empresa_editar"><?php echo $value['id_sem'] ?></td>
            <td class="datos_empresa_editar"><?php echo $value['codigo_sem'] ?></td>
            <td class="datos_empresa_editar"><?php echo $value['descripcion_sem'] ?></td>
            <td><button type="button" class="btn btn-primary editar_semestre" data-toggle="modal" data-target=".editar_semestre_modal">E</button></td>
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
            <th>Codigo Semestre</th>
            <th>Descripcion Semestre</th>            
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
    
    if (!empty($semestre)) {
      ?>
      <table class="table table-hover">
          <tr>
            <th>Codigo Semestre</th>
            <th>Descripcion Semestre</th>            
            <th>Accion</th>           
          </tr>
      <?php 
      foreach ($semestre as $value) {
        ?>        
          <tr>
            <td style="display: none;" class="datos_empresa_editar"><?php echo $value['id_sem'] ?></td>
            <td class="datos_empresa_editar"><?php echo $value['codigo_sem'] ?></td>
            <td class="datos_empresa_editar"><?php echo $value['descripcion_sem'] ?></td>
            <td><button type="button" class="btn btn-primary editar_semestre" data-toggle="modal" data-target=".editar_semestre_modal">E</button></td>
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
            <th>Codigo Semestre</th>
            <th>Descripcion Semestre</th>            
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

<div class="modal fade agregar_semestre" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">      
        <div class="modal-header">
          <h5 style="text-align: center !important;" class="modal-title">Agregar Semestre</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="form_agregar_semestre">
        <div class="form-group">
          <label for="codigo_semestre">Codigo Semestre</label>
          <input type="text" class="form-control" id="codigo_semestre" name="codigo_semestre" aria-describedby="emailHelp">         
        </div>
        <div class="form-group">
          <label for="descripcion_semestre">Descripcion Semestre</label>
          <input type="text" class="form-control" id="descripcion_semestre" name="descripcion_semestre">
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

<div class="modal fade editar_semestre_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
          <h5 style="text-align: center !important;" class="modal-title">Editar Semestre</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="form_editar_semestre">
            <input type="hidden" name="id_sem" id="id_sem">
        <div class="form-group">
          <label for="editar_codigo_semestre">Codigo Semestre</label>
          <input type="text" class="form-control" id="editar_codigo_semestre" name="editar_codigo_semestre" aria-describedby="emailHelp">         
        </div>
        <div class="form-group">
          <label for="editar_descripcion_semestre">Descripcion Semestre</label>
          <input type="text" class="form-control" id="editar_descripcion_semestre" name="editar_descripcion_semestre">
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

