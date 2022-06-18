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
<div class="container">
<div class="row">
    <div class="list-group col-md-2">
        <a href="#" class="list-group-item list-group-item-action active disabled">Categorías</a>
        <?php  foreach($categoria as $cat) { ?>                                     
            <a href="?url=categorias&id_categoria=<?php echo $cat->id_categoria;?>" class="list-group-item list-group-item-action" name="id_categoria" id="<?php echo $cat->id_categoria;?>"><?php echo $cat->categoria;?></a>
        <?php  } ?>
    </div>  
    

    <div class="col-md-10">
        <?php foreach($articulos as $art) { ?>
        <div class="row fila_tienda center bg-light">
            <div class="col-md-3 ">
              <a href="?url=ver_detalles&id_articulos=<?php echo $art->id_articulos;?>" class="text-decoration-none">
                  <img class="card-img-top img_tienda_card" src="asset/img/<?php echo $art->imagen;?>" alt="" style="width:100% !important; height: 146px !important" alt="Card image cap">
              </a>
            </div>
            <div class="col-md-6 p-3">
                <a href="?url=ver_detalles&id_articulos=<?php echo $art->id_articulos;?>" class="text-decoration-none">
                  <h4 class="card-title text-dark"><?php echo $art->nombre_articulo;?></h4>
                </a>
                <label for=""><strong>Información: </strong></label>
                <p class="card-text"><?php echo $art->descripcion;?></p>
                <label for=""><strong>Categoría: </strong></label>
                <p class="card-text"><?php echo $art->categoria;?></p>
            </div>
            <div class="col-md-3">
                <h4 class="card-title text-success text-center">$<?php echo number_format($art->precio_venta, 2);?></h4>
                <!-- Si ya está en carrito  -->
                <?php if(carrito::articulo_ya_esta_en_carrito($art->id_articulos)) {?>
                <form method="POST" class="center caja_btn_vercarrito">
                    <a href="?url=ver_carrito" name="ver_carrito" id="" class="btn btn-success" title="Ver carrito">Ver carrito</a>
                </form>  
                <?php } else { ?>
                <!-- Si no está en carrito -->
                <form method="POST" class="center caja_btn_agregar">
                    <a name="agregar_carrito1" id="<?php echo $art->id_articulos ?>" class="btn btn-danger my-3 pl-2 agregar_carrito1" title="Agregar al carrito"><i class="bi bi-cart-plus text-light"></i></a>
                </form>  
                <?php } ?>
            </div>  
        </div>     
        <br>
        <?php  } ?>
        
        <?php 
        if ($pages > 1) {
        ?>
        <nav aria-label="Page navigation">
          <ul class="pagination justify-content-center">
            <!-- flecha  -->
            <li class="page-item disabled">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="visually-hidden">Previous</span>
              </a>
            </li>
            <!-- flecha  -->
            <?php 
            for ($i=1;$i<=$pages;$i++) { 
            $class_active = '';
            if ($i == 1) {
                $class_active = 'active';
            }
            ?>
            <li class="page-item <?php echo $class_active?> numero_paginacion"><a class="page-link link_paginacion" data="<?php echo $i?>" href=""><?php echo $i?></a></li>
            <?php } ?>
            <!-- flecha  -->
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="visually-hidden">Next</span>
              </a>
            </li>
            <!-- flecha  -->
          </ul>
        </nav>
        <?php 
        }
        ?>

    </div>
</div>
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
</body>

<br><br>
<footer>
<?php $footer->Footer(); ?>
</footer>
</html>