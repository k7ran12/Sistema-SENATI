<?php 
	if (empty($_SESSION['usuario'])) {
		header('Location: ../');
	}

	require_once("model/ubigeo_model.php");
	$ubicacion = new ubigeo_model();
	$ubi = $ubicacion->mostrar_ubigeo();

 ?>

<center><h2>Convenio</h2></center>

<div style="float: left;">
	
     <button type="button" class="btn btn-success my-2 my-sm-0" data-toggle="modal" data-target=".agregar_cfp">add</button>      
    
</div>

<div style="float: right;">
	<form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
      <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Buscar</button>
    </form>
</div><br><br><br>

<div>
	<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>     
      <th scope="col">Descripcion</th>      
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>1</th>      
      <td>Otto</td>     
      <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".editar_cfp">e</button></td>
    </tr>
    <tr>
      <th>2</th>      
      <td>Thornton</td>      
      <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".editar_cfp">e</button></td>
    </tr>
    <tr>
      <th>3</th>     
      <td>@twitter</td>      
      <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".editar_cfp">e</button></td>
    </tr>
    <tr>
      <th>3</th>         
      <td>3</td>      
      <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".editar_cfp">e</button></td>
    </tr>
  </tbody>
</table>
<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>
</div>

<!--==============================================
=            Modal Formulario Agregar            =
===============================================-->

<div class="modal fade agregar_cfp" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">      
	      <div class="modal-header">
	        <h5 style="text-align: center !important;" class="modal-title">Convenio</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form>
			  <div class="form-group">
			    <label for="codigo_cfp">Codigo Carrera</label>
			    <input type="text" class="form-control" id="codigo_cfp" name="codigo_cfp" aria-describedby="emailHelp">			    
			  </div>
			  <div class="form-group">
			    <label for="descripcion_cfp">Descripcion</label>
			    <input type="text" class="form-control" id="descripcion_cfp" name="descripcion_cfp">
			  </div>			  
	      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
		        <button type="submit" class="btn btn-primary">Guardar</button>
		      </div>
	      </form>
    </div>
  </div>
</div>

<!--====  End of Modal Formulario Agregar  ====-->

<!--=============================================
=            Modal Formulario Editar            =
==============================================-->

<div class="modal fade editar_cfp" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
	        <h5 style="text-align: center !important;" class="modal-title">Editar Convenio</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form>
			  <div class="form-group">
			    <label for="codigo_cfp">Codigo CFP</label>
			    <input value="Codigo CFP" type="text" class="form-control" id="codigo_cfp" name="codigo_cfp" aria-describedby="emailHelp">			    
			  </div>
			  <div class="form-group">
			    <label for="descripcion_cfp">Descripcion</label>
			    <input value="Descripcion" type="text" class="form-control" id="descripcion_cfp" name="descripcion_cfp">
			  </div>			  
	      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
		        <button type="submit" class="btn btn-primary">Guardar</button>
		      </div>
	      </form>
    </div>
  </div>
</div>

<!--====  End of Modal Formulario Editar  ====-->

