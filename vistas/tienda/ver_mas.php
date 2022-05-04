<?php
session_start();
?>
<br>

<?php // foreach($carrito as $car) { ?>
<div class="row m-0">
    <?php foreach($articulosPorID as $art_porid) { ?>
    <div class="col-md-5 p-5">
        <img class="card-img-top" src="./administrador/asset/img/<?php echo $art_porid->imagen; ?>" alt="" style="" alt="Card image cap">
    </div>
    <div class="col-md-3 pt-5">
        <h4 class="card-title text-danger"><?php echo $art_porid->nombre_articulo; ?></h4>
        <hr class="my-2">
        <label for=""><strong>Información del producto: </strong></label>
        <p class="card-text"><?php echo $art_porid->descripcion;?></p>
        <label for=""><strong>Cantidad: </strong></label>
        <input type="number" name="" id="cantidad" value="1">
    </div>
    <div class="col-md-4 p-5">
        <h4 class="card-title text-secondary">Solo quedan <?php echo $art_porid->cantidad;?> unidades en stock</h4>
        <hr class="my-3">
        <h4 class="card-title text-success m-2" id="">$<?php echo $art_porid->precio_venta; ?></h4>
        <form method="POST" class="m-2">
            <a name="" id="" class="btn btn-danger my-3" ><i class="bi bi-cart2"></i> Agregar al Carrito</a>
            <a name="" id="" class="btn btn-success" ><i class="bi bi-"></i> Comprar ahora</a>
        </form>  
    </div>
    <?php } ?>
</div>

<!-- ********************************* -->

<div class="productos_destacados centrar_vertical pt-2">
    <h5 class="text-center text-light mt-4">¿Qué otros productos compran los clientes?</h5>
    <hr class="my-4">
</div>

<div class="contenedor pt-3 mb-2">>
    <div class="caja">
        <img src="./administrador/asset/img/sala.jpg" alt="">
        <p class="text-light" >Imagen</p>
    </div>
    <div class="caja">
        <img src="./administrador/asset/img/sala.jpg" alt="">
        <p class="text-light" >Imagen</p>
    </div>
    <div class="caja">
        <img src="./administrador/asset/img/sala.jpg" alt="">
        <p class="text-light" >Imagen</p>
    </div>
    <div class="caja">
        <img src="./administrador/asset/img/sala.jpg" alt="">
        <p class="text-light" >Imagen</p>
    </div>
    <div class="caja">
        <img src="./administrador/asset/img/sala.jpg" alt="">
        <p class="text-light" >Imagen</p>
    </div>
    <div class="caja">
        <img src="./administrador/asset/img/sala.jpg" alt="">
        <p class="text-light" >Imagen</p>
    </div>
</div>
<!-- <hr class="my-4"> -->
<!-- Agregar slider de target  -->

<!-- ********************************* -->