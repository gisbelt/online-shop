<!-- bs5-card-head-foot   -->
<div class="card">
    <div class="card-header">
        Agregar Empleado
    </div>
    <div class="card-body">
        <form action="" method="post">
            <!-- bs5-form-input   -->
            <div class="mb-3">
              <label for="name" class="form-label">Nombre</label>
              <input type="text"
                required class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="Nombre del Empleado">
            </div>
            <!-- bs5-form-email   -->
            <div class="mb-3">
              <label for="email" class="form-label">Correo</label>
              <input type="email" required class="form-control" name="email" id="email" aria-describedby="emailHelpId" placeholder="Correo">
            </div>
            <!-- bs5-button-input  -->
            <input name="" id="" class="btn btn-success" type="submit" value="Agregar Empleado">
            <a href="?controlador=empleados&accion=inicio" class="btn btn-primary">Cancelar</a>

        </form>    

    </div>
</div>