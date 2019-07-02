<?php 
	session_start();
	require_once("../model/empresa_model.php");

	$empresa_model = new empresa_model();
	$empresa = $empresa_model->mostrar_empresa();	
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
	     	
	     		<?php foreach ($empresa as $value) {	     			
	     		 ?>
	     		 <tr>
	     		 <td><?php echo $value['incrementador'] ?></td>
	     		 <td><a href="../librerias/tcpdf_master/examples/reporte_empresa_pdf.php?empresa=<?php echo $value[0] ?>"><?php echo $value[2] ?></a></td>
	     		 <td><?php echo $value[1] ?></td>
	     		 </tr>
	     		 <?php } ?>
	     		
	     	
	     </table>
    </div>

</body>
</html>