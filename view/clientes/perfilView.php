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
    <form method="POST" enctype="multipart/form-data" id="form-perfil-cliente">
    <div class="card">
        <div class="card-header">
            <p class="p-0 text-center fw-bold">Administra tu cuenta</p>
        </div>

        <div class="card-body">
            <!-- Mensaje de éxito  -->
            <div class="alert alert-primary hidden" role="alert">
            </div>

            <div class = "form-group">
                <h4 class="mb-2">
                    <?php echo $consultar->nombre_cliente."\n"; echo $consultar->apellido_cliente;?> 
                    <a class="pointer" id="editar-nombre-cliente"><i class="bi bi-pencil"></i></a>
                </h4>
                <div class="editar_nombre_cliente hidden">
                    <input type="text" class="form-control mb-2" value="<?php echo $consultar->nombre_cliente; ?>" id="nombre-cliente-perfil" name="nombre_cliente_perfil" placeholder="Nombre">
                    <input type="text" class="form-control mb-2" value="<?php echo $consultar->apellido_cliente;?>" id="apellido-cliente-perfil" name="apellido_cliente_perfil" placeholder="Apellido">
                    <a class="btn btn-success mb-2 cambiar_nombre_cliente" value="Cambiar" placeholder="Cambiar">Cambiar</a>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <h4 class="mb-2">Detalles</h4>
                <label for="telefono" class="fw-bold mb-1">Teléfono: </label>
                <p class="m-0">
                    <?php echo $consultar->codigo_telefono; echo $consultar->telefono."\n\n\n";?>
                    <a class="pointer" id="editar-telefono-cliente"><i class="bi bi-pencil"></i></a>
                </p>
                <div class="row mt-2">
                    <div class="col-md-2 editar_telefono_cliente hidden">
                        <select class="form-control mb-2" name="codigo_telefono_perfil" id="codigo_telefono-perfil">
                            <option><?php echo $consultar->codigo_telefono;?></option> 
                            <?php foreach($codigoTelefono as $codigoTelefono) { ?>                                     
                            <option value="<?php echo $codigoTelefono['id_codigo_telefono'];?>" name="id_codigo_telefono"><?php echo $codigoTelefono['codigo_telefono'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-2 p-0 editar_telefono_cliente hidden">
                        <input type="text" required class="form-control mb-2 telefono_cliente_perfil" value="<?php echo $consultar->telefono;?>" id="telefono-cliente-perfil" name="telefono_cliente_perfil" placeholder="Teléfono">
                    </div>
                    <div class="col-md-2 editar_telefono_cliente hidden">
                        <a class="btn btn-success mb-2 cambiar_telefono_cliente" value="Cambiar" placeholder="Cambiar">Cambiar</a>
                    </div>
                </div>
            </div>

            <div class = "form-group">
                <label for="correo_cliente" class="fw-bold mb-1">Correo: </label>
                <input type="text" disabled class="form-control mb-2" value="<?php echo $consultar->correo_cliente;?>" id="correo_cliente" name="correo_cliente" placeholder="Correo">
            </div>

            <div class="form-group">
                <label for="direccion" class="fw-bold mb-1">Dirección:</label>
                <p>
                    <?php echo $consultar->direccion."\n\n\n";?>
                    <a class="pointer" id="editar-direccion-cliente"><i class="bi bi-pencil"></i></a>
                </p>
                <div class="row mt-2">
                    <div class="col-md-8 editar_direccion_cliente hidden">
                        <textarea class="form-control" name="direccion_cliente_perfil" id="direccion-cliente-perfil" rows="1"><?php echo $consultar->direccion;?></textarea>
                    </div>
                    <div class="col-md-2 editar_direccion_cliente hidden">
                        <a class="btn btn-success mb-2 cambiar_direccion_cliente" value="Cambiar" placeholder="Cambiar">Cambiar</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <p class="p-0 text-center fw-bold">Seguridad</p>
            <label for="contrasenia" class="fw-bold mb-1">Contraseña: </label>
            <p>
                <?php
                $contrasenia = $consultar->contrasenia; 
                $contraseniaReplace = str_repeat('*', strlen($contrasenia)+5);
                echo $contraseniaReplace."\n\n\n";
                ?>
                <a class="pointer" id="editar-contrasenia-cliente"><i class="bi bi-pencil"></i></a>
            </p>

            <div class="form-group mb-2 editar_contrasenia_cliente hidden">
                <label for="contrasenia" class="form-label">Contraseña Actual: <span class="text-secondary">*</span></label>
                <input type="password" required  class="form-control" name="contrasenia_cliente" id="contrasenia-cliente" placeholder="Actual">
            </div>

            <div class="form-group mb-2 editar_contrasenia_cliente hidden">
                <label for="contrasenia" class="form-label">Contraseña Nueva: <span class="text-secondary">*</span></label>
                <input type="password" required  class="form-control" name="contrasenia_cliente2" id="contrasenia-cliente2" placeholder="Nueva">
            </div>

            <div class="form-group mb-2 editar_contrasenia_cliente hidden">
                <label for="contrasenia2" class="form-label">Confirmar Contraseña: <span class="text-secondary">*</span></label>
                <input type="password" required  class="form-control" name="contrasenia_cliente3" id="contrasenia-cliente3" placeholder="Confirmar contraseña">
            </div>
            <br>

            <div class="btn-group derecha mb-3" role="group" aria-label="">
                <button type="submit" name="guardar_cambios" value="Guardar cambios" class="btn btn-success">Guardas cambios</button>
            </div>
        </div>
    </div>
    </form>   
    <br>
</div>
<!-- ********************************* -->

<?php $bottom->Bottom(); ?>
<script>
</script>
</body>
<br><br>
<footer>
<?php $footer->Footer(); ?>
</footer>
</html>