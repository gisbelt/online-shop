<div class="offset-md-3 col-md-6" width="50%">

    <!-- bs5-card-head-foot   -->
    <div class="card">
        <div class="card-header bg-success text-center default">
            Registrarse
        </div>
        <div class="card-body">
            <!-- Mensaje de error  -->
            <div class="alert alert-primary error" role="alert" style="display:none;">
                Las contraseñas no coinciden
            </div>

            <!-- Mensaje de éxito  -->
            <?php if(isset($mensaje2)) { ?>
                <div class="alert alert-primary" role="alert">
                    <?php echo $mensaje2; ?>
                </div>
            <?php }?>

            <form action="" method="post" id="formulario_registro">
                <!-- bs5-form-input   -->
                <div class="mb-3">
                    <label for="nombre_cliente" class="form-label">Nombre</label>
                    <input type="text"
                    required autofocus class="form-control" name="nombre_cliente" id="nombre_cliente" aria-describedby="helpId" placeholder="Escribe tu nombre">
                </div>

                <div class="mb-3">
                    <label for="apellido_cliente" class="form-label">Apellido</label>
                    <input type="text"
                    required class="form-control" name="apellido_cliente" id="apellido_cliente" aria-describedby="helpId" placeholder="Escribe tu apellido">
                </div>
                
                <!-- bs5-form-email   -->
                <div class="mb-3">
                    <label for="email" class="form-label">Correo</label>
                    <input type="email" required class="form-control" name="email" id="email" aria-describedby="emailHelpId" placeholder="Escribe tu correo">
                </div>

                <div class="mb-3">
                    <label for="contrasenia" class="form-label">Contraseña:</label>
                    <input type="password" required  class="form-control" name="contrasenia" id="contrasenia" placeholder="Escribe tu contraseña">
                </div>

                <div class="mb-3">
                    <label for="contrasenia2" class="form-label">Confirmar Contraseña:</label>
                    <input type="password" required  class="form-control" name="contrasenia2" id="contrasenia2" placeholder="Confirmar contraseña">
                </div>

                <!-- bs5-button-input  -->
                <a type="submit" name="registrar_cliente" id="registrar_cliente" value="Registrarse" class="btn btn-success registrar_cliente">Registrarse</a>
                <!-- <input name="" id="" class="btn btn-success" type="submit" value="Registrarse" > -->
                <a href="?controlador=empleados&accion=inicio" class="btn btn-primary">Cancelar</a>
            </form>    
        </div>
    </div>
    <!-- Card   -->

</div>


<!-- ********************************* -->

<!-- Modal para mostrar mensaje de éxito al registrar cliente  -->
<div class="cliente_registrado modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">¡En hora buena!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Se ha registrado exitosamente
            </div>
            <div class="modal-footer">
                <a href="?controlador=clientes&accion=login" class="btn btn-primary">Iniciar Sesión</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal para mostrar mensaje de error por no coinidir contraseña  -->
<div class="error_contrasenia modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">¡ERROR!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Las contraseñas no coinciden
            </div>
            <div class="modal-footer">
                <!-- <a href="?controlador=clientes&accion=login" class="btn btn-primary">Iniciar Sesión</a> -->
                <button type="button" class="btn btn-secondary close-contrasenia" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>