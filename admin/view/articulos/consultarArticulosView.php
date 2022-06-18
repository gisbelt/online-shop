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
<div class="row m-0 center">
    <div class="col-md-9">
        <h3 class="text-center mb-2">Listado de Artículos  
            <a href="?url=crearArticulos" class="btn btn-success text-center">Nuevo</a>
        </h3>
    
        <div class="mb-3">
            <form action="" method="post">
            <input type="text" name="" id="<?php echo $buscar->nombre_articulo ?>" class="form-control input_venta" placeholder="Buscar producto" aria-describedby="helpId">
            </form>
        </div>        
    </div>    
</div>

<div class="row m-0">
    <div class="mb-3">
        <ul class="list-group list-group-horizontal">
            <a href="#" class="list-group-item list-group-item-action active disabled ">Categorías</a>
            <?php  foreach($categoria as $cat) { ?>                                     
            <a href="?url=categorias&nombre_categoria=<?php echo $cat->categoria; ?>" class="list-group-item list-group-item-action" name="categoria3" id=""><?php echo $cat->categoria;?></a>
            <?php  } ?>
        </ul>
    </div>
    <div class="col-md-12">
        <!-- b4-table-default -->
        <table class="table table-bordered table-responsive table-hover">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>costo</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Proveedor</th>
                    <th>Estado</th>
                    <th>Categoría</th>
                    <th>Descuento</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($articulos as $art) { ?> 
                <tr id="articulo<?php echo $art->id_articulos; ?>">
                    <td id="codigo_articulo" name="codigo_articulo"><?php echo $art->codigo_articulo; ?></td>
                    <td id="nombre_articulo" name="nombre_articulo"><?php echo $art->nombre_articulo; ?></td>
                    <td id="descripcion" name="descripcion"><?php echo $art->descripcion; ?></td>
                    <td id="costo" name="costo"><?php echo $art->costo; ?></td>
                    <td id="precio_venta" name="precio_venta"><?php echo $art->precio_venta; ?></td>
                    <td id="cantidad" name="cantidad"><?php echo $art->cantidad; ?></td>
                    <td id="nombre_proveedor" name="nombre_proveedor"><?php echo $art->nombre_proveedor; ?></td>
                    <td id="estado" name="estado"><?php echo $art->estado; ?></td>
                    <td id="categoria" name="categoria"><?php echo $art->categoria; ?></td>
                    <td id="descuento" name="descuento"><?php echo $art->descuento; ?></td>
                    <td>
                        <img class="card-img-top" src="../asset/img/<?php echo $art->imagen; ?>" id="<?php echo $art->id_articulos ?>" alt="Card image cap" name="imagen">
                    </td>

                    <td>
                        <form method="POST">                            
                            <input type="hidden" name="txtid" id="txtid" value="<?php // echo $libro['id']; ?>">
                            <a href="?url=editarArticulos&id_articulos=<?php echo $art->id_articulos;?>" name="seleccionar" id="seleccionar" class="btn btn-info seleccionar" value="">
                                <i class="bi bi-pencil text-light"></i>
                            </a>
                            <a name="borrar" id="<?php echo $art->id_articulos; ?>" class="btn btn-secondary mt-1 borrar_articulo">
                                <i class="bi bi-trash text-light"></i>
                            </a>
                        </form>
                    </td>
                </tr>             
                
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- paginacion  -->
<div class="offset-md-4 col-md-8">
    <nav aria-label="Page navigation">
    <ul class="pagination ">
        <li class="page-item disabled">
        <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
        </a>
        </li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">4</a></li>
        <li class="page-item"><a class="page-link" href="#">5</a></li>
        <li class="page-item"><a class="page-link" href="#">6</a></li>
        <li class="page-item">
        <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
        </a>
        </li>
    </ul>
    </nav>
</div>
<!-- paginacion  -->

<!-- ********************************* -->

<?php $bottom->Bottom(); ?>
</body>
<br><br>
</html>