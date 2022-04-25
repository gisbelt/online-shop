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
    cargar_carrito = function(obtenerCarrito){
        // recuperamos el conteo
        var conteoCarrito = $('.conteoCarrito');
        // Reiniciar el conteo
        $(".conteoCarrito").empty(); 
        
        var conteo = "<span>"+obtenerCarrito.length+"</span>";
        conteoCarrito.append(conteo);
        // for (var i = 0; i < obtenerCarrito.length; i++){
        
        // }
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
            },
            error: function(){} 
        });

        // Obtener número de elementos agregados al carrito sin actualizar página
        // NO FUNCIONA  
        var ajax = $.ajax({
            url: "?controlador=paginas&accion=conteo_carrito",
            type: "POST",
            data: {},
            dataType: 'text',
            success:function(response){
                var obtenerCarrito = $.parseJSON(response);
                // var obtenerCarrito = JSON.parse(response);  
                console.log(obtenerCarrito[0]);
                // cargar_carrito(obtenerCarrito);
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

});