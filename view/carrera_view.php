<?php 

session_start();

$sub_navbar = $_SERVER["REQUEST_URI"]."carrera";


	if (empty($_SESSION['usuario'])) {
		header('Location: ../');
	}

  if(!$_GET){
    header('Location:carrera_view.php?pagina=1');
  }

	require_once("../model/ubigeo_model.php");
  require_once("../model/carrera_model.php");

	$ubicacion = new ubigeo_model();
  $carrera = new carrera_model();

	$ubi = $ubicacion->mostrar_ubigeo();
  //$carr = $carrera->mostrar_carrera();

  //Datos Pagina

  if (isset($_GET['pagina'])) {
    $pagina = $_GET['pagina'];
  }
  else{
    $pagina = 0;
  }

  if (isset($_POST['buscar'])) {
    $busqueda = $_POST['buscar'];
    $_SESSION["buscar"] = $busqueda;

  }
  

  $datos_carrera = $carrera->mostrar_carrera($pagina, $_SESSION["buscar"]);

  $cantidad_de_datos = count($datos_carrera);

  $cantidad_de_datos = $carrera->catidad_de_datos_carrera($_SESSION["buscar"]);

  $cantidad_de_datos
  

 ?>

 <!DOCTYPE html>
 <html>
 <head>
    <?php require_once("head.php"); ?>
   <title></title>
 </head>
 <body>
  
  <?php 
       
        require_once("navbar_view.php"); 
        require_once("subnavbar_view.php");
      
      
      ?>

  <div class="container">
      <center><h2>Carrera</h2></center>

<div style="float: left;">
  
     <button type="button" class="btn btn-success my-2 my-sm-0" data-toggle="modal" data-target=".agregar_carrera">Agregar</button>      
    
</div>

<div style="float: right;">
  <form class="form-inline my-2 my-lg-0" action="carrera_view.php" method="POST">
      <input name="buscar" class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
      <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Buscar</button>
    </form>
</div><br><br><br>


<?php     
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
            <td><button type="button" class="btn btn-primary editar_carrera" data-toggle="modal" data-target=".editar_carrera_modal">E</button></td>
          </tr>
        
        <?php 
      }
      ?>
      </table>

      <!-- Paginacion  -->

      <ul class="pagination" style="float: left;">
        
        <li class="page-item <?php echo $_GET['pagina']<= 1? 'disabled' : '' ?>"><a id="a_pagina" href="carrera_view.php?pagina=<?php echo $_GET['pagina'] - 1 ?>" class="page-link a_pagina">Anterior</a></li>
      </ul>

      <nav aria-label="Page navigation example" style="width: 84%;float: left;">
        <div class="table-responsive">
          <ul class="pagination">                      
            <?php for ($i=0; $i < $cantidad_de_datos; $i++) { 

             ?>            
            <li class="page-item <?php echo $_GET['pagina'] == $i + 1  ? 'active' : '' ?>"><a class="page-link" href="carrera_view.php?pagina=<?php echo $i + 1 ?>" value="<?php echo $i + 1; ?>"><?php echo $i + 1; ?></a></li>
            
            <?php } ?>                   
        </ul>
        </div>
      </nav> 

      <ul class="pagination" style="float: right;">
        <li class="page-item <?php echo $_GET['pagina']>=$cantidad_de_datos? 'disabled' : '' ?>"><a id="s_pagina" href="carrera_view.php?pagina=<?php echo $_GET['pagina'] + 1 ?>" class="page-link s_pagina">Siguiente</a></li>
      </ul>

      <!-- Fin Paginacion -->
      
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
  </div>

 </body>
 </html>


