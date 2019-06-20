<?php 
  if (empty($_SESSION['usuario'])) {
    header('Location: ../');
  }

  require_once("model/vinculacion_model.php");
  require_once("model/cfp_model.php");
  require_once("model/aprendiz_model.php");
  require_once("model/empresa_model.php");
  require_once("model/carrera_model.php");
  require_once("model/semestre_model.php");
  require_once("model/monitor_model.php");
  require_once("model/convenio_model.php");

  $vinculacion_model = new vinculacion_model();
  $cfp_model = new cfp_model();
  $aprendiz_model = new aprendiz_model();
  $empresa_model = new empresa_model();
  $carrera_model = new carrera_model();
  $semestre_model = new semestre_model();
  $monitor_model = new monitor_model();
  $convenio_model = new convenio_model();

  $datos_vinculacion = $vinculacion_model->mostrar_vinculacion();
  $cfp = $cfp_model->mostrar_cfp();
  $aprendiz = $aprendiz_model->mostrar_aprendiz();
  $empresa = $empresa_model->mostrar_empresa();
  $carrera = $carrera_model->mostrar_carrera();
  $semestre = $semestre_model->mostrar_semestre();
  $monitor = $monitor_model->mostrar_monitor();
  $convenio = $convenio_model->mostrar_convenio();


 ?>

<center><h2>Vinculacion</h2></center>

<div style="float: left;">
  
     <button type="button" class="btn btn-success my-2 my-sm-0" data-toggle="modal" data-target=".agregar_vinculacion">add</button>      
    
</div>

<div style="float: right;">
  <form class="form-inline my-2 my-lg-0" action="vinculacion" method="POST">
      <input id="buscar" name="buscar" class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
      <button id="buscar_cfp" class="btn btn-outline-primary my-2 my-sm-0" type="submit">Buscar</button>
    </form>
</div><br><br><br>

