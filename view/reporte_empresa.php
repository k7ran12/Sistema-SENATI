<?php 
	session_start();

	if (empty($_SESSION['usuario'])) {
		header('Location: ../');
	}
	if(!$_GET){
    header('Location:reporte_empresa.php?pagina=1');
  }


  if (isset($_POST['buscar'])) {
    $busqueda = $_POST['buscar'];
    $_SESSION["buscar"] = $busqueda;

  }


	$sub_navbar = $_SERVER["REQUEST_URI"]."reporte_empresa";

	require_once("../model/empresa_model.php");

	$actividad_empresa = "";

	$empresa_model = new empresa_model();	

	//Datos Pagina
 

  if (isset($_POST['buscar'])) {
    $busqueda = $_POST['buscar'];
    $_SESSION["buscar"] = $busqueda;

  }
  
  //echo $_SESSION['buscar'];

  $datos_empresa = $empresa_model->mostrar_empresa($_GET['pagina'], $_SESSION["buscar"]);

  $cantidad_de_datos = count($datos_empresa);

  $cantida = $empresa_model->catidad_de_datos_empresa($_SESSION["buscar"]);

  //echo $cantida;

  


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
    	<center><h2>Reporte</h2></center>

    	

    	<div style="float: right;">
		  <form class="form-inline my-2 my-lg-0" action="reporte_empresa.php" method="POST">
		      <input id="buscar" name="buscar" class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
		      <button id="buscar_cfp" class="btn btn-outline-primary my-2 my-sm-0" type="submit">Buscar</button>
		    </form>
		</div><br><br><br>

    	 <table class="table table-hover">
	     	<tr>
	     		<th>Num°</th>
	     		<th>Empresa</th>     		
	     		<th>Ruc</th>
	     	</tr>
	     	
	     		<?php foreach ($datos_empresa as $value) {	     			
	     		 ?>
	     		 <tr>
	     		 <td><?php echo $value['incrementador'] ?></td>
	     		 <td><a href="../librerias/tcpdf_master/examples/reporte_empresa_pdf.php?empresa=<?php echo $value[0] ?>"><?php echo $value[2] ?></a></td>
	     		 <td><?php echo $value[1] ?></td>
	     		 </tr>
	     		 <?php } ?>
	     		
	     	
	     </table>

	     <!-- Paginacion  -->

      <ul class="pagination" style="float: left;">
        
        <li class="page-item <?php echo $_GET['pagina']<= 1? 'disabled' : '' ?>"><a id="a_pagina" href="reporte_empresa.php?pagina=<?php echo $_GET['pagina'] - 1 ?>" class="page-link a_pagina">Anterior</a></li>
      </ul>

      <nav aria-label="Page navigation example" style="width: 84%;float: left;">
        <div class="table-responsive">
          <ul class="pagination">                      
            <?php for ($i=0; $i < $cantida; $i++) { 

             ?>            
            <li class="page-item <?php echo $_GET['pagina'] == $i + 1  ? 'active' : '' ?>"><a class="page-link" href="reporte_empresa.php?pagina=<?php echo $i + 1 ?>" value="<?php echo $i + 1; ?>"><?php echo $i + 1; ?></a></li>
            
            <?php } ?>                   
        </ul>
        </div>
      </nav> 

      <ul class="pagination" style="float: right;">
        <li class="page-item <?php echo $_GET['pagina']>=$cantida? 'disabled' : '' ?>"><a id="s_pagina" href="reporte_empresa.php?pagina=<?php echo $_GET['pagina'] + 1 ?>" class="page-link s_pagina">Siguiente</a></li>
      </ul>

      <!-- Fin Paginacion -->
      
    </div>

</body>
</html>