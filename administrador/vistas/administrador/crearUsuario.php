<div class="offset-md-3 col-md-6">
    <br>
    <!-- b4-card-head-foot -->
    <div class="card">
        <div class="card-header">
            Datos de los artículos
        </div>

        <div class="card-body">
            <!-- Formulario de agregar libros.. !crt-form-login -->
            <form method="POST" enctype="multipart/form-data">
                <div class = "form-group">
                    <label for="id_articulo">ID:</label>
                    <input type="text" required readonly class="form-control" value="" id="id_articulo" name="id_articulo" placeholder="ID">
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
                    <label for="codigo_articulo">Código del producto: </label>
                    <input type="text" required class="form-control" value="" id="codigo_articulo" name="codigo_articulo" placeholder="Código del producto">
                </div>

                <div class = "form-group">
                    <label for="nombre_articulo">Nombre del producto: </label>
                    <input type="text" required class="form-control" value="" id="nombre_articulo" name="nombre_articulo" placeholder="Nombre del producto">
                </div>

                <div class="form-group">
                  <label for="">Descripción del producto:</label>
                  <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
                </div>

                <div class = "form-group">
                    <label for="precio_venta">Precio de venta: </label>
                    <input type="text" required class="form-control" value="" id="precio_venta" name="precio_venta" placeholder="Precio de venta">
                </div>

                <div class = "form-group">
                    <label for="cantidad">Cantidad: </label>
                    <input type="text" required class="form-control" value="" id="cantidad" name="cantidad" placeholder="Cantidad">
                </div>

                <div class="form-group">
                  <label for="estado">Estado</label>
                  <select class="form-control" name="estado" id="estado">
                    <option>Seleccionar</option>  
                    <option value="activo">Activo</option>
                    <option value="inactivo">Inactivo</option>
                  </select>
                </div>
                            
                <div class = "form-group">
                    <label for="imagen">Imagen: </label>
                    <!-- Este dato es el que aparace cuando le damos "seleccionar", también mostraremos la imagen no solo el nombre -->
                    <?php echo $txtimagen; ?><br>
                    <?php 
                        // Si $txtimagen es diferente de vacío, muestrame ese algo que se agregó
                        if($txtimagen!=""){                    
                    ?>
                    <img class="img-thumbnail rounded" src="../../img/<?php echo $txtimagen; ?>" width="100" alt="" srcset="">
                    <?php } ?>
                    <input type="file" class="form-control" id="imagen" name="imagen" placeholder="Añadir archivo">
                </div>
                <br>
                <!-- b4-bgroup-default -->
                <div class="btn-group" role="group" aria-label="">
                    <button type="submit" name="accion" <?php echo ($accion=="Seleccionar")?"disabled":""; ?> value="Agregar" class="btn btn-success">Agregar</button>
                    <button type="submit" name="accion" <?php echo ($accion!="Seleccionar")?"disabled":""; ?> value="Editar" class="btn btn-info">Editar</button>
                    <button type="submit" name="accion" <?php echo ($accion!="Seleccionar")?"disabled":""; ?> value="Cancelar" class="btn btn-danger">Cancelar</button>
                </div>
            </form>
        </div>

    </div>   
    
</div>