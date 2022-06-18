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
<div class="offset-md-3 col-md-6">
    <br>
    <!-- b4-card-head-foot -->
    <div class="card">
        <div class="card-header">
            <p class="p-0 absolute">Datos de los artículos</p>
            <div class="derecha mb-2 p-2" role="group" aria-label="">
                <a href="?url=consultarArticulos" class="btn btn-success text-center">Ver artículos</a>
            </div>
        </div>

        <div class="card-body">
            <!-- Mensaje de éxito  -->
            <?php if(isset($mensaje1)) { ?>
                <div class="alert alert-primary" role="alert">
                    <?php echo $mensaje1; ?>
                </div>
            <?php }?>

            <!-- !crt-form-login -->
            <form method="POST" enctype="multipart/form-data" id="form-crearArticulos">

                <div class="form-group">
                    <label for="categoria" class="fw-bold mb-1">Categoría</label>
                    <select class="form-control mb-2" name="categoria" id="categoria">
                    <option>Seleccionar</option> 
                    <?php foreach($categoria as $cat) { ?>                                     
                    <option value="<?php echo $cat->id_categoria;?>" name="id_categoria"><?php echo $cat->categoria;?></option>
                    <?php } ?>
                    </select>
                </div>

                <div class = "form-group">
                    <label for="codigo_articulo" class="fw-bold mb-1">Código del producto: </label>
                    <input type="text" required class="form-control mb-2" value="" id="codigo_articulo" name="codigo_articulo" placeholder="Código del producto">
                </div>

                <div class = "form-group">
                    <label for="nombre_articulo" class="fw-bold mb-1">Nombre del producto: </label>
                    <input type="text" required class="form-control mb-2" value="" id="nombre_articulo" name="nombre_articulo" placeholder="Nombre del producto">
                </div>

                <div class="form-group">
                    <label for="descripcion" class="fw-bold mb-1">Descripción del producto:</label>
                    <textarea class="form-control mb-2" name="descripcion" id="descripcion" rows="3"></textarea>
                </div>
                
                <div class="row">
                    <div class = "form-group col-md-6">
                        <label for="costo" class="fw-bold mb-1">Costo: </label>
                        <input type="text" required class="form-control mb-2" value="" id="costo" name="costo" placeholder="Costo">
                    </div>

                    <div class = "form-group col-md-6">
                        <label for="precio_venta" class="fw-bold mb-1">Precio de venta: </label>
                        <input type="text" required class="form-control mb-2" value="" id="precio_venta" name="precio_venta" placeholder="Precio de venta">
                    </div>
                </div>
                
                <div class="row">
                    <div class = "form-group col-md-6"">
                        <label for="cantidad" class="fw-bold mb-1">Stock: </label>
                        <input type="text" required class="form-control mb-2" value="" id="cantidad" name="cantidad" placeholder="Cantidad">
                    </div>

                    <div class="form-group col-md-6"">
                        <label for="categoria" class="fw-bold mb-1">Proveedor</label>
                        <select class="form-control mb-2" name="proveedores" id="proveedores">
                        <option>Seleccionar</option> 
                        <?php foreach($proveedores as $prov) { ?>                                     
                        <option value="<?php echo $prov->id_proveedores;?>" name="id_proveedores"><?php echo $prov->nombre_proveedor;?></option>
                        <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                  <label for="estado" class="fw-bold mb-1">Estado</label>
                  <select class="form-control mb-2" name="estado" id="estado">
                    <option>Seleccionar</option>  
                    <option value="activo">Activo</option>
                    <option value="inactivo">Inactivo</option>
                  </select>
                </div>
                
                <div class="form-group">
                  <label for="descuento" class="fw-bold mb-1">Descuento</label>
                  <select class="form-control mb-2" name="descuento" id="descuento">
                    <option>Seleccionar</option>  
                    <option value="No">No</option>
                    <option value="10%">10%</option>
                    <option value="20%">20%</option>
                    <option value="30%">30%</option>
                  </select>
                </div>

                <div class = "form-group">
                    <label for="imagen" class="fw-bold mb-1">Imagen: </label>
                    <img class="img-thumbnail rounded" id="img" src="<?php echo $imagen;?>" width="100" alt="">
                    <input type="file" class="form-control mb-2" id="imagen" name="imagen" placeholder="Añadir archivo">
                </div>
                <br>
                <div class="btn-group modal-footer" role="group" aria-label="">
                    <button type="submit" name="agregar" value="Agregar" class="btn btn-success">Agregar</button>
                    <a name="limpiar" value="Limpiar" class="btn btn-danger" onclick="limpiar();">Limpiar</a>
                </div>
            </form>
        </div>

    </div>   
    <br>
</div>
<!-- ********************************* -->

<?php $bottom->Bottom(); ?>
<script>
    function limpiar(){
        $("#form-crearArticulos")[0].reset();
    }
    // Mostrar imagen seleccionada 
    readURL = input => {
        //Revisamos que el input tenga contenido
        if (input.files && input.files[0]) { 
            //Leemos el contenido
            const reader = new FileReader(); 
            //Al cargar el contenido lo pasamos como atributo de la imagen
            reader.onload = function(e) { 
                $('#img').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    //Cuando el input cambie (se cargue un nuevo archivo) se va a ejecutar de nuevo el cambio de imagen y se verá reflejado.
    $("#imagen").change(function() { 
        readURL(this);
    });
</script>
</body>
<br><br>
</html>