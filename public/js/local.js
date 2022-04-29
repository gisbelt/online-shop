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
            // Para obtener la respuesta 
            success: function(data){
                $("#articulo" + id).remove();
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
        var conteo = $('.conteo').val();
        // Reiniciar el conteo
        $(".conteoCarrito").empty(); 
        
        var conteo = "<span>"+conteo+"</span>";
        conteoCarrito.append(conteo);
        $('.conteo').val() + 1;

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
            success: function(data){
                $(".carrito_agregado").modal("show");
                cargar_carrito();
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
        //Obtenemos el valor de los campos contrasenia 
		var contrasenia = $("#contrasenia").val();
        var contrasenia2 = $("#contrasenia2").val();
		//Validamos que las contraseñas coicidan
		if (contrasenia != contrasenia2) {
            $(".error_contrasenia").modal("show");
			return false;
		}

        var nombre_cliente = $("#nombre_cliente").attr('value');
        var apellido_cliente = $("#apellido_cliente").attr('value');
        var email = $("#email").attr('value');
        var contrasenia = $("#contrasenia").attr('value');
        var dataString = 'nombre_cliente=' + nombre_cliente + 'apellido_cliente=' + apellido_cliente + 'email=' + email + 'contrasenia=' + contrasenia;

        var ajax = $.ajax({
            // La direccion del servidor, peticion al fichecero mysql 
            url: "?controlador=clientes&accion=crear",
            type: 'POST',
            data: dataString,
            // Para obtener la respuesta 
            success: function(data){
                $("#formulario_registro")[0].reset();
                $(".cliente_registrado").modal("show");
                // AQUI
            },
            // para capturar el error 
            error: function(data, status, error){
                alert("no encontrado");
            }
        })
        $("#nombre_cliente").focus();
    })

    $(".close-contrasenia").on('click',function(){
        $("#contrasenia").focus();
    })


    // ************************************************ 

    //Paginación tienda.php
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