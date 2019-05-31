<?php 
session_start();
 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

   
    <script type="text/javascript" src="librerias/bootstrap/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="librerias/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="librerias/bootstrap/js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/config.js"></script>
    

    <title>SENATI</title>
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