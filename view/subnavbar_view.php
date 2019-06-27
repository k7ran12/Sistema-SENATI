<?php   
$url= $_SERVER["REQUEST_URI"];

 ?>
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">        
        <li class="<?php if ("/sena/view/cfp_view.php" == $url) { echo "active";} ?>"><a href="/sena/view/cfp_view.php"><i class="icon-list-alt"></i><span>CFP</span> </a> </li>
        <li class="<?php if ("/sena/view/carrera_view.php" == $url) { echo "active";} ?>"><a href="/sena/view/carrera_view.php"><i class="icon-facetime-video"></i><span>Carrera</span> </a></li>
        <li class="<?php if ("/sena/view/actividad_empresa_view.php" == $url) { echo "active";} ?>"><a href="/sena/view/actividad_empresa_view.php"><i class="icon-bar-chart"></i><span>Actividad</span> </a> </li>
        <li class="<?php if ("/sena/view/convenio_view.php" == $url) { echo "active";} ?>"><a href="convenio_view.php"><i class="icon-code"></i><span>Convenio</span> </a> </li>
        <li class="<?php if ("/sena/view/usuario_view.php" == $url) { echo "active";} ?>"><a href="usuario_view.php"><i class="icon-code"></i><span>Usuario</span> </a> </li>
        <li class="<?php if ("/sena/view/ubigeo_view.php" == $url) { echo "active";} ?>"><a href="ubigeo_view.php"><i class="icon-code"></i><span>Ubigeo</span> </a> </li>
        <li class="<?php if ("/sena/view/aprendiz_view.php" == $url) { echo "active";} ?>"><a href="aprendiz_view.php"><i class="icon-code"></i><span>Aprendiz</span> </a> </li>
        <li class="<?php if ("/sena/view/empresa_view.php" == $url) { echo "active";} ?>"><a href="empresa_view.php"><i class="icon-code"></i><span>Empresa</span> </a> </li>
        <li class="<?php if ("/sena/view/monitor_view.php" == $url) { echo "active";} ?>"><a href="monitor_view.php"><i class="icon-code"></i><span>Monitor</span> </a> </li>
        <li class="<?php if ("/sena/view/semestre_view.php" == $url) { echo "active";} ?>"><a href="semestre_view.php"><i class="icon-code"></i><span>Semestre</span> </a> </li>
        <li class="<?php if ("/sena/view/vinculacion_view.php" == $url) { echo "active";} ?>"><a href="vinculacion_view.php"><i class="icon-code"></i><span>Vinculacion</span> </a> </li>
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