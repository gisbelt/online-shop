$(document).ready(function(){

    // ************************************************ 

    // Quitar elemento del carrito sin actualizar página 
    var quitar_carrito = $('.quitar_carrito');
    quitar_carrito.on('click',function( ){
        // Obtenemos el id del botón quitar_carrito
        var id = $(this).attr('id');
        var dataString = 'id='+id;
        // valor subtotal 
        var subtotal = document.getElementById('subtotal');
        var subtotal2 = document.getElementById('subtotal2');
        var valorsubtotal = $(".subtotal").html();
        var valorprecio_venta = $("#precio_venta" + id).text();

        var ajax = $.ajax({
            url: "?url=quitar_carrito",
            type: 'POST',
            data: dataString,
            success: function(data){
                var conteo = data;
                cargar_carrito(conteo); 

                $("#articulo" + id).remove();
                $('.fila_tienda').css("margin-bottom","0px");
                $('#divider' + id).remove();
                $('#carrito_pedido' + id).remove(); //pedidos
                $('.quitar_carrito_detalles').remove(); //verdetalles
                var valorsubtotal2 = parseFloat(valorsubtotal);
                var valorprecio_venta2 = parseFloat(valorprecio_venta);  
                total = valorsubtotal2 - valorprecio_venta2;
                subtotal.innerHTML  = total+".00";
                subtotal2.innerHTML  = total+".00";
            },
            error: function(data, status, error){
                alert("no encontrado");
            }
        })
    })

    // ************************************************ 

    // Agregar elemento al carrito sin actualizar página 
    // Función a ejecutar al agregar o quitar del carrito para que se imprima la cantidad  
    cargar_carrito = function(conteo){
        // recuperamos el conteo
        var conteoCarrito = $('.conteoCarrito');
        // Reiniciar el conteo
        $(".conteoCarrito").empty(); 
        var conteos = "<span>("+conteo+")</span>";
        conteoCarrito.append(conteos);
    };

    var agregar_carrito = $('.agregar_carrito1');
    agregar_carrito.on('click',function( ){
        var id = $(this).attr('id');
        var dataString = 'id='+id;

        var ajax = $.ajax({
            url: "?url=agregar_carrito",
            type: "POST",
            data: dataString,
            dataType: 'json',
            beforeSend: function(){
                $('.modal-body').html('<div class="ping"></div>');
            },
            success: function(data){
                setTimeout(function(){ $(".modal-body").html('Ya tu producto está en el carrito :)'); }, 1000);
                $(".carrito_agregado").modal("show");
                var conteo = data;
                cargar_carrito(conteo); 
            },
            error: function(){} 
        });
    })

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
        else if(contrasenia.length < 8){
            $('html, body').animate({
                scrollTop: $("#alert").offset().top
            }, 1000);
            $('.alert').show();
            $('.alert').html("La contraseña debe tener más de 8 carácteres");
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
                url: "?url=result_registrarse",
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
                error: function(data, status, error){
                    console.log(data); 
                    alert("Error");
                }
            })
        }
    })
    // Validar campo email 
    $('#correo_cliente').on('keyup', function() {
        var re = /([A-Z0-9a-z_-][^@])+?@[^$#<>?]+?\.[\w]{2,4}/.test(this.value);
        if(!re) {
            var correo_cliente=$('#correo_cliente').val();
            $('.alert').show();
            $('.alert').html("Ingresa una dirección válida");
            if(correo_cliente == ""){
                $(".alert").hide();
            }            
        } else {
            $('.alert').hide();
        }
    })
    
    // ************************************************ 

    // Perfil Cliente 
    $("#editar-nombre-cliente").click(function(){
        $(".editar_nombre_cliente").slideToggle(450);
        $("#nombre-cliente").focus();
    });
    $("#editar-direccion-cliente").click(function(){
        $(".editar_direccion_cliente").slideToggle(350);
        $(".editar_direccion_cliente").removeClass("hidden");
        $("#direccion-cliente").focus();
    });
    $("#editar-telefono-cliente").click(function(){
        $(".editar_telefono_cliente").slideToggle(250);
        $(".editar_telefono_cliente").removeClass("hidden");
        $("#telefono-cliente").focus();
    });
    $("#editar-contrasenia-cliente").click(function(){
        $(".editar_contrasenia_cliente").slideToggle(250);
        $(".editar_contrasenia_cliente").removeClass("hidden");
        $("#contrasenia-cliente").focus();
    });
    
    //Editar nombre apellido
    var cambiar_nombre_cliente = $('.cambiar_nombre_cliente');
    cambiar_nombre_cliente.on('click',function( ){
        var nombre_cliente=$('#nombre-cliente-perfil').val();
        var apellido_cliente=$('#apellido-cliente-perfil').val();

        var ajax = $.ajax({
            url: "?url=editar_cliente",
            type: "POST",
            data:{
                'nombre_cliente_perfil':nombre_cliente,
                'apellido_cliente_perfil':apellido_cliente
            },
            dataType: 'json',
            success: function(data){
                $('.alert').show();
                $('.alert').html("Editado exitosamente");
                setTimeout(function() {
                    $(".alert").slideUp(1500);
                },1500); 
            },
            error: function(){} 
        });
    })

    // ************************************************ 

    //Paginación tienda.php 
    // ERROR NO ESTÁ LISTO
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

    // ************************************************ 

    // Pedidos: 
    // NO ESTÁ LISTO, SOLO SUMA EL SUBTOTAL DE PRIMER ARTÍCULO
    $("select.forma_de_pago").change(function(){
        var forma_de_pago= $(this).children("option:selected").val();
        if(forma_de_pago == "1"){
            $('.capture').removeClass('hidden');
        }
        else{
            if(forma_de_pago === "2" || forma_de_pago === "3"){
                $('.capture').addClass('hidden');
            }
        }
    });
    // Multiplicar cantidad por precio para mostrar subtotal 
    var precio_venta_pedido = $('#precio-venta-pedido').text();
    var cantidad_pedido = document.getElementById("cantidad-pedido"); 
    const buttons_cantidad = Array.from(document.getElementsByClassName('cantidad_pedido',1));
    var subtotalPedidos = document.getElementById('subtotal-pedido');

    buttons_cantidad.forEach(key=>{
        key.onclick = function(){
            precio_venta_pedido = this.dataset.value; // obtengo el data-value del botón cantidad y lo agrego al input precio_venta
            // cantidad_pedido = this.dataset['number']++; // obtengo el data-number del botón cantidad
            cantidad_pedido.addEventListener("keyup", function(e){
                var getValues = cantidad_pedido.value * precio_venta_pedido; // obtener los valores para multiplicarlos
                var value = getValues.toString().split(".")[0].replace(/\B((?=(\d{3})+(?!\d)))/g, '.');
                subtotalPedidos.innerHTML = value+".00"; // Muestro el resultado en input SUBTOTAL
            }),
            console.log(cantidadesValor); 
            cantidad_pedido.addEventListener("click", function(e){
                var getValues = cantidad_pedido.value * precio_venta_pedido; // obtener los valores para multiplicarlos
                var value = getValues.toString().split(".")[0].replace(/\B((?=(\d{3})+(?!\d)))/g, '.');
                subtotalPedidos.innerHTML = value+".00"; // Muestro el resultado en input SUBTOTAL
            })
        }
    })

});

// $('#guardar').attr('disabled', 'disabled'); //Deshabilito el Boton Guardar