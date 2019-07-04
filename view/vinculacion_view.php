<?php 
session_start();

$sub_navbar = $_SERVER["REQUEST_URI"]."vinculacion";

  if (empty($_SESSION['usuario'])) {
    header('Location: ../');
  }

  require_once("../model/vinculacion_model.php");
  require_once("../model/cfp_model.php");
  require_once("../model/aprendiz_model.php");
  require_once("../model/empresa_model.php");
  require_once("../model/carrera_model.php");
  require_once("../model/semestre_model.php");
  require_once("../model/monitor_model.php");
  require_once("../model/convenio_model.php");

  $vinculacion_model = new vinculacion_model();
  $cfp_model = new cfp_model();
  $aprendiz_model = new aprendiz_model();
  $empresa_model = new empresa_model();
  $carrera_model = new carrera_model();
  $semestre_model = new semestre_model();
  $monitor_model = new monitor_model();
  $convenio_model = new convenio_model();

  //$datos_vinculacion = $vinculacion_model->mostrar_vinculacion();
  $cfp = $cfp_model->mostrar_cfp();
  $aprendiz = $aprendiz_model->select_aprendiz();
  $empresa = $empresa_model->mostrar_todo_empresa();
  $carrera = $carrera_model->mostrar_todo_carrera();
  $semestre = $semestre_model->mostrar_semestre();
  $monitor = $monitor_model->mostrar_todo_monitor();
  $convenio = $convenio_model->mostrar_todo_convenio();


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
  

  $datos_vinculacion = $vinculacion_model->mostrar_vinculacion($pagina, $_SESSION["buscar"]);

  $cantidad_de_datos = count($datos_vinculacion);

  $cantidad_de_datos = $vinculacion_model->catidad_de_datos_vinculacion($_SESSION["buscar"]);

  $cantidad_f = $cantidad_de_datos - 1;


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
      
      <center><h2>Vinculacion</h2></center>

<?php if ($_SESSION['tipo_usuario'] == 'Admin'): ?>
<div style="float: left;">
  
     <button type="button" class="btn btn-success my-2 my-sm-0" data-toggle="modal" data-target=".agregar_vinculacion">Agregar</button>      
    
</div>
<?php endif ?>

<div style="float: right;">
  <form class="form-inline my-2 my-lg-0" action="vinculacion_view.php" method="POST">
      <input id="buscar" name="buscar" class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
      <button id="buscar_cfp" class="btn btn-outline-primary my-2 my-sm-0" type="submit">Buscar</button>
    </form>
</div><br><br><br>

