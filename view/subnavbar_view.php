<?php   
$url= $_SERVER["REQUEST_URI"];

$tipo_usuario = $_SESSION['tipo_usuario'];

//$name_pagina = substr($url, -16);

 ?>
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">   
      <?php 
        if ($tipo_usuario == "Usuario") {
          ?>

          <li class="<?php if ("/sena/view/actividad_empresa_view.php" == $url) { echo "active";} ?>"><a href="actividad_empresa_view.php"><i class="icon-bar-chart"></i><span>Actividad</span> </a> </li>
          <li class="<?php if ("/sena/view/aprendiz_view.php" == $url) { echo "active";} ?>"><a href="aprendiz_view.php"><i class="icon-code"></i><span>Aprendiz</span> </a> </li>
          <li class="<?php if ("/sena/view/empresa_view.php" == $url) { echo "active";} ?>"><a href="empresa_view.php"><i class="icon-code"></i><span>Empresa</span> </a> </li>
          <li class="<?php if ("/sena/view/monitor_view.php" == $url) { echo "active";} ?>"><a href="monitor_view.php"><i class="icon-code"></i><span>Monitor</span> </a> </li>
          <li class="<?php if ("/sena/view/vinculacion_view.php" == $url) { echo "active";} ?>"><a href="vinculacion_view.php"><i class="icon-code"></i><span>Vinculacion</span> </a> </li>

          <?php 
        }
        elseif ($tipo_usuario == "Especialista") {
          ?>

          <li class="<?php if ("/sena/view/actividad_empresa_view.php" == $url) { echo "active";} ?>"><a href="actividad_empresa_view.php"><i class="icon-bar-chart"></i><span>Actividad</span> </a> </li>          
          <li class="<?php if ("/sena/view/empresa_view.php" == $url) { echo "active";} ?>"><a href="empresa_view.php"><i class="icon-code"></i><span>Empresa</span> </a> </li>
          <li class="<?php if ("/sena/view/monitor_view.php" == $url) { echo "active";} ?>"><a href="monitor_view.php"><i class="icon-code"></i><span>Monitor</span> </a> </li>
          <li class="<?php if ("/sena/view/vinculacion_view.php" == $url) { echo "active";} ?>"><a href="vinculacion_view.php"><i class="icon-code"></i><span>Vinculacion</span> </a> </li>

          <?php 
        }
        else{
       ?>     
        <li class="<?php if ($sub_navbar == $url.'cfp') { echo "active";} ?>"><a href="cfp_view.php"><i class="icon-list-alt"></i><span>CFP</span> </a> </li>
        <li class="<?php if ($sub_navbar == $url.'carrera') { echo "active";} ?>"><a href="carrera_view.php"><i class="icon-facetime-video"></i><span>Carrera</span> </a></li>
        <li class="<?php if ($sub_navbar == $url.'ae') { echo "active";} ?>"><a href="actividad_empresa_view.php"><i class="icon-bar-chart"></i><span>Actividad</span> </a> </li>
        <li class="<?php if ($sub_navbar == $url.'convenio') { echo "active";} ?>"><a href="convenio_view.php"><i class="icon-code"></i><span>Convenio</span> </a> </li>
        <li class="<?php if ($sub_navbar == $url.'usuario') { echo "active";} ?>"><a href="usuario_view.php"><i class="icon-code"></i><span>Usuario</span> </a> </li>
        <li class="<?php if ($sub_navbar == $url.'ubigeo') { echo "active";} ?>"><a href="ubigeo_view.php"><i class="icon-code"></i><span>Ubigeo</span> </a> </li>
        <li class="<?php if ($sub_navbar == $url.'aprendiz') { echo "active";} ?>"><a href="aprendiz_view.php"><i class="icon-code"></i><span>Aprendiz</span> </a> </li>
        <li class="<?php if ($sub_navbar == $url.'empresa') { echo "active";} ?>"><a href="empresa_view.php"><i class="icon-code"></i><span>Empresa</span> </a> </li>
        <li class="<?php if ($sub_navbar == $url.'monitor') { echo "active";} ?>"><a href="monitor_view.php"><i class="icon-code"></i><span>Monitor</span> </a> </li>
        <li class="<?php if ($sub_navbar == $url.'semestre') { echo "active";} ?>"><a href="semestre_view.php"><i class="icon-code"></i><span>Semestre</span> </a> </li>
        <li class="<?php if ($sub_navbar == $url.'vinculacion') { echo "active";} ?>"><a href="vinculacion_view.php"><i class="icon-code"></i><span>Vinculacion</span> </a> </li>   
        <li class="<?php if ($sub_navbar == $url.'reporte_empresa') { echo "active";} ?>"><a href="reporte_empresa.php"><i class="icon-code"></i><span>Reporte</span> </a> </li>       
        <?php } ?>
       <!--  <li class="dropdown">
          <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"><i class=""></i>            
          </i><span>Drops&nbsp;<i class="fas fa-caret-down"></i></span>
        </a>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li> -->
       
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>