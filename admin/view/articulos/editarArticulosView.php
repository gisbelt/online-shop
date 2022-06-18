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
            Editar artículos
        </div>

        <div class="card-body">
            <!-- Mensaje de éxito  -->
            <?php if(isset($mensaje1) ) { ?>
                <div class="alert alert-primary" role="alert">
                    <?php echo $mensaje1;?>
                </div>
            <?php }?>

            <form method="POST" enctype="multipart/form-data" action="">

                <div class = "form-group">
                    <label for="codigo_articulo" class="fw-bold mb-1">Código del producto: </label>
                    <input type="text" required class="form-control mb-2" value="<?php echo $buscar->codigo_articulo;?>" id="ecodigo_articulo" name="ecodigo_articulo" placeholder="Código del producto">
                </div>

                <div class = "form-group">
                    <label for="nombre_articulo" class="fw-bold mb-1">Nombre del producto: </label>
                    <input type="text" required class="form-control mb-2" value="<?php echo $buscar->nombre_articulo;?>" id="enombre_articulo" name="enombre_articulo" placeholder="Nombre del producto">
                </div>

                <div class="form-group">
                    <label for="descripcion" class="fw-bold mb-1">Descripción del producto:</label>
                    <textarea class="form-control mb-2" value="<?php echo $buscar->descripcion;?>" name="edescripcion" id="edescripcion" rows="3"><?php echo $buscar->descripcion;?></textarea>
                </div>

                <div class = "form-group">
                    <label for="costo" class="fw-bold mb-1">Costo: </label>
                    <input type="text" required class="form-control mb-2" value="<?php echo $buscar->costo;?>" id="ecosto" name="ecosto" placeholder="Costo">
                </div>

                <div class = "form-group">
                    <label for="precio_venta" class="fw-bold mb-1">Precio de venta: </label>
                    <input type="text" required class="form-control mb-2" value="<?php echo $buscar->precio_venta;?>" id="eprecio_venta" name="eprecio_venta" placeholder="Precio de venta">
                </div>

                <div class = "form-group">
                    <label for="cantidad" class="fw-bold mb-1">Cantidad: </label>
                    <input type="text" required class="form-control mb-2" value="<?php echo $buscar->cantidad;?>" id="ecantidad" name="ecantidad" placeholder="Cantidad">
                </div>

                <div class="form-group">
                    <label for="proveedor" class="fw-bold mb-1">Proveedor: </label> 
                    <select class="form-control mb-2" name="iproveedor" id="iproveedor" >
                    <option value="<?php echo $buscar->id_proveedores;?>"><?php echo $buscar->nombre_proveedor;?></option> 
                    <?php foreach($proveedores as $prov) { ?>                                                                           
                    <option value="<?php echo $prov->id_proveedores;?>"><?php echo $prov->nombre_proveedor;?></option>
                    <?php } ?>
                    </select>
                </div>

                <div class="form-group">                 
                    <label for="estado" class="fw-bold mb-1">Estado: </label><span>
                    <select class="form-control mb-2" name="iestado" id="iestado">
                    <option><?php echo $buscar->estado;?></option>  
                    <option value="activo">Activo</option>
                    <option value="inactivo">Inactivo</option>
                    </select>
                </div>                

                <div class="form-group">
                    <label for="categoria" class="fw-bold mb-1">Categoría: </label> 
                    <select class="form-control mb-2" name="icategoria" id="icategoria" >
                    <option value="<?php echo $buscar->id_categoria;?>"><?php echo $buscar->categoria;?></option> 
                    <?php foreach($categoria as $cat) { ?>                                                                           
                    <option value="<?php echo $cat->id_categoria;?>"><?php echo $cat->categoria;?></option>
                    <?php } ?>
                    </select>
                </div>
                
                <div class="form-group">                 
                    <label for="estado" class="fw-bold mb-1">Descuento: </label>
                    <select class="form-control mb-2" name="idescuento" id="idescuento">
                    <option><?php echo $buscar->descuento;?></option>  
                    <option value="No">No</option>
                    <option value="10%">10%</option>
                    <option value="20%">20%</option>
                    <option value="30%">30%</option>
                    </select>
                </div>  

                <div class = "form-group">
                    <label for="imagen" class="fw-bold mb-1">Imagen: </label>
                    <img class="img-thumbnail rounded" id="img" src="../asset/img/<?php echo $buscar->imagen;?>" width="100" alt="" name="aimagen">                    
                    <input type="file" class="form-control mb-2" id="eimagen" name="eimagen" placeholder="Añadir archivo" value="<?php echo $buscar->imagen;?>">
                </div>                            
                <br>
                <div class="btn-group modal-footer" role="group" aria-label="">
                    <button id="" type="submit" name="editar"  value="Editar" class="btn btn-info">Editar</button>
                    <a onClick='history.go(-1);' type="" name="cerrar" value="Volver" class="btn btn-danger" data-bs-dismiss="modal">Volver</a>
                </div>      
            </form> <!-- Formulario -->
            
        </div>
    </div>   
    <br>
</div>
<!-- ********************************* -->

<?php $bottom->Bottom(); ?>
<script>
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
    $("#eimagen").change(function() { 
        readURL(this);
    });
</script>
</body>
<br><br>
</html>