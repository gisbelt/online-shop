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
            <a href="#" class="list-group-item list-group-item-action active disabled">Categorías</a>
            <?php  foreach($categoria as $cat) { ?>                                     
            <a href="?url=categorias&nombre_categoria=<?php echo $cat->categoria;?>" class="list-group-item list-group-item-action" name="" id=""><?php echo $cat->categoria;?></a>
            <?php  } ?>
        </ul>
    </div>
    <div class="col-md-12">
        <!-- b4-table-default -->
        <table class="table table-bordered table-responsive">
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
            <?php foreach($buscar as $bus) { ?> 
                <tr>
                    <td><?php echo $bus->codigo_articulo; ?></td>
                    <td><?php echo $bus->nombre_articulo; ?></td>
                    <td><?php echo $bus->descripcion; ?> </td>
                    <td><?php echo $bus->costo; ?></td>
                    <td><?php echo $bus->precio_venta; ?></td>
                    <td><?php echo $bus->cantidad; ?></td>
                    <td><?php echo $bus->nombre_proveedor; ?></td>
                    <td><?php echo $bus->estado; ?></td>
                    <td><?php echo $bus->categoria;?></td>
                    <td><?php echo $bus->descuento; ?></td>
                    <td>
                        <img class="card-img-top" src="../asset/img/<?php echo $bus->imagen; ?>" alt="Card image cap">
                    </td>

                    <td>
                        <form method="POST">
                            <input type="hidden" name="txtid" id="txtid" value="<?php // echo $libro['id']; ?>">
                            <a href="?url=editarArticulos&id_articulos=<?php echo $bus->id_articulos;?>" name="seleccionar" id="seleccionar" class="btn btn-info seleccionar" value="">
                                <i class="bi bi-pencil text-light"></i>
                            </a>
                            <a name="borrar" id="<?php echo $bus->id_articulos ?>" class="btn btn-secondary mt-1 borrar_articulo">
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
<!-- ********************************* -->

<?php $bottom->Bottom(); ?>
</body>
<br><br>
</html>