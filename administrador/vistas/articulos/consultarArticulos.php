<br>
<div class="row">
    <div class="list-group col-md-2">
        <a href="#" class="list-group-item list-group-item-action active disabled">Categorías</a>
        <?php  foreach($categoria as $cat) { ?>                                     
            <a href="?controlador=categoria&accion=categoria&nombre_categoria=<?php echo $cat->categoria;?>" class="list-group-item list-group-item-action" name="categoria3" id=""><?php echo $cat->categoria;?></a>
        <?php  } ?>
    </div>
    <div class="col-md-10" style="overflow: hidden;">
        <!-- b4-table-default -->
        <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <!-- <th>ID</th> -->
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Estado</th>
                    <th>Categoría</th>
                    <th>Descuento</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($articulos as $art) { ?> 
                <tr>
                    <!-- <td id="id_articulos<?php echo $art->id_articulos; ?>" name="id_articulos"><?php echo $art->id_articulos; ?></td> -->
                    <td id="codigo_articulo<?php echo $art->id_articulos; ?>" name="codigo_articulo"><?php echo $art->codigo_articulo; ?></td>
                    <td id="nombre_articulo<?php echo $art->id_articulos; ?>" name="nombre_articulo"><?php echo $art->nombre_articulo; ?></td>
                    <td id="descripcion<?php echo $art->id_articulos; ?>" name="descripcion"><?php echo $art->descripcion; ?></td>
                    <td id="precio_venta<?php echo $art->id_articulos; ?>" name="precio_venta"><?php echo number_format($art->precio_venta, 2); ?></td>
                    <td id="cantidad<?php echo $art->id_articulos; ?>" name="cantidad"><?php echo $art->cantidad; ?></td>
                    <td id="estado<?php echo $art->id_articulos; ?>" name="estado"><?php echo $art->estado; ?></td>
                    <td id="categoria<?php echo $art->id_articulos; ?>" name="categoria"><?php echo $art->categoria; ?></td>
                    <td id="descuento<?php echo $art->id_articulos; ?>" name="descuento"><?php echo $art->descuento; ?></td>
                    <td>
                        <img class="card-img-top" src="./asset/img/<?php echo $art->imagen; ?>" alt="Card image cap" name="imagen">
                    </td>

                    <td>
                        <form method="POST">                            
                            <input type="hidden" name="txtid" id="txtid" value="<?php // echo $libro['id']; ?>">
                            <a href="?controlador=articulos&accion=editarArticulos&id_articulos=<?php echo $art->id_articulos;?>" name="seleccionar" id="seleccionar" class="btn btn-primary seleccionar" value="">Seleccionar</a>
                            <a href="?controlador=articulos&accion=borrar&id_articulos=<?php echo $art->id_articulos;?>" name="borrar" id="borrar" class="btn btn-danger" type="submit" style="margin-top: 10px;">Borrar</a>
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


<!-- Modal Contacto-->
<div class="modal fade" id="" role="dialog">                  
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
                    <label for="id_articulos">ID:</label>
                    <input type="text" required readonly class="form-control" value="<?php echo $buscar->id_articulos;?>" id="eid_articulos" name="eid_articulos" placeholder="ID">
                </div>

                <div class = "form-group">
                    <label for="codigo_articulo">Código del producto: </label>
                    <input type="text" required readonly class="form-control" value="<?php echo $buscar->codigo_articulo;?>" id="ecodigo_articulo" name="ecodigo_articulo" placeholder="Código del producto">
                </div>

                <div class = "form-group">
                    <label for="nombre_articulo">Nombre del producto: </label>
                    <input type="text" required class="form-control" value="<?php echo $buscar->nombre_articulo;?>" id="enombre_articulo" name="enombre_articulo" placeholder="Nombre del producto">
                </div>

                <div class="form-group">
                  <label for="">Descripción del producto:</label>
                  <textarea class="form-control" value="<?php echo $buscar->descripcion;?>" name="descripcion" id="edescripcion" rows="3"></textarea>
                </div>

                <div class = "form-group">
                    <label for="precio_venta">Precio de venta: </label>
                    <input type="text" required class="form-control" value="<?php echo $buscar->precio_venta;?>" id="eprecio_venta" name="eprecio_venta" placeholder="Precio de venta">
                </div>

                <div class = "form-group">
                    <label for="cantidad">Cantidad: </label>
                    <input type="text" required class="form-control" value="<?php echo $buscar->cantidad;?>" id="ecantidad" name="ecantidad" placeholder="Cantidad">
                </div>

                <div class="form-group">                 
                  <label for="estado">Estado</label>
                  <input type="text" required readonly class="form-control" value="<?php echo $buscar->estado;?>" id="eestado" name="eestado" style="margin-bottom: 5px;">
                  <select class="form-control" name="iestado" id="iestado">
                    <option>Cambiar Estado</option>  
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                  </select>
                </div>                

                <div class="form-group">
                  <label for="categoria">Categoría:</label>
                  <input type="text" required readonly class="form-control" value="<?php echo $buscar->categoria;?>" id="ecategoria" name="ecategoria" style="margin-bottom: 5px;">
                  <select class="form-control" name="icategoria" id="icategoria">
                    <option>Cambiar Categoria</option> 
                    <?php foreach($categoria as $cat) { ?>                                     
                    <option value="<?php echo $cat->id_categoria;?>" name="id_categoria"><?php echo $cat->categoria;?></option>
                    <?php } ?>
                  </select>
                </div>
                
                <div class="form-group">                 
                  <label for="estado">Descuento</label>
                  <input type="text" required readonly class="form-control" value="<?php echo $buscar->descuento;?>" id="edescuento" name="edescuento" style="margin-bottom: 5px;">
                  <select class="form-control" name="idescuento" id="idescuento">
                    <option>Cambiar Descuento</option>  
                    <option value="No">No</option>
                    <option value="10%">10%</option>
                    <option value="20%">20%</option>
                    <option value="30%">30%</option>
                  </select>
                </div>  

                <div class = "form-group">
                    <label for="imagen">Imagen: </label>
                    <img class="img-thumbnail rounded" src="./img/<?php echo $buscar->imagen;?>" width="100" alt="" srcset="">                    
                    <input type="file" class="form-control" id="eimagen" name="eimagen" placeholder="Añadir archivo">
                </div>                            

                <!-- Footer Modal-->
                <div class="btn-group modal-footer" role="group" aria-label="">
                    <a href="?controlador=articulos&accion=editar&id_articulos=<?php echo $buscar->id_articulos;?>" id="" type="submit" name="ieditar"  value="Editar" class="btn btn-info">Editar</a>
                    <button type="button" name="cerrar"  value="Cancelar" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
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