<?php 
  if (!empty($_POST['buscar'])) {

    $buscar = $_POST['buscar'];

    $datos_empresa_buscar = $empresa_model->buscar_datos_empresa($buscar);

    if (!empty($datos_empresa_buscar)) {
      ?>
      <div class="table-responsive">
      <table class="table table-hover">
          <tr>
            <th>Inicio Practicas</th>
            <th>Fin Practicas</th>
            <th>Inicio Semestre</th>
            <th>Fin Semestre</th>
            <th>Grupo</th>
            <th>DNI Aprendiz</th>
            <th>Nombres Apellidos Aprendiz</th>
            <th>Telefono Aprendiz</th>
            <th>Correo Aprendiz</th>
            <th>Direccion Aprendiz</th>
            <th>Referencia</th>
            <th>DNI Apoderado</th>
            <th>Nombre Apellido Apoderado</th>
            <th>Telefono Apoderado</th>
            <th>Id SENATI Aprendiz</th>
            <th>Bloque</th>
            <th>Programa</th>
            <th>Genero</th>
            <th>RUC Empresa</th>                  
            <th>Razon Social</th>
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
          </tr>
      <?php 
      foreach ($datos_empresa_buscar as $value) {
        ?>        
          <tr>
            <td style="display: none;" class="datos_editar_vinculacion"><?php echo $value[0] ?></td>            
            <td class="datos_editar_vinculacion"><?php echo $value[1] ?></td>
            <td class="datos_editar_vinculacion"><?php echo $value[2] ?></td>
            <td class="datos_editar_vinculacion"><?php echo $value[3] ?></td>
            <td class="datos_editar_vinculacion"><?php echo $value[4] ?></td>
            <td class="datos_editar_vinculacion"><?php echo $value[5] ?></td>
            <td class="datos_editar_vinculacion"><?php echo $value[6] ?></td>
            <td class="datos_editar_vinculacion"><?php echo $value[7] ?></td>

            <td class="datos_editar_vinculacion"><?php echo $value[9] ?></td>
            <td class="datos_editar_vinculacion"><?php echo $value[10] ?></td>
            <td class="datos_editar_vinculacion"><?php echo $value[11] ?></td>
            <td class="datos_editar_vinculacion"><?php echo $value[12] ?></td>

            <td class="datos_editar_vinculacion"><?php echo $value[14] ?></td>
            <td class="datos_editar_vinculacion"><?php echo $value[15] ?></td>

            <td class="datos_editar_vinculacion"><?php echo $value[17] ?></td>
            <td class="datos_editar_vinculacion"><?php echo $value[18] ?></td>

            <td class="datos_editar_vinculacion"><?php echo $value[20] ?></td>
            <td class="datos_editar_vinculacion"><?php echo $value[21] ?></td>
            <td class="datos_editar_vinculacion"><?php echo $value[22] ?></td>    
            <td class="datos_editar_vinculacion"><?php echo $value[23] ?></td>  
            <td class="datos_editar_vinculacion"><?php echo $value[24] ?></td>  
                                          
            <td style="display: none;" class="datos_editar_vinculacion"><?php echo $value[8] ?></td>
            <td style="display: none;" class="datos_editar_vinculacion"><?php echo $value[13] ?></td>
            <td style="display: none;" class="datos_editar_vinculacion"><?php echo $value[14] ?></td> 
            <td style="display: none;" class="datos_editar_vinculacion"><?php echo $value[16] ?></td>
            <td><button type="button" class="btn btn-primary editar_vinculacion" data-toggle="modal" data-target=".editar_vinculacion_modal">e</button></td>
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
            <th>Inicio Practicas</th>
            <th>Fin Practicas</th>
            <th>Inicio Semestre</th>
            <th>Fin Semestre</th>
            <th>Grupo</th>
            <th>DNI Aprendiz</th>
            <th>Nombres Apellidos Aprendiz</th>
            <th>Telefono Aprendiz</th>
            <th>Correo Aprendiz</th>
            <th>Direccion Aprendiz</th>
            <th>Referencia</th>
            <th>DNI Apoderado</th>
            <th>Nombre Apellido Apoderado</th>
            <th>Telefono Apoderado</th>
            <th>Id SENATI Aprendiz</th>
            <th>Bloque</th>
            <th>Programa</th>
            <th>Genero</th>
            <th>RUC Empresa</th>                  
            <th>Razon Social</th>
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
          </tr>
        <tr>
          <td class="alert alert-danger" role="alert" colspan="36"><center><h5>No hay datos</h5></center></td>
        </tr>
      </table>
      <div>
      <?php 
    }


  }
  else{

    //$datos_cfp = $cfp_model->mostrar_cfp();

    if (!empty($datos_vinculacion)) {
      ?>
      <div class="table-responsive">
      <table class="table table-hover">
          <tr>
            <th>Inicio Practicas</th>
            <th>Fin Practicas</th>
            <th>Inicio Semestre</th>
            <th>Fin Semestre</th>
            <th>Grupo</th>
            <th>DNI Aprendiz</th>
            <th>Nombres Apellidos Aprendiz</th>
            <th>Telefono Aprendiz</th>
            <th>Correo Aprendiz</th>
            <th>Direccion Aprendiz</th>
            <th>Referencia</th>
            <th>DNI Apoderado</th>
            <th>Nombre Apellido Apoderado</th>
            <th>Telefono Apoderado</th>
            <th>Id SENATI Aprendiz</th>
            <th>Bloque</th>
            <th>Programa</th>
            <th>Genero</th>
            <th>RUC Empresa</th>                  
            <th>Razon Social</th>
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
          </tr>
      <?php 
      foreach ($datos_vinculacion as $value) {
        ?>        
          <tr>
            <td style="display: none;" class="datos_editar_vinculacion"><?php echo $value[0] ?></td>            
            <td class="datos_editar_vinculacion"><?php echo $value[1] ?></td>
            <td class="datos_editar_vinculacion"><?php echo $value[2] ?></td>
            <td class="datos_editar_vinculacion"><?php echo $value[3] ?></td>
            <td class="datos_editar_vinculacion"><?php echo $value[4] ?></td>
            <td class="datos_editar_vinculacion"><?php echo $value[5] ?></td>
            
            <td class="datos_editar_vinculacion"><?php echo $value[7] ?></td>

            <td class="datos_editar_vinculacion"><?php echo $value[8]. " ".$value[9] ?></td>
            <td class="datos_editar_vinculacion"><?php echo $value[10] ?></td>
            <td class="datos_editar_vinculacion"><?php echo $value[11] ?></td>
            <td class="datos_editar_vinculacion"><?php echo $value[12] ?></td>
            <td class="datos_editar_vinculacion"><?php echo $value[13] ?></td>

            <td class="datos_editar_vinculacion"><?php echo $value[15] ?></td>
            <td class="datos_editar_vinculacion"><?php echo $value[16] ?></td>
            <td class="datos_editar_vinculacion"><?php echo $value[17] ?></td>
            <td class="datos_editar_vinculacion"><?php echo $value[18] ?></td>

            <td class="datos_editar_vinculacion"><?php echo $value[21] ?></td>
            <td class="datos_editar_vinculacion"><?php echo $value[22] ?></td>
            <td class="datos_editar_vinculacion"><?php echo $value[23] ?></td>

            <td class="datos_editar_vinculacion"><?php echo $value[25] ?></td>    
            <td class="datos_editar_vinculacion"><?php echo $value[26] ?></td>  
            <td class="datos_editar_vinculacion"><?php echo $value[27] ?></td>  
            <td class="datos_editar_vinculacion"><?php echo $value[28] ?></td>
            <td class="datos_editar_vinculacion"><?php echo $value[29] ?></td>
            <td class="datos_editar_vinculacion"><?php echo $value[30] ?></td>
            <td class="datos_editar_vinculacion"><?php echo $value[31] ?></td>

            <td class="datos_editar_vinculacion"><?php echo $value[37] ?></td>

            <td class="datos_editar_vinculacion"><?php echo $value[40] ?></td>
            <td class="datos_editar_vinculacion"><?php echo $value[41] ?></td>

            <td class="datos_editar_vinculacion"><?php echo $value[45] ?></td>
            <td class="datos_editar_vinculacion"><?php echo $value[47]. " " . $value[48] ?></td>
            <td class="datos_editar_vinculacion"><?php echo $value[49] ?></td>
            <td class="datos_editar_vinculacion"><?php echo $value[50] ?></td>
            <td class="datos_editar_vinculacion"><?php echo $value[51] ?></td>
            <td class="datos_editar_vinculacion"><?php echo $value[52] ?></td>
            <td class="datos_editar_vinculacion"><?php echo $value[54] ?></td>
                                          
            <td style="display: none;" class="datos_editar_vinculacion"><?php echo $value[6] ?></td>
            <td style="display: none;" class="datos_editar_vinculacion"><?php echo $value[24] ?></td>             
            <td style="display: none;" class="datos_editar_vinculacion"><?php echo $value[35] 
            ?></td>
            <td style="display: none;" class="datos_editar_vinculacion"><?php echo $value[20] ?></td>
            <td style="display: none;" class="datos_editar_vinculacion"><?php echo $value[42] ?></td>

            <td><button type="button" class="btn btn-primary editar_vinculacion" data-toggle="modal" data-target=".editar_vinculacion_modal">e</button></td>
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
            <th>Inicio Practicas</th>
            <th>Fin Practicas</th>
            <th>Inicio Semestre</th>
            <th>Fin Semestre</th>
            <th>Grupo</th>
            <th>DNI Aprendiz</th>
            <th>Nombres Apellidos Aprendiz</th>
            <th>Telefono Aprendiz</th>
            <th>Correo Aprendiz</th>
            <th>Direccion Aprendiz</th>
            <th>Referencia</th>
            <th>DNI Apoderado</th>
            <th>Nombre Apellido Apoderado</th>
            <th>Telefono Apoderado</th>
            <th>Id SENATI Aprendiz</th>
            <th>Bloque</th>
            <th>Programa</th>
            <th>Genero</th>
            <th>RUC Empresa</th>                  
            <th>Razon Social</th>
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
          </tr>
          <td class="alert alert-danger" role="alert" colspan="36"><center><h5>No hay datos</h5></center></td>
        </tr>
      </table>
      </div>
      <?php 
    }

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
            <option value="<?php echo $value[0] ?>"><?php echo $value[2]." ".$value[3] ?></option>           
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
            <option value="<?php echo $value[0] ?>"><?php echo $value[2]." ".$value[3] ?></option>           
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


