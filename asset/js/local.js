$(document).ready(function(){

    // ************************************************ 

    // Quitar elemento del carrito sin actualizar página 
    var quitar_carrito = $('.quitar_carrito');
    quitar_carrito.on('click',function( ){
        // Obtenemos el id del botón quitar_carrito
        var id = $(this).attr('id');
        var dataString = 'id='+id;

        var ajax = $.ajax({
            // La direccion del servidor, peticion al fichecero mysql 
            url: "?controlador=carrito&accion=quitarcarrito",
            type: 'POST',
            data: dataString,
            success: function(data){
                $("#articulo" + id).remove();
                $('.fila_tienda').css("margin-bottom","0px");
            },
            // para capturar el error 
            error: function(data, status, error){
                alert("no encontrado");
            }
        })
    })

    // ************************************************ 

    // Función a ejecutar al agregar al carrito para que se imprima la cantidad  
    cargar_carrito = function(){
        // recuperamos el conteo
        var conteoCarrito = $('.conteoCarrito');
        var conteo = localStorage.getItem("contadorCarrito");
        // var conteo = $('#contadorCarrito').val();
        // Reiniciar el conteo
        $(".conteoCarrito").empty(); 
        
        var conteos = "<span>"+conteo+"</span>";
        conteoCarrito.append(conteos);
        // $('.conteo').val() + 1; //AQUI
    };

    // Agregar elemento al carrito sin actualizar página 
    var agregar_carrito = $('.agregar_carrito1');
    agregar_carrito.on('click',function( ){
        var id = $(this).attr('id');
        var dataString = 'id='+id;

        var ajax = $.ajax({
            url: "?controlador=paginas&accion=agregar_al_carrito",
            type: "POST",
            data: dataString,
            beforeSend: function(){
                $('.modal-body').html('<div class="ping"></div>');
            },
            success: function(data){
                setTimeout(function(){ $(".modal-body").html('Ya tu producto está en el carrito :)'); }, 1000);
                $(".carrito_agregado").modal("show");
                // cargar_carrito(); //ERROR
            },
            error: function(){} 
        });

        var ajax2 = $.ajax({
            url: "results.php",
            type: "POST",
            dataType: 'json',
            success: function(res){
                console.log(res);
                // cargar_carrito(); //ERROR
            },
            error: function(){} 
        });

    })

    // ************************************************ 
    
    // var precio = $("#precio_venta").text();
    // var cantidad = $("#cantidad").val();
    // var suma = cantidad + 1;
    // var total = precio * suma;
    // var totalcalculado = parseInt(precio)+ parseInt(total);
    // if (cantidad > 1) {
    //     $("#precio_venta").text(total);
    // }
    // console.log(cantidad);


    // ************************************************ 

    // Registrar Cliente
    var registrar_cliente = $('.registrar_cliente');
    registrar_cliente.on('click',function( ){
        //Obtenemos el valor de los campos 
        var nombre_cliente=$('#nombre_cliente').val();
        var apellido_cliente=$('#apellido_cliente').val();
        var correo_cliente=$('#correo_cliente').val();
		var contrasenia = $("#contrasenia").val();
        var contrasenia2 = $("#contrasenia2").val();
        var resultado=$('#resultado').val(); 
		//Validamos que las contraseñas coicidan
		if (contrasenia != contrasenia2) {
            $(".error_contrasenia").modal("show");
			return false;
		}
        else if(nombre_cliente == ''){
            $('html, body').animate({
                scrollTop: $("#alert").offset().top
            }, 1000);
            $('.alert').show();
            $('.alert').html("Ingresa tu nombre");
            $("#nombre_cliente").focus();
            $("#nombre_cliente").addClass("error_focus");
            setTimeout(function() {
                $(".alert").slideUp(1500);
            },2000);  
			return false;
        }
        else if(correo_cliente == ''){
            $('html, body').animate({
                scrollTop: $("#alert").offset().top
            }, 1000);
            $('.alert').show();
            $('.alert').html("Ingresa tu correo");
            $("#correo_cliente").focus();
            $("#correo_cliente").addClass("error_focus");
            setTimeout(function() {
                $(".alert").slideUp(1500);
            },3000); 
			return false;
        }
        else if(contrasenia == ''){
            $('html, body').animate({
                scrollTop: $("#alert").offset().top
            }, 1000);
            $('.alert').show();
            $('.alert').html("Ingresa la constraseña");
            $("#contrasenia").focus();
            $("#contrasenia").addClass("error_focus");
            setTimeout(function() {
                $(".alert").slideUp(1500);
            },3000); 
			return false;
        }
        else if(contrasenia2 == ''){
            $('html, body').animate({
                scrollTop: $("#alert").offset().top
            }, 1000);
            $('.alert').show();
            $('.alert').html("Confirma la contraseña");
            $("#contrasenia2").focus();
            $("#contrasenia2").addClass("error_focus");
            setTimeout(function() {
                $(".alert").slideUp(1500);
            },3000); 
			return false;
        }
        else{
            var ajax = $.ajax({
                url: "results.php",
                type: 'POST',
                data:{
                    'nombre_cliente':nombre_cliente,
                    'apellido_cliente':apellido_cliente,
                    'correo_cliente':correo_cliente,
                    'contrasenia':contrasenia
                },
                dataType: 'json',
                success: function(data){  
                    if (data.msj === "0"){
                        $('html, body').animate({
                            scrollTop: $("#alert").offset().top
                        }, 900);
                        $('.alert').show();
                        $('.alert').html("El correo ya existe");
                        $("#formulario_registro")[0].reset();
                    }else if(data.msj === "1"){
                        $(".cliente_registrado").modal("show");
                        $("#formulario_registro")[0].reset();
                        $('.alert').hide();
                    }
                },
                // para capturar el error 
                error: function(data, status, error){
                    console.log(data); 
                    alert("Error");
                }
            })
         }
    })

    $(".close-registro").on('click',function(){
        $("#nombre_cliente").focus();
    })
    $(".close-contrasenia").on('click',function(){
        $("#contrasenia").focus();
    })

    // Validar campo email 
    $('#correo_cliente').on('keyup', function() {
        var re = /([A-Z0-9a-z_-][^@])+?@[^$#<>?]+?\.[\w]{2,4}/.test(this.value);
        if(!re) {
            $('.alert').show();
            $('.alert').html("Ingresa una dirección válida");
        } else {
            $('.alert').hide();
        }
    })
    
    // ************************************************ 

    //Paginación tienda.php 
    // ERROR 
    $('.link_paginacion').on('click', function(){
        // $('.items').html('<div class="loading"><img src="images/loading.gif" width="70px" height="70px"/><br/>Un momento por favor...</div>');
 
        var page = $(this).attr('data');		
        var dataString = 'page='+page;
 
        $.ajax({
            type: "GET",
            url: "?controlador=tienda&accion=paginacion",
            data: dataString,
            success: function(data) {
                // $('.items').fadeIn(2000).html(data);
                $('.numero_paginacion').removeClass('active');
                $('.page-link[data="'+page+'"]').parent().addClass('active');
            }
        });
        return false;
    });

});