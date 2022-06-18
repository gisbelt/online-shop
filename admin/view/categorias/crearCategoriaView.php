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
            <p class="p-0">Datos de las categorías</p>
        </div>

        <div class="card-body">
            <!-- Mensaje de éxito  -->
            <?php if(isset($mensaje1)) { ?>
                <div class="alert alert-primary" role="alert">
                    <?php echo $mensaje1; ?>
                </div>
            <?php }?>

            <!-- !crt-form-login -->
            <form method="POST" enctype="multipart/form-data" id="form-crearCategorias">
                <div class = "form-group">    
                    <input type="hidden" name="id_categoria" id="id_categoria" value="<?php echo $categoriaPorID->id_categoria; ?>">
                </div>

                <div class = "form-group">
                    <label for="categoria" class="fw-bold mb-1">Nombre de la categoría: </label>
                    <input type="text" required class="form-control mb-2" id="categoria" name="categoria" value="<?php echo $categoriaPorID->categoria; ?>" placeholder="Nombre de la categoría">
                </div>
                
                <div class="form-group">
                    <label for="descripcion" class="fw-bold mb-1">Descripción:</label>
                    <input type="text" required class="form-control mb-2" id="descripcion" name="descripcion" value="<?php echo $categoriaPorID->descripcion; ?>" placeholder="Descripción">
                </div>
                
                <br>
                <div class="btn-group modal-footer" role="group" aria-label="">
                    <button type="submit" name="accion" value="Agregar" class="btn btn-success" <?php echo ($accion=="seleccionar")?"disabled":""; ?>>Agregar</button>
                    <button type="submit" name="accion" value="Editar" class="btn btn-info" <?php echo ($accion!="seleccionar")?"disabled":""; ?>>Editar</button>
                    <a name="limpiar" value="Limpiar" class="btn btn-danger" onclick="limpiar();">Limpiar</a>
                </div>
            </form>
        </div>

    </div>   
    <br>
</div>

<!-- Consultar categorias  -->
<?php include_once("view/categorias/consultarCategoriasView.php"); ?>

<!-- ********************************* -->

<?php $bottom->Bottom(); ?>
<script>
    function limpiar(){
        $("#form-crearCategorias")[0].reset();
        $("#categoria").focus();
    }
    $(document).ready(function(){
        $("#categoria").focus();
    });
</script>
</body>
<br><br>
</html>