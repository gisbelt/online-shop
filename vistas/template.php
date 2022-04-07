<?php
session_start();
if($_SESSION['correo_cliente']=='ok'){
    $nombreCliente=$_SESSION['nombreCliente'];
}

include_once("modelos/conexion.php");
include_once("modelos/carrito.php");
$conteo = count(carrito::obtener_id_articulos_carrito());   

?>
<!-- bs5-$ para que arme toda la extructura html con bootstrap -->
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="public/fonts/bootstrap-icons.css">
    <link rel="stylesheet" href="public/css/style.css">
    <!-- <link rel="stylesheet" href="fonts/css/fontawesome.css"> -->
    <link rel="stylesheet" href="https://bootswatch.com/5/minty/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://bootswatch.com/5/quartz/bootstrap.min.css">    -->
    
  </head>
  <body>

    <nav class="navbar navbar-expand navbar-light bg-light">
        <a class="navbar-brand d-md-none d-inline" href="">Brand</a>
        <button class="navbar-toggler ml-1" type="button" data-toggle="collapse" data-target="#collapsingNavbar2">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="nav-link" href="#"><i class="bi bi-search mr-1"></i></a>
        <?php if(isset($nombreCliente)){ ?>
        <span>Bienvenido <?php echo $nombreCliente; ?></span> 
        <?php } ?>
        <div class="nav navbar-collapse collapse navbar-nav justify-content-md-center">
            <!-- <a class="nav-item nav-link active" href="#">Sistema <span class="visually-hidden">(current)</span></a> -->
            <a class="nav-item nav-link active" href="?controlador=paginas&accion=inicio">Home</a>
            <a class="nav-item nav-link" href="?controlador=empleados&accion=inicio">Nosotros</a>
            <a class="nav-item nav-link" href="?controlador=tienda&accion=tienda">Tienda</a>
            <a class="nav-item nav-link" href="?controlador=empleados&accion=inicio">Contacto</a>
            <?php if(!isset($nombreCliente)){ ?>
            <a class="nav-item nav-link" href="?controlador=clientes&accion=crear">Registrarse</a>
            <a class="nav-item nav-link" href="?controlador=clientes&accion=login">Iniciar Sesión</a>
            <?php } ?> 
            <?php if(isset($nombreCliente)){ ?>
            <a class="nav-item nav-link" href="?controlador=clientes&accion=logout">Cerrar Sesión</a> 
            <?php } ?>
            <li class="nav-item"><a class="nav-link" href=""><i class="fa fa-subway"></i></a> </li>          
        </div>    
        <div class="nav navbar-nav flex-row justify-content-md-center justify-content-start flex-nowrap">
            <li class="nav-item">
                <a class="nav-link" href="?controlador=carrito&accion=vercarrito" style="margin-right: 10px;" title="Ver carrito">
                    <strong style="color: rgb(226, 83, 83);">
                        <?php if ($conteo > 0) { printf("(%d)", $conteo); } ?>
                    </strong>
                    <i class="bi bi-cart2" style="color: #78c2ad"></i>
                </a> 
            </li>  
        </div>    
    </nav>

    <!-- Contenedor por defecto: bs5-grid-default  -->
    <!-- <div class="container"> -->
        <div class="row m-0">
            <div class="col-12 p-0">
                <?php include_once("ruteador.php"); ?>
            </div>
            
        </div>
    <!-- </div> -->
      
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="public/js/local.js"></script>
</body>

</html>