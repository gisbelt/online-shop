<?php
session_start();
?>
<br>
<div class="row">
    <!-- Contenedo oculto que mostrará la alerta o mensaje de confirmación de eliminación correcta  -->
    <div class="alert alert-success" style="display:none;"></div>
    
    <div class="col-md-12">
        <?php foreach($carrito as $car) { ?>
        <div class="container fila_tienda centrar_vertical p-3" id="articulo<?php echo $car->id_articulos ?>"">
            <div class="col-md-3 ">
                <img class="card-img-top" src="./administrador/img/<?php echo $car->imagen; ?>" alt="" style="width:70%;" alt="Card image cap">
            </div>
            <div class="col-md-6">
                <h4 class="card-title text-danger"><?php echo $car->nombre_articulo; ?></h4>
                <p class="card-text"><?php echo $car->descripcion;?></p>
                <label for=""><strong>Categoría: </strong></label>
                <p class="card-text"><?php echo $car->categoria;?></p>
            </div>
            <div class="col-md-3">
                <h4 class="card-title text-success">$<?php echo number_format($car->precio_venta, 2);?></h4>
                <form method="POST" >
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
    </div>
</div>