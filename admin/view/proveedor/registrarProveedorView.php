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
            <p class="p-0 absolute">Datos de los proveedores</p>
            <div class="derecha mb-2 p-2" role="group" aria-label="">
                <a href="?url=consultarProveedor" class="btn btn-success text-center">Ver proveedores</a>
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
            <form method="POST" enctype="multipart/form-data" id="form-crearProveedores">

                <div class = "form-group">
                    <label for="nombre_proveedor" class="fw-bold mb-1">Nombre del proveedor: </label>
                    <input type="text" required class="form-control mb-2" value="" id="nombre_proveedor" name="nombre_proveedor" placeholder="Nombre">
                </div>

                <div class = "form-group">
                    <label for="telefono" class="fw-bold mb-1">Teléfono: </label>
                    <input type="text" required class="form-control mb-2" value="" id="telefono" name="telefono" placeholder="Teléfono">
                </div>

                <div class = "form-group">
                    <label for="correo_proveedor" class="fw-bold mb-1">Correo: </label>
                    <input type="text" required class="form-control mb-2" value="" id="correo_proveedor" name="correo_proveedor" placeholder="Correo">
                </div>

                <div class="form-group">
                    <label for="direccion" class="fw-bold mb-1">Dirección:</label>
                    <textarea class="form-control mb-2" name="direccion" id="direccion" rows="3"></textarea>
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
        $("#form-crearProveedores")[0].reset();
        $("#nombre_proveedor").focus();
    }
    $(document).ready(function(){
        $("#nombre_proveedor").focus();
    });
</script>
</body>
<br><br>
</html>