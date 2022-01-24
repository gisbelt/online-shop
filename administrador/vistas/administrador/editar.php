<br>
<div class="row">
    <div class="list-group col-md-2">
        <a href="#" class="list-group-item list-group-item-action active disabled">Categorías</a>
        <?php  foreach($categoria as $cat) { ?>                                     
            <a href="?controlador=categoria&accion=categoria&id_categoria=<?php echo $cat->id_categoria;?>" class="list-group-item list-group-item-action" name="id_categoria" id="<?php echo $cat->id_categoria;?>"><?php echo $cat->categoria;?></a>
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
            <?php foreach($articulos as $art) { ?> 
                <tr>
                    <td><?php echo $art->id_articulos; ?></td>
                    <td id="codigo_articulo<?php echo $art->id_articulos; ?>"><?php echo $art->codigo_articulo; ?></td>
                    <td id="nombre_articulo<?php echo $art->id_articulos; ?>"><?php echo $art->nombre_articulo; ?></td>
                    <td id="descripcion<?php echo $art->id_articulos; ?>"><?php echo $art->descripcion; ?>
                    </td>
                    <td><?php echo $art->precio_venta; ?></td>
                    <td><?php echo $art->cantidad; ?></td>
                    <td><?php echo $art->estado; ?></td>
                    <td><?php echo $art->categoria; ?></td>
                    <td>
                        <!-- <img class="img-thumbnail rounded" src="../../img/<?php // echo $libro['imagen']; ?>" width="100" alt="" srcset="">           -->
                        <img class="card-img-top" src="./img/<?php echo $art->imagen; ?>" alt="Card image cap">
                    </td>

                    <td>
                        <form method="POST">
                            
                            <input type="hidden" name="txtid" id="txtid" value="<?php // echo $libro['id']; ?>">
                            <a href="?controlador=articulos&accion=editar&id_articulos=<?php echo $art->id_articulos;?>" data-bs-toggle="modal" data-bs-target="#<?php $id_articulos=$art->id_articulos;?>" name="seleccionar" id="seleccionar" class="btn btn-primary seleccionar" type="submit" value="">Seleccionar</a>
                            <input name="accion" id="" class="btn btn-danger" type="submit" value="Borrar" style="margin-top: 10px;">

                        </form>

                    </td>
                </tr>             
                
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>


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


<!-- Si no funciona, pasar esto a otra página, o ocultarla y mostrarla con display y jquery -->
<!-- Modal Contacto-->
<?php// foreach($articulos as $art) { ?> 
<div class="modal fade" id="<?php $id_articulos=$art->id_articulos;?>" role="dialog">                  
  <div class="modal-dialog">
      <!-- Contenido Modal -->
      <div class="modal-content">

        <!-- Header Modal-->
        <div class="modal-header">          
          <h4 class="modal-tittle">Editar producto</h4>
        </div>

        <!-- Body Modal-->
        <div class="modal-body">

          <form method="POST" enctype="multipart/form-data">
                <div class = "form-group">
                    <label for="id_articulo">ID:</label>
                    <input type="text" required readonly class="form-control" value="" id="id_articulo" name="id_articulo" placeholder="ID">
                </div>

                <div class = "form-group">
                    <label for="codigo_articulo">Código del producto: </label>
                    <input type="text" required class="form-control" value="<?php echo $seleccionar->codigo_articulo;?>" id="codigo_articulo" name="codigo_articulo" placeholder="Código del producto">
                </div>

                <div class = "form-group">
                    <label for="nombre_articulo">Nombre del producto: </label>
                    <input type="text" required class="form-control" value="<?php echo $seleccionar->nombre_articulo;?>" id="nombre_articulo" name="nombre_articulo" placeholder="Nombre del producto">
                </div>

                <div class="form-group">
                  <label for="">Descripción del producto:</label>
                  <textarea class="form-control" name="descripcion" id="descripcion" rows="3"><?php echo $art->descripcion;?></textarea>
                </div>

                <div class = "form-group">
                    <label for="precio_venta">Precio de venta: </label>
                    <input type="text" required class="form-control" value="<?php echo $seleccionar->precio_venta;?>" id="precio_venta" name="precio_venta" placeholder="Precio de venta">
                </div>

                <div class = "form-group">
                    <label for="cantidad">Cantidad: </label>
                    <input type="text" required class="form-control" value="<?php echo $seleccionar->cantidad;?>" id="cantidad" name="cantidad" placeholder="Cantidad">
                </div>

                <div class="form-group">
                  <label for="estado">Estado</label>
                  <select class="form-control" name="estado" id="estado">
                    <option>Seleccionar</option>  
                    <option>Activo</option>
                    <option>Inactivo</option>
                  </select>
                </div>                
               
                <div class="form-group">
                  <label for="categoria">Categoría</label>
                  <select class="form-control" name="categoria" id="categoria">
                    <option>Seleccionar</option> 
                    <?php foreach($categoria as $cat) { ?>                                     
                    <option value="<?php echo $cat->id_categoria;?>" name="id_categoria"><?php echo $cat->categoria;?></option>
                    <?php } ?>
                  </select>
                </div>                

                <div class = "form-group">
                    <label for="imagen">Imagen: </label>
                    <img class="img-thumbnail rounded" src="../../img/<?php echo $txtimagen; ?>" width="100" alt="" srcset="">                    
                    <input type="file" class="form-control" id="imagen" name="imagen" placeholder="Añadir archivo">
                </div>                            

                <!-- Footer Modal-->
                <div class="btn-group modal-footer" role="group" aria-label="">
                    <button type="submit" name="accion" <?php // echo ($accion!="Seleccionar")?"disabled":""; ?> value="Editar" class="btn btn-info">Editar</button>
                    <button type="submit" name="accion" <?php // echo ($accion!="Seleccionar")?"disabled":""; ?> value="Cancelar" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                </div>      
            </form> <!-- Formulario -->

        </div> 
        <!-- Modal Body -->  
      </div>
      <!-- Fin Contenido Modal-->
   </div>                  
 </div>
</div>
<!-- Fin Modal -->
<?php //} ?>

