<?php
session_start();
?>
<br>
<!-- Contenedo oculto que mostrará la alerta o mensaje de confirmación de eliminación correcta  -->
<div class="alert alert-success" style="display:none;"></div>
    
<?php foreach($carrito as $car) { ?>
<div class="container fila_tienda centrar_vertical p-3" id="articulo<?php echo $car->id_articulos ?>"">
        
    <div class="col-md-3 ">
        <img class="card-img-top" src="./administrador/asset/img/<?php echo $car->imagen; ?>" alt="" style="width:70%;" alt="Card image cap">
    </div>    
    <div class="col-md-6">
        <h4 class="card-title text-danger"><?php echo $car->nombre_articulo; ?></h4>
        <p class="card-text"><?php echo $car->descripcion;?></p>
        <label for=""><strong>Categoría: </strong></label>
        <p class="card-text"><?php echo $car->categoria;?></p>
        <label for=""><strong>Cantidad: </strong></label>
        <input type="number" name="" id="cantidad" value="1">
    </div>    
    <div class="col-md-3">
        <h4 class="card-title text-success derecha m-2" id="precio_venta">$<?php echo $car->precio_venta;?></h4>
        <form method="POST" class="derecha m-2">
            <a name="quitar_carrito" id="<?php echo $car->id_articulos ?>" class="btn btn-secondary quitar_carrito" ><i class="bi bi-x-circle"></i> Eliminar</a>
        </form>  
    </div> 

</div>      
<br>
<?php } ?>
<!-- Realizar pedido  -->
<div class="container derecha">
    <form method="POST">
        <button type="submit" name="realizar_pedido" class="btn btn-success " >Realizar pedido</button>
    </form>  
</div> 