<?php 
  
    
    if($datos_vinculacion != ""){
      ?>
     <div class="table-responsive">
      <table class="table table-hover">
          <tr>           
            <th>DNI Aprendiz</th>
            <th>Nombres Apellidos Aprendiz</th>
            <th>Telefono Aprendiz</th>            
            <th>Id SENATI</th>           
            <th>RUC Empresa</th>                  
            <th>Razon Social</th>            
            <th style="width: 9%;">Accion</th>             
                       
          </tr>
      <?php 
      foreach ($datos_vinculacion as $value) {
        ?>        
          <tr>
            <td style="display: none;" class="datos_editar_vinculacion"><?php echo $value['id_vin'] ?></td>
            <td class="datos_editar_vinculacion"><?php echo $value['dni_ap'] ?></td>
            <td class="datos_editar_vinculacion"><?php echo $value['apellidos_ap']. ", ".$value['nombres_ap'] ?></td>
            <td class="datos_editar_vinculacion"><?php echo $value['telefono_ap'] ?></td>
            <td class="datos_editar_vinculacion"><?php echo $value['id_senati_ap'] ?></td>            
            <td class="datos_editar_vinculacion"><?php echo $value['ruc_emp'] ?></td>  
            <td class="datos_editar_vinculacion"><?php echo $value['razonsocial_emp'] ?></td>

            <td style="display: none;" class="datos_editar_vinculacion"><?php echo $value['id_ap'] ?></td>
            <td style="display: none;" class="datos_editar_vinculacion"><?php echo $value['id_emp'] ?></td> 
             <td style="display: none;" class="datos_editar_vinculacion"><?php echo $value['id_carr'] 
            ?></td>            
            <td style="display: none;" class="datos_editar_vinculacion"><?php echo $value['id_cfp'] 
            ?></td>
            <td style="display: none;" class="datos_editar_vinculacion"><?php echo $value['id_sem'] ?></td>

            <td style="display: none;" class="datos_editar_vinculacion"><?php echo $value['fechaini_prac_vin'] ?></td>
            <td style="display: none;" class="datos_editar_vinculacion"><?php echo $value['fechafin_prac_vin'] ?></td>
            <td style="display: none;" class="datos_editar_vinculacion"><?php echo $value['fechaini_sem_vin'] ?></td>
            <td style="display: none;" class="datos_editar_vinculacion"><?php echo $value['fechafin_sem_vin'] ?></td>
            <td style="display: none;" class="datos_editar_vinculacion"><?php echo $value['id_mon'] ?></td>
            <td style="display: none;" class="datos_editar_vinculacion"><?php echo $value['id_conv'] ?></td>
            <td>
              <?php if ($_SESSION['tipo_usuario'] == 'Admin'): ?>
            <button type="button" class="btn btn-primary editar_vinculacion" data-toggle="modal" data-target=".editar_vinculacion_modal">E</button>
              <?php endif ?>
              <button class="btn btn-secondary imprimir_vinculacion">I</button>
            </td>
          </tr>
        
        <?php 
      }
      ?>
      </table>
      </div>
      <?php 
    }

       
    else{
      ?>
    <div class="table-responsive">
      <table class="table table-hover">
         <tr>
            <!-- 
            <th>Inicio Practicas</th>
            <th>Fin Practicas</th>
            <th>Inicio Semestre</th>
            <th>Fin Semestre</th>
            <th>Grupo</th>
             -->
            
            <th>DNI Aprendiz</th>
            <th>Nombres Apellidos Aprendiz</th>
            <th>Telefono Aprendiz</th>
            <!-- 
            <th>Correo Aprendiz</th>
            <th>Direccion Aprendiz</th>
            <th>Referencia</th>
            <th>DNI Apoderado</th>
            <th>Nombre Apellido Apoderado</th>
            <th>Telefono Apoderado</th>
             -->
            
            <th>Id SENATI</th>
            <!-- 
            <th>Bloque</th>           
            <th>Programa</th>
            <th>Genero</th>
            -->  
            <th>RUC Empresa</th>                  
            <th>Razon Social</th>
            <th>Accion</th>
            <!-- 
            <th>Direccion Empresa</th>
            <th>Telefono Empresa</th>
            <th>Correo Empresa</th>
            <th>Representante Empresa</th>
            <th>DNI Representante</th>
            <th>Carrera</th>
            <th>CFP</th>
            <TH>Direccion CFP</TH>
            <th>Descripcion Semestre</th>
            <th>Nombre Monitor</th>
            <th>DNI Monitor</th>
            <th>Telefono Monitor</th>
            <th>Cargo</th>
            <th>Correo Monitor</th>
            <th>Convenio</th>
             -->
            
          </tr>
          <td class="alert alert-danger" role="alert" colspan="36"><center><h5>No hay datos</h5></center></td>
        </tr>
      </table>
      </div>
      <?php 
    

  }
 ?>

<!--==============================================
=            Modal Formulario Agregar            =
===============================================-->

