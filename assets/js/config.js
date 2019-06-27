 $(document).ready(function(){

/*==================================
=            Paginacion            =
==================================*/
  
  $('button[value="'+1+'"]').parents("li").addClass('active');

  var incrementador = 2;

  var array = [];

  $(".pagina").click(function(){
    $("li").removeClass("disabled");
    $("li").removeClass("active");

    $(this).parents("li").addClass( "active" );
    
    var pagina = $(this).text();

    array.push(pagina);

    var ultimo = array[array.length - 1];


    //console.log(ultimo);

    incrementador = parseFloat(ultimo) + parseFloat(1);

    var enviar_ajax = (incrementador - 1);

    //console.log(enviar_ajax);

    $.ajax({
      method: "GET",
      url: "aprendiz",
      data: { pagin: enviar_ajax}
    })      

  }); 



  $(".s_pagina").click(function(){

    $("li").removeClass("disabled");
    $("li").removeClass("active");

    incrementador - 1;      

    if (incrementador >= $("#cantidad_de_datos").val()) {
      console.log("Hola" + ($("#cantidad_de_datos").val() - 1))
    $('button[value="'+ ($("#cantidad_de_datos").val() - 1) +'"]').parents("li").addClass('active');
    $("#s_pagina").parents("li").addClass('disabled');
  } 
  else{         
    $('button[value="'+(incrementador ++)+'"]').parents("li").addClass('active');
    var enviar_ajax = (incrementador-1);
    //console.log(enviar_ajax);
  }  


  });

  $(".a_pagina").click(function(){ 
    $("li").removeClass("disabled");
    $("li").removeClass("active");

    //$('button[value="'+incrementador+'"]').parents("li").addClass('active');

    if (incrementador <= 2) {
    $("#a_pagina").parents("li").addClass('disabled');
    $('button[value="'+1+'"]').parents("li").addClass('active');
  }
  else{
    //console.log((incrementador --) - 2);
    $('button[value="'+((incrementador --) - 2)+'"]').parents("li").addClass('active');
    var enviar_ajax = (incrementador - 1);
    //console.log(enviar_ajax);
  }

  });

  //console.log(enviar_ajax);


/*=====  End of Paginacion  ======*/



  
  

   $('#ubicacion_ap').select2();
   $('#ubicacion_em').select2()

  $('.dropdown-toggle').dropdown();
    
    /*========================================
    =            Formulario Login            =
    ========================================*/
    
    $( "#form_login" ).on( "submit", function( event ) {
	  event.preventDefault();
	  let form_login = $( this ).serialize();

    console.log(form_login);

	  $.ajax({
		  method: "POST",
		  url: "../controller/login_controller.php",
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
		  		//window.location.reload();
        window.location.href = "dashboard_view.php"  //
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

        $("#id_usua").val(valores[0]);
        $("#editar_nick").val(valores[1]);
        $("#editar_password").val("password");
        $("#editar_nombres").val(valores[2]);
        $("#editar_apellidos").val(valores[3]);        
        $("#editar_nivel option[value='"+valores[4]+"']").attr("selected", true);
        //console.log(valores);
        //alert(valores);
      });

    $( "#form_editar_usuario" ).on( "submit", function( event ) {
    event.preventDefault();   
    let form_usuario = $( this ).serialize();
    console.log(form_usuario);
    $.ajax({
      method: "POST",
      url: "../controller/login_controller.php",
      data: "accion=editar&" + form_usuario
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
		  url: "../controller/login_controller.php",
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
      url: "../controller/cfp_controller.php",
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
      url: "../controller/cfp_controller.php",
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
      url: "../controller/carrera_controller.php",
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
      url: "../controller/carrera_controller.php",
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
        $("#id_ae").val(valores[0]);
        $("#codigo_actividad_empresa_editar").val(valores[1]);
        $("#descripcion_actividad_empresa_editar").val(valores[2]);
        
        console.log(valores);
        //alert(valores);
      });
   
   /* Fin Datos Editar Actividad Empresa */

   /* Agregar Datos Actividad Empresa */  
   

   $( "#form_agregar_actividad_empresa" ).on( "submit", function( event ) {
    event.preventDefault();   
    let form_actividad_empresa = $( this ).serialize();
    console.log(form_actividad_empresa);
    $.ajax({
      method: "POST",
      url: "../controller/actividad_empresa_controller.php",
      data: "accion=agregar&" + form_actividad_empresa
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

  /* Fin Agregar Datos Actividad Empresa */


   /* Editar Actividad Empresa */

   $( "#form_editar_actividad_empresa" ).on( "submit", function( event ) {
    event.preventDefault();   
    let form_actividad_empresa_editar = $( this ).serialize();
    console.log(form_actividad_empresa_editar);
    $.ajax({
      method: "POST",
      url: "../controller/actividad_empresa_controller.php",
      data: "accion=editar&" + form_actividad_empresa_editar
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

   /* Fin Editar Actividad Empresa */
   
   

   
   /*=====  End of Tabla Actividad Empresa  ======*/
   
   
   /*======================================
   =            Tabla Convenio            =
   ======================================*/
   
   /* Datos Para Editar */

   $(".editar_convenio").click(function() {

        //var valores = "";
        var valores = [];

        // Obtenemos todos los valores contenidos en los <td> de la fila
        // seleccionada
        $(this).parents("tr").find(".datos_convenio_editar").each(function() {
          valores.push($(this).html());
        });
        $("#id_conv_editar").val(valores[0]);
        $("#descripcion_convenio_editar").val(valores[1]);        
        //alert(valores);
        console.log(valores);
      });

   /* Fin Datos Para Editar */

   /* Agregar Convenio */
   

   $( "#form_agregar_convenio" ).on( "submit", function( event ) {
    event.preventDefault();   
    let form_convenio = $( this ).serialize();
    console.log(form_convenio);
    $.ajax({
      method: "POST",
      url: "../controller/convenio_controller.php",
      data: "accion=agregar&" + form_convenio
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



   /* Fin Agregar Convenio */

   /* Editar Convenio */   

   $( "#form_editar_convenio" ).on( "submit", function( event ) {
    event.preventDefault();   
    let form_editar_convenio = $( this ).serialize();
    console.log(form_editar_convenio);
    $.ajax({
      method: "POST",
      url: "../controller/convenio_controller.php",
      data: "accion=editar&" + form_editar_convenio
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


   /* Fin Editar Convenio */
   
   
   
   
   
   
   
   /*=====  End of Tabla Convenio  ======*/

   /*======================================
   =            Tabla Aprendiz            =
   ======================================*/
   
   /* Datos Aprendiz Editar */

   $(".editar_aprendiz").click(function() {

        //var valores = "";
        var valores = [];

        // Obtenemos todos los valores contenidos en los <td> de la fila
        // seleccionada
        $(this).parents("tr").find(".datos_aprendiz_editar").each(function() {
          valores.push($(this).html());
        });
        $("#id_ap").val(valores[0]);
        $("#editar_dni_ap").val(valores[1]);
        $("#editar_nombre_ap").val(valores[2]);
        $("#editar_apellidos_ap").val(valores[3]);
        $("#editar_telefono_ap").val(valores[4]);        
        $("#editar_correo").val(valores[5]);  
        $("#editar_direccion_ap").val(valores[6]);
        $("#editar_referencia_lugar_ap").val(valores[7]);
        $("#editar_ubicacion_ap option[value='"+valores[27]+"'").attr("selected", true);
        //$("#editar_apellidos").val(valores[8]);  //SELECT
        $("#editar_dni_apoderado_ap").val(valores[8]);  
        $("#editar_nombre_ape_ap").val(valores[9]);  
        $("#editar_telefono_apoderado_ap").val(valores[10]);  
        $("#editar_id_codigo_senati_ap").val(valores[11]);  
        $("#editar_direccion_zonal_ap").val(valores[12]);  
        $("#editar_apellidos").val(valores[12]); //SELECT 
        $("#editar_bloque_ap").val(valores[13]);  
        $("#editar_programa_ap").val(valores[14]);  
        //$("#sexo_ap").val(valores[15]); //RADIO
        if (valores[15] == "M") {                 
          $('#radio1').attr('checked','checked');
        }
        else{
          $('#radio2').attr('checked','checked');
        }

        $("#editar_cfp option[value='"+valores[28]+"'").attr("selected", true);
        //$('input[name=sexo_ap][value="'+valores[15]+'"').attr('checked', 'checked');
        //$("#editar_nivel option[value='"+valores[4]+"']").attr("selected", true);
        
        
        console.log(valores);
      });

   /* Fin Datos Aprendiz Editar */


   /* Agregar Datos Aprendiz */

   $( "#form_agregar_aprendiz" ).on( "submit", function( event ) {
    event.preventDefault();   
    let form_aprendiz = $( this ).serialize();
    console.log(form_aprendiz);
    $.ajax({
      method: "POST",
      url: "../controller/aprendiz_controller.php",
      data: "accion=agregar&" + form_aprendiz
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

   /* Fin Agregar datos Aprendiz */
   
   /* Editar Aprendiz */

   $( "#form_editar_aprendiz" ).on( "submit", function( event ) {
    event.preventDefault();   
    let form_editar_aprendiz = $( this ).serialize();
    console.log(form_editar_aprendiz);
    $.ajax({
      method: "POST",
      url: "../controller/aprendiz_controller.php",
      data: "accion=editar&" + form_editar_aprendiz
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

   /* Fin Editar Aprendiz */
   
   
   
   
   
   /*=====  End of Tabla Aprendiz  ======*/
   
   
    /*=====================================
    =            Tabla Empresa            =
    =====================================*/
    
    /* Datos Para Editar Empresa */
    $(".editar_empresa").click(function() {

        //var valores = "";
        var valores = [];

        // Obtenemos todos los valores contenidos en los <td> de la fila
        // seleccionada
        $(this).parents("tr").find(".datos_empresa_editar").each(function() {
          valores.push($(this).html());
        });
        $("#id_emp").val(valores[0]);

        $("#editar_ruc").val(valores[1]);
        $("#editar_razon_social").val(valores[2]);
        $("#editar_direccion").val(valores[3]);
        $("#editar_telefono").val(valores[4]);        
        $("#editar_correo").val(valores[5]);  
        $("#editar_representante").val(valores[6]);
        $("#editar_dni_representante").val(valores[7]);

        $("#editar_ubicacion_em option[value='"+valores[21]+"'").attr("selected", true);
        $("#editar_actividad_empresa option[value='"+valores[22]+"'").attr("selected", true);
        $("#editar_cfp option[value='"+valores[23]+"'").attr("selected", true);
        
       

        
        
        
        console.log(valores);
      });
    /* Fin Datos Para Editar Empresa */

    /* Agregar Datos Empresa */

    $( "#form_agregar_empresa" ).on( "submit", function( event ) {
    event.preventDefault();   
    let form_aprendiz = $( this ).serialize();
    console.log(form_aprendiz);
    $.ajax({
      method: "POST",
      url: "../controller/empresa_controller.php",
      data: "accion=agregar&" + form_aprendiz
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

    /* Fin Agregar Datos Empresa */

    /* Editar Empresa */
    

    $( "#form_editar_empresa" ).on( "submit", function( event ) {
    event.preventDefault();   
    let form_editar_empresa = $( this ).serialize();
    console.log(form_editar_empresa);
    $.ajax({
      method: "POST",
      url: "../controller/empresa_controller.php",
      data: "accion=editar&" + form_editar_empresa
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

    /* Fin Editar Empresa */
    
    
    /*=====  End of Tabla Empresa  ======*/



    /*=====================================
    =            Tabla Monitor            =
    =====================================*/
    
    $(".editar_monitor").click(function() {

        //var valores = "";
        var valores = [];

        // Obtenemos todos los valores contenidos en los <td> de la fila
        // seleccionada
        $(this).parents("tr").find(".datos_empresa_editar").each(function() {
          valores.push($(this).html());
        });
        $("#id_mon").val(valores[0]);
        $("#editar_apellidos").val(valores[1]);
        $("#editar_nombres").val(valores[2]);
        $("#editar_dni").val(valores[3]);
        $("#editar_telefono").val(valores[4]);
        $("#editar_cargo").val(valores[5]);
        $("#editar_correo").val(valores[6]);
        
        console.log(valores);
        //alert(valores);
      });
    

    /* Agregar Monitor */

     $( "#form_agregar_monitor" ).on( "submit", function( event ) {
    event.preventDefault();   
    let form_monitor = $( this ).serialize();
    console.log(form_monitor);
    $.ajax({
      method: "POST",
      url: "../controller/monitor_controller.php",
      data: "accion=agregar&" + form_monitor
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

    /* Fin Agregar Monitor */
    
    

    /* Editar Monitor */

    $( "#form_editar_monitor" ).on( "submit", function( event ) {
    event.preventDefault();   
    let form_editar_monitor = $( this ).serialize();
    console.log(form_editar_monitor);
    $.ajax({
      method: "POST",
      url: "../controller/monitor_controller.php",
      data: "accion=editar&" + form_editar_monitor
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

    /* Fin Ediar Monitor */
    
    

    /*=====  End of Tabla Monitor  ======*/

    /*======================================
    =            Tabla Semestre            =
    ======================================*/
    
    /* Datos Para Editar Semetre */

    $(".editar_semestre").click(function() {

        //var valores = "";
        var valores = [];

        // Obtenemos todos los valores contenidos en los <td> de la fila
        // seleccionada
        $(this).parents("tr").find(".datos_empresa_editar").each(function() {
          valores.push($(this).html());
        });
        $("#id_sem").val(valores[0]);
        $("#editar_codigo_semestre").val(valores[1]);
        $("#editar_descripcion_semestre").val(valores[2]);
        
        console.log(valores);
        //alert(valores);
      });

    /* Fin Datos Para Editar Semetre */

    /* Agregar Semestre */

    $( "#form_agregar_semestre" ).on( "submit", function( event ) {
    event.preventDefault();   
    let form_semestre = $( this ).serialize();
    console.log(form_semestre);
    $.ajax({
      method: "POST",
      url: "../controller/semestre_controller.php",
      data: "accion=agregar&" + form_semestre
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

    /* Fin Agregar Semestre */

    /* Editar Semestre */

     $( "#form_editar_semestre" ).on( "submit", function( event ) {
    event.preventDefault();   
    let form_editar_semestre = $( this ).serialize();
    console.log(form_editar_semestre);
    $.ajax({
      method: "POST",
      url: "../controller/semestre_controller.php",
      data: "accion=editar&" + form_editar_semestre
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

    /* Fin Editar Semestre */
    
    
    
    
    
    
    /*=====  End of Tabla Semestre  ======*/

    /*=========================================
    =            Tabla Vinculacion            =
    =========================================*/
    
    /* Datos Para Editar Modal */

    $(".editar_vinculacion").click(function() {

        //var valores = "";
        var valores = [];

        // Obtenemos todos los valores contenidos en los <td> de la fila
        // seleccionada
        $(this).parents("tr").find(".datos_editar_vinculacion").each(function() {
          valores.push($(this).html());
        });
        $("#id_emp").val(valores[0]);

         //Fecha
        $("#editar_fechaini_prac").val(valores[1]);
        $("#editar_fechafin_prac").val(valores[2]);
        $("#editar_fechaini_sem").val(valores[3]);
        $("#editar_fechafin_sem").val(valores[4]);

        $("#editar_grupo").val(valores[5]);
        
        $("#editar_aprendiz option[value='"+valores[36]+"'").attr("selected", true);
        $("#editar_empresa option[value='"+valores[37]+"'").attr("selected", true);
        $("#editar_carrera option[value='"+valores[38]+"'").attr("selected", true);
        $("#editar_cfp option[value='"+valores[39]+"'").attr("selected", true);
        $("#editar_semestre option[value='"+valores[40]+"'").attr("selected", true);

        console.log(valores);

      /* Datos Para Editar Modal */
        
        
        
       
      });

    $(".imprimir_vinculacion").click(function() {

        //var valores = "";
        var valores = [];

        // Obtenemos todos los valores contenidos en los <td> de la fila
        // seleccionada
        $(this).parents("tr").find(".datos_editar_vinculacion").each(function() {
          valores.push($(this).html());
        });
         var id_vinculacion = valores[0]; 

         console.log(id_vinculacion);             

        $.ajax({
          method : "POST",
          url : "imprimir_carta.php",
           data: "id_vinculacion=xDddd"
        })
        .done(function( msg ){
           //window.open("../librerias/tcpdf_master/examples/imprimir.php?id_vinculacion="+id_vinculacion, '', '');
           //window.open("../librerias/tcpdf_master/examples/imprimir.php?id_vinculacion="+id_vinculacion, '', '');

          window.open('http://URL.....1...', '_blank');
          window.open('http://URL.....2...', '_blank');
        })
        
       
      });
    /* Agregar Datos */
      

      $( "#form_agregar_vinculacion" ).on( "submit", function( event ) {
        console.log("hola");
    event.preventDefault();   
    let form_vinculacion = $( this ).serialize();
    console.log(form_vinculacion);
    $.ajax({
      method: "POST",
      url: "../controller/vinculacion_controller.php",
      data: "accion=agregar&" + form_vinculacion
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

      /* Fin Agregar Datos */
    
    /*=====  End of Tabla Vinculacion  ======*/
    
    
    
    

 });



