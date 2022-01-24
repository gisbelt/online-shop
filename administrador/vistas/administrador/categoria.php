<br>
<div class="row">
    <div class="list-group col-md-2">
        <a href="#" class="list-group-item list-group-item-action active disabled">Categorías</a>
        <?php  foreach($categoria as $cat) { ?>                                     
            <a href="?controlador=categoria&accion=categoria&categoria=<?php echo $cat->categoria;?>" class="list-group-item list-group-item-action" name="id_categoria" id="<?php echo $cat->id_categoria;?>"><?php echo $cat->categoria;?></a>
        <?php  } ?>
    </div>
    <div class="col-md-10">
        <!-- b4-table-default -->
        <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Estado</th>
                    <th>Categoría</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($buscar as $buscar) { ?> 
                <tr>
                    <td><?php echo $buscar->id_articulos; ?></td>
                    <td><?php echo $buscar->codigo_articulo; ?></td>
                    <td><?php echo $buscar->nombre_articulo; ?></td>
                    <td><?php echo $buscar->descripcion; ?>
                    </td>
                    <td><?php echo $buscar->precio_venta; ?></td>
                    <td><?php echo $buscar->cantidad; ?></td>
                    <td><?php echo $buscar->estado; ?></td>
                    <td><?php echo $buscar->categoria;?></td>
                    <td>
                        <!-- <img class="img-thumbnail rounded" src="../../img/<?php // echo $libro['imagen']; ?>" width="100" alt="" srcset="">           -->
                        <img class="card-img-top" src="./img/<?php echo $buscar->imagen; ?>" alt="Card image cap">
                    </td>

                    <td>
                        <form method="POST">
                            <?php // $id_articulos=$art->id_articulos;?>
                            <input type="hidden" name="txtid" id="txtid" value="<?php // echo $libro['id']; ?>">
                            <a href="?controlador=articulos&accion=editar&id=<?php echo $art->id_articulos;?>" data-bs-toggle="modal" data-bs-target="#ventana" name="seleccionar" id="seleccionar" class="btn btn-primary seleccionar" type="submit" value="">Seleccionar</a>
                            <input name="accion" id="" class="btn btn-danger" type="submit" value="Borrar" style="margin-top: 10px;">

                        </form>

                    </td>
                </tr>             
                
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>