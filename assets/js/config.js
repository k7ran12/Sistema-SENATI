 $(document).ready(function(){
 	$('.dropdown-toggle').dropdown();
    
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

    /*======================================
    =            Datos Editar Usuario      =
    ======================================*/

    $(".editar_usuario").click(function() {

        //var valores = "";
        var valores = [];

        // Obtenemos todos los valores contenidos en los <td> de la fila
        // seleccionada
        $(this).parents("tr").find(".datos_usuario_editar").each(function() {
          valores.push($(this).html());
        });
        $("#editar_nick").val(valores[0]);
        $("#editar_password").val("password");
        $("#editar_nombres").val(valores[1]);
        $("#editar_apellidos").val(valores[2]);        
        $("#editar_nivel option[value='"+valores[3]+"']").attr("selected", true);
        //console.log(valores);
        //alert(valores);
      });

 
    
    /*=====  End of Datos Editar Usuario  ======*/
    

    /*=======================================
    =            Agregar Usuario            =
    =======================================*/
    
    $( "#form_agregar_usuario" ).on( "submit", function( event ) {
	  event.preventDefault();	  
	  let form_usuario = $( this ).serialize();
	  console.log(form_usuario);
	  $.ajax({
		  method: "POST",
		  url: "controller/login_controller.php",
		  data: "accion=registrar&" + form_usuario
		})
		  .done(function( msg ) {		  	
		  	if (msg == 'agregado') {
		  		alertify.alert('Alerta', 'Los datos se agrearon correctamente!', function(){ alertify.success('Guardado');window.location.reload(); });		  		
		  		
		  	}
		  	else if(msg == 'incorrecto'){
		  		alertify.success('No se pudo agregar :(');
		  	}
		  	else if(msg == 'invalidado'){
		  		alertify.success('Ingresar todos los datos');
		  	}		  	
		  	else{
		  		alertify.success('Error no encontrado');		  		
		  	}		  	
		    
		});
	});
    
    /*=====  End of Agregar Usuario  ======*/
    

    //Alertify



   $(".eliminar").click(function(){
      alertify.confirm('Confirm Title', 'Confirm Message', function(){ alertify.success('Ok') }
                , function(){ alertify.error('Cancel')});
   });
    

 });
