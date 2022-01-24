<?php
session_start();
?>
<br>
<div class="row">
    <div class="col-md-12">
        <?php foreach($carrito as $car) { ?>
        <div class="row fila_tienda centrar_vertical">
            <div class="col-md-3 ">
                <img class="card-img-top" src="./administrador/img/cubiertos.PNG" alt="" style="width:70%;" alt="Card image cap">
            </div>
            <div class="col-md-6">
                <h4 class="card-title text-danger"><?php echo $car->nombre_articulo; ?></h4>
                <p class="card-text"><?php echo $car->descripcion;?></p>
                <label for=""><strong>Categoría: </strong></label>
                <p class="card-text"><?php echo $art->categoria;?></p>
            </div>
            <div class="col-md-3">
                <h4 class="card-title text-success">$<?php echo number_format($car->precio_venta, 2);?></h4>
                <form method="POST" >
                    <input type="hidden" name="id_articulos" value="<?php echo $car->id_articulos ?>">
                    <button type="submit" name="quitar_carrito" class="btn btn-danger" >Quitar del carrito</button>
                </form>  
            </div>  
        </div>     
        <br>
        <?php } ?>

    </div>
</div>