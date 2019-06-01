<?php 
session_start();
 ?>
<!doctype html>
<html lang="en">
  <head>
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
              require_once("view/dashboard_view.php");
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