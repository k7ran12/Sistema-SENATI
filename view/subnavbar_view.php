<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li class="<?php if($_GET['pagina'] == 'index' OR empty($_GET['pagina'])){ echo 'active';} ?>"><a href="index"><i class="fas fa-tachometer-alt"></i></i><span>Dashboard</span> </a> </li>
        <li class="<?php if($_GET['pagina'] == 'cfp'){ echo 'active';} ?>"><a href="cfp"><i class="icon-list-alt"></i><span>CFP</span> </a> </li>
        <li class="<?php if($_GET['pagina'] == 'carrera'){ echo 'active';} ?>"><a href="carrera"><i class="icon-facetime-video"></i><span>Carrera</span> </a></li>
        <li class="<?php if($_GET['pagina'] == 'actividadEmpresa'){ echo 'active';} ?>"><a href="actividadEmpresa"><i class="icon-bar-chart"></i><span>Actividad Empresa</span> </a> </li>
        <li class="<?php if($_GET['pagina'] == 'convenio'){ echo 'active';} ?>"><a href="convenio"><i class="icon-code"></i><span>Convenio</span> </a> </li>
        <li class="<?php if($_GET['pagina'] == 'usuario'){ echo 'active';} ?>"><a href="usuario"><i class="icon-code"></i><span>Usuario</span> </a> </li>
        <li class="dropdown">
          <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"><i class=""></i>            
          </i><span>Drops&nbsp;<i class="fas fa-caret-down"></i></span>
        </a>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>