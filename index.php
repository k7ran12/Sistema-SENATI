<?php 
session_start();

      if(!empty($_SESSION['usuario'])){ 
        header('Location: view/dashboard_view.php');
      }
      else{
        header('Location: view/login_view.php');
      } 
     
       
 