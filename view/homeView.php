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

<!-- Esto es lo primero que quiero que vea el usuario -->
<div id="carouselId" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators d-none">
        <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
        <li data-bs-target="#carouselId" data-bs-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <img class="img-fluid centrado" src="asset/img/fondo1.jpg" alt="First slide" style="width: 100%; height:440px;">
        </div>
        <div class="carousel-item">
            <img class="img-fluid centrado" src="asset/img/fondo2.jpg" alt="Second slide" style="width: 100%; height:440px;">
        </div>
        <div class="carousel-item">
            <img class="img-fluid centrado" src="asset/img/fondo3.jpg" alt="Third slide" style="width: 100%; height:440px;">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
</div>
<br><br>

<!-- ********************************* -->
<div class="ofertas1 mb-4">
    <div class="row primera_fila">
        <!-- 1 -->
        <div class="col-md-4 item_principal">
            <div class="fondo bg-light">
                <div class="texto">
                    <h5 class="text-dark mb-4 fw-bold">Oferta del día</h5>
                </div>
                <div class="row segunda_fila mb-4">
                    <?php foreach($articulosDes3 as $articulosDes3) { ?>
                    <div class="col-md-6 mt-3">
                        <a href="?url=ver_detalles&id_articulos=<?php echo $articulosDes3->id_articulos;?>">
                        <img class="card-img-top mb-2" src="asset/img/<?php echo $articulosDes3->imagen;?>" alt="">
                        </a>
                        <div class="titulo_articulo">
                            <a href="?url=ver_detalles&id_articulos=<?php echo $articulosDes3->id_articulos;?>" class="text-dark" title="ver artículo"><?php echo $articulosDes3->nombre_articulo;?></a>
                        </div>
                    </div>
                    <?php } ?>
                </div>     
            </div>         
        </div>
        <!-- 2 -->
        <div class="col-md-4 item_principal">
            <div class="fondo bg-light">
                <div class="texto">
                    <h5 class="text-dark mb-4 fw-bold">Ofertas imperdibles <span class="text-danger mb-4">20% off</span></h5>
                </div>
                <div class="row segunda_fila mb-4">
                    <?php foreach($articulosDes2 as $articulosDes2) { ?>
                    <div class="col-md-6 mt-3">
                        <a href="?url=ver_detalles&id_articulos=<?php echo $articulosDes2->id_articulos;?>">
                            <img class="card-img-top mb-2" src="asset/img/<?php echo $articulosDes2->imagen;?>" alt="">
                        </a>
                        <div class="titulo_articulo">
                            <a href="?url=ver_detalles&id_articulos=<?php echo $articulosDes2->id_articulos;?>" class="text-dark titulo_articulo" title="ver artículo"><?php echo $articulosDes2->nombre_articulo;?></a>
                        </div>
                    </div>
                    <?php } ?>
                </div>     
            </div>         
        </div>
        <!-- 3 -->
        <div class="col-md-4 item_principal">
            <div class="fondo bg-light">
                <div class="texto">
                    <h5 class="text-dark mb-4 fw-bold">Compra con nosotros</h5>
                </div>
                <div class="row segunda_fila mb-4">
                    <?php foreach($articulosDes4 as $articulosDes4) { ?>
                    <div class="col-md-6 mt-3">
                        <a href="?url=ver_detalles&id_articulos=<?php echo $articulosDes4->id_articulos;?>">
                            <img class="card-img-top mb-2" src="asset/img/<?php echo $articulosDes4->imagen;?>" alt="">
                        </a>
                        <div class="titulo_articulo">
                            <a href="?url=ver_detalles&id_articulos=<?php echo $articulosDes4->id_articulos;?>" class="text-dark titulo_articulo" title="ver artículo"><?php echo $articulosDes4->nombre_articulo;?></a>
                        </div>
                    </div>
                    <?php } ?>
                </div>     
            </div>         
        </div>

    </div>
</div>
<!-- ********************************* -->


<!-- ********************************* -->

<div class="widget1 center pt-3">
    <h1 class="text-center text-light">Productos destacados</h1>
    <hr class="my-4">
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
<!-- <hr class="my-4"> -->

<!-- ********************************* -->

