<?php 
session_start();

$sub_navbar = $_SERVER["REQUEST_URI"]."monitor";

	if (empty($_SESSION['usuario'])) {
		header('Location: ../');
	}

   if(!$_GET){
    header('Location:monitor_view.php?pagina=1');
  }


	
  require_once("../model/monitor_model.php");


  $monitor_model = new monitor_model();

  //$monitor = $monitor_model->mostrar_monitor();

  

  if (isset($_POST['buscar'])) {
    $busqueda = $_POST['buscar'];
    $_SESSION["buscar"] = $busqueda;

  }
  

  $monitor = $monitor_model->mostrar_monitor($_GET['pagina'], $_SESSION["buscar"]);

  $cantidad_de_datos = count($monitor);

  $cantida = $monitor_model->catidad_de_datos_empresa($_SESSION["buscar"]);

  //$cantidad_f = $cantidad_de_datos - 1;
	

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

<?php if ($_SESSION['tipo_usuario'] == 'Admin'): ?>
<div style="float: left;">
  
     <button type="button" class="btn btn-success my-2 my-sm-0" data-toggle="modal" data-target=".agregar_monitor">Agregar</button>      
    
</div>
<?php endif ?>

<div style="float: right;">
  <form class="form-inline my-2 my-lg-0" action="monitor_view.php" method="POST">
      <input name="buscar" class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
      <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Buscar</button>
    </form>
</div><br><br><br>


<?php   
  

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
            <?php if ($_SESSION['tipo_usuario'] == 'Admin'): ?>
            <th>Accion</th>
             <?php endif ?> 
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
            <?php if ($_SESSION['tipo_usuario'] == 'Admin'): ?>
            <td><button type="button" class="btn btn-primary editar_monitor" data-toggle="modal" data-target=".editar_monitor_modal">E</button></td>
            <?php endif ?>
          </tr>
        
        <?php 
      }
      ?>
      </table>

      <!-- Paginacion  -->

      <ul class="pagination" style="float: left;">
        
        <li class="page-item <?php echo $_GET['pagina']<= 1? 'disabled' : '' ?>"><a id="a_pagina" href="monitor_view.php?pagina=<?php echo $_GET['pagina'] - 1 ?>" class="page-link a_pagina">Anterior</a></li>
      </ul>

      <nav aria-label="Page navigation example" style="width: 84%;float: left;">
        <div class="table-responsive">
          <ul class="pagination">                      
            <?php for ($i=0; $i < $cantida; $i++) { 

             ?>            
            <li class="page-item <?php echo $_GET['pagina'] == $i + 1  ? 'active' : '' ?>"><a class="page-link" href="monitor_view.php?pagina=<?php echo $i + 1 ?>" value="<?php echo $i + 1; ?>"><?php echo $i + 1; ?></a></li>
            
            <?php } ?>                   
        </ul>
        </div>
      </nav> 

      <ul class="pagination" style="float: right;">
        <li class="page-item <?php echo $_GET['pagina']>=$cantida? 'disabled' : '' ?>"><a id="s_pagina" href="monitor_view.php?pagina=<?php echo $_GET['pagina'] + 1 ?>" class="page-link s_pagina">Siguiente</a></li>
      </ul>

      <!-- Fin Paginacion -->
      
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


