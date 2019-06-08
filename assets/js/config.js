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
    

   /*=================================
   =            Tabla CFP            =
   =================================*/
   
   function datos_tabla_cfp(){
   	$.ajax({
   		method: "POST",
   		url: "controller/cfp_controller.php",
   		success: function(datos){
   			$("#tabla_cfp_view").html(datos);
   		}
   	});
   }

   datos_tabla_cfp();

   

   /* Agregar datos CFP */
   $( "#from_agregar_cfp" ).on( "submit", function( event ) {
    event.preventDefault();   
    let form_cfp = $( this ).serialize();
    console.log(form_cfp);
    $.ajax({
      method: "POST",
      url: "controller/cfp_controller.php",
      data: "accion=agregar&" + form_cfp
    })
      .done(function( msg ) {
      console.log(msg);
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
   

   /* Fin agregar datos CFP */


   /* Datos CFP para editar */

   	$(".editar_cfp").click(function() {

        //var valores = "";
        var valores = [];

        // Obtenemos todos los valores contenidos en los <td> de la fila
        // seleccionada
        $(this).parents("tr").find(".datos_cfp_editar").each(function() {
          valores.push($(this).html());
        });
        $("#id_cfp").val(valores[0]);
        $("#id_ubi").val(valores[1]);
        $("#codigo_cfp_editar").val(valores[2]);
        $("#descripcion_cfp_editar").val(valores[3]);
        $("#direccion_cfp_editar").val(valores[4]);
        //$("#editar_apellidos").val(valores[2]);        
        $("#ubicacion_cfp_editar option[value='"+valores[1]+"']").attr("selected", true);
        console.log(valores);
        //alert(valores);
      });

   /* Fin datos CFP para editar */


   /* Editar CFP */
   	

   	$( "#form_editar_cfp" ).on( "submit", function( event ) {
    event.preventDefault();   
    let form_cfp = $( this ).serialize();
    console.log(form_cfp);
    $.ajax({
      method: "POST",
      url: "controller/cfp_controller.php",
      data: "accion=editar&" + form_cfp
    })
      .done(function( msg ) {
      console.log(msg);
        if (msg == 'editado') {
          alertify.alert('Alerta', 'Los datos se editaron correctamente!', function(){ alertify.success('Guardado');window.location.reload(); });         
          
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

   /* Fin editar CFP */
   
   
   
   
   
   
   
   
   /*=====  End of Tabla CFP  ======*/

   /*=====================================
   =            Tabla CARRERA            =
   =====================================*/
   
   /* Datos editar CARRERA */

   $(".editar_carrera").click(function() {

        //var valores = "";
        var valores = [];

        // Obtenemos todos los valores contenidos en los <td> de la fila
        // seleccionada
        $(this).parents("tr").find(".datos_carrera_editar").each(function() {
          valores.push($(this).html());
        });
        $("#id_carr").val(valores[0]);
        $("#codigo_carrera_editar").val(valores[1]);
        $("#descripcion_carrera_editar").val(valores[2]);
        
        console.log(valores);
        //alert(valores);
      });
   /* Fin datos editar CARRERA */


   /* Agregar CARRERA */   

   $( "#form_agregar_carrera" ).on( "submit", function( event ) {
    event.preventDefault();   
    let form_cfp = $( this ).serialize();
    console.log(form_cfp);
    $.ajax({
      method: "POST",
      url: "controller/carrera_controller.php",
      data: "accion=agregar&" + form_cfp
    })
      .done(function( msg ) {
      console.log(msg);
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

   /* Fin Agregar CARRERA */

   /* Editar CARRERA */   

   $( "#form_editar_carrera" ).on( "submit", function( event ) {
    event.preventDefault();   
    let form_carrera = $( this ).serialize();
    console.log(form_carrera);
    $.ajax({
      method: "POST",
      url: "controller/carrera_controller.php",
      data: "accion=editar&" + form_carrera
    })
      .done(function( msg ) {
      console.log(msg);
        if (msg == 'editado') {
          alertify.alert('Alerta', 'Los datos se editaron correctamente!', function(){ alertify.success('Guardado');window.location.reload(); });         
          
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

   /* Fin Editar CARRERA */
   
   
   
   
   
   
   
   /*=====  End of Tabla CARRERA  ======*/


   /*===============================================
   =            Tabla Actividad Empresa            =
   ===============================================*/
   
   /* Datos Editar Actividad Empresa */

   $(".editar_actividad_empresa").click(function() {

        //var valores = "";
        var valores = [];

        // Obtenemos todos los valores contenidos en los <td> de la fila
        // seleccionada
        $(this).parents("tr").find(".datos_actividad_empresa_editar").each(function() {
          valores.push($(this).html());
        });
        $("#id_carr").val(valores[0]);
        $("#codigo_actividad_empresa").val(valores[1]);
        $("#descripcion_actividad_empresa").val(valores[2]);
        
        console.log(valores);
        //alert(valores);
      });
   
   /* Fin Datos Editar Actividad Empresa */
   
   /*=====  End of Tabla Actividad Empresa  ======*/
   
   
   
    

 });

