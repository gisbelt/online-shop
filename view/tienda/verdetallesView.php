<?php use content\models\carritoModel as carrito; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <?php $head->Heading(); ?>
</head>
<body>
    <!-- Menú -->
<?php require_once "content/component/initComponent.php"; ?>
<!-- Menú -->
<br>
<div class="row m-0">
    <?php foreach($articulosPorID as $art_porid) { ?>
    <div class="col-md-5 p-5">
        <img class="card-img-top" src="asset/img/<?php echo $art_porid->imagen; ?>" alt="" style="" alt="Card image cap">
    </div>
    <div class="col-md-3 pt-5">
        <h4 class="card-title text-dark"><?php echo $art_porid->nombre_articulo; ?></h4>
        <hr class="my-2">
        <label for=""><strong>Información del producto: </strong></label>
        <p class="card-text"><?php echo $art_porid->descripcion;?></p>
        <div class="form-group col-md-3">
            <label for="" class="mb-2"><strong>Cantidad: </strong></label><br>
            <input type="number" name="" id="" class="form-control" value="1"> 
        </div>
    </div>
    <div class="col-md-4 p-5">
        <small class="text-secondary">Solo quedan <?php echo $art_porid->cantidad;?> unidades en stock</small>
        <hr class="my-3">
        <h4 class="card-title text-success m-2" id="">$<?php echo $art_porid->precio_venta; ?></h4>
        <!-- Si ya está en carrito  -->
        <?php if(carrito::articulo_ya_esta_en_carrito($art_porid->id_articulos)) {?>
        <form method="POST" class="m-2 caja_btn_vercarrito">
            <a name="quitar_carrito" id="<?php echo $art_porid->id_articulos ?>" class="btn btn-secondary my-3 pl-2 quitar_carrito quitar_carrito_detalles" title="Quitar del carrito">
            <i class="bi bi-trash text-light"></i> Quitar del carrito
            </a>
            <a href="?url=ver_carrito" name="ver_carrito" id="" class="btn btn-success" title="Ver carrito">Ver carrito</a>
        </form> 
        <?php } else { ?>
        <!-- Si no está en carrito -->
        <form method="POST" class="m-2 caja_btn_agregar">
            <a name="agregar_carrito1" id="<?php echo $art_porid->id_articulos ?>" class="btn btn-danger my-3 pl-2 agregar_carrito1 agregar_carrito_detalles" title="Agregar al carrito"><i class="bi bi-cart2"></i> Agregar al Carrito</a>
            <a name="" id="" class="btn btn-success" ><i class="bi bi-"></i> Comprar ahora</a>
        </form>  
        <?php } ?>
    </div>
    <?php } ?>
</div>

<!-- ********************************* -->
<div class="ofertas2 contenedor pt-3 mb-2 pb-3" data-slick='{"slidesToShow": 4, "slidesToScroll": 3}'>
    <?php foreach($articulosOrdenDesc as $desc) { ?>
    <div class="caja">
        <img src="asset/img/<?php echo $desc->imagen;?>" alt="">
        <a href="?url=ver_detalles&id_articulos=<?php echo $desc->id_articulos;?>" 
        class="text-light" title="ver artículo"><?php echo $desc->nombre_articulo;?></a>
    </div>
    <?php } ?>
</div>
<!-- ********************************* -->

<!-- Modal para mostrar mensaje de éxito al agregar un carrito  -->
<div class="carrito_agregado modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">¡En hora buena!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body center">
                
            </div>
            <div class="modal-footer">
                <a href="?url=ver_carrito" class="btn btn-primary">Ver Carrito</a>
                <button type="button" class="btn btn-info" data-bs-dismiss="modal">Seguir viendo</button>
            </div>
        </div>
    </div>
</div>

<!-- ********************************* -->
<?php $bottom->Bottom(); ?>
<script>
    $(document).ready(function(){ 
        // Slider productos destacados 
        $('.ofertas2').slick({
            slidesToShow: 4,
            slidesToScroll: 3,
            autoplay: true,
            autoplaySpeed: 2000,
        });
    }); 
</script>
</body>
<br><br>
<footer>
<?php $footer->Footer(); ?>
</footer>
</html>