<br><br>
<div class="container todos_los_articulos">
    <div class="row">
        
        <?php foreach($articulos as $articulos) { ?>
        <div class="col-md-4 mb-3">
            <div class="card card_inicio bg-light">
                <img class="card-img-top" src="asset/img/<?php echo $articulos->imagen;?>" alt="" style="width: 100%; height: 300px;">
                <div class="card-body centrado">
                    <h5 class="card-title text-dark text-center " style=""><?php echo $articulos->nombre_articulo;?></h5>
                    <h6 class="card-title text-success text-center">$<?php echo number_format($articulos->precio_venta, 2);?></h6>
                    <hr class="my-2">
                    <!-- botones  -->
                    <div class="center">
                        <div class="caja_btn_ver">
                            <a href="?url=ver_detalles&id_articulos=<?php echo $articulos->id_articulos;?>" class="btn btn-info"  title="Ver detalles" role="button">Ver</a>
                        </div>
                        <!-- Si ya está en carrito  -->
                        <?php if(carrito::articulo_ya_esta_en_carrito($articulos->id_articulos)) {?>
                        <div class="caja_btn_vercarrito">
                            <a href="?url=ver_carrito" name="ver_carrito" id="" class="btn btn-success" title="Ver carrito">Ver carrito</a>
                        </div>
                        <?php } else { ?>
                        <!-- Si no está en carrito -->
                        <div class="caja_btn_agregar">
                            <a name="agregar_carrito1" id="<?php echo $articulos->id_articulos ?>" class="btn btn-danger agregar_carrito1" title="Agregar al carrito">
                                <i class="bi bi-cart-plus text-light"></i>
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                    <!-- botones  -->
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div> <!--  Container -->

<!-- ********************************* -->  

<br><br>
<div class="p-5 bg-dark text-center widget2">
    <h1 class="display-3 text-light">Promoción</h1>
    <p class="lead text-light">20% DE DESCUENTO</p>
    <hr class="my-2 text-dark">
    <p class="text-light">Todo lo que veas a partir de acá, lo tendrás a un 20% de descuento</p>
    <p class="lead">
        <a class="btn btn-info btn-lg" href="Jumbo action link" role="button">Ver más</a>
    </p>
</div>

<!-- ********************************* -->

<br><br>
<div class="container ofertas3">
    <div class="row">
        <?php foreach($articulosDes as $articulosDes) { ?>
        <div class="col-md-6 mb-3">
            <div class="card card_inicio  bg-light">
                <img class="card-img-top" src="asset/img/<?php echo $articulosDes->imagen;?>" alt="" style="height: 444px;">
                <div class="card-body">
                    <h5 class="card-title text-dark text-center"><?php echo $articulosDes->nombre_articulo;?></h5>
                    <h6 class="card-title text-success text-center"">$<?php echo number_format($articulosDes->precio_venta, 2);;?></h6>
                    <hr class="my-2">
                    <!-- botones  -->
                    <div class="center">
                        <div class="caja_btn_ver">
                            <a href="?url=ver_detalles&id_articulos=<?php echo $articulosDes->id_articulos;?>" class="btn btn-info" title="Ver detalles" role="button">Ver</a>
                        </div>
                        <!-- Si ya está en carrito  -->
                        <?php if(carrito::articulo_ya_esta_en_carrito($articulosDes->id_articulos)) {?>
                        <div class="caja_btn_vercarrito">
                            <a href="?url=ver_carrito" name="ver_carrito" id="" class="btn btn-success" title="Ver carrito">Ver carrito</a>
                        </div>
                        <?php } else { ?>
                        <!-- Si no está en carrito -->
                        <form action="" method="post" enctype="multipart/form-data">
                            <a name="agregar_carrito1" id="<?php echo $articulosDes->id_articulos ?>" class="btn btn-danger agregar_carrito1">
                                <i class="bi bi-cart-plus text-light"></i>
                            </a>
                        </form>
                        <?php } ?>
                    </div>
                    <!-- botones  -->
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div> <!--  Container -->

<!-- ********************************* -->

<!-- Modal para mostrar mensaje de éxito al agregar un carrito  -->
<div class="carrito_agregado modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" style="top: 30%">
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