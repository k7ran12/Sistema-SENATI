 $(document).ready(function(){
    
    /*========================================
    =            Formulario Login            =
    ========================================*/
    
    $( "#form_login" ).on( "submit", function( event ) {
	  event.preventDefault();
	  let form_login = $( this ).serialize();

	  $.ajax({
		  method: "POST",
		  url: "controller/login_controller.php",
		  data: "accion=ingresar&" + form_login
		})
		  .done(function( msg ) {
		  	if (msg == 'invalidado') {
		  		$("#respuesta_servidor_login").html('<div class="alert alert-danger" role="alert">Completar el formulario!</div>')
		  	}
		  	else if (msg == 'incorrecto') {
		  		$("#respuesta_servidor_login").html('<div class="alert alert-danger" role="alert">Los datos son incorrectos!</div>')
		  	}
		  	else{
		  		$("#respuesta_servidor_login").html('<div class="alert alert-success" role="alert">Ingresando al sistema!</div>')
		  		window.location.reload();
		  	}		  	
		    
		});
	});
    
    /*=====  End of Formulario Login  ======*/
    

 });