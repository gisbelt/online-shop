<div class="offset-md-3 col-md-6">
    <br>
    <!-- b4-card-head-foot -->
    <div class="card">
        <div class="card-header">
            Editar artículos
        </div>

        <div class="card-body">
            <!-- Mensaje de éxito  -->
            <?php if(isset($mensaje1)) { ?>
                <div class="alert alert-primary" role="alert">
                    <?php echo $mensaje1; ?>
                </div>
            <?php }?>

            <form method="POST" enctype="multipart/form-data" action="">
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
                    <textarea class="form-control" value="<?php echo $buscar->descripcion;?>" name="edescripcion" id="edescripcion" rows="3"><?php echo $buscar->descripcion;?></textarea>
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
                    <label for="estado">Estado: </label><span>
                    <select class="form-control" name="iestado" id="iestado">
                    <option><?php echo $buscar->estado;?></option>  
                    <option value="activo">activo</option>
                    <option value="inactivo">inactivo</option>
                    </select>
                </div>                

                <div class="form-group">
                    <label for="categoria">Categoría: </label> 
                    <select class="form-control" name="icategoria" id="icategoria" >
                    <option value="<?php echo $buscar->id_categoria;?>"><?php echo $buscar->categoria;?></option> 
                    <?php foreach($categoria as $cat) { ?>                                                                           
                    <option value="<?php echo $cat->id_categoria;?>"><?php echo $cat->categoria;?></option>
                    <?php } ?>
                    </select>
                </div>
                
                <div class="form-group">                 
                    <label for="estado">Descuento: </label>
                    <select class="form-control" name="idescuento" id="idescuento">
                    <option><?php echo $buscar->descuento;?></option>  
                    <option value="No">No</option>
                    <option value="10%">10%</option>
                    <option value="20%">20%</option>
                    <option value="30%">30%</option>
                    </select>
                </div>  

                <div class = "form-group">
                    <label for="imagen">Imagen: </label>
                    <img class="img-thumbnail rounded" src="./img/<?php echo $buscar->imagen;?>" width="100" alt="" srcset="" name="aimagen">                    
                    <input type="file" class="form-control" id="eimagen" name="eimagen" placeholder="Añadir archivo" value="<?php echo $buscar->imagen;?>">
                </div>                            

                <div class="btn-group modal-footer" role="group" aria-label="">
                    <button id="" type="submit" name="ieditar"  value="Editar" class="btn btn-info">Editar</button>
                    <a href="?controlador=articulos&accion=consultarArticulos" type="" name="cerrar" value="Volver" class="btn btn-danger" data-bs-dismiss="modal">Volver</a>
                </div>      
            </form> <!-- Formulario -->
            
        </div>
    </div>   
    <br>
</div>