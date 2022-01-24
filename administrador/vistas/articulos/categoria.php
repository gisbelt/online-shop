<br>
<div class="row">
    <div class="list-group col-md-2">
        <a href="#" class="list-group-item list-group-item-action active disabled">Categorías</a>
        <?php  foreach($categoria as $cat) { ?>                                     
            <a href="?controlador=categoria&accion=categoria&nombre_categoria=<?php echo $cat->categoria;?>" class="list-group-item list-group-item-action" name="" id=""><?php echo $cat->categoria;?></a>
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
            <?php foreach($buscar as $bus) { ?> 
                <tr>
                    <td><?php echo $bus->id_articulos; ?></td>
                    <td><?php echo $bus->codigo_articulo; ?></td>
                    <td><?php echo $bus->nombre_articulo; ?></td>
                    <td><?php echo $bus->descripcion; ?>
                    </td>
                    <td><?php echo $bus->precio_venta; ?></td>
                    <td><?php echo $bus->cantidad; ?></td>
                    <td><?php echo $bus->estado; ?></td>
                    <td><?php echo $bus->categoria;?></td>
                    <td>
                        <img class="card-img-top" src="./img/<?php echo $bus->imagen; ?>" alt="Card image cap">
                    </td>

                    <td>
                        <form method="POST">
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