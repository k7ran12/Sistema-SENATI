<?php 
session_start();
	if (empty($_SESSION['usuario'])) {
		header('Location: ../');
	}

	
  require_once("../model/monitor_model.php");


  $monitor_model = new monitor_model();

  $monitor = $monitor_model->mostrar_monitor();
	

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
    
    <center><h2>Monitor</h2></center>

<div style="float: left;">
  
     <button type="button" class="btn btn-success my-2 my-sm-0" data-toggle="modal" data-target=".agregar_monitor">Agregar</button>      
    
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
            <th>Apellidos</th>
            <th>Nombres</th>            
            <th>DNI</th>  
            <th>Telefono</th>
            <th>Cargo</th>            
            <th>Correo</th>           
          </tr>
      <?php 
      foreach ($datos_carrera as $value) {
        ?>        
          <tr>
            <td style="display: none;" class="datos_empresa_editar"><?php echo $value['id_mon'] ?></td>
            <td class="datos_empresa_editar"><?php echo $value['apellidos_mon'] ?></td>
            <td class="datos_empresa_editar"><?php echo $value['nombres_mon'] ?></td>
            <td class="datos_empresa_editar"><?php echo $value['dni_mon'] ?></td>
            <td class="datos_empresa_editar"><?php echo $value['telefono_mon'] ?></td>
            <td class="datos_empresa_editar"><?php echo $value['cargo_mon'] ?></td>
            <td class="datos_empresa_editar"><?php echo $value['correo_mon'] ?></td>
            <td><button type="button" class="btn btn-primary editar_monitor" data-toggle="modal" data-target=".editar_monitor_modal">E</button></td>
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
            <th>Apellidos</th>
            <th>Nombres</th>            
            <th>DNI</th>  
            <th>Telefono</th>
            <th>Cargo</th>            
            <th>Correo</th>           
          </tr>
        <tr>
          <td class="alert alert-danger" role="alert" colspan="6"><center><h5>No hay datos</h5></center></td>
        </tr>
      </table>
      <?php 
    }


  }
  else{

    //$datos_ae = $actividad_empresa_model->mostrar_actividad_empresa();

    if (!empty($monitor)) {
      ?>
      <table class="table table-hover">
          <tr>
            <th>Apellidos</th>
            <th>Nombres</th>            
            <th>DNI</th>  
            <th>Telefono</th>
            <th>Cargo</th>            
            <th>Correo</th>           
          </tr>
      <?php 
      foreach ($monitor as $value) {
        ?>        
          <tr>
            <td style="display: none;" class="datos_empresa_editar"><?php echo $value['id_mon'] ?></td>
            <td class="datos_empresa_editar"><?php echo $value['apellidos_mon'] ?></td>
            <td class="datos_empresa_editar"><?php echo $value['nombres_mon'] ?></td>
            <td class="datos_empresa_editar"><?php echo $value['dni_mon'] ?></td>
            <td class="datos_empresa_editar"><?php echo $value['telefono_mon'] ?></td>
            <td class="datos_empresa_editar"><?php echo $value['cargo_mon'] ?></td>
            <td class="datos_empresa_editar"><?php echo $value['correo_mon'] ?></td>
            <td><button type="button" class="btn btn-primary editar_monitor" data-toggle="modal" data-target=".editar_monitor_modal">E</button></td>
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
            <th>Apellidos</th>
            <th>Nombres</th>            
            <th>DNI</th>  
            <th>Telefono</th>
            <th>Cargo</th>            
            <th>Correo</th>           
          </tr>
        <tr>
          <td class="alert alert-danger" role="alert" colspan="6"><center><h5>No hay datos</h5></center></td>
        </tr>
      </table>
      <?php 
    }

  }
 ?>
<!--==============================================
=            Modal Formulario Agregar            =
===============================================-->

<div class="modal fade agregar_monitor" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">      
        <div class="modal-header">
          <h5 style="text-align: center !important;" class="modal-title">Agregar Supervisor</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="form_agregar_monitor">            
        <div class="form-group">
          <label for="apellidos">Apellidos</label>
          <input type="text" class="form-control" id="apellidos" name="apellidos" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
          <label for="nombres">Nombre</label>
          <input type="text" class="form-control" id="nombres" name="nombres" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
          <label for="dni">DNI</label>
          <input type="text" class="form-control" id="dni" name="dni" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
          <label for="telefono">Telefono</label>
          <input type="text" class="form-control" id="telefono" name="telefono">
        </div>
         <div class="form-group">
          <label for="cargo">Cargo</label>
          <input type="text" class="form-control" id="cargo" name="cargo" aria-describedby="emailHelp">
        </div>
         <div class="form-group">
          <label for="correo">Correo</label>
          <input type="text" class="form-control" id="correo" name="correo" aria-describedby="emailHelp">
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

<div class="modal fade editar_monitor_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
          <h5 style="text-align: center !important;" class="modal-title">Editar Monitor</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="form_editar_monitor">
            <input type="hidden" name="id_mon" id="id_mon">
        <div class="form-group">
          <label for="editar_apellidos">Apellidos</label>
          <input type="text" class="form-control" id="editar_apellidos" name="editar_apellidos" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
          <label for="editar_nombres">Nombre</label>
          <input type="text" class="form-control" id="editar_nombres" name="editar_nombres" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
          <label for="editar_dni">DNI</label>
          <input type="text" class="form-control" id="editar_dni" name="editar_dni" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
          <label for="editar_telefono">Telefono</label>
          <input type="text" class="form-control" id="editar_telefono" name="editar_telefono">
        </div>
         <div class="form-group">
          <label for="editar_cargo">Cargo</label>
          <input type="text" class="form-control" id="editar_cargo" name="editar_cargo" aria-describedby="emailHelp">
        </div>
         <div class="form-group">
          <label for="editar_correo">Correo</label>
          <input type="text" class="form-control" id="editar_correo" name="editar_correo" aria-describedby="emailHelp">
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