<div class="modal fade agregar_vinculacion" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">      
        <div class="modal-header">
          <h5 style="text-align: center !important;" class="modal-title">Agregar Vinculacion</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="form_agregar_vinculacion">
        <div class="form-group">
            <label>Aprendiz</label><br>          
            <select style="width: 100%;" class="custom-select" name="aprendiz" id="aprendiz">
              <?php 
              foreach ($aprendiz as $value) {
             ?>           
            <option value="<?php echo $value[0] ?>"><?php echo $value[1]." ".$value[2] ?></option>           
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
            <label>Empresa</label><br>          
            <select style="width: 100%;" class="custom-select" name="empresa" id="empresa">
              <?php 
              foreach ($empresa as $value) {
             ?>           
            <option value="<?php echo $value[0] ?>"><?php echo $value[2] ?></option>           
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
            <label>Carrera</label><br>          
            <select style="width: 100%;" class="custom-select" name="carrera" id="carrera">
              <?php 
              foreach ($carrera as $value) {
             ?>           
            <option value="<?php echo $value['id_carr'] ?>"><?php echo $value['descripcion_carr'] ?></option>           
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
            <label>CFP</label>            
            <select class="custom-select" name="cfp" id="cfp">
              <?php 
              foreach ($cfp as $value) {
             ?>           
            <option value="<?php echo $value['id_cfp'] ?>"><?php echo $value['descripcion_cfp'] ?></option>           
            <?php } ?>
          </select>
        </div> 
        <div class="form-group">
            <label>Semestre</label>            
            <select class="custom-select" name="semestre" id="semestre">
              <?php 
              foreach ($semestre as $value) {
             ?>           
            <option value="<?php echo $value['id_sem'] ?>"><?php echo $value['descripcion_sem'] ?></option>           
            <?php } ?>
          </select>
        </div> 
        <div class="form-group">
          <label for="fechaini_prac">Fecha Inicion Practicas</label>
          <input type="date" class="form-control" id="fechaini_prac" name="fechaini_prac">
        </div>
        <div class="form-group">
          <label for="fechafin_prac">Fecha Fin Practicas</label>
          <input type="date" class="form-control" id="fechafin_prac" name="fechafin_prac">
        </div>
        <div class="form-group">
          <label for="fechaini_sem">Fecha Inicion Semestre</label>
          <input type="date" class="form-control" id="fechaini_sem" name="fechaini_sem">
        </div>
        <div class="form-group">
          <label for="fechafin_sem">Fecha Fin Semestre</label>
          <input type="date" class="form-control" id="fechafin_sem" name="fechafin_sem">
        </div>
        <div class="form-group">
            <label>Monitor</label><br>          
            <select style="width: 100%;" class="custom-select" name="monitor" id="monitor">
              <?php 
              foreach ($monitor as $value) {
             ?>           
            <option value="<?php echo $value['id_mon'] ?>"><?php echo $value['apellidos_mon']." ".$value['nombres_mon']?></option>            
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
            <label>Convenio</label><br>          
            <select style="width: 100%;" class="custom-select" name="convenio" id="convenio">
              <?php 
              foreach ($convenio as $value) {
             ?>           
            <option value="<?php echo $value['id_conv'] ?>"><?php echo $value['desc_conv'] ?></option>           
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label for="grupo">Grupo</label>
          <input type="text" class="form-control" id="grupo" name="grupo">
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

<div class="modal fade editar_vinculacion_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
          <h5 style="text-align: center !important;" class="modal-title">Editar Vinculacion</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <form id="form_editar_vinculacion">
        <div class="form-group">
            <label>Aprendiz</label><br>          
            <select style="width: 100%;" class="custom-select" name="editar_aprendiz" id="editar_aprendiz">
              <?php 
              foreach ($aprendiz as $value) {
             ?>           
            <option value="<?php echo $value[0] ?>"><?php echo $value[1]." ".$value[2] ?></option>           
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
            <label>Empresa</label><br>          
            <select style="width: 100%;" class="custom-select" name="editar_empresa" id="editar_empresa">
              <?php 
              foreach ($empresa as $value) {
             ?>           
            <option value="<?php echo $value[0] ?>"><?php echo $value[2] ?></option>           
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
            <label>Carrera</label><br>          
            <select style="width: 100%;" class="custom-select" name="editar_carrera" id="editar_carrera">
              <?php 
              foreach ($carrera as $value) {
             ?>           
            <option value="<?php echo $value['id_carr'] ?>"><?php echo $value['descripcion_carr'] ?></option>           
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
            <label>CFP</label>            
            <select class="custom-select" name="editar_cfp" id="editar_cfp">
              <?php 
              foreach ($cfp as $value) {
             ?>           
            <option value="<?php echo $value['id_cfp'] ?>"><?php echo $value['descripcion_cfp'] ?></option>           
            <?php } ?>
          </select>
        </div> 
        <div class="form-group">
            <label>Semestre</label>            
            <select class="custom-select" name="editar_semestre" id="editar_semestre">
              <?php 
              foreach ($semestre as $value) {
             ?>           
            <option value="<?php echo $value['id_sem'] ?>"><?php echo $value['descripcion_sem'] ?></option>           
            <?php } ?>
          </select>
        </div> 
        <div class="form-group">
          <label for="editar_fechaini_prac">Fecha Inicion Practicas</label>
          <input type="date" class="form-control" id="editar_fechaini_prac" name="editar_fechaini_prac">
        </div>
        <div class="form-group">
          <label for="editar_fechafin_prac">Fecha Fin Practicas</label>
          <input type="date" class="form-control" id="editar_fechafin_prac" name="editar_fechafin_prac">
        </div>
        <div class="form-group">
          <label for="editar_fechaini_sem">Fecha Inicion Semestre</label>
          <input type="date" class="form-control" id="editar_fechaini_sem" name="editar_fechaini_sem">
        </div>
        <div class="form-group">
          <label for="editar_fechafin_sem">Fecha Fin Semestre</label>
          <input type="date" class="form-control" id="editar_fechafin_sem" name="editar_fechafin_sem">
        </div>
        <div class="form-group">
            <label>Monitor</label><br>          
            <select style="width: 100%;" class="custom-select" name="editar_monitor" id="editar_monitor">
              <?php 
              foreach ($monitor as $value) {
             ?>           
            <option value="<?php echo $value['id_mon'] ?>"><?php echo $value['apellidos_mon']." ".$value['nombres_mon']?></option>            
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
            <label>Convenio</label><br>          
            <select style="width: 100%;" class="custom-select" name="editar_convenio" id="editar_convenio">
              <?php 
              foreach ($convenio as $value) {
             ?>           
            <option value="<?php echo $value['id_conv'] ?>"><?php echo $value['desc_conv'] ?></option>           
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label for="grupo">Grupo</label>
          <input type="text" class="form-control" id="editar_grupo" name="editar_grupo">
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

