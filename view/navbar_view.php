<?php 
  setlocale(LC_TIME,'spanish');
$dateutf = strftime("%A, %d de %B de %Y");
$hora_imp = ucfirst(iconv("ISO-8859-1","UTF-8",$dateutf));


 ?>
<nav class="navbar navbar-expand-lg navbar-dark" style="background: #0A39E6;color: white !important;">
  <div class="container">
      <a class="navbar-brand" href="#"><?php echo $hora_imp ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index">Inicio <span class="sr-only">(current)</span></a>
      </li>      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $_SESSION['usuario'] ?>&nbsp;<i class="fas fa-caret-down"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="controller/salir_controller.php">Salir</a>
        </div>
      </li>      
    </ul>    
  </div>
  </div>
</nav>