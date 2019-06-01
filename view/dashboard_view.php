<?php 
	if (empty($_SESSION['usuario'])) {
		header('Location: ../');
	}
 ?>

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
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td><button class="btn btn-primary">e</button><button class="btn btn-danger">d</button></td>
    </tr>
    <tr>
      <th>2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
      <td><button class="btn btn-primary">e</button><button class="btn btn-danger">d</button></td>
    </tr>
    <tr>
      <th>3</th>
      <td>Larry the Bird</td>
      <td>@twitter</td>
      <td>@twitter</td>
      <td><button class="btn btn-primary">e</button><button class="btn btn-danger">d</button></td>
    </tr>
    <tr>
      <th>3</th>
      <td>Larry the Bird</td>      
       <th>3</th>
      <td>Larry the Bird</td>
      <td><button class="btn btn-primary">e</button><button class="btn btn-danger">d</button></td>
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