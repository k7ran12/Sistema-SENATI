<?php 
session_start();
 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="UTF-8">
    <?php require_once("view/head.php"); ?>
  </head>
  <body>
      <?php 
      if(!empty($_SESSION['usuario'])){ 
        require_once("view/navbar_view.php"); 
        require_once("view/subnavbar_view.php");
      } 
      ?>
      <div class="container">
          <?php             
            if (!empty($_SESSION['usuario'])) {             
              
              //Paginas a Mostrar
              if (isset($_GET['pagina'])) {
                if ($_GET['pagina'] == 'cfp') {
                  require_once("view/cfp_view.php");
                }
                else if ($_GET['pagina'] == 'index') {
                  require_once("view/dashboard_view.php");
                }
                else if ($_GET['pagina'] == 'carrera') {
                  require_once("view/carrera_view.php");
                }
                else if ($_GET['pagina'] == 'actividadEmpresa') {
                  require_once("view/actividad_empresa_view.php");
                }
                else if ($_GET['pagina'] == 'convenio') {
                  require_once("view/convenio_view.php");
                }
                else if ($_GET['pagina'] == 'usuario') {
                  require_once("view/usuario_view.php");
                }
                else if ($_GET['pagina'] == 'ubigeo') {
                  require_once("view/ubigeo_view.php");
                }
                else if ($_GET['pagina'] == 'aprendiz') {
                  require_once("view/aprendiz_view.php");
                }
                else if ($_GET['pagina'] == 'empresa') {
                  require_once("view/empresa_view.php");
                }
                else if ($_GET['pagina'] == 'monitor') {
                  require_once("view/monitor_view.php");
                }
                else if ($_GET['pagina'] == 'semestre') {
                  require_once("view/semestre_view.php");
                }
                else if ($_GET['pagina'] == 'vinculacion') {
                  require_once("view/vinculacion_view.php");
                }
              }
              else{
                require_once("view/dashboard_view.php");
              }
            }
            else{
              require_once("view/login_view.php");
            }

           ?>
    
      </div>
      <?php 
      if(!empty($_SESSION['usuario'])){ 
        require_once("view/footer_view.php");         
      } 
      ?>     
  </body>
</html>