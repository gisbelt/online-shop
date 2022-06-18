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

<div class="container">
    <div class="row">

        <div class="col-md-4"></div>

        <div class="col-md-4">
            <br><br><br>
            <div class="card">
                <div class="card-header">
                    Login
                </div>
                <div class="card-body">

                    <!-- Mensaje de error si el usuario o passwd están vacíos  -->
                    <?php if(isset($mensaje1)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $mensaje1; ?>
                    </div>
                    <?php }?>

                    <?php if(isset($mensaje2)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $mensaje2; ?>
                    </div>
                    <?php }?>

                    <!-- Creamos Formulario: !crt-form-login -->
                    <!-- Enviamos los datos del formulario a través del método post -->
                    <form method="POST" >
                        <div class="form-group">
                            <label for="correo">Correo:</label>
                            <input type="text" class="form-control" name="correo" id="correo" aria-describedby="emailHelp" placeholder="Escribe tu correo">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="contrasenia">Contraseña:</label>
                            <input type="password" class="form-control" name="contrasenia" id="contrasenia" placeholder="Escribe tu contraseña">
                        </div>
                        <br>
                        <button type="submit" name="login" class="btn btn-primary">Iniciar Sesión</button>
                    </form>                        
                
                </div>
            </div>
            
        </div>            
    </div>
</div>

<!-- ********************************* -->

<?php $bottom->Bottom(); ?>
</body>
<br><br>
</html>