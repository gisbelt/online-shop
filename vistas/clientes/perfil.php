<!-- bs5-card-head-foot   -->
<div class="card">
    <div class="card-header">
        Agregar Empleado
    </div>
    <div class="card-body">
        <form action="" method="post">
            <!-- bs5-form-input   -->
            <div class="mb-3">
              <label for="id" class="form-label">ID:</label>
              <input type="text"
                readonly class="form-control" value="<?php echo $empleado->id;?>" name="id" id="id" aria-describedby="helpId" placeholder="Id Empleado">
            </div>
            <!-- bs5-form-input   -->
            <div class="mb-3">
              <label for="name" class="form-label">Nombre</label>
              <input type="text"
                required class="form-control" value="<?php echo $empleado->nombre;?>" name="name" id="name" aria-describedby="helpId" placeholder="Nombre del Empleado">
            </div>
            <!-- bs5-form-email   -->
            <div class="mb-3">
              <label for="email" class="form-label">Correo</label>
              <input type="email" required class="form-control" value="<?php echo $empleado->correo;?>" name="email" id="email" aria-describedby="emailHelpId" placeholder="Correo">
            </div>
            <!-- bs5-button-input  -->
            <input name="" id="" class="btn btn-success" type="submit" value="Editar Empleado">
            <a href="?controlador=empleados&accion=inicio" class="btn btn-primary">Cancelar</a>

        </form>    

    </div>
</div>


<!-- PERFIL lo tomé de crear -->
<div class="offset-md-3 col-md-6">

    <!-- bs5-card-head-foot   -->
    <div class="card">
        <div class="card-header bg-success text-center default">
            Registrarse
        </div>
        <div class="card-body">
            <!-- Mensaje de error  -->
            <?php if(isset($mensaje1)) { ?>
                <div class="alert alert-primary" role="alert">
                    <?php echo $mensaje1; ?>
                </div>
            <?php }?>

            <!-- Mensaje de éxito  -->
            <?php if(isset($mensaje2)) { ?>
                <div class="alert alert-primary" role="alert">
                    <?php echo $mensaje2; ?>
                </div>
            <?php }?>

            <form action="" method="post">
                <!-- bs5-form-input   -->
                <div class="mb-3">
                    <label for="nombre_cliente" class="form-label">Nombre</label>
                    <input type="text"
                    required class="form-control" name="nombre_cliente" id="nombre_cliente" aria-describedby="helpId" placeholder="Escribe tu nombre">
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
                    <label for="tipo_documento" class="form-label">Tipo de documento: </label>
                    <select class="form-control" name="tipo_documento" id="tipo_documento">
                    <option>Seleccionar</option>
                    <?php foreach($tipoDocumento as $tipodocu) { ?>  
                    <option value="<?php echo $tipodocu->id_tipo_documento;?>" name="id_tipo_documento"><?php echo $tipodocu->tipo_documento;?></option>
                    <?php } ?>  
                    </select>
                </div>

                <div class="mb-3">
                <label for="documento" class="form-label">Documento</label>
                <input type="text"
                    required class="form-control" name="documento" id="documento" aria-describedby="helpId" placeholder="Documento de identidad">
                </div>

                <div class="mb-3">
                <label for="dirección" class="form-label">Dirección</label>
                <input type="text"
                    required class="form-control" name="dirección" id="dirección" aria-describedby="helpId" placeholder="Nombre de la calle y número de casa/apartamento">
                </div>

                <div class="mb-3">                 
                    <label for="codigo_teléfono" class="form-label">Código de teléfono: </label>
                    <select class="form-control" name="codigo_teléfono" id="codigo_teléfono">
                    <option>Seleccionar</option>
                    <?php foreach($codigoTelefono as $codtele) { ?>  
                    <option value="<?php echo $codtele->id_codigo_telefono;?>" name="id_codigo_telefono"><?php echo $codtele->codigo_telefono;?></option>
                    <?php } ?>  
                    </select>
                </div>
                
                <div class="mb-3">
                <label for="telefono" class="form-label">Télefono</label>
                <input type="text"
                    required class="form-control" name="telefono" id="telefono" aria-describedby="helpId" placeholder="Escribe tu teléfono">
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
                <button type="submit" name="accion" value="Registrarse" class="btn btn-success">Registrarse</button>
                <!-- <input name="" id="" class="btn btn-success" type="submit" value="Registrarse" > -->
                <a href="?controlador=empleados&accion=inicio" class="btn btn-primary">Cancelar</a>

            </form>    

        </div>
    </div>
    <!-- Card   -->

</div>