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
    <div class="col-md-9 col-sm-12 col-xs-12">
        <h3 class="text-center mb-2">Listado de Proveedores <a href="?url=registrarProveedor" class="btn btn-success">Nuevo</a></h3>
        <div class="mb-3">
            <form action="" method="post">
            <input type="text" name="" id="<?php echo $buscar->nombre_articulo ?>" class="form-control input_venta" placeholder="Buscar producto" aria-describedby="helpId">
            </form>
        </div>     
    </div>    
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- b4-table-default -->
            <table class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Dirección</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($articulos as $art) { ?> 
                    <tr id="articulo<?php echo $art->id_articulos; ?>">
                        <td id="codigo_articulo" name="codigo_articulo"><?php echo $art->codigo_articulo; ?></td>
                        <td id="nombre_articulo" name="nombre_articulo"><?php echo $art->nombre_articulo; ?></td>
                        <td id="descripcion" name="descripcion"><?php echo $art->descripcion; ?></td>
                        <td id="precio_venta" name="precio_venta"><?php echo number_format($art->precio_venta, 2); ?></td>
                        <td id="cantidad" name="cantidad"><?php echo $art->cantidad; ?></td>
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
                                <a name="borrar" id="<?php echo $art->id_articulos ?>" class="btn btn-secondary mt-1 borrar_articulo">
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
</div>

<!-- ********************************* -->
<?php $bottom->Bottom(); ?>
</body>
<br><br>
</html